<?php 

namespace App\Http\Repositories\GenreRepository;

use App\Models\Genre;

class GenreRepository implements GenreInterface
{

    public function store($params)
    {

        $genre = new Genre;

        $genre->genre       = $params->genre;
        $genre->description = $params->description;

        return $genre->save();

    }


    public function edit($params)
    {

        $genre = Genre::where('id', $params->id)->first();

        $genre->genre       = $params->genre       == null ? $genre->genre       : $params->genre;
        $genre->description = $params->description == null ? $genre->description : $params->description;

        return $genre->save();

    }


    public function delete($id)
    {

        return Genre::where('id', $id)->delete();

    }

}