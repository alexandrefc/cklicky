<?php

namespace App\Http\Repositories;

use App\Models\Coupon;
use App\Models\MyCoupon;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Services\TimeToRedeem;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Interfaces\CouponInterface;

class CouponRepository implements CouponInterface
{
    protected $model;
    public function __construct(Coupon $model)
    {
        
        $this->model = $model;
        
    }

    public function getAllCoupons()
    {
        return $this->model->all();
    }

    public function getAllManagerCoupons() 
    {
        return $this->model->where('manager_email', Auth::user()->email)
        ->orWhere('made_by_id', Auth::user()->id)
        ->latest()
        ->get();
    }

    public function getAllTestingCoupons()
    {
        if(auth()->user())
        {
            return QueryBuilder::for(Coupon::class)
                ->allowedFilters([AllowedFilter::exact('category', 'category_id'), AllowedFilter::exact('venue', 'venue_id')])
                ->active()->testing()->gender()->age()->scheduledWeb()->scheduledTime()
                ->latest()
                ->lazy();
        } else {
            return QueryBuilder::for(Coupon::class)
                ->allowedFilters([AllowedFilter::exact('category', 'category_id'), AllowedFilter::exact('venue', 'venue_id')])
                ->active()->where('made_by_id', 1)
                ->latest()
                ->lazy();
        }
        
    }

    public function getAllWebCoupons()
    {
        return $this->model->web()->latest()->get();
    }

    public function getAllWebScheduledCoupons()
    {
        return $this->model->scheduledWeb()->scheduledTime()->latest()->get();
    }

    public function getAllWebScheduledProfiledCoupons()
    {
        return $this->model->gender()->age()->scheduledWeb()->scheduledTime()
            ->latest()
            ->get();
    }

    public function getAllGenderCoupons()
    {
        return $this->model->scheduledWeb()->gender()->latest()->get();
    }

    public function getAllAgeCoupons()
    {
        return $this->model->scheduledWeb()->age()->latest()->get();
    }

    public function getCouponById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getCouponBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function createCoupon($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $image_fs_path = (new UploadImage())->uploadImageFS($request->imageFS, $request->title);
        $qrcode_path = (new CreateQrcode())->createCouponQrcode($slug, $request->title);
        
        return $this->model->create([
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
    }

    public function deleteCoupon($slug)
    {
        $coupon = $this->getCouponBySlug($slug);
        $myCoupons = (new MyCoupon())->getAllMyCouponsById($coupon->id);
        $deleteQrcode = new CreateQrcode;
        $deleteImage = new UploadImage;

        foreach($myCoupons as $myCoupon)
        {
            $deleteQrcode->deleteQrcode($myCoupon->redeem_qrcode_path);
        }
        
        $deleteImage->deleteImageFS($coupon->image_fs_path);

        $deleteImage->deleteImage($coupon->image_path);
        
        $deleteQrcode->deleteQrcode($coupon->qrcode_path);
        
        $coupon->delete();

    }

    public function updateCoupon($request, $slug)
    {
        $coupon = $this->getCouponBySlug($slug);
        $existing_image_path = $coupon->image_path;
        $existing_image_fs_path = $coupon->image_fs_path;
        $updateImage = new UploadImage;

        // Should be updated qrcode and slug ?

        // $existing_qrcode_path = $coupon->qrcode_path;
        // $existing_slug = $coupon->slug;
        // $updated_slug = (new CreateSlug())->createSlug($request->title);
        // $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        if ($request->hasFile('image'))
        {
            $updated_image_path = (new UploadImage())->updateImage($request->image, $request->title);
            (new UploadImage())->deleteImage($existing_image_path);
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
        
        $coupon->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'image_path' => $updated_image_path,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
            'category_id' => $request->category,
            'available_through' => $request->availableThrough,
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
            'age' => ($request->age),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'test_email' => auth()->user()->test_email,
            'is_active' => $request->is_active
            
            // 'reset_time' => $request->timeReset,
            // 'type_of_reset_time' => $request->timeResetPeriod,
           
            // 'qrcode_path' => $updated_qrcode_path,
            // 'made_by_id' => auth()->user()->id,
            // 'slug' => $updated_slug
            
        ]); 
    }

    public function checkIfUserIsManager($couponId)
    {
        
        $managerEmail = $this->getCouponById($couponId)->manager_email;
        
        if ($managerEmail == auth()->user()->email)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function checkIfNowIsInValidTime($couponId)
    {
        $coupon = $this->getCouponById($couponId);
        
        if ($coupon->start_date <= now() && now() <= $coupon->end_date || $coupon->start_date == 0 || $coupon->end_date == 0)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 

    public function checkIfCampaignIsActive($couponId) 
    {
        $coupon = $this->getCouponById($couponId);
        
        if ($coupon->active)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function addCouponRewardToMyCoupons($couponId, $userId)
    {
        $myCoupon = new MyCoupon;
        $coupon = $this->getCouponById($couponId);
        $rewardId = $coupon->reward_id;
        // $user_time_to_redeem = $this->getTimeToRedeem($pointId);

        if (!($myCoupon->checkIfMyCouponExists($rewardId, $userId)))
        {
            $myCoupon->addToMy($rewardId, $userId);
        } 
    }

    public function getTimeToRedeem($couponId)
    {
        $coupon = $this->getCouponById($couponId);
        
        return (new TimeToRedeem())->setTimeToRedeem($coupon->type_of_period_to_redeem, $coupon->x_time_to_redeem);
    }



}
