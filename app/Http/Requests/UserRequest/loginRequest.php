<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    
    public function failedValidation(Validator $validator)
    {

        $response = response()->json('Verifique os campos obrigatorios e tente novamente');

        throw new HttpResponseException($response);

    }

    public function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required'
        ];
    }
}
