<?php

namespace App\Http\Repositories\GameRepository;

use App\Models\Games;

class GameRepository implements GameInterface
{


    public function store($params)
    {

        $params = (Object) $params;

        $games = new Games;

        $games->name        = $params->name;
        $games->price       = $params->price;
        $games->description = $params->description;
        $games->age_group   = $params->age_group;
        $games->genre_id   = $params->genre_id;

        return $games->save();

    }


    public function edit($params)
    {

        $params = (Object) $params;

        $games = Games::where('id', $params->id)->first();
  
        $games->name        = $params->name        == null ? $games->name        : $params->name;
        $games->price       = $params->price       == null ? $games->price       : $params->price;
        $games->description = $params->description == null ? $games->description : $params->description;
        $games->age_group   = $params->age_group   == null ? $games->age_group   : $params->age_group;
        $games->genre_id    = $params->genre_id    == null ? $games->genre_id    : $params->genre_id;

        return $games->save();

    }


    public function delete($id)
    {

        return Games::where('id', $id)->delete();

    }


    public function getAll()
    {

        return Games::orderBy('name')->get();

    }


    public function getById($id)
    {

        return Games::where('id', $id)->get();

    }


    public function filter($params)
    {

        return Games::where('name','LIKE','%'.$params->name.'%')
                        ->get();

    }

}