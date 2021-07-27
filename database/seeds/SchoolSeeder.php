<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('schools')->insert([
      [
        'name' => 'Lycée Moderne de Jeunes Filles Yopougon',
        'dialcode' => '+225',
        'phone' => '222-351-061-8',
        'country' => 'CI',
        'area' => 'ABIDJAN',
        'address' => 'Yopougon RUE L34',
        'type' => 'public',
        'nb_room' => '113',
        'building_date' => '08/01/1980',
        'funder' => "N'goran Mathieu",
        'type_monthyear' => false,
        'status' => true,
        'created_at' => date("Y-m-d H:i:s")
      ],
      [
        'name' => 'Lycée de Garçons de Bingerville',
        'dialcode' => '+225',
        'phone' => '212-240-301-2',
        'country' => 'CI',
        'area' => 'ABIDJAN',
        'address' => 'Bingerville RUE V12',
        'type' => 'public',
        'nb_room' => '240',
        'building_date' => '17/08/1970',
        'funder' => "Bailly spinto",
        'type_monthyear' => true,
        'status' => true,
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'name' => 'Groupe Scolaire Les Dauphins',
        'dialcode' => '+225',
        'phone' => '212-241-354-0',
        'country' => 'CI',
        'area' => 'ABIDJAN',
        'address' => ' 06 BP 2445 Abidjan 06 J 81, Abidjan',
        'type' => 'private',
        'nb_room' => '80',
        'building_date' => '26/05/1990',
        'funder' => "Allai le fraiche",
        'type_monthyear' => true,
        'status' => true,
        'created_at' => date("Y-m-d H:i:s")
      ]
    ]);
  }
}
