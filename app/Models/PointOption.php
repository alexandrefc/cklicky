<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointOption extends Model
{
    use HasFactory;

    protected $fillable = ['total_points', 'add_x_points', 'start_date', 'end_date', 'reset_time', 'type_of_reset_time', 'x_time_to_redeem', 'type_of_period_to_redeem', 'available_through', 'category'];

}
