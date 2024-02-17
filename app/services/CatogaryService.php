<?php

namespace App\Services;

use App\Models\Catogary;
use App\Traits\CrudOperations;

class BookService
{
    use CrudOperations;


    protected $model;

    public function __construct(Catogary $catogary)
    {
        $this->model = $catogary;
    }
}
