<?php

namespace App\Http\Requests\PaymentRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentStoreRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {

        $response = response()->json('Verifique os campos obrigatorios e tente novamente');

        throw new HttpResponseException($response);

    }

    public function rules()
    {
        return [
            'payment'         => 'required',
        ];
    }
}
