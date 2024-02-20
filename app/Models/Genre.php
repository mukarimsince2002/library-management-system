<?php
// app/Models/Genre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres'; // Assuming the table name is 'genres'
    protected $fillable = ['name']; // Define fillable attributes
}
