<?php

namespace App\Http\Repositories\GameRepository;

interface GameInterface
{

    public function store($params);

    public function edit($params);

    public function delete($id);

    public function getAll();

    public function getById($id);

    public function filter($params);

}