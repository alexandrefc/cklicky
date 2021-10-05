<?php

namespace App\Models;

use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_path', 'slug', 'made_by_id', 'qrcode_path', 'venue_id', 'manager_email', 'add_x_points', 'valid_till', 'x_time_to_redeem', 'type_of_period_to_redeem'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function getAllPoints ()
    {
        return self::latest()->get();
    }

    public function getPointBySlug ($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function getPointById($pointId)
    {
        return self::where('id', $pointId)->first();
    }

    public function addPoint ($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $image_path = (new UploadImage())->uploadImage($request->image, $request->title);
        $qrcode_path = (new CreateQrcode())->createPointQrcode($slug, $request->title);
        
        self::create([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'slug' => $slug,
            'image_path' => $image_path,
            'qrcode_path' => $qrcode_path,
            'made_by_id' => auth()->user()->id,
            'venue_id' => $request->venue_id,
            'manager_email' => $request->managerEmail,
            'add_x_points' => $request->xPoints
        ]); 
    }

    public function updatePoint ($request, $slug)
    {
        $point = self::where('slug', $slug)->first();
        $existing_image_path = $point->image_path;

        // Should be new qrcode and slug ?

        // $existing_qrcode_path = $point->qrcode_path;
        // $existing_slug = $point->slug;
        // $updated_slug = (new CreateSlug())->createSlug($request->title);
        // $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        if ($request->hasFile('image'))
        {
            $updated_image_path = (new UploadImage())->updateImage($request->image, $request->title);
            (new UploadImage())->deleteImage($existing_image_path);
        } else {
            $updated_image_path = $existing_image_path;
        }
        
        self::where('slug', $slug)
            ->update([
            'title' => $request->title,
            'description' => $request->description,
            'valid_till' => $request->valid_till,
            'image_path' => $updated_image_path,
            'venue_id' => $request->venue_id
            // 'qrcode_path' => $updated_qrcode_path,
            // 'made_by_id' => auth()->user()->id,
            // 'slug' => $updated_slug
            
        ]); 
        
    }

    // public function showPoint ($slug)
    // {
    //     $point = self::where('slug', $slug)->first();

    //     return $point;
    // }

    public function deletePoint ($slug)
    {
        $point = self::where('slug', $slug)->first();

        (new UploadImage())->deleteImage($point->image_path);
        (new CreateQrcode())->deleteQrcode($point->qrcode_path);
        
        $point->delete();

    }

    public function checkIfUserIsManager($pointId)
    {
        $managerEmail = $this->getpointById($pointId)->manager_email;
        
        if ($managerEmail == auth()->user()->email)
        {
            return TRUE;
        } else {
            return FALSE;
        }

    } 
}
