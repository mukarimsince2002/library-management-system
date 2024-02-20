<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'membership_type_id',
    ];

    public function membershipType()
    {
        return $this->belongsTo(MembershipType::class);
    }
}
