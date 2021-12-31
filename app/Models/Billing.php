<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['user_email', 'user_id','company', 'tax_id', 'country', 'city', 'state', 'street', 'post_code' ];
}
