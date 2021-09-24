<?php

namespace App\Http\Interfaces;

interface PointInterface
{
    public function getAllPoints();

    public function getPointById($id);

    public function getPointBySlug ($slug);

    public function addPoint($request);

    public function updatePoint($request, $slug);

    public function deletePoint($slug);

    public function checkIfUserIsManager($pointId);
}