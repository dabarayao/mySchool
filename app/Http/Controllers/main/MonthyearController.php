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

  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus', 'ScolarSystem']);
  }


  public function index($id)
  {
    //
    $schoolyear = Schoolyear::where([['id', $id], ['is_over', false]])->first();

    $current = User::find(Auth::id());
    $setting = Setting::where('user_id', Auth::id())->first();

    if ($schoolyear != NULL) {
      $school = School::where('id', $schoolyear->school_id)->first();


      // $monthyearCount = Monthyear::where('schoolyear_id', $schoolyear->id)->count();

      $monthyearCheck = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', true]])->count();

      if ($monthyearCheck == 1) {
        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['rank', 1]])->first();
      } else if ($monthyearCheck == 2) {
        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['rank', 2]])->first();
      } else if ($monthyearCheck == 3) {
        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['rank', 3]])->first();
      } else {
        $monthyear = null;
      }
    }

    if ($schoolyear == NULL) {
      return view('errors.404');
    } else if ($schoolyear != NULL && $school->id != $current->school_id) {
      return view('errors.not-authorized');
    } else {
      return view('main.monthyear.page-monthyears')->with(['schoolyear' => $schoolyear, 'current' => $current, 'setting' => $setting, 'school' => $school, 'monthyear' => $monthyear]);
    }
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
    $request->validate([
      'year' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'coef' => 'required'
    ]);

    if (strtotime($request->start_date) > strtotime($request->end_date)) {

      session()->flash('monthar1', 'the start date is bigger than the end date');
      return redirect()->route('monthyear-add', $id);
    } else {

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
  public function edit($id, Monthyear $monthyear)
  {


    $school = School::find($id);
    $current = User::find(Auth::id());

    if ($school != NULL) {
      $setting = Setting::where('user_id', Auth::id())->first();

      $schoolyear = Schoolyear::where([['school_id', $school->id], ['is_over', false]])->first();

      if ($schoolyear != NULL) {
        $monthyearChecker = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', true]])->latest('updated_at')->first();
        $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', false]])->first();
      }
    }


    if ($school == NULL) {
      return view('errors.404');
    } else if ($school != NULL && $current->school_id != $school->id) {
      return view('errors.not-authorized');
    } else {
      return view('main.monthyear.page-monthyearsUpdate')->with([
        'monthyear' => $monthyear,
        'monthyearChecker' => $monthyearChecker,
        'schoolyear' => $schoolyear,
        'setting' => $setting,
        'school' => $school
      ]);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Monthyear  $monthyear
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Monthyear $monthyear)
  {
    //
    $request->validate([
      'year' => 'required',
      'end_date' => 'required',
      'coef' => 'required'
    ]);

    $current = User::find(Auth::id());
    $school = School::where('id', $current->school_id)->first();

    $monthyear = Monthyear::find($id);

    if (isset($request->start_date)) {
      $monthyear->start_date = $request->start_date;
    }
    $monthyear->end_date = $request->end_date;
    $monthyear->coef = $request->coef;

    if (isset($request->start_date) && $request->start_date > $request->end_date) {

      session()->flash('monthar1', 'alert error');
    } else {
      $monthyear->save();
    }
    return redirect()->route('monthyear-edit', $school->id);
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
