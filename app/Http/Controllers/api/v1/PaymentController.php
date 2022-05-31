<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest\PaymentStoreRequest;
use App\Http\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        
        $this->paymentService = $paymentService;

    }


    public function store(PaymentStoreRequest $request)
    {

        try
        {

            $this->paymentService->store($request);

            return response()->json(['Metodo de pagamento adicionado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }
}
