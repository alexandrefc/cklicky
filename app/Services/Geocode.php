<?php

namespace App\Services;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Geocode
{

    public function __construct()
    {
        // 
    }
    public function geocode($address)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key='.env( 'GOOGLE_GEO_KEY' );
        
        $client = new \GuzzleHttp\Client();
        $geocodeResponse = $client->get( $url )->getBody();
        $geocodeData = json_decode( $geocodeResponse );
        
        $coordinates['lat'] = null;
        $coordinates['lng'] = null;
        if( !empty( $geocodeData )
            && $geocodeData->status != 'ZERO_RESULTS' 
            && isset( $geocodeData->results ) 
            && isset( $geocodeData->results[0] ) ){
                $coordinates['lat'] = $geocodeData->results[0]->geometry->location->lat;
                $coordinates['lng'] = $geocodeData->results[0]->geometry->location->lng;
                // $coordinates = $geocodeData->results[0]->geometry->location;
            }
       
        return $coordinates;
    }
}