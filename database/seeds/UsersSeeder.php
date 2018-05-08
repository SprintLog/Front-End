<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $arrayTypeUser = [0,1];
        // php artisan migrate:fresh --seed
        DB::table('users')->insert([
            'name'      => 'ADMIN',
            'lastname'  => 'ADMINARMY',
            'email'     => 'arm@gmail.com',
            'typeUser'  => 0,
            'password'  => bcrypt('arm@gmail.com'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        for ($i=0; $i < 9; $i++) {
          DB::table('users')->insert([
            'name'      => $faker->firstNameMale,
            'lastname'  => $faker->lastName,
            'email'     => str_random(10).'@gmail.com',
            'typeUser'  => 0,
            'password'  => bcrypt('1234'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          ]);
       }
        for ($i=0; $i < 3; $i++) {
          DB::table('users')->insert([
            'name'      => 'Dr. '.$faker->firstNameFemale,
            'lastname'  => $faker->lastName,
            'email'     => str_random(10).'@gmail.com',
            'typeUser'  => 1,
            'password'  => bcrypt('1234'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          ]);
       }
    }
}
