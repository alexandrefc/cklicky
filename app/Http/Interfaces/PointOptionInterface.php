<?php

namespace App\Http\Interfaces;

interface PointOptionInterface
{
    public function getAllPoints();

    public function getPointById($id);

    public function getPointBySlug ($slug);

    public function createPointOption($request);

    public function updatePoint($request, $slug);

    public function deletePoint($slug);

    public function checkIfUserIsManager($pointId);

    public function checkIfNowIsInValidTime($pointId);
}