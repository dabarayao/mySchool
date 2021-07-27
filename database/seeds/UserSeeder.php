<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

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
        'birthdate' => '17/08/1975',
        'phone' => '077-954-993-7',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'II PLATEAUX CASA',
        'job' => 'Ingénieur analyste',
        'school_id' => NULL,
        'status' => true,
        'root' => true,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'woods',
        'givenname' => 'mika jordyn',
        'email' => 'yioxmyschool@yopmail.com',
        'password' => bcrypt('yiox2048'),
        'gender' => true,
        'birthdate' => '07/02/1966',
        'phone' => '057-592-736-4',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Yopougon quartier millionnaire',
        'job' => 'Educateur',
        'school_id' => 1,
        'status' => True,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'kevin',
        'givenname' => "d'anthony town",
        'email' => 'katwolves@yopmail.com',
        'password' => bcrypt('katwolves2048'),
        'gender' => false,
        'birthdate' => '19/06/1983',
        'phone' => '077-954-993-7',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Riviera 2 allocodrome',
        'job' => 'comptable',
        'school_id' => 1,
        'status' => True,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'ada',
        'givenname' => 'mika',
        'email' => 'mikamyschool@yopmail.com',
        'password' => bcrypt('mika2048'),
        'gender' => false,
        'birthdate' => '23/11/1999',
        'phone' => '057-592-736-4',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Abobo Dokui Olympe',
        'job' => 'professeur',
        'school_id' => 2,
        'status' => true,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'alloko',
        'givenname' => 'eleonore affoué',
        'email' => 'alloko@yopmail.com',
        'password' => bcrypt('alloko2048'),
        'gender' => false,
        'birthdate' => '06/12/1997',
        'phone' => '077-954-993-7',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Marcory zone 4',
        'job' => 'professeur',
        'school_id' => 2,
        'status' => true,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'petit',
        'givenname' => 'hero',
        'email' => 'petithero@yopmail.com',
        'password' => bcrypt('petithero2048'),
        'gender' => true,
        'birthdate' => '19/11/1998',
        'phone' => '077-954-993-7',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Koumassi 05',
        'job' => 'professeur',
        'school_id' => 3,
        'status' => true,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ],

      [
        'familyname' => 'hortense',
        'givenname' => 'gadji',
        'email' => 'hortense@yopmail.com',
        'password' => bcrypt('hortense2048'),
        'gender' => true,
        'birthdate' => '19/11/1998',
        'phone' => '057-592-736-4s',
        'dialcode' => '+225',
        'country' => 'CI',
        'address' => 'Koumassi 05',
        'job' => 'professeur',
        'school_id' => 3,
        'status' => true,
        'root' => false,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
      ]

    ]);
  }
}
