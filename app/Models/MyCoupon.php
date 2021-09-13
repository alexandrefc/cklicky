<?php

namespace App\Models;

use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyCoupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon_id', 'user_id', 'redeem_qrcode_path'];

    public function addToMyCoupons($couponId)
    {
        $userId = auth()->user()->id;
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

    public function checkIfMyCouponExists($couponId)
    {
        return self::where('coupon_id', $couponId)->where('user_id', auth()->user()->id)->exists();
    }
    
    public function checkIfCouponIsRedeemed($couponId)
    {
        $myCoupon = self::where('coupon_id', $couponId)->where('user_id', auth()->user()->id)->first();
        
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


}
