<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class checkUserSchools
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {

    $util = User::find(Auth::id());
    if ($util->school_id == NULL && $util->root == false) {
      $request->session()->flash('userNotSchool', 'normal user havent school');

      return redirect()->route('home');
    }

    return $next($request);
  }
}
