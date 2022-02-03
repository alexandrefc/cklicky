<?php

namespace App\Http\Interfaces;

interface PointInterface
{
    public function getAllPoints();

    public function getAllWebPoints();

    public function getAllWebScheduledPoints();

    public function getAllWebScheduledProfiledPoints();

    public function getAllGenderPoints();

    public function getAllAgePoints();

    public function getPointById($id);

    public function getPointBySlug ($slug);

    public function createPoint($request);

    public function updatePoint($request, $slug);

    public function deletePoint($slug);

    public function checkIfUserIsManager($pointId);

    public function checkIfNowIsInValidTime($pointId);

    public function addPointRewardToMyPoints($pointId, $userId);

    public function addPointRewardToMyCoupons($pointId, $userId);

    public function getAllManagerPoints();

    public function getAllTestingPoints();

    public function getTimeToRedeem($pointId);

    public function getUserResetTime($pointId);

    

 
}