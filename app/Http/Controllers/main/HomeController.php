<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;

use App\User;
use App\School;
use App\Schoolyear;
use App\Monthyear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus', 'ScolarSystem']);
  }


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {



    // users who's is currently connected
    $current = User::find(Auth::id());
    // users who's is currently connected


    $school = School::where('id', $current->school_id)->first();

    if ($school != NULL) {
      $schoolyear = Schoolyear::where([['school_id', $school->id], ['is_over', false]])->first();

      if ($schoolyear != NULL) {
        $monthyearCount = Monthyear::where('schoolyear_id', $schoolyear->id)->count();
        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', false]])->first();
      }
    }

    if (School::all()->count() == 0) {
      return view('main.dashboard', ['current' => $current, 'school' => $school, 'empty' => 1]);
    } else {

      if ($school != NULL) {
        return view('main.dashboard', [
          'current' => $current,
          'school' => $school,
          'schoolyear' => $schoolyear,
          'monthyearCount' => $monthyearCount,
          'monthyear' => $monthyear
        ]);
      } else {
        return view('main.dashboard', ['current' => $current, 'school' => $school]);
      }
    }
  }
}
