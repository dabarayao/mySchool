<?php

namespace App\Http\Middleware;

use App\School;
use App\Schoolyear;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
use Illuminate\Support\Facades\Redirect;

class CheckUserStatus
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */


  // code for billing after authenitification
  public function handle($request, Closure $next)
  {
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->status == false) {
        $request->session()->put('checkpoint', 'billing is on going');

        return redirect()->route('checkpoint');
      } else {
        session()->forget('checkpoint');

        $utilConnect = User::find(Auth::id());
        if ($utilConnect->state == false); {
          $utilConnect->state = true;
          $utilConnect->save();
        }

        if ($utilConnect->root == false) {
          $school = School::where('id', $utilConnect->school_id)->first();
          $schoolyear = Schoolyear::where('school_id', $school->id)->first();


          if ($schoolyear->end_date < date('Y-m-d')) {
            $schoolyear->is_over = true;
            $schoolyear->save();

            $schoolyear2 = new Schoolyear;
            $schoolyear2->year = date("Y-m-d");
            $schoolyear2->school_id = $school->id;
            $schoolyear2->created_user = $utilConnect->id;
            $schoolyear2->updated_user = $utilConnect->id;
            $schoolyear2->save();
          }
        }
      }
    }
    return $next($request);
  }
}
