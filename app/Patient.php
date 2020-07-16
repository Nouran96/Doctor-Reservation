<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'gender', 'birth_date', 'last_name', 'email', 'mobile','country', 'occupation'
    ];

    public function user()
    {
      return $this->morphOne('App\User', 'profilable');
    }

    public function appointments() {
      
      return $this->hasMany('App\Appointment');
    }
}
