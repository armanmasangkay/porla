<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIngredientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validMeasurements=['kg','g','ml','l'];
       return [
            'name'=>'required',
            'stocks'=>['required','numeric','min:0'],
            'measurement'=>['required',Rule::in($validMeasurements)],
            'total_purchased'=>['required','numeric','min:0','same:stocks']
        ];

    }
}
