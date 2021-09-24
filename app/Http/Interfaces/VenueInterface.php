<?php

namespace App\Http\Interfaces;

interface VenueInterface
{
    public function getAllVenues();

    public function getVenueById($id);

    public function addVenue($request);

    public function deleteVenue();

    public function updateVenue($request);
}