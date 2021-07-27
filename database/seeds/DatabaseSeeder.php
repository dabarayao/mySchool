<?php

use App\Schoolyear;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      SchoolSeeder::class,
      UserSeeder::class,
      SchoolyearSeeder::class,
      SettingSeeder::class
    ]);
  }
}
