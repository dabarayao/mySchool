<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  // This is my auth logout method
  public function logout(Request $request)
  {

    $util = User::find(Auth::id());
    Auth::logout();

    $util->state = false;
    $util->save();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
