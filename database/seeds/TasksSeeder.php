<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      $arrayComplexity = [1,2,3];
      $arrayprojectId = [1,2,3,4,5,6];

      for ($i=0; $i < 20; $i++) {

        DB::table('tasks')->insert([
            'nametask'   => $faker->numerify('Task ###'),
            'complexity' => array_random($arrayComplexity),
            'projectId'  => array_random($arrayComplexity),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('progresses')->insert([
            'taskId'     => $i+1,
            'desc'       => "Test",
            'approved'  => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

      }
    }
}
