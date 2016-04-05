<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected  $fillable = [
        'city','name','league','division'
    ];
}
