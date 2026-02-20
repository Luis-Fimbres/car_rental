<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rentals';
    protected $fillable = ['user_id', 'car_id', 'driver_id', 'pickup_date', 'return_date', 'total_amount', 'status'];
}
