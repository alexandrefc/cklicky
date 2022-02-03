<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_path', 'slug', 'made_by_id', 'qrcode_path', 'venue_id', 
        'manager_email', 'valid_till', 'total_stamps', 'add_x_stamps', 'start_date', 'end_date', 
        'reset_time', 'type_of_reset_time', 'x_time_to_redeem', 'type_of_period_to_redeem', 
        'available_through', 'category_id', 'reward_id', 'image_fs_path', 'video_yt_id', 
        'scheduled_days', 'gender', 'age', 'start_time', 'end_time', 'test_email'];
    
    protected $casts = [
        'scheduled_days' => AsCollection::class,
        'age' => AsCollection::class,
    ];

    public function scopeId($query, $id)
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
        
        return $query->web()->whereJsonContains('scheduled_days', (string)$today)
            ->orWhere('scheduled_days', NULL);
    }

    public function scopeScheduledTime($query)
    {
        return $query->where('start_time', '<=', now()->format('H:i:s'))
            ->where('end_time', '>=', now()->format('H:i:s'))
            ->orWhere('start_time', '00:00:00')
            ->orWhere('end_time', '00:00:00')
            ->orWhere('start_time', NULL)
            ->orWhere('end_time', NULL);
    }

    public function scopeTesting($query)
    {
        return $query->where('manager_email', Auth::user()->email)
            ->orWhere('made_by_id', Auth::user()->id)
            ->orWhere('test_email', Auth::user()->email)
            ->orWhere('made_by_id', 1);
    }


    public function scopeGender($query)
    {
        return $query->where('gender', auth()->user()->gender)->orWhere('gender', 'all');
    }

    public function scopeAge($query)
    {
        return $query->whereJsonContains('age', auth()->user()->age)->orWhereJsonContains('age', 'all');
    }

    public function myStamps()
    {
        return $this->belongsTo(MyStamp::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reward()
    {
        return $this->hasOne(Reward::class);
    }
}
