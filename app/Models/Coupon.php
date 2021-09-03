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
    protected $fillable = ['title', 'description', 'image_path', 'slug', 'made_by_id', 'qrcode_path', 'venue_id'];

    public function getAllCoupons ()
    {
        return self::latest()->get();
    }

    public function getCoupon ($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function addCoupon ($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        self::create([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'slug' => $slug,
            'image_path' => $image_path,
            'qrcode_path' => $qrcode_path,
            'made_by_id' => auth()->user()->id,
            'venue_id' => $request->venue_id
        ]); 
    }

    public function updateCoupon ($request, $slug)
    {
        $updated_slug = (new CreateSlug())->createSlug($request->title);
        $updated_image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        self::where('slug', $slug)
            ->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'slug' => $updated_slug,
            'image_path' => $updated_image_path,
            'qrcode_path' => $updated_qrcode_path,
            'made_by_id' => auth()->user()->id,
            'venue_id' => $request->venue_id
        ]); 
    }

    public function updateCouponWithImage ($request, $slug, $newImageName){
        self::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image_path' => $newImageName,
                'slug' => SlugService::createSlug(Loyalty::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
        ]);
    }

    
}
