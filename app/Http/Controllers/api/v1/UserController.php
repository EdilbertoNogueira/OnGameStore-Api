<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest\loginRequest;
use App\Http\Requests\UserRequest\UserStoreRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $userService;
    
    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
        
    }


    public function store(UserStoreRequest $request)
    {

        try
        {

            $this->userService->store($request);

            return response()->json(['Usuário cadastrado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor, tente novamente mais tarde']);

        }

    }


    public function login(loginRequest $request)
    {

        try
        {

            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {

                return response(['email ou senha invalidos']);

            }

            $login = $this->userService->login($request);

            return response()->json(['Logado com sucesso', $login]);

        }
        catch(\Exception $e)
        {


            return response()->json('Houve um erro no servidor'.$e->getMessage());

        }

    }
    

    public function logout()
    {

        try
        {

            $this->userService->logout();

            return response()->json(['Deslogado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }
        

    }


    public function edit(Request $request)
    {

        try
        {

            $this->userService->edit($request);

            return response()->json(['Dados alterados com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor'.$e->getMessage()]);

        }

    }

}
