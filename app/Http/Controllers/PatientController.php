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

    public function index() {

        if(auth()->user()->hasRole('patient')) {

            $appointments = Appointment::where('patient_id', auth()->user()->profilable->id)->get();

        } else if(auth()->user()->hasRole('doctor')) {

            $appointments = Appointment::where('doctor_id', auth()->user()->profilable->id)->get();

        } else if (auth()->user()->hasRole('admin')) {

            $appointments = Appointment::where('doctor_id', null)->get();
        }

        return view('patients.index', [
            'appointments' => $appointments,
            'count' => 0
        ]);
    }

    public function create() {

        // $pains = Pain::all();

        // return view('patients.create', [
        //     'pains' => $pains
        // ]);

        return view('patients.create');
    }

    public function store(PatientRequest $request) {

        $validatedData = $request->validated();

        if($validatedData) {

            // Create new Patient
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
            
            // Assign the patient to the logged in user
            $patient->user()->save($user);

            return redirect()->route('appointments.create');
        }
    }
}
