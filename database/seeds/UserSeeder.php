<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Tambahkan Faker untuk import module Faker
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++) :
        $faker = Faker::create();
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('qwerty')
        ]);

        endfor;

    }
}
