<?php 

namespace App\Http\Services;

use App\Http\Repositories\GameRepository\GameRepository;

class GameService
{

    private $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        
        $this->gameRepository = $gameRepository;

    }


    public function store($params)
    {

        $this->gameRepository->store($params);

    }


    public function edit($params)
    {

        $this->gameRepository->edit($params);

    }


    public function delete($id)
    {

        $this->gameRepository->delete($id);

    }


    public function getAll()
    {

        return $this->gameRepository->getAll();

    }


    public function getById($id)
    {

        return $this->gameRepository->getById($id);

    }


    public function filter($params)
    {

        return $this->gameRepository->filter($params);

    }

}