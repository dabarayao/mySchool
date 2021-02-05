<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\School;
use App\Schoolyear;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolyearController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus', 'checkUserSchools', 'ScolarSystem']);
  }


  public function index($id)
  {
    //
    $school = School::find($id);
    $current = User::find(Auth::id());
    $setting = Setting::where('user_id', Auth::id())->first();

    if ($school != NULL) {
      $schoolyear = Schoolyear::where([['school_id', $school->id], ['is_over', false]])->first();
      $checker = 1;
    } else {
      $checker = NULL;
    }

    if ($checker == NULL) {
      return view('errors.404');
    } else if ($schoolyear != NULL && $school->id != $current->school_id) {
      return view('errors.not-authorized');
    } else {
      return view('main.schoolsyear.page-schoolyears')->with(['schoolyear' => $schoolyear, 'school' => $school, 'setting' => $setting]);
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Schoolyear  $schoolyear
   * @return \Illuminate\Http\Response
   */
  public function show(Schoolyear $schoolyear)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Schoolyear  $schoolyear
   * @return \Illuminate\Http\Response
   */
  public function edit(Schoolyear $schoolyear)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Schoolyear  $schoolyear
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Schoolyear $schoolyear)
  {
    //
    $request->validate([
      'year' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'school' => 'required'
    ]);

    $schoolyear = Schoolyear::find($id);

    if (strtotime($request->start_date) > strtotime($request->end_date)) {

      session()->flash('scolar1', 'the start date is bigger than the end date');
    } else {
      $current = User::find(Auth::id());


      $schoolyear->year = date("Y-m-d");
      $schoolyear->start_date = $request->start_date;
      $schoolyear->end_date = $request->end_date;
      $schoolyear->school_id = $request->school;
      $schoolyear->created_user = $current->id;
      $schoolyear->updated_user = $current->id;
      $schoolyear->save();
    }

    return redirect()->route('schoolsyear-view', $request->school);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Schoolyear  $schoolyear
   * @return \Illuminate\Http\Response
   */
  public function destroy(Schoolyear $schoolyear)
  {
    //
  }
}
