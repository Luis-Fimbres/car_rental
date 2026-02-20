<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['rental_id', 'amount', 'payment_method', 'transaction_id', 'status', 'payment_date'];
}
