<?php 

namespace App\Http\Repositories\CartShoppingRepository;

use App\Models\CartShopping;
use Illuminate\Support\Facades\Auth;

class CartShoppingRepository implements CartShoppingInterface
{

    public function store($params)
    {

        $params = (Object) $params;

        $shopping = new CartShopping;

        $shopping->amount     = $params->amount;
        $shopping->user_id    = Auth::id();
        $shopping->payment_id = $params->payment_id;
        $shopping->game_id    = $params->game_id;
        
        return $shopping->save();

    }

}