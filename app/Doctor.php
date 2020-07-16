<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'first_name', 'gender', 'birth_date', 'last_name', 'email', 'mobile','country', 'speciality'
    ];

    public function user()
    {
      return $this->morphOne('App\User', 'profilable');
    }

    public function appointments() {
      
      return $this->hasMany('App\Appointment');
    }
}
