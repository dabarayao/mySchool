<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Classroom;

class CheckUserClassrooms
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
    $class = Classroom::where('school_id', $util->school_id)->count();
    $superClass = Classroom::all()->count();
    if (($class == 0 && $util->root == false) || ($superClass == 0 && $util->root == true)) {
      $request->session()->flash('userNotClass', 'empty classroom');

      return redirect()->route('classroom-list');
    }

    return $next($request);
  }
}
