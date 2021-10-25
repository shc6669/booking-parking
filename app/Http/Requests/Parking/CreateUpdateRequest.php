<?php

namespace Vanguard\Http\Requests\Parking;

use Vanguard\Http\Requests\Request;

class CreateUpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'address'       => 'required',
            'map_lat'       => 'required',
            'map_long'      => 'required',
            'cash_balance'  => 'required'
        ];
    }
}