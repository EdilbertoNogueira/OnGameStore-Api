<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
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
            'name'         => 'required',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:6',
            'cpf'          => 'required|max:11',
            'cep'          => 'required',
            'road'         => 'required',
            'house_number' => 'required|max:10',
            'city'         => 'required',
            'state'        => 'required'
        ];
    }
}
