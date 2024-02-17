<?php

namespace App\Services;

use App\Models\User;
use App\Traits\CrudOperations;

class UserService
{
    use CrudOperations;


    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
