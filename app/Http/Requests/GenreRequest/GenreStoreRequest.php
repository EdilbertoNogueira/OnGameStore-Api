<?php

namespace App\Http\Requests\GenreRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GenreStoreRequest extends FormRequest
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
            'genre'      => 'required',
            'description' => 'required'
        ];
    }
}
