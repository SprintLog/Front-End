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

      $randomPj =[$ProjectIDs[0],
                  $ProjectIDs[1],
                  $ProjectIDs[2],
                  $ProjectIDs[3],
                  $ProjectIDs[4]];

       // Use When Need  Randam Index Array
      $randomIndexUSer = rand(0, count($UserIDs));
      $randomIndexPJ = rand(0, count($ProjectIDs));

        // for ($i=0; $i < 15; $i++) {
        //   DB::table('matches')->insert([
        //     "userId"    => $UserIDs[$i],
        //     "projectId" => array_random($randomPj),
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //   ]);
        // }
        DB::table('matches')->insert([
          "userId"    => 1,
          "projectId" => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 2,
          "projectId" => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 3,
          "projectId" => 1,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 4,
          "projectId" => 2,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 5,
          "projectId" => 2,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 6,
          "projectId" => 2,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('matches')->insert([
          "userId"    => 4,
          "projectId" => 3,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 5,
          "projectId" => 3,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('matches')->insert([
          "userId"    => 6,
          "projectId" => 3,
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);



    }
}
