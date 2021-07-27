<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolyearSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('schoolyears')->insert([
      [
        'year' => date("Y-m-d"),
        'start_date' => '27/08/2021',
        'end_date' => '25/06/2022',
        'school_id' => 1,
        'created_user' => 2,
        'updated_user' => 2,
        'created_at' => date("Y-m-d H:i:s")
      ],
      [
        'year' => date("Y-m-d"),
        'start_date' => '06/09/2021',
        'end_date' => '15/06/2022',
        'school_id' => 2,
        'created_user' => 4,
        'updated_user' => 4,
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'year' => date("Y-m-d"),
        'start_date' => '17/09/2021',
        'end_date' => '25/05/2022',
        'school_id' => 3,
        'created_user' => 6,
        'updated_user' => 6,
        'created_at' => date("Y-m-d H:i:s")
      ]

    ]);
  }
}
