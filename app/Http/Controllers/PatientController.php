<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Patient;
use App\User;
use App\Pain;
use App\Appointment;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {

        $pains = Pain::all();

        return view('patients.create', [
            'pains' => $pains
        ]);
    }

    public function store(PatientRequest $request) {

        $validatedData = $request->validated();

        if($validatedData) {

            $patient = Patient::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'gender' => $validatedData['gender'],
                'birth_date' => $validatedData['birth_date'],
                'mobile' => $validatedData['mobile'],
                'country' => $validatedData['country'],
                'occupation' => $validatedData['occupation']
            ]);
            
            $user = User::find(auth()->user()->id);
            
            $patient->user()->save($user);
            $pain = Pain::where('type', $validatedData['pain_type'])->get();
            
            if($pain) {

                $appointment = Appointment::create([
                    'pain_type' => $validatedData['pain_type'],
                    'speciality' => $pain[0]->speciality,
                    'patient_id' => $patient->id,
                    'doctor_id' => null
                ]);
            }

            return redirect()->route('home');
        }
    }
}
