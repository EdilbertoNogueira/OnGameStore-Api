<?php 

namespace App\Http\Repositories\GenreRepository;

interface GenreInterface 
{

    public function store($params);

    public function edit($params);

    public function delete($id);

}