<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyVenue extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'user_id', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function addToMy($venueId)
    {
        self::create([
            'venue_id' => $venueId,
            'user_id' => auth()->user()->id
        ]);
    } 

    public function getMyVenuesByUserId()
    {
        return self::where('user_id', auth()->user()->id)->active()->latest()->get();
    }

    public function getMyVenueById($venueId, $userId)
    {
        return self::where('venue_id', $venueId)->where('user_id', $userId)->first();
    }

    public function getAllMyVenuesById($venueId)
    {
        return self::where('venue_id', $venueId)->get();
    }

    public function activateMy($venueId) 
    {
        $myPoint = $this->getMyVenueById($venueId, auth()->user()->id);
       
        $myPoint->update([
            'is_active' => 1
        ]);
    }
    public function deactivateMy($venueId) 
    {
        $myVenue = $this->getMyVenueById($venueId, auth()->user()->id);
       
        $myVenue->update([
            'is_active' => 0
        ]);
    }

    public function removeFromMy($venueId) 
    {
        $venue = $this->getMyVenueById($venueId, auth()->user()->id);
        
        $venue->delete();
    }

    public function checkIfMyIsActive($venueId, $userId) 
    {
        $myVenue = $this->getMyVenueById($venueId, $userId);
        if($myVenue->is_active == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function checkIfMyExists($venueId, $userId)
    {
        return self::where('venue_id', $venueId)->where('user_id', $userId)->exists();
    }
}
