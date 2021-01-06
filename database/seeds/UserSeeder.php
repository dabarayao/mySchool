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
    User::create([
      'familyname' => 'yao',
      'givenname' => 'dabara mickael',
      'email' => 'dabaramyschool@yopmail.com',
      'password' => bcrypt('dabara2048'),
      'gender' => false,
      'birthdate' => '06/12/1997',
      'phone' => 79549937,
      'country' => 'ZA',
      'address' => 'II PLATEAUX CASA',
      'job' => 'Ingénieur analyste',
      'status' => true,
      'root' => true,
      'email_verified_at' => date("Y-m-d H:i:s")
    ]);
  }
}
