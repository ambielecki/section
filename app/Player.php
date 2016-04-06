<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //for mass assignment
    protected $fillable = [
        'number', 'name', 'postion', 'bats', 'throws', 'age', 'height', 'weight', 'home', 'salary'
    ];

    //model relationship for fk
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
