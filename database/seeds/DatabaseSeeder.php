<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      $this->call([
      UsersSeeder::class,
      TypeProjectSeeder::class,
      ProjectsSeeder::class,
      TasksSeeder::class,
      EcfsSeeder::class,
      EffortEstimationsSeeder::class,
      TcfsSeeder::class,
      ProgressesSeeder::class,
      UUCPsSeeder::class,
      MacthSeeder::class,

  ]);
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
