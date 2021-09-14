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
        
        $qrcodeEndPoint = 'http://ccbe-89-68-171-173.eu.ngrok.io/loyalty/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createCouponQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = 'http://ccbe-89-68-171-173.eu.ngrok.io/coupons/' . $slug;
        
        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createPointQrcode($slug, $title)
    {
        
        $qrcodeEndPoint = 'http://ccbe-89-68-171-173.eu.ngrok.io/points/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }

    public function createRedeemQrcode($couponId, $userId)
    {
        $qrcodeEndPoint = 'http://ccbe-89-68-171-173.eu.ngrok.io/coupons/redeem/' . $couponId . '/' . $userId;

        $redeemQrcodeName = uniqid() . '-redeeem.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $redeemQrcodeName));

            return $redeemQrcodeName;
    }

    public function createAddPointsQrcode($pointId, $userId)
    {
        $qrcodeEndPoint = 'http://ccbe-89-68-171-173.eu.ngrok.io/points/addpoints/' . $pointId . '/' . $userId;

        $addPointsQrcodeName = uniqid() . '-addpoints.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $addPointsQrcodeName));

            return $addPointsQrcodeName;
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