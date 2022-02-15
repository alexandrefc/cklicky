<?php

namespace App\Http\Interfaces;

interface VenueInterface
{
    public function getAllVenues();

    public function getAllManagerVenues();

    public function getAllTestingVenues();

    public function getVenueById($id);

    public function getVenueBySlug($slug);

    public function createVenue($request);

    public function deleteVenue($slug);

    public function updateVenue($request, $slug);

    
    
    
}