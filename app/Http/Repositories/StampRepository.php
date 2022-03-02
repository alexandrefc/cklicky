<?php

namespace App\Http\Repositories;

use App\Models\Stamp;
use App\Models\Reward;
use App\Models\MyStamp;
use App\Models\MyCoupon;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Services\TimeToRedeem;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Interfaces\StampInterface;

class StampRepository implements StampInterface
{
    protected $model;
    public function __construct(Stamp $model)
    {
        
        $this->model = $model;
        
    }

    public function getAllStamps()
    {
        return $this->model->latest()->get();
    }

    public function getAllManagerStamps()
    {
        return $this->model->where('manager_email', Auth::user()->email)
            ->orWhere('made_by_id', Auth::user()->id)
            ->latest()
            ->get();
    }

    public function getAllTestingStamps()
    {
        if(auth()->user())
        {
            return QueryBuilder::for(Stamp::class)
                ->allowedFilters([AllowedFilter::exact('category', 'category_id'), AllowedFilter::exact('venue', 'venue_id')])
                ->active()->testing()->gender()->age()->scheduledWeb()->scheduledTime()
                ->latest()
                ->get();
        } else {
            return QueryBuilder::for(Stamp::class)
                ->allowedFilters([AllowedFilter::exact('category', 'category_id'), AllowedFilter::exact('venue', 'venue_id')])
                ->active()->where('made_by_id', 1)
                ->latest()
                ->get();
        }
    }

    public function getAllWebStamps()
    {
        return $this->model->web()->latest()->get();
    }

    public function getAllWebScheduledStamps()
    {
        return $this->model->scheduledWeb()->scheduledTime()->latest()->get();
    }

    public function getAllWebScheduledProfiledStamps()
    {
        return $this->model->gender()->age()->scheduledWeb()->scheduledTime()
            ->latest()
            ->get();
    }

    public function getAllGenderStamps()
    {
        return $this->model->scheduledWeb()->gender()->latest()->get();
    }

    public function getAllAgeStamps()
    {
        return $this->model->scheduledWeb()->age()->latest()->get();
    }

    public function getStampById($id)
    {
        return $this->model->id($id)->first();
    }

    public function getStampBySlug ($slug)
    {
        return $this->model->slug($slug)->first();
    }

    public function createStamp($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $image_fs_path = (new UploadImage())->uploadImageFS($request->imageFS, $request->title);
        $qrcode_path = (new CreateQrcode())->createStampQrcode($slug, $request->title);
        
        $this->model->create([
            'title' => $request->title,
            'description' => $request->description,
            // 'valid_till' => $request->valid_till,
            'slug' => $slug,
            'image_path' => $image_path,
            'qrcode_path' => $qrcode_path,
            'made_by_id' => auth()->user()->id,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
            'category_id' => $request->category,
            'available_through' => $request->availableThrough,
            'add_x_stamps' => $request->xStamps,
            'total_stamps' => $request->total_stamps,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'x_time_to_redeem' => $request->xTimeToRedeem,
            'type_of_period_to_redeem' => $request->period,
            'reset_time' => $request->timeReset,
            'type_of_reset_time' => $request->timeResetPeriod,
            'reward_id' => $request->reward_id,
            'image_fs_path' => $image_fs_path,
            'video_yt_id' => $request->videoYtId,
            'scheduled_days' => $request->scheduled_days,
            'gender' => $request->gender,
            'age' => $request->age,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'test_email' => auth()->user()->test_email,
            'is_active' => $request->is_active
            
        ]); 

        if($request->reward_id)
        {
            $reward = new Reward;
            $campaign_id = $this->getStampBySlug($slug)->id;
            $campaign_type = 'stamp'; 
            $reward_id = $request->reward_id; 
            $reward_type = 'coupon';
            $reward_points_amount = $request->total_stamps;
    
            $reward->createReward($campaign_id, $campaign_type, $reward_id, $reward_type, $reward_points_amount);
        }
       

    }

