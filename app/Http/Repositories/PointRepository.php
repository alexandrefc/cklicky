<?php

namespace App\Http\Repositories;

use App\Models\Point;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Services\TimeToRedeem;
use App\Http\Interfaces\PointInterface;
use App\Models\MyPoint;

class PointRepository implements PointInterface
{

    public function getAllPoints()
    {
        return Point::latest()->get();
    }

    public function getPointById($id)
    {
        return Point::where('id', $id)->first();
    }

    public function getPointBySlug ($slug)
    {
        return Point::where('slug', $slug)->first();
    }

    public function createPoint($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $qrcode_path = (new CreateQrcode())->createPointQrcode($slug, $request->title);
        
        Point::create([
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
            
        ]); 
    }

    public function updatePoint($request, $slug)
    {
        $point = Point::where('slug', $slug)->first();
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
        
        Point::where('slug', $slug)
            ->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'image_path' => $updated_image_path,
            'venue_id' => $request->venue_id
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
        
        if ($startDate <= $now && $now <= $endDate)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 
}
