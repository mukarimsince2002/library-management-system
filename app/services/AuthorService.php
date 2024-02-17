<?php

namespace App\Services;

use App\Models\Author;
use App\Traits\CrudOperations;

class AuthorService
{
    use CrudOperations;


    protected $model;

    public function __construct(Author $author)
    {
        $this->model = $author;
    }
}
