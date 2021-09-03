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
        
        $qrcodeEndPoint = 'http://cklicky.test/loyalty/' . $slug;

        $qrcodeName = uniqid() . '-' . $title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

            return $qrcodeName;
    }
      
    public function updateImage($request)
    {
        if ($request->hasFile('image'))
        {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension(); 
            $request->image->move(public_path('images'), $newImageName);
        // }else{
        //     $newImageName = $existingImage;
        }
        dd($newImageName);
        return $newImageName;
    }
        
    

    
}