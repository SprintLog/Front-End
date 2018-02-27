<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EcfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrayweight = [1.5,0.5,1,0.5,1,2,-1,-1];
        $EF = array("Familiar with the development process",
                "Application experience",
                "Object-oriented experience",
                "Lead analyst capability",
                "Motivation",
                "Stable requirements",
                "Part-time staff",
                "Difficult programming language");
        $arrayrate = [0,1,2,3,4,5];

      for ($i=0; $i <= 7; $i++){
        $rate = array_random($arrayrate);
        DB::table('ecfs')->insert([
          'topic'     => $EF[$i],
          'des'       => str_random(10),
          'weight'    => $arrayweight[$i],
          'rate'      => $rate,
          'result'    => $rate * $arrayweight[$i]  ,
          'projectId' => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      }
    }
}
