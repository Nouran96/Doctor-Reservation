<?php

use Illuminate\Database\Seeder;

class PainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pains')->insert([
            'type' => 'Migraine',
            'speciality' => 'Head'
        ]);

        DB::table('pains')->insert([
            'type' => 'Leg Cramps',
            'speciality' => 'Bone'
        ]);

        DB::table('pains')->insert([
            'type' => 'Stomach Ache',
            'speciality' => 'Stomach'
        ]);

        DB::table('pains')->insert([
            'type' => 'Rash',
            'speciality' => 'Skin'
        ]);
        
        DB::table('pains')->insert([
            'type' => 'Eye Pain',
            'speciality' => 'Eye'
        ]);
    }
}
