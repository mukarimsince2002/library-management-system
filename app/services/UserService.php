<?php

namespace App\Services;

use App\Models\User;
use App\Traits\CrudOperations;
use App\Traits\ImageUploadTrait;

class UserService
{
    use CrudOperations;
    use ImageUploadTrait; // Use the ImageUploadTrait


    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
