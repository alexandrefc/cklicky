<?php

namespace App\Http\Interfaces;

interface CouponInterface
{
    public function getAllCoupons();

    public function getCouponById($id);

    public function getCouponBySlug($slug);

    public function createCoupon($request);

    public function deleteCoupon($slug);

    public function updateCoupon($request, $slug);

    public function getAllManagerCoupons($id);

    public function checkIfUserIsManager($couponId);
    
}