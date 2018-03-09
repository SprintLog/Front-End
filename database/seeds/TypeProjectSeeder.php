<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TypeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_project')->insert([
          'type'   => "โครงงานวิศวกรรม",
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('type_project')->insert([
          'type'   => "โครงงานวิจัย",
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('type_project')->insert([
          'type'   => "โครงงาน Start Up",
          'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
