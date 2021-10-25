<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TOrders extends Model
{
    protected $table = 't_orders';

    protected $fillable = [
        'total_payment',
        'status'
    ];

    protected $guarded = [];
}