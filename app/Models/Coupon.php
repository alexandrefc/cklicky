<?php

namespace App\Models;

use App\Models\Category;
use App\Services\CreateSlug;
use Illuminate\Http\Request;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image_path', 'slug', 'made_by_id', 'qrcode_path', 
        'venue_id', 'manager_email', 'start_date', 'end_date', 'reset_time', 'type_of_reset_time', 
        'x_time_to_redeem', 'type_of_period_to_redeem', 'available_through', 'category_id', 'reward_id', 
        'image_fs_path', 'video_yt_id', 'scheduled_days', 'gender', 'age', 'start_time', 'end_time'];

    protected $casts = [
        'scheduled_days' => AsCollection::class,
        'age' => AsCollection::class,
    ];

    Public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
    
    public function scopeWeb($query)
    {
        return $query->where('available_through', 'web')->orWhere('available_through', 'all');
    }

    public function scopeScheduledWeb($query)
    {
        $today = now()->weekday();
        return $query->web()->whereJsonContains('scheduled_days', (string)$today)->orWhereJsonContains('scheduled_days', '8');
    }

    public function scopeScheduledTime($query)
    {
        return $query->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->orWhere('start_time', '00:00:00')
            ->orWhere('end_time', '00:00:00')
            ->orWhere('start_time', NULL)
            ->orWhere('end_time', NULL);
    }

    public function scopeGender($query)
    {
        return $query->where('gender', auth()->user()->gender)->orWhere('gender', 'all');
    }

    public function scopeAge($query)
    {
        return $query->whereJsonContains('age', auth()->user()->age)->orWhereJsonContains('age', 'all');
    }


    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
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

    public function createCoupon ($request)
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
