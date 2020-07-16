<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pain extends Model
{
    protected $fillable = [
        'type', 'speciality'
    ];
}
