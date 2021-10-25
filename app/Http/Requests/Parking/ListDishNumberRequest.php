<?php

namespace Vanguard\Http\Requests\Restaurant;

use Vanguard\Http\Requests\Request;

class ListDishNumberRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'range_top'     => 'required',
            'range_bottom'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'range_top.required'    => 'Range top value must be filled',
            'range_bottom.required' => 'Range bottom value must be filled'
        ];
    }
}