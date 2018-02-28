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
        //
        $arrayTypeUser = [0,1];

        DB::table('users')->insert([
            'name'      => str_random(10),
            'lastname'  => str_random(10),
            'email'     => str_random(10).'@gmail.com',
            'projectid' => 0 ,
            'typeUser'  => array_random($arrayTypeUser),
            'password'  => bcrypt('secret'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'      => str_random(10),
            'lastname'  => str_random(10),
            'email'     => 'arm@gmail.com',
            'projectid' => 0 ,
            'typeUser'  => array_random($arrayTypeUser),
            'password'  => 'arm@gmail.com',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
