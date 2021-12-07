<?php

namespace App\Http\Repositories;

use App\Models\Point;
use App\Models\MyPoint;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Services\TimeToRedeem;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\PointInterface;

class PointRepository implements PointInterface
{
    protected $model;
    public function __construct(Point $model)
    {
        
        $this->model = $model;
        
    }

    public function getAllPoints()
    {
        return $this->model->latest()->get();
    }

    public function getAllManagerPoints()
    {
        return $this->model->where('manager_email', Auth::user()->email)
            ->orWhere('made_by_id', Auth::user()->id)
            ->latest()
            ->get();
    }

    public function getAllWebPoints()
    {
        return $this->model->web()->latest()->get();
    }

    public function getAllWebScheduledPoints()
    {
        // $scheduledDays = now()->weekday();

        // return $this->model
        //     ->web()
        //     ->whereJsonContains('scheduled_days', (string)$scheduledDays)
        //     ->latest()->get();

        return $this->model->scheduledWeb()->latest()->get();
    }

    public function getAllGenderPoints()
    {
        // $scheduledDays = now()->weekday();

        // return $this->model
        //     ->web()
        //     ->whereJsonContains('scheduled_days', (string)$scheduledDays)
        //     ->latest()->get();

        return $this->model->scheduledWeb()->gender()->latest()->get();
    }

    public function getAllAgePoints()
    {
        // $scheduledDays = now()->weekday();

        // return $this->model
        //     ->web()
        //     ->whereJsonContains('scheduled_days', (string)$scheduledDays)
        //     ->latest()->get();

        return $this->model->scheduledWeb()->age()->latest()->get();
    }

    public function getPointById($id)
    {
        return $this->model->id($id)->first();
    }

    public function getPointBySlug ($slug)
    {
        return $this->model->slug($slug)->first();
    }

    public function createPoint($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $imageFS = (new UploadImage())->uploadImageFS($request->imageFS, $request->title);
        $qrcode_path = (new CreateQrcode())->createPointQrcode($slug, $request->title);
        
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
            'add_x_points' => $request->xPoints,
            'total_points' => $request->totalPoints,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'x_time_to_redeem' => $request->xTimeToRedeem,
            'type_of_period_to_redeem' => $request->period,
            'reset_time' => $request->timeReset,
            'type_of_reset_time' => $request->timeResetPeriod,
            'reward_id' => $request->reward_id,
            'image_fs_path' => $imageFS,
            'video_yt_id' => $request->videoYtId,
            'scheduled_days' => $request->scheduled_days,
            'gender' => $request->gender,
            'age' => json_encode($request->age) 
            
        ]); 
    }

    public function updatePoint($request, $slug)
    {
        $point = $this->getPointBySlug($slug);
        $existing_image_path = $point->image_path;
        $updateImage = new UploadImage;

        // If there should be new qrcode and slug:

        // $existing_qrcode_path = $point->qrcode_path;
        // $existing_slug = $point->slug;
        // $updated_slug = (new CreateSlug())->createSlug($request->title);
        // $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        if ($request->hasFile('image'))
        {
            $updated_image_path = $updateImage->updateImage($request->image, $request->title);
            $updateImage->deleteImage($existing_image_path);
        } else {
            $updated_image_path = $existing_image_path;
        }
        
        $point->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'image_path' => $updated_image_path,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
            'category_id' => $request->category,
            'available_through' => $request->availableThrough,
            'add_x_points' => $request->xPoints,
            'total_points' => $request->totalPoints,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'x_time_to_redeem' => $request->xTimeToRedeem,
            'type_of_period_to_redeem' => $request->period,
            'reset_time' => $request->timeReset,
            'type_of_reset_time' => $request->timeResetPeriod,
            'reward_id' => $request->reward_id
            // 'qrcode_path' => $updated_qrcode_path,
            // 'made_by_id' => auth()->user()->id,
            // 'slug' => $updated_slug
            
        ]); 
    }

    public function deletePoint($slug)
    {
        // $point = Point::where('slug', $slug)->first();
        $point = $this->getPointBySlug($slug);
        $myPoints = (new MyPoint())->getAllMyPointById($point->id);
        $deleteQrcode = new CreateQrcode;

        foreach($myPoints as $myPoint)
        {
            $deleteQrcode->deleteQrcode($myPoint->add_points_qrcode_path);
        }

        (new UploadImage())->deleteImage($point->image_path);
        $deleteQrcode->deleteQrcode($point->qrcode_path);
        
        $point->delete();
    }

    public function checkIfUserIsManager($pointId)
    {
        $managerEmail = $this->getpointById($pointId)->manager_email;
        
        if ($managerEmail == auth()->user()->email)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 

    public function getTimeToRedeem($pointId)
    {
        $point = $this->getPointById($pointId);
        
        return (new TimeToRedeem())->setTimeToRedeem($point->type_of_period_to_redeem, $point->x_time_to_redeem);
    }

    public function getUserResetTime($pointId)
    {
        $point = $this->getPointById($pointId);
        
        return (new TimeToRedeem())->setResetTime($point->type_of_reset_time, $point->reset_time);
    }

    public function checkIfNowIsInValidTime($pointId)
    {
        $point = $this->getPointById($pointId);
        $now = now();

        $startDate = $point->start_date; 
        $endDate = $point->end_date; 
        
        if ($point->start_date <= now() && now() <= $point->end_date)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 

    // todo: move to MyPoint repo
    public function addPointRewardToMyPoints($pointId, $userId)
    {
        $myPoint = new MyPoint;
        $point = $this->getPointById($pointId);
        $rewardId = $point->reward_id;
        $user_time_to_redeem = $this->getTimeToRedeem($pointId);

        if (!($myPoint->checkIfMyPointExists($rewardId, $userId)))
        {
            $myPoint->addToMyPoints($rewardId, $userId, $user_time_to_redeem);
        } 
      
    }
}
