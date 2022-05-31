<?php 

namespace App\Http\Repositories\UserRepository;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface {


    public function store($params)
    {

        $params = (Object) $params;

        $user = new User();

        $user->name         = $params->name;
        $user->email        = $params->email;
        $user->password     = bcrypt($params->password);
        $user->cpf          = $params->cpf;
        $user->cep          = $params->cep;
        $user->road         = $params->road;
        $user->house_number = $params->house_number;
        $user->city         = $params->city;
        $user->state        = $params->state;

        return $user->save();

    }


    public function login($params)
    {

        $params = (Object) $params;

        return User::where('email', $params->email)->firstorfail();

    }


    public function logout()
    {


        return Auth::user()->tokens()->delete();

    }


    public function edit($params)
    {

        $user = User::where('id', Auth::id())
                        ->first();

        $user->name         = $params->name         == null ? $user->name         : $params->name;
        $user->email        = $params->email        == null ? $user->email        : $params->email;
        $user->cpf          = $params->cpf          == null ? $user->cpf          : $params->cpf;
        $user->cep          = $params->cep          == null ? $user->cep          : $params->cep;
        $user->road         = $params->road         == null ? $user->road         : $params->road;
        $user->house_number = $params->house_number == null ? $user->house_number : $params->road;
        $user->city         = $params->city         == null ? $user->city         : $params->city;
        $user->state        = $params->state        == null ? $user->state        : $params->state;

        return $user->save();
            
    }


}