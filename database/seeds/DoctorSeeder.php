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
        $user1 = User::create([
            'id' => 0,
            'username' => 'doctor1',
            'password' => Hash::make('doctor1')
        ]);

        $user1->assignRole('doctor');

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
    }
}
