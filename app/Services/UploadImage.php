<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UploadImage
{

    public function __construct()
    {
        // 
    }
    public function uploadImage($request)
    {
        if ($request->hasFile('image'))
        {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $fitImage = $request->image->move(public_path('images'), $newImageName);
            Image::make($fitImage)->fit(700, 400)->save($fitImage);

        }
        
        return $newImageName;
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