<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreateQrcode
{

    public function __construct()
    {
        // 
    }
    public function createQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/loyalty/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createCouponQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/coupons/' . $slug;
        
        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createPointQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/points/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createStampQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/stamps/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createRedeemQrcode($couponId, $userId)
    {
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/coupons/redeem/' . $couponId . '/' . $userId;

        $redeemQrcodeName = uniqid() . '-redeeem.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $redeemQrcodeName));

            return $redeemQrcodeName;
    }

    public function createAddPointsQrcode($pointId, $userId)
    {
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/points/addpoints/' . $pointId . '/' . $userId;

        $addPointsQrcodeName = uniqid() . '-addpoints.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $addPointsQrcodeName));

            return $addPointsQrcodeName;
    }

    public function createAddStampsQrcode($stampId, $userId)
    {
        $qrcodeEndPoint = env('APP_URL', 'https://cklicky.com') . '/stamps/addstamps/' . $stampId . '/' . $userId;

        $addStampsQrcodeName = uniqid() . '-addstamps.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $addStampsQrcodeName));

            return $addStampsQrcodeName;
    }

    // public function createAddPointsQrcode($slug, $title)
    // {
        
    //     $qrcodeEndPoint = 'http://cklicky.test/coupons/' . $slug;

    //     $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
    //     QrCode::size(500)
    //         ->errorCorrection('H')
    //         ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

    //         return $qrcodeName;
    // }

    public function deleteQrcode($qrcodePath)
    {
        if(file_exists(storage_path('app/public/images/qrcodes/' . $qrcodePath)))
        {
            unlink(storage_path('app/public/images/qrcodes/' . $qrcodePath));
        } 
    }
      
    
    

    
}