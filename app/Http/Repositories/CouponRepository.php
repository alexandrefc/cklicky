<?php

namespace App\Http\Repositories;

use App\Models\Coupon;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use Illuminate\Support\Facades\Auth;
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

    public function getAllWebCoupons()
    {
        return $this->model->web()->latest()->get();
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
            'reward_id' => $request->reward_id
        ]);
    }

    public function deleteCoupon($slug)
    {
        $coupon = $this->getCouponBySlug($slug)->first();

        (new UploadImage())->deleteImage($coupon->image_path);
        (new CreateQrcode())->deleteQrcode($coupon->qrcode_path);
        
        $coupon->delete();
    }

    public function updateCoupon($request, $slug)
    {
        $coupon = $this->getCouponBySlug($slug)->first();
        $existing_image_path = $coupon->image_path;

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
            'reward_id' => $request->reward_id
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
}
