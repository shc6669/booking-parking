<?php

namespace Vanguard\Http\Requests\Restaurant;

use Vanguard\Http\Requests\Request;

class ListLocationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'address' => 'required',
            // 'lat'     => 'required',
            // 'long'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'address.required'  => 'Address must be filled',
            // 'lat.required'      => 'Latitude must be filled',
            // 'long.required'     => 'Longitude must be filled',
        ];
    }
}