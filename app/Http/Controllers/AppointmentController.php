<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Pain;
use App\Doctor;
use App\Notifications\AppointmentNotification;

class AppointmentController extends Controller
{
    public function index() {

        if(auth()->user()->hasRole('patient')) {

            $appointments = Appointment::where('patient_id', auth()->user()->profilable->id)->get();

        } else if(auth()->user()->hasRole('doctor')) {

            $appointments = Appointment::where('doctor_id', auth()->user()->profilable->id)->get();

        } else if (auth()->user()->hasRole('admin')) {

            $appointments = Appointment::where('doctor_id', null)->get();
        }

        return view('appointments.index', [
            'appointments' => $appointments,
            'count' => 0
        ]);
    }

    public function create() {

        $pains = Pain::all();

        return view('appointments.create', [
            'pains' => $pains
        ]);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'pain_type' => 'required'
        ]);

        $pain = Pain::where('type', $validatedData['pain_type'])->get();
            
        if($pain) {

            // Create an appointment
            $appointment = Appointment::create([
                'pain_type' => $validatedData['pain_type'],
                'speciality' => $pain[0]->speciality,
                'patient_id' => auth()->user()->profilable->id,
                'doctor_id' => null
            ]);
        }

        return redirect()->route('appointments.index');
    }

    public function edit(Request $request) {

        $appointment = Appointment::find($request->appointment);

        $pain = Pain::where('type', $appointment->pain_type)->get();
        $doctors = Doctor::where('speciality', $pain[0]->speciality)->get();

        return view('appointments.edit', [
            'doctors' => $doctors,
            'appointment' => $appointment
        ]);
    }

    public function update(Request $request) {
        $validatedData = $request->validate([
            'doctor_id' => 'required|numeric',
            'reservation_date' => 'required|date'
        ]);


        if($validatedData) {
            $appointment = Appointment::find($request->appointment);

            $appointment->update([
                'doctor_id' => $validatedData['doctor_id'],
                'reservation_date' => $validatedData['reservation_date']
            ]);

            $appointment->patient->user->notify(new AppointmentNotification($appointment, 'patient'));
            $appointment->doctor->user->notify(new AppointmentNotification($appointment, 'doctor'));
        }

        return redirect()->route('appointments.index');
    }
}
