<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Traits\Timestamp;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //

    DB::table('users')->insert([
      [
        'familyname' => 'yao',
        'givenname' => 'dabara mickael',
        'email' => 'dabaramyschool@yopmail.com',
        'password' => bcrypt('dabara2048'),
        'gender' => false,
        'birthdate' => '06/12/1997',
        'phone' => '795-499-37',
        'dialcode' => '+599',
        'country' => 'SA',
        'address' => 'II PLATEAUX CASA',
        'job' => 'Ingénieur analyste',
        'status' => true,
        'root' => true,
        'email_verified_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'woods',
        'givenname' => 'mika jordyn',
        'email' => 'yioxmyschool@yopmail.com',
        'password' => bcrypt('yiox2048'),
        'gender' => true,
        'birthdate' => '19/06/1983',
        'phone' => '07-709-388',
        'dialcode' => '+213',
        'country' => 'DE',
        'address' => 'Riviera 2 allocodrome',
        'job' => 'comptable',
        'status' => false,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'ada',
        'givenname' => 'mika',
        'email' => 'mikamyschool@yopmail.com',
        'password' => bcrypt('mika2048'),
        'gender' => false,
        'birthdate' => '19/06/1983',
        'phone' => '59-713-252',
        'dialcode' => '+244',
        'country' => 'AO',
        'address' => 'Abobo samaké',
        'job' => 'Chirugien',
        'status' => false,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s")
      ]
    ]);
  }
}
