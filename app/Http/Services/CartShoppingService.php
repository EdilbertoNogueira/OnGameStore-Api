<?php 

namespace App\Http\Services;

use App\Http\Repositories\CartShoppingRepository\CartShoppingRepository;

class CartShoppingService
{

    private $cartShoppingRepository;

    public function __construct(CartShoppingRepository $cartShoppingRepository)
    {
        
        $this->cartShoppingRepository = $cartShoppingRepository;

    }


    public function store($params)
    {

        $this->cartShoppingRepository->store($params);

    }

}