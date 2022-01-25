<?php

namespace App\Http\Interfaces;

interface CouponInterface
{
    public function getAllCoupons();

    public function getAllWebCoupons();

    public function getAllWebScheduledCoupons();

    public function getAllWebScheduledProfiledCoupons();

    public function getAllGenderCoupons();

    public function getAllAgeCoupons();
    
    public function getCouponById($id);

    public function getCouponBySlug($slug);

    public function createCoupon($request);

    public function deleteCoupon($slug);

    public function updateCoupon($request, $slug);

    public function getAllManagerCoupons();

    public function checkIfUserIsManager($couponId);

    public function addCouponRewardToMyCoupons($couponId, $userId);

    public function getTimeToRedeem($couponId);
    
}