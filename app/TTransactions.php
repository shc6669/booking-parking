<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TTransactions extends Model
{
    protected $table = 't_transactions';

    protected $fillable = [
        'order_id',
        'total_payment',
        'payment_type',
        'payment_completed_at',
        'card_name',
        'card_number'
    ];

    protected $guarded = [];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(TOrders::class);
    }
}