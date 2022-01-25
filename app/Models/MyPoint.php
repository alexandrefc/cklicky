<?php

namespace App\Models;

use App\Http\Interfaces\PointInterface;
use App\Models\Point;
use App\Services\CreateQrcode;
use App\Services\TimeToRedeem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Repositories\PointRepository;

class MyPoint extends Model
{
    // public $myPointInterface;
    // public function __construct(MyPointInterface $myPointInterface)
    // {
        
    //     $this->myPointInterface = $myPointInterface;
        
    // }

    use HasFactory;
    protected $fillable = ['point_id', 'user_id', 'points_amount', 'add_points_qrcode_path', 'user_time_to_redeem', 'user_reset_time'];


    public function addToMyPoints($pointId, $userId)
    {
        $addPointsQrcodePath = (new CreateQrcode())->createAddPointsQrcode($pointId, $userId);
        
        self::create([
            'point_id' => $pointId,
            'user_id' => $userId, 
            'add_points_qrcode_path' => $addPointsQrcodePath
        ]);
    } 
    // public function addToMyPoints($pointId, $userId, $user_time_to_redeem)
    // {
    //     // $userId = auth()->user()->id;
    //     $addPointsQrcodePath = (new CreateQrcode())->createAddPointsQrcode($pointId, $userId);
        
    //     self::create([
    //         'point_id' => $pointId,
    //         'user_id' => $userId, 
    //         'add_points_qrcode_path' => $addPointsQrcodePath,
    //         'user_time_to_redeem' => $user_time_to_redeem
    //     ]);
    // } 

    // public function updateMyPoint($pointId, $user_time_to_redeem)
    // {
       

    //     self::where('point_id', $pointId)
    //         ->where('user_id', auth()->user()->id)
    //         ->update([
    //             'user_time_to_redeem' => $user_time_to_redeem
            
            
    //     ]);
    // } 

    public function getMyPointsByUserId()
    {
        return self::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function getMyPointById($pointId, $userId)
    {
        return self::where('point_id', $pointId)->where('user_id', $userId)->first();
    }

    public function getAllMyPointById($pointId)
    {
        return self::where('point_id', $pointId)->get();
    }

    public function removeFromMy($pointId) 
    {
        $point = $this->getMyPointById($pointId, auth()->user()->id);
        (new CreateQrcode())->deleteQrcode($point->add_points_qrcode_path);
        
        $point->delete();
    }

    public function checkIfMyPointExists($pointId, $userId)
    {
        return self::where('point_id', $pointId)->where('user_id', $userId)->exists();
    }

    public function checkIfRewardIsAvailable($point, $userId)
    {
        $pointId =  $point->id;
        $myPoint = $this->getMyPointById($pointId, $userId);
        
        
        if ($myPoint->points_amount >= $point->total_points)
        {
            $this->makeMyPointFinished($pointId, $userId);

            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function makeMyPointFinished($pointId, $userId)
    {
        // $myPoint = $this->getMyPointById($pointId, $userId);
        // $point =  (new PointRepository())->getPointById($pointId);
        
            self::where('point_id', $pointId)->where('user_id', $userId)->update([
                'finished' => 1
            ]);
    } 
    
    public function checkIfPointIsFinished($pointId, $userId)
    {
        $myPoint = self::where('point_id', $pointId)->where('user_id', $userId)->first();

        return $myPoint->finished;
    } 

    public function getAddPointsQrcodePath($pointId)
    {
        $myPoint = self::where('point_id', $pointId)
            ->where('user_id', auth()->user()->id)
            ->first();

        return $myPoint->add_points_qrcode_path;
    }

    public function addPoints($pointId, $userId, $addXPoints, $user_reset_time)
    {
        
        $myPoint = self::where('point_id', $pointId)
            ->where('user_id', $userId)
            ->first();
        
        if(!$myPoint->points_amount)
        {
            $user_time_to_redeem = app()->call('App\Http\Interfaces\PointInterface@getTimeToRedeem', ['pointId' => $pointId]); 

            $pointsAmount = $myPoint->points_amount;
            $pointsAmount = $pointsAmount + $addXPoints;
            
            self::where('point_id', $pointId)
                ->where('user_id', $userId)
                ->update([
                    'points_amount' => $pointsAmount,
                    'user_reset_time' => $user_reset_time,
                    'user_time_to_redeem' => $user_time_to_redeem
            ]);
        } else {
            
            $pointsAmount = $myPoint->points_amount;
            $pointsAmount = $pointsAmount + $addXPoints;
            
            self::where('point_id', $pointId)
                ->where('user_id', $userId)
                ->update([
                    'points_amount' => $pointsAmount,
                    'user_reset_time' => $user_reset_time
            ]);
        }

        // call() method to resolve the class

        // $point = app()->call('App\Http\Interfaces\PointInterface@getPointById', ['id' => $pointId]);
        // $user_reset_time = app()->call('App\Http\Interfaces\PointInterface@getUserResetTime', ['pointId' => $pointId]);

        // $addXPoints = $point->add_x_points;
        
    }

    public function checkIfNowIsInTimeToRedeem($pointId, $userId)
    {
        $point = $this->getMyPointById($pointId, $userId);
        
        $now = now();

        $userTimeToRedeem = $point->user_time_to_redeem; 
        
        if ($now <= $userTimeToRedeem || $userTimeToRedeem == NULL)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function checkIfIsAfterTimeReset($pointId, $userId)
    {
        $point = $this->getMyPointById($pointId, $userId);
        
        $now = now();

        $userResetTime = $point->user_reset_time; 
        
        if ($now > $userResetTime || $userResetTime == NULL)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function updateTimeToRedeem($pointId, $userId)
    {
        
        $user_time_to_redeem = app()->call('App\Http\Interfaces\PointInterface@getTimeToRedeem', ['pointId' => $pointId]);
        
        self::where('point_id', $pointId)
                ->where('user_id', $userId)
                ->update([
                    'user_time_to_redeem' => $user_time_to_redeem
            ]);
        
    }

}
