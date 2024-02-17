<?php

namespace App\Services;

use App\Models\Book;
use App\Traits\CrudOperations;

class BookService
{
    use CrudOperations;


    protected $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
    }
}
