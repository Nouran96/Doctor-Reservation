<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'pain_type', 'speciality', 'patient_id', 'doctor_id', 'reservation_date'
    ];

    protected $dates = [
        'reservation_date'
    ];

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
