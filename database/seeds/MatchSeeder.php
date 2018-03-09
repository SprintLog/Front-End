<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $UserIDs= DB::table('users')->pluck('id');
      $ProjectIDs = DB::table('projects')->pluck('id');


      //  Use When Need  Randam Index Array
      // $randomIndexUSer = rand(0, count($UserIDs));
      // $randomIndexPJ = rand(0, count($ProjectIDs));

        for ($i=0; $i < 5; $i++) {
          DB::table('matches')->insert([
            "userId"    => $UserIDs[$i],
            "projectId" => $ProjectIDs[$i],
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          ]);
        }
        DB::table('matches')->insert([
          "userId"    => 5,
          "projectId" => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 6,
          "projectId" => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 7,
          "projectId" => 2,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}