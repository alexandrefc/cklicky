<?php

namespace App\Http\Interfaces;

interface StampInterface
{
    public function getAllStamps();

    public function getAllWebStamps();

    public function getAllWebScheduledStamps();

    public function getAllGenderStamps();

    public function getAllAgeStamps();

    public function getStampById($id);

    public function getStampBySlug ($slug);

    public function createStamp($request);

    public function updateStamp($request, $slug);

    public function deleteStamp($slug);

    public function checkIfUserIsManager($stampId);

    public function checkIfNowIsInValidTime($stampId);

    public function addStampRewardToMyStamps($stampId, $userId);

    public function getAllManagerStamps();

    public function getTimeToRedeem($stampId);

    public function getUserResetTime($stampId);

    

 
}