<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $fillable = [
        'pain_type', 'speciality', 'patient_id', 'doctor_id', 'reservation_date'
    ];

    // protected $dates = [
    //     'reservation_date'
    // ];

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function getReservationDate($value) {
        if ($value !== null) {
            //$value format 'Y:m:d H:i:s' to 'Y-m-d H:i'
           return (new Carbon($value))->format('Y-m-d H:i');
        }
        return $value;
    }
}
