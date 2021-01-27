<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;

use App\User;
use App\School;
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
      $this->middleware(['verified', 'auth', 'checkUserStatus']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          // auth connected state code sample
          if (Auth::check()) {
            $util = User::find(Auth::id());
            if ($util->state == false); {
              $util->state = true;
              $util->save();
            }
          }

        // users who's is currently connected
        $current = User::find(Auth::id());
        // users who's is currently connected


        $school = School::where('id', $current->school_id)->first();

        if (School::all()->count() == 0)
        {
        return view('main.homepage', ['current' => $current, 'school' => $school, 'empty' => 1]);
        }
        else
        {
        return view('main.homepage', ['current' => $current, 'school' => $school]);
        }
    }
}
