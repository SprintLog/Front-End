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

      $arrayComplexity = [1,2,3];
      DB::table('tasks')->insert([
          'nametask' => str_random(10),
          'complexity' => array_random($arrayComplexity),
          'projectId' => 0,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
