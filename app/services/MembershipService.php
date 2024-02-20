<?php

namespace App\Services;

use App\Models\Membership;
use App\Traits\CrudOperations;

class MembershipService
{
    use CrudOperations;

    protected $model;

    public function __construct(Membership $membership)
    {
        $this->model = $membership;
    }
}
