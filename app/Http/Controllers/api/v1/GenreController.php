<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest\GenreStoreRequest;
use App\Http\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    private $genreService;
    
    public function __construct(GenreService $genreService)
    {
     
        $this->genreService = $genreService;

    }


    public function store(GenreStoreRequest $request)
    {

        try
        {

            $this->genreService->store($request);

            return response()->json(['Genero criado com sucesso']);

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

            $this->genreService->edit($request);

            return response()->json(['Genero editado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function delete($id)
    {

        try
        {

            $this->genreService->delete($id);

            return response()->json(['Genero excluido com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }
}
