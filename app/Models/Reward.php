<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = ['stamp_id', 'coupon_id', 'point_id', 'reward_id','points_amount'];

    public function createReward($campaign_id, $campaign_type, $reward_id, $reward_type, $reward_points_amount)
    {

        if($reward_type == 'coupon'){
            switch ($campaign_type) {
                case "point":
                    self::create([
                        'point_id' => $campaign_id,
                        'reward_id' => $reward_id,
                        'points_amount' => $reward_points_amount
                    ]);
                    break;
                case "stamp":
                    self::create([
                        'stamp_id' => $campaign_id,
                        'reward_id' => $reward_id,
                        'points_amount' => $reward_points_amount
                    ]);
                    break;
                case "coupon":
                    self::create([
                        'coupon_id' => $campaign_id,
                        'reward_id' => $reward_id,
                        'points_amount' => $reward_points_amount
                    ]);
            }
        }

        
        
    } 
}
