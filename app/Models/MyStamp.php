<?php

namespace App\Models;

use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyStamp extends Model
{
    use HasFactory;

    protected $fillable = ['stamp_id', 'user_id', 'stamps_amount', 'add_stamps_qrcode_path', 'user_time_to_redeem', 'user_reset_time'];

    public function addToMyStamps($stampId, $userId, $user_time_to_redeem)
    {
        // $userId = auth()->user()->id;
        $addStampsQrcodePath = (new CreateQrcode())->createAddStampsQrcode($stampId, $userId);
        


        self::create([
            'stamp_id' => $stampId,
            'user_id' => $userId, 
            'add_stamps_qrcode_path' => $addStampsQrcodePath,
            'user_time_to_redeem' => $user_time_to_redeem
        ]);
    } 

    public function getMyStampsByUserId()
    {
        return self::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function getMyStampById($stampId, $userId)
    {
        return self::where('stamp_id', $stampId)->where('user_id', $userId)->first();
    }

    public function getAllMyStampById($stampId)
    {
        return self::where('stamp_id', $stampId)->get();
    }

    public function checkIfMyStampExists($stampId, $userId)
    {
        return self::where('stamp_id', $stampId)->where('user_id', $userId)->exists();
    }

    public function checkIfRewardIsAvailable($stamp, $userId)
    {
        $stampId =  $stamp->id;
        $myStamp = $this->getMyStampById($stampId, $userId);
        
        
        if ($myStamp->Stamps_amount >= $stamp->total_stamps)
        {
            $this->makeMyStampFinished($stampId, $userId);

            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function makeMyStampFinished($stampId, $userId)
    {
        // $myStamp = $this->getMyStampById($StampId, $userId);
        // $Stamp =  (new StampRepository())->getStampById($StampId);
        
            self::where('stamp_id', $stampId)->where('user_id', $userId)->update([
                'finished' => 1
            ]);
    } 
    
    public function checkIfStampIsFinished($stampId, $userId)
    {
        $myStamp = self::where('stamp_id', $stampId)->where('user_id', $userId)->first();

        return $myStamp->finished;
    } 

    public function getAddStampsQrcodePath($stampId)
    {
        $myStamp = self::where('stamp_id', $stampId)
            ->where('user_id', auth()->user()->id)
            ->first();

        return $myStamp->add_stamps_qrcode_path;
    }

    public function addStamps($stampId, $userId, $addXStamps, $user_reset_time)
    {
        $myStamp = self::where('stamp_id', $stampId)
            ->where('user_id', $userId)
            ->first();
        
        // call() method to resolve the class

        // $Stamp = app()->call('App\Http\Interfaces\StampInterface@getStampById', ['id' => $StampId]);
        // $user_reset_time = app()->call('App\Http\Interfaces\StampInterface@getUserResetTime', ['StampId' => $StampId]);

        // $addXStamps = $Stamp->add_x_Stamps;
        
        
        $stampsAmount = $myStamp->stamps_amount;
        $stampsAmount = $stampsAmount + $addXStamps;

        
        
        self::where('stamp_id', $stampId)
            ->where('user_id', $userId)
            ->update([
                'stamps_amount' => $stampsAmount,
                'user_reset_time' => $user_reset_time
        ]);
        
    }

    public function checkIfNowIsInTimeToRedeem($stampId, $userId)
    {
        $stamp = $this->getMyStampById($stampId, $userId);
        
        $now = now();

        $userTimeToRedeem = $stamp->user_time_to_redeem; 
        
        if ($now <= $userTimeToRedeem)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function checkIfIsAfterTimeReset($stampId, $userId)
    {
        $stamp = $this->getMyStampById($stampId, $userId);
        
        $now = now();

        $userResetTime = $stamp->user_reset_time; 
        
        if ($now > $userResetTime)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    }
}
