<?php

namespace App\Services;

use App\Models\Publisher;
use App\Traits\CrudOperations;

class PublisherService
{
    use CrudOperations;


    protected $model;

    public function __construct(Publisher $publisher)
    {
        $this->model = $publisher;
    }
}
