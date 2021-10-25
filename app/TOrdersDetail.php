<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TOrdersDetail extends Model
{
    protected $table = 't_orders_detail';

    protected $fillable = [
        'order_id',
        'bay_id',
        'fare_id',
        'fullname',
        'starts_at',
        'canceled_at',
        'notes'
    ];

    protected $guarded = [];

    public function bay()
    {
        return $this->belongsTo(TParkingBay::class, 'bay_id');
    }

    public function order()
    {
        return $this->belongsTo(TOrders::class, 'order_id');
    }

    public function fares()
    {
        return $this->belongsTo(MFares::class, 'fare_id');
    }
}