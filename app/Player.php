<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'number', 'name', 'postion', 'bats', 'throws', 'age', 'height', 'weight', 'home', 'salary'
    ];
}
