<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TcfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrayweight = [2,1,1,1,1,0.5,0.5,2,1,1,1,1,1];
        $TC = array("Distributed system",
                "Performance objectives",
                "End-user efficiency",
                "Complex processing",
                "Reusable code",
                "Easy to install",
                "Easy to use",
                "Portable",
                "Easy to change",
                "Concurrent use",
                "Security",
                "Access for third parties",
                "Training needs");
        $arrayrate = [0,1,2,3,4,5];

      for ($i=0; $i <= 12; $i++){
        $rate = array_random($arrayrate);
        DB::table('tcfs')->insert([
          'topic'     => $TC[$i],
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
