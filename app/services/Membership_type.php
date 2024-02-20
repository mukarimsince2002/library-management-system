<?php

namespace App\Services;

use App\Models\MembershipType;
use App\Traits\CrudOperations;

class Membership_typeService
{
    use CrudOperations;

    protected $model;

    public function __construct(MembershipType $membership_type)
    {
        $this->model = $membership_type;
    }
}
