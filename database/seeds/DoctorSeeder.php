<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // If you want to add a doctor just copy this part and change variable names and values
        /********** Copy from here *********/
        $user1 = User::create([
            'id' => 0, // Don't change that
            'username' => 'doctor1',
            'password' => Hash::make('doctor1')
        ]);

        $user1->assignRole('doctor'); // Don't change that

        $doctor1 = Doctor::create([
            'first_name' => 'Marc',
            'last_name' => 'Anderson',
            'email' => 'm.anderson@hotmail.com',
            'gender' => 'male',
            'birth_date' => '1985-5-10',
            'mobile' => '46560561564',
            'country' => 'America',
            'speciality' => 'Head'
        ]);

        $doctor1->user()->save($user1);

        /******** Till here ********/

        $user2 = User::create([
            'id' => 0,
            'username' => 'doctor2',
            'password' => Hash::make('doctor2')
        ]);

        $user2->assignRole('doctor');

        $doctor2 = Doctor::create([
            'first_name' => 'Angela',
            'last_name' => 'Anderson',
            'email' => 'a.anderson@hotmail.com',
            'gender' => 'female',
            'birth_date' => '1985-10-10',
            'mobile' => '6465198156',
            'country' => 'Australia',
            'speciality' => 'Bone'
        ]);

        $doctor2->user()->save($user2);

        $user3 = User::create([
            'id' => 0,
            'username' => 'doctor3',
            'password' => Hash::make('doctor3')
        ]);

        $user3->assignRole('doctor');

        $doctor3 = Doctor::create([
            'first_name' => 'Nouran',
            'last_name' => 'Samy',
            'email' => 'nourans.96@yahoo.com',
            'gender' => 'female',
            'birth_date' => '1985-10-10',
            'mobile' => '6465198156',
            'country' => 'Egypt',
            'speciality' => 'Eye'
        ]);

        $doctor3->user()->save($user3);

        $user4 = User::create([
            'id' => 0,
            'username' => 'doctor4',
            'password' => Hash::make('doctor4')
        ]);

        $user4->assignRole('doctor');

        $doctor4 = Doctor::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Samy',
            'email' => 'nourans.96@hotmail.com',
            'gender' => 'male',
            'birth_date' => '1985-10-10',
            'mobile' => '6465198156',
            'country' => 'Egypt',
            'speciality' => 'Skin'
        ]);

        $doctor4->user()->save($user4);

        $user5 = User::create([
            'id' => 0,
            'username' => 'doctor5',
            'password' => Hash::make('doctor5')
        ]);

        $user5->assignRole('doctor');

        $doctor5 = Doctor::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Samy',
            'email' => 'nourans.96@gmail.com',
            'gender' => 'male',
            'birth_date' => '1985-10-10',
            'mobile' => '6465198156',
            'country' => 'Egypt',
            'speciality' => 'Stomach'
        ]);

        $doctor5->user()->save($user5);
    }
}
