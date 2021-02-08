<?php

namespace App\Http\Middleware;

use App\School;
use App\Schoolyear;
use App\Monthyear;
use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class ScolarSystem
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

    $utilConnect = User::find(Auth::id());

    if ($utilConnect->root == false) {
      $school = School::where('id', $utilConnect->school_id)->first();
      $schoolyear = Schoolyear::where('school_id', $school->id)->latest('created_at')->first();


      if ($schoolyear != NULL) {

        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', false]])->first();

        // schoolyear autoloader
        if ($schoolyear->end_date < date('Y-m-d') && $schoolyear->end_date != NULL) {
          $schoolyear->is_over = true;
          $schoolyear->save();

          $schoolyear2 = new Schoolyear;
          $schoolyear2->year = date("Y-m-d");
          $schoolyear2->school_id = $school->id;
          $schoolyear2->created_user = $utilConnect->id;
          $schoolyear2->updated_user = $utilConnect->id;
          $schoolyear2->save();
        }

        // monthyear autoloader
        if ($monthyear != NULL) {
          if ($monthyear->end_date < date('Y-m-d') && $monthyear->end_date != NULL) {
            $monthyear->is_over = true;
            $monthyear->save();
          }
        }
      }
    }

    return $next($request);
  }
}
