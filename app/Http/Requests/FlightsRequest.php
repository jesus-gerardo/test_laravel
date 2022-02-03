<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FlightsRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *
     * public function authorize(){
     *    return false;
     * }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'code' => ['required'],
            'type' => ['required'],
            'departure_id' => ['required'],
            'destination_id' => ['required'],
            'departure_time' => ['required'],
            'arrival_time' => ['required'],
            'airline_id' => ['required']
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
}
