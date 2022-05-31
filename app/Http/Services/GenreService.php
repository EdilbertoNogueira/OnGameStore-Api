<?php 

namespace App\Http\Services;

use App\Http\Repositories\GenreRepository\GenreRepository;

class GenreService
{

    private $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        
        $this->genreRepository = $genreRepository;

    }


    public function store($params)
    {

        $this->genreRepository->store($params);

    }


    public function edit($params)
    {

        $this->genreRepository->edit($params);

    }


    public function delete($id)
    {

        $this->genreRepository->delete($id);

    }


}