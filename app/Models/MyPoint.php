<?php

namespace App\Models;

use App\Models\Point;
use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyPoint extends Model
{
    use HasFactory;
    protected $fillable = ['point_id', 'user_id', 'points_amount', 'add_points_qrcode_path'];

    public function addToMyPoints($pointId)
    {
        $userId = auth()->user()->id;
        $addPointsQrcodePath = (new CreateQrcode())->createAddPointsQrcode($pointId, $userId);

        self::create([
            'point_id' => $pointId,
            'user_id' => $userId, 
            'add_points_qrcode_path' => $addPointsQrcodePath       
        ]);
    } 

    public function getMyPointsByUserId()
    {
        return self::where('user_id', auth()->user()->id)->get();
    }

    public function checkIfMyPointExists($pointId, $userId)
    {
        return self::where('point_id', $pointId)->where('user_id', $userId)->exists();
    }
    
    public function checkIfPointIsFinished($pointId, $userId)
    {
        $mypoint = self::where('point_id', $pointId)->where('user_id', $userId)->first();
        
        return $mypoint->finished;
    } 

    // public function checkIfUserIsManager($pointId)
    // {
    //     $point = new point;
    //     $managerEmail = $point->getpointById($pointId)->manager_email;
        
    //     if ($managerEmail == auth()->user()->email)
    //     {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }

    // } 

    public function getAddPointsQrcodePath($pointId)
    {
        $myPoint = self::where('point_id', $pointId)
            ->where('user_id', auth()->user()->id)
            ->first();

        return $myPoint->add_points_qrcode_path;
    }

    public function addPoints($pointId, $userId)
    {
        $myPoint = self::where('point_id', $pointId)
            ->where('user_id', $userId)
            ->first();

        $point = (new Point())->getPointById($pointId);
        $addXPoints = $point->add_x_points;
        
        $pointsAmount = $myPoint->points_amount;
        $pointsAmount = $pointsAmount + $addXPoints;
        
        self::where('point_id', $pointId)
            ->where('user_id', $userId)
            ->update([
                'points_amount' => $pointsAmount
        ]);
    }
}
