<?php

namespace Vanguard\Http\Requests\Restaurant;

use Vanguard\Http\Requests\Request;

class SearchDishMatchRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'query_search' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'query_search.required'  => 'Search keywords form must be filled',
        ];
    }
}
