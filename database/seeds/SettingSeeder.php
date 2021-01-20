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
            'navbarcolor' => 'yellow',
            'user_id' => '1',
            'created_user' => '1',
            'updated_user' => '1'
          ],
          [
            'theme' => 'semi-dark',
            'language' => 1,
            'navbarcolor' => 'white',
            'user_id' => '2',
            'created_user' => '2',
            'updated_user' => '2'
          ],

          [
            'theme' => 'semi-dark',
            'language' => 1,
            'navbarcolor' => 'blue',
            'user_id' => '3',
            'created_user' => '3',
            'updated_user' => '3'
          ]
        ]);
    }
}
