<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loyalty_level extends Model
{
    protected $table = 'loyalty_levels';
    protected $fillable = ['name', 'min_points', 'discount_percentage', 'free_extra_hours'];
}
