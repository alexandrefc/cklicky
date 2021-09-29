<?php

namespace App\Http\Repositories;

use App\Models\Venue;
use App\Services\CreateSlug;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Http\Interfaces\VenueInterface;

class VenueRepository implements VenueInterface
{

    public function getAllVenues()
    {
        return Venue::all();
    }

    public function getVenueById($id)
    {
        return Venue::where('id', $id)->first();
    }

    public function createVenue($request)
    {
        $slug = (new CreateSlug())->createSlug($request->title);
        $logo_path = (new UploadImage())->uploadImage($request->logo, $request->title);
        $qrcode_path = (new CreateQrcode())->createPointQrcode($slug, $request->title);
        
        return Venue::create([
            'title' => $request->title,
            'description' => $request->description,
            'pin' => $request->pin,
            'slug' => $slug,
            'logo_path' => $logo_path,
            'qrcode_path' => $qrcode_path,
            'user_id' => auth()->user()->id,
            'manage_by_id' => auth()->user()->id,
            'location' => $request->location
        ]);
    }

    public function deleteVenue($slug)
    {
     
        $venue = Venue::where('slug', $slug)->first();

        (new UploadImage())->deleteImage($venue->logo_path);
        (new CreateQrcode())->deleteQrcode($venue->qrcode_path);
        
        $venue->delete();

    }

    public function updateVenue($request, $slug)
    {
        $venue = Venue::where('slug', $slug)->first();
        $existing_image_path = $venue->image_path;

        // Should be new qrcode and slug ?

        // $existing_qrcode_path = $coupon->qrcode_path;
        // $existing_slug = $coupon->slug;
        // $updated_slug = (new CreateSlug())->createSlug($request->title);
        // $updated_qrcode_path = (new CreateQrcode())->createQrcode($slug, $request->title);
        
        if ($request->hasFile('image'))
        {
            $updated_image_path = (new UploadImage())->updateImage($request->image, $request->title);
            (new UploadImage())->deleteImage($existing_image_path);
        } else {
            $updated_image_path = $existing_image_path;
        }
        
        Venue::where('slug', $slug)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'pin' => $request->pin,
                'logo_path' => $updated_image_path,
                // 'user_id' => auth()->user()->id,
                // 'manage_by_id' => auth()->user()->id,
                'location' => $request->location
            // 'qrcode_path' => $updated_qrcode_path,
            // 'made_by_id' => auth()->user()->id,
            // 'slug' => $updated_slug
            
        ]); 
    }

    public function getAllManagerVenues($id) 
    {
        return Venue::where('user_id', $id)->get();
    }
}
