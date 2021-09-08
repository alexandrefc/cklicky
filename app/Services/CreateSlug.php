<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class CreateSlug
{

    public function __construct()
    {
        // 
    }

    public function createSlug($title)
    {
        $random = uniqid($title, true) . random_int(1111, 9999);
        $slug = Str::of($random)->slug('-');

        return $slug;
    }
    
        
    

    
}