<?php

namespace App\Models;

use App\Models\Point;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyPoint extends Model
{
    use HasFactory;
    protected $fillable = ['point_id', 'user_id', 'points_amount'];

    public function addToMyPoints($pointId)
    {
        self::create([
            'point_id' => $pointId,
            'user_id' => auth()->user()->id            
        ]);
    } 

    public function checkIfMyPointExists($pointId)
    {
        return self::where('point_id', $pointId)->where('user_id', auth()->user()->id)->exists();
    }
    
    public function checkIfPointIsFinished($pointId)
    {
        $mypoint = self::where('point_id', $pointId)->where('user_id', auth()->user()->id)->first();
        
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
