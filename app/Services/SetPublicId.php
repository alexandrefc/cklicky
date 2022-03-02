<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class SetPublicId
{

    public function __construct()
    {
        // 
    }

    public function createPublicId()
    {
        $public_id = uniqid() . random_int(11111, 99999);
        dd($public_id);
        return $public_id;
    }
    
        
    

    
}