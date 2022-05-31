<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserService{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        
        $this->userRepository = $userRepository;

    }

    
    public function store($params)
    {

        $this->userRepository->store($params);

    }


    public function login($params)
    {

        $user = $this->userRepository->login($params);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([

            'access_token' => $token,
            'token_type'   => 'Bearer'
        ]);

    }


    public function logout()
    {

        $this->userRepository->logout();

    }

    
    public function edit($params)
    {

        $this->userRepository->edit($params);

    }


}