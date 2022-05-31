<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartShopping\CartShoppingRequest;
use App\Http\Services\CartShoppingService;

class CartShoppingController extends Controller
{
    
    private $cartShoppingService;

    public function __construct(CartShoppingService $cartShoppingService)
    {
        
        $this->cartShoppingService = $cartShoppingService;

    }


    public function store(CartShoppingRequest $request)
    {

        try
        {

            $this->cartShoppingService->store($request);

            return response()->json(['Carrinho criado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor'.$e->getMessage()]);

        }

    }

}
