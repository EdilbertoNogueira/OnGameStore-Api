<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest\GameStoreRequest;
use App\Http\Services\GameService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Stmt\Catch_;

class GameController extends Controller
{
    
    private $gameService;

    public function __construct(GameService $gameService)
    {

        $this->gameService = $gameService;
        
    }


    public function store(GameStoreRequest $request)
    {

        try
        {

            $this->gameService->store($request);

            return response()->json(['Publicação do jogo criada com sucesso']);

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

            $this->gameService->edit($request);

            return response()->json(['Publicação editada com sucesso']);

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

            $this->gameService->delete($id);

            return response()->json(['Publicação excluida com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function getAll()
    {

        try
        {
           
            $games = $this->gameService->getAll();
            
            return response()->json(["Games:", $games]);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor'.$e->getMessage()]);

        }

    }


    public function getById($id)
    {

        try
        {

            $game = $this->gameService->getById($id);

            return response()->json(["Game:", $game]);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function filter(Request $request)
    {

        try
        {

            $game = $this->gameService->filter($request);

            return response()->json(["Game:", $game]);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }
        
    }

}
