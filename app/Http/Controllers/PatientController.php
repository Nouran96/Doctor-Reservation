<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Patient;
use App\User;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('patients.create');
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

            return redirect()->route('home');
        }
    }
}
