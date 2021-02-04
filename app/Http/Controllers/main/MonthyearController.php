<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Monthyear;
use App\User;
use App\Setting;
use App\School;
use App\Schoolyear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthyearController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    //
    $schoolyear = Schoolyear::where([['id', $id], ['is_over', false]])->first();
    $current = User::find(Auth::id());
    $setting = Setting::where('user_id', Auth::id())->first();

    $school = School::where('id', $schoolyear->school_id)->first();
    $monthyearCount = Monthyear::where('schoolyear_id', $schoolyear->id)->count();

    return view('main.monthyear.page-monthyears')->with(['schoolyear' => $schoolyear, 'current' => $current, 'setting' => $setting, 'school' => $school]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store($id, Request $request)
  {
    //
    /*$request->validate([
      'year' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'coef' => 'required'
    ]);*/

    $current = User::find(Auth::id());

    $monthyear = new Monthyear;
    $monthyear->start_date = $request->start_date;
    $monthyear->end_date = $request->end_date;
    $monthyear->coef = $request->coef;
    $monthyear->schoolyear_id = $id;
    $monthyear->created_user = $current->id;
    $monthyear->updated_user = $current->id;

    $monthyearChecker = Monthyear::where('schoolyear_id', $id)->count();

    switch ($monthyearChecker) {
      case 0:
        $monthyear->rank = 1;
        break;

      case 1:
        $monthyear->rank = 2;
        break;

      default:
        $monthyear->rank = 3;
    }

    $monthyear->save();

    return redirect()->route('home');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Monthyear  $monthyear
   * @return \Illuminate\Http\Response
   */
  public function show(Monthyear $monthyear)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Monthyear  $monthyear
   * @return \Illuminate\Http\Response
   */
  public function edit(Monthyear $monthyear)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Monthyear  $monthyear
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Monthyear $monthyear)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Monthyear  $monthyear
   * @return \Illuminate\Http\Response
   */
  public function destroy(Monthyear $monthyear)
  {
    //
  }
}
