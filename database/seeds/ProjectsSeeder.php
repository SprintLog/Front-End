<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrayTypeProject = [0,1,2,3];
        $arrayTypeUser = [0,1];
        for ($i=0; $i < 10; $i++) {
          DB::table('projects')->insert([
              'thai_name'     => str_random(10),
              'eng_name'      => str_random(10),
              'typeProjectId' => 1,
              'advisorsId'    => array_random($arrayTypeUser) ,
              'developerId'   => array_random($arrayTypeUser),
              'abstack'       => str_random(10),
              'keywords'      => array_random($arrayTypeUser),
              'userId'        =>  array_random($arrayTypeUser),
              'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
          ]);
       }
    }
}
