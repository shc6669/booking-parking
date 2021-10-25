<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TParkingBay extends Model
{
    protected $table = 't_parking_bay';

    protected $fillable = [
        'name',
        'address',
        'map_lat',
        'map_long',
        'cash_balance',
        'working_hours_mon',
        'working_hours_tue',
        'working_hours_wed',
        'working_hours_thurs',
        'working_hours_fri',
        'working_hours_sat',
        'working_hours_sun',
        'open_fullday',
        'status'
    ];

    protected $guarded = [];

    public function bay_status()
    {
        return $this->belongsTo(MStatus::class, 'status');
    }
}