<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image_path', 'slug', 'user_id', 'qrcode_path'];

    public function getAllCoupons ()
    {
        return self::latest()->get();
    }

    public function addCoupon ($request, $slug, $newImageName)
    {
        self::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image_path' => $newImageName,
                'qrcode_path' => '',
                'slug' => SlugService::createSlug(Loyalty::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
        ]);
    }



    public function updateCoupon ($request, $slug, $newImageName){
        self::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Loyalty::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
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
