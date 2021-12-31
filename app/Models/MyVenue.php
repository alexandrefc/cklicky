<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyVenue extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'user_id'];

    public function addToMyVenues($venueId)
    {

        self::create([
            'venue_id' => $venueId,
            'user_id' => auth()->user()->id
        ]);
    } 

    public function getMyVenuesByUserId()
    {
        return self::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function getMyVenueById($venueId, $userId)
    {
        return self::where('venue_id', $venueId)->where('user_id', $userId)->first();
    }

    public function getAllMyVenuesById($venueId)
    {
        return self::where('venue_id', $venueId)->get();
    }

    public function removeFromMy($venueId) 
    {
        $venue = $this->getMyVenueById($venueId, auth()->user()->id);
        
        $venue->delete();
    }

    public function checkIfMyVenueExists($venueId, $userId)
    {
        return self::where('venue_id', $venueId)->where('user_id', $userId)->exists();
    }
}
