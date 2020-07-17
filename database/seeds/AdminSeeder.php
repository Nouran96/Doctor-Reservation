<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => 0,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');
    }
}
