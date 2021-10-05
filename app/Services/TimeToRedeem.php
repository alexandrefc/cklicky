<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManagerStatic;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TimeToRedeem
{

    public function __construct()
    {
        // 
    }
    public function setTimeToRedeem($period, $timeToRedeem)
    {
        switch ($period) {
            case "minutes":
                return now()->addMinutes($timeToRedeem);
                break;
            case "hours":
                return now()->addHours($timeToRedeem);
                break;
            case "days":
                return now()->addDays($timeToRedeem);
                break;
            case "months":
                return now()->addMonths($timeToRedeem);
                break;
        }
        
    }

    
}