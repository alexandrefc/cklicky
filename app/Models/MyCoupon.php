<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCoupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon_id', 'user_id'];

    public function addToMyCoupons($couponId)
    {
        self::create([
            'coupon_id' => $couponId,
            'user_id' => auth()->user()->id            
        ]);
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
