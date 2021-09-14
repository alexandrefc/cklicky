<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Services\CreateSlug;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image_path', 'slug', 'made_by_id', 'qrcode_path', 'venue_id', 'manager_email'];

    public function getAllCoupons ()
    {
        return self::latest()->get();
    }

    public function getCouponBySlug ($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function getCouponById($couponId)
    {
        return self::where('id', $couponId)->first();
    }

    public function addCoupon ($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $qrcode_path = (new CreateQrcode())->createCouponQrcode($slug, $request->title);
        
        self::create([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'slug' => $slug,
            'image_path' => $image_path,
            'qrcode_path' => $qrcode_path,
            'made_by_id' => auth()->user()->id,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
        ]); 
    }

    public function updateCoupon ($request, $slug)
    {
        $coupon = self::where('slug', $slug)->first();
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
        
        self::where('slug', $slug)
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

    // public function showCoupon ($slug)
    // {
    //     $coupon = self::where('slug', $slug)->first();
        
    //     return $coupon;
    // }

    public function deleteCoupon ($slug)
    {
        $coupon = self::where('slug', $slug)->first();

        (new UploadImage())->deleteImage($coupon->image_path);
        (new CreateQrcode())->deleteQrcode($coupon->qrcode_path);
        
        $coupon->delete();

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
