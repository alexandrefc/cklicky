<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'pin', 'slug', 'logo_path', 'qrcode_path', 'user_id', 'manage_by_id', 'location', 'email', 'website' ];

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

}
