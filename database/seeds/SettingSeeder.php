<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('settings')->insert([
      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '1',
        'created_user' => '1',
        'updated_user' => '1'
      ],
      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '2',
        'created_user' => '2',
        'updated_user' => '2'
      ],

      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '3',
        'created_user' => '3',
        'updated_user' => '3'
      ],

      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '4',
        'created_user' => '4',
        'updated_user' => '4'
      ],

      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '5',
        'created_user' => '5',
        'updated_user' => '5'
      ],

      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '6',
        'created_user' => '6',
        'updated_user' => '6'
      ],

      [
        'theme' => 'semi-dark',
        'language' => 1,
        'user_id' => '7',
        'created_user' => '7',
        'updated_user' => '7'
      ]
    ]);
  }
}
