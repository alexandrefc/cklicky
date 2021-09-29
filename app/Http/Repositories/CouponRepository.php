<?php

namespace App\Http\Repositories;

use App\Models\Coupon;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Http\Interfaces\CouponInterface;

class CouponRepository implements CouponInterface
{

    public function getAllCoupons()
    {
        return Coupon::all();
    }

    public function getCouponById($id)
    {
        return Coupon::where('id', $id)->first();
    }

    public function getCouponBySlug($slug)
    {
        return Coupon::where('slug', $slug)->first();
    }

    public function createCoupon($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $logo_path = (new UploadImage())->uploadImage($request->logo, $request->title);
        $qrcode_path = (new CreateQrcode())->createPointQrcode($slug, $request->title);
        
        return Coupon::create([
            'title' => $request->title,
            'description' => $request->description,
            'pin' => $request->pin,
            'slug' => $slug,
            'logo_path' => $logo_path,
            'qrcode_path' => $qrcode_path,
            'user_id' => auth()->user()->id,
            'manage_by_id' => auth()->user()->id,
            'location' => $request->location
        ]);
    }

    public function deleteCoupon($slug)
    {
        $coupon = Coupon::where('slug', $slug)->first();

        (new UploadImage())->deleteImage($coupon->image_path);
        (new CreateQrcode())->deleteQrcode($coupon->qrcode_path);
        
        $coupon->delete();
    }

    public function updateCoupon($request, $slug)
    {
        $coupon = Coupon::where('slug', $slug)->first();
        $existing_image_path = $coupon->image_path;

        // Should be new qrcode and slug ?

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
        
        Coupon::where('slug', $slug)
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

    public function getAllManagerCoupons($id) 
    {
        return Coupon::where('user_id', $id)->get();
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