    public function updateStamp($request, $slug)
    {
        $stamp = $this->getStampBySlug($slug);
        $existing_image_path = $stamp->image_path;
        $existing_image_fs_path = $stamp->image_fs_path;
        $updateImage = new UploadImage;

        // If there should be new qrcode and slug:

        // $existing_qrcode_path = $Stamp->qrcode_path;
        // $existing_slug = $Stamp->slug;
        // $updated_slug = (new CreateSlug())->createSlug($request->title);
        // $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        if ($request->hasFile('image'))
        {
            $updated_image_path = $updateImage->updateImage($request->image, $request->title);
            $updateImage->deleteImage($existing_image_path);
        } else {
            $updated_image_path = $existing_image_path;
        }

        if ($request->hasFile('image_fs'))
        {
            $updated_image_fs_path = $updateImage->updateImageFS($request->image_fs, $request->title);
            $updateImage->deleteImageFS($existing_image_fs_path);
        } else {
            $updated_image_fs_path = $existing_image_fs_path;
        }

        
        
        $stamp->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'image_path' => $updated_image_path,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
            'category_id' => $request->category,
            'available_through' => $request->availableThrough,
            'add_x_stamps' => $request->xStamps,
            'total_stamps' => $request->total_stamps,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'x_time_to_redeem' => $request->xTimeToRedeem,
            'type_of_period_to_redeem' => $request->period,
            'reset_time' => $request->timeReset,
            'type_of_reset_time' => $request->timeResetPeriod,
            'reward_id' => $request->reward_id,
            'image_fs_path' => $updated_image_fs_path,
            'video_yt_id' => $request->videoYtId,
            'scheduled_days' => $request->scheduled_days,
            'gender' => $request->gender,
            'age' => $request->age,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'test_email' => auth()->user()->test_email,
            'is_active' => $request->is_active
            // 'qrcode_path' => $updated_qrcode_path,
            // 'made_by_id' => auth()->user()->id,
            // 'slug' => $updated_slug
            
        ]); 

        if($request->reward_id)
        {
            $stamp = $this->getStampBySlug($slug);
            if($stamp->reward_id == NULL)
            {
                $campaign_type = 'stamp'; 
                $reward_id = $request->reward_id; 
                $reward_type = 'coupon';
                $reward_points_amount = $request->total_stamps;
                $campaign_id = $stamp->id;
        
                $reward = new Reward;
                $reward->createReward($campaign_id, $campaign_type, $reward_id, $reward_type, $reward_points_amount);
            }
        }
    }

    public function deleteStamp($slug)
    {
        
        $stamp = $this->getStampBySlug($slug);
        $myStamps = (new MyStamp())->getAllMyStampById($stamp->id);
        $deleteQrcode = new CreateQrcode;
        $deleteImage = new UploadImage;

        foreach($myStamps as $myStamp)
        {
            $deleteQrcode->deleteQrcode($myStamp->add_stamps_qrcode_path);
        }
        
        $deleteImage->deleteImageFS($stamp->image_fs_path);

        $deleteImage->deleteImage($stamp->image_path);
        
        $deleteQrcode->deleteQrcode($stamp->qrcode_path);
        
        $stamp->delete();
    }

    public function checkIfUserIsManager($stampId)
    {
        $managerEmail = $this->getStampById($stampId)->manager_email;
        
        if ($managerEmail == auth()->user()->email)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function getTimeToRedeem($stampId)
    {
        $stamp = $this->getStampById($stampId);
        
        return (new TimeToRedeem())->setTimeToRedeem($stamp->type_of_period_to_redeem, $stamp->x_time_to_redeem);
    }

    public function getUserResetTime($stampId)
    {
        $stamp = $this->getStampById($stampId);
        
        return (new TimeToRedeem())->setResetTime($stamp->type_of_reset_time, $stamp->reset_time);
    }

    public function checkIfNowIsInValidTime($stampId)
    {
        $stamp = $this->getStampById($stampId);
        // $now = now();

        // $startDate = $Stamp->start_date; 
        // $endDate = $Stamp->end_date; 
        
        if ($stamp->start_date <= now() && now() <= $stamp->end_date || $stamp->start_date == 0 || $stamp->end_date == 0)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 

    public function checkIfCampaignIsActive($stampId) 
    {
        $stamp = $this->getStampById($stampId);
        
        if ($stamp->active)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // todo: move to MyStamp repo
    public function addStampRewardToMyStamps($stampId, $userId)
    {
        $myStamp = new MyStamp;
        $stamp = $this->getStampById($stampId);
        $rewardId = $stamp->reward_id;
        $user_time_to_redeem = $this->getTimeToRedeem($stampId);

        if (!($myStamp->checkIfMyExists($rewardId, $userId)))
        {
            $myStamp->addToMy($rewardId, $userId, $user_time_to_redeem);
        } 
      
    }

    public function addStampRewardToMyCoupons($stampId, $userId)
    {
        $myCoupon = new MyCoupon;
        $stamp = $this->getStampById($stampId);
        $rewardId = $stamp->reward_id;
        // $user_time_to_redeem = $this->getTimeToRedeem($pointId);

        if (!($myCoupon->checkIfMyCouponExists($rewardId, $userId)))
        {
            $myCoupon->addToMy($rewardId, $userId);
        } 

    }
}
