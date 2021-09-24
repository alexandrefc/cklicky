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

    public function addVenue($request)
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

    public function deleteVenue()
    {
        // TODO: Implement deleteVenue() method.
    }

    public function updateVenue($request)
    {
        // TODO: Implement updateVenue() method.
    }
}
