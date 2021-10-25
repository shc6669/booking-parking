<?php

namespace Vanguard\Http\Requests\Booking;

use Vanguard\Http\Requests\Request;

class BookingRequest extends Request
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bay_id'    => 'required',
            'fullname'  => 'required',
            'fare_id'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'bay_id.required'       => 'Parking bay must be choose',
            'fullname.required'     => 'Fullname must be filled',
            'fare_id'               => 'Duration must be choose'
        ];
    }
}