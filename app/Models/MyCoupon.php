<?php

namespace App\Models;

use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyCoupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon_id', 'user_id', 'redeem_qrcode_path'];

    public function addToMyCoupons($couponId, $userId)
    {
        $redeemQrcodePath = (new CreateQrcode())->createRedeemQrcode($couponId, $userId);

        self::create([
            'coupon_id' => $couponId,
            'user_id' => $userId,
            'redeem_qrcode_path' => $redeemQrcodePath            
        ]);
    } 

    public function getRedeemQrcodePath($couponId)
    {
        $myCoupon = self::where('coupon_id', $couponId)
            ->where('user_id', auth()->user()->id)
            ->first('redeem_qrcode_path');

        return $myCoupon->redeem_qrcode_path;
    }

    public function getMyCouponById($couponId)
    {
        return self::where('coupon_id', $couponId)
            ->where('user_id', auth()->user()->id)
            ->first();
    }

    public function getMyCouponsByUserId()
    {
        return self::where('user_id', auth()->user()->id)
            ->get();
    }

    

    public function getAllMyCouponsById($couponId)
    {
        return self::where('coupon_id', $couponId)->get();
    }

    public function removeFromMy($couponId) 
    {
        $coupon = $this->getMyCouponById($couponId, auth()->user()->id);
        (new CreateQrcode())->deleteQrcode($coupon->redeem_qrcode_path);
        
        $coupon->delete();
    }

    

    public function checkIfMyCouponExists($couponId, $userId)
    {
        return self::where('coupon_id', $couponId)->where('user_id', $userId)->exists();
    }
    
    public function checkIfCouponIsRedeemed($couponId, $userId)
    {
        $myCoupon = self::where('coupon_id', $couponId)->where('user_id', $userId)->first();
        
        return $myCoupon->redeemed;
    } 

    // public function checkIfUserIsManager($couponId)
    // {
    //     $coupon = new Coupon;
    //     $managerEmail = $coupon->getCouponById($couponId)->manager_email;
        
    //     if ($managerEmail == auth()->user()->email)
    //     {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }

    // } 

    public function redeemCoupon($couponId, $userId)
    {
            self::where('coupon_id', $couponId)
                ->where('user_id', $userId)
                ->update([
                    'redeemed' => 1
            ]);
    }

    public function checkIfRewardIsAvailable($couponId, $userId)
    {
        $myCoupon = $this->getMyCouponById($couponId, $userId);
        
        if ($myCoupon->reward_id !== NULL)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function checkIfNowIsInTimeToRedeem($couponId, $userId)
    {
        $myCoupon = $this->getMyCouponById($couponId, $userId);
        
        $now = now();

        $userTimeToRedeem = $myCoupon->user_time_to_redeem; 
        
        if ($now <= $userTimeToRedeem || $userTimeToRedeem == NULL)
        {
            return TRUE;
        } else {
            return FALSE;
        }
    } 

    public function updateTimeToRedeem($couponId, $userId)
    {
        
        $user_time_to_redeem = app()->call('App\Http\Interfaces\CouponInterface@getTimeToRedeem', ['couponId' => $couponId]);
        
        self::where('coupon_id', $couponId)
                ->where('user_id', $userId)
                ->update([
                    'user_time_to_redeem' => $user_time_to_redeem
            ]);
        
    }


}
