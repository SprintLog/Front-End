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

        $faker = Faker\Factory::create();
        $arrayTypeProject = [1,2,3];

        for ($i=0; $i < 5; $i++) {
          DB::table('projects')->insert([
              'thai_name'     => "ชื่อไทย",
              'eng_name'      => $faker->domainWord,
              'typeProjectId' => array_random($arrayTypeProject),
              'abstack'       => $faker->text($maxNbChars = 10),
              'keywords'      => $faker->word,
              'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
          ]);
       }
    }
}
