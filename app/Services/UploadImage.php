<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UploadImage
{

    public function __construct()
    {
        // 
    }

    public function uploadImage($image, $title)
    {
        // if ($request->hasFile('image'))
        // {
            // $newImageName = uniqid() . '-' . $title . '.' . $image->extension();
            // $fitImage = $image->move(storage_path('app/public/images/loyalty'), $newImageName);
            // Image::make($fitImage)->fit(700, 400)->save($fitImage);

        // }
        
        // return $newImageName;

        if($image)
        {
        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '.' . $image->extension();
        Image::make($image)->resize(350, 233)->save($image);
        $image->storeAs('public/images/loyalty', $newImageName);
        
        return $newImageName;
        }
    }  

    public function uploadImageFS($image, $title)
    {
        // if ($request->hasFile('image'))
        // {
            // $newImageName = uniqid() . '-' . $title . '.' . $image->extension();
            // $fitImage = $image->move(storage_path('app/public/images/loyalty'), $newImageName);
            // Image::make($fitImage)->fit(700, 400)->save($fitImage);

        // }
        
        // return $newImageName;

        if($image)
        {

        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '-FS.' . $image->extension();
        Image::make($image)->resize(350, 533)->save($image);
        $image->storeAs('public/images/loyalty', $newImageName);
        
        return $newImageName;
        }
    }


    public function uploadLogo($image, $title)
    {
        // if ($request->hasFile('image'))
        // {
            // $newImageName = uniqid() . '-' . $title . '.' . $image->extension();
            // $fitImage = $image->move(storage_path('app/public/images/loyalty'), $newImageName);
            // Image::make($fitImage)->fit(700, 400)->save($fitImage);

        // }
        
        // return $newImageName;

        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '.' . $image->extension();
        Image::make($image)->resize(350, 115)->save($image);
        $image->storeAs('public/images/loyalty', $newImageName);
        
        return $newImageName;
    }

    public function uploadMapIcon($image, $title)
    {
        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '.' . $image->extension();
        Image::make($image)->resize(25, 25)->save($image);
        $image->storeAs('public/images/icons', $newImageName);
        
        return $newImageName;
    }
      
    public function updateImage($image, $title)
    {
        
        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '.' . $image->extension();
        Image::make($image)->resize(350, 233)->save($image);
        $image->storeAs('public/images/loyalty', $newImageName);
        
        return $newImageName;
    }

    public function updateImageFS($image, $title)
    {
        
        $newImageName = uniqid() . '-' . str_replace(' ', '', $title) . '-FS.' . $image->extension();
        Image::make($image)->resize(350, 533)->save($image);
        $image->storeAs('public/images/loyalty', $newImageName);
        
        return $newImageName;
    }

    public function deleteImage($image_path) 
    {
        if($image_path)
        {
            if(file_exists(storage_path('app/public/images/loyalty/' . $image_path)))
            {
                unlink(storage_path('app/public/images/loyalty/' . $image_path));
            }
            
        } 
    }

    public function deleteImageFS($image_fs_path) 
    {
        if($image_fs_path)
        {
            if(file_exists(storage_path('app/public/images/loyalty/' . $image_fs_path)))
            {
            unlink(storage_path('app/public/images/loyalty/' . $image_fs_path));
            }
        } 
    }

    public function deleteIcon($icon_path) 
    {
        if($icon_path)
        {
            if(file_exists(storage_path('app/public/images/icons/' . $icon_path)))
            {
                unlink(storage_path('app/public/images/icons/' . $icon_path));
            }
            
        } 
    }


        
    

    
}