<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'pin', 'slug', 'logo_path', 'qrcode_path', 'user_id', 
    'manage_by_id', 'location', 'email', 'website', 'category_id', 'test_email', 'coordinates' ];

    protected $casts = [
        'coordinates' => AsCollection::class,
        
    ];

    public function scopeTesting($query)
    {
        return $query->where('user_id', Auth::user()->id)
            ->orWhere('manage_by_id', Auth::user()->id)
            ->orWhere('test_email', Auth::user()->email)
            ->orWhere('user_id', 1);
    }


    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function stamps()
    {
        return $this->hasMany(Stamp::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
