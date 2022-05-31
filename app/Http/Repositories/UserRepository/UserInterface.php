<?php

namespace App\Http\Repositories\UserRepository;

interface UserInterface{

    public function store($params);

    public function login($params);

    public function logout();

    public function edit($params);

}