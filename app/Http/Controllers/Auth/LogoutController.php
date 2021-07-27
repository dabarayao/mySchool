<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
  //
  // This is my auth logout method
  public function logout(Request $request)
  {

    $util = User::find(Auth::id());
    $util->state = false;
    $util->save();

    Auth::logout();



    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
