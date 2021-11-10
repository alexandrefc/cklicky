<?php

namespace App\Http\Interfaces;

interface CouponInterface
{
    public function getAllCoupons();

    public function getAllWebCoupons();

    public function getCouponById($id);

    public function getCouponBySlug($slug);

    public function createCoupon($request);

    public function deleteCoupon($slug);

    public function updateCoupon($request, $slug);

    public function getAllManagerCoupons();

    public function checkIfUserIsManager($couponId);
    
}