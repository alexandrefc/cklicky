<?php

namespace App\Http\Interfaces;

interface VenueInterface
{
    public function getAllVenues();

    public function getVenueById($id);

    public function createVenue($request);

    public function deleteVenue($slug);

    public function updateVenue($request, $slug);

    public function getAllManagerVenues($id);
    
}