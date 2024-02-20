<?php

namespace App\Services;

use App\Models\Genre;
use App\Traits\CrudOperations;

class GenreService
{
    use CrudOperations;


    protected $model;

    public function __construct(Genre $genre)
    {
        $this->model = $genre;
    }
}
