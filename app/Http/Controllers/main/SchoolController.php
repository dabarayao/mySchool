<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\School;
use App\Schoolyear;
use App\Monthyear;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class SchoolController extends Controller
{

  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus']);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    // settings code for current users
    $setting = Setting::where('user_id', Auth::id())->first();
    // settings code for current users

    // users who's is currently connected
    $current = User::find(Auth::id());
    // users who's is currently connected

    // All users
    $user = User::where([['school_id', '=', null], ['root', '=', false]])->get();
    $userNb = User::where([['school_id', '=', null], ['root', '=', false]])->count();
    // All users


    return view('main.schools.page-schools-add')->with([
      'setting' => $setting,
      'current' => $current,
      'user' => $user,
      'userNb' => $userNb
    ]);
  }

  public function schoolDisplay()
  {

    // auth connected state code sample
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->state == false); {
        $util->state = true;
        $util->save();
      }
    }

    // settings code for current users
    $setting = Setting::where('user_id', Auth::id())->first();
    // settings code for current users


    $schools = school::all()->sortByDesc('created_at');

    return view('main.schools.page-schools-list')->with(['schools' => $schools, 'setting' => $setting]);
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
    $request->validate([
      'schoolname' => 'required',
      'phone' => 'required',
      'dialcode' => 'required',
      'type' => 'required',
      'country' => 'required',
      'area' => 'required',
      'address' => 'required',
      'nbroom' => 'required',
      'building_date' => 'required',
      'funder' => 'required',
      'type_monthyear' => 'required'
    ]);

    if ($request->hasFile('photo')) {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/schools/', $files);
      $resize = Image::make($files)->resize(500, 500)->save('storage/schools/' . basename($picture), 80);
      $path = Storage::url($picture);
    }



    $school = new School;
    $current = User::find(Auth::id());
    $school->name = $request->schoolname;
    $school->phone = $request->phone;
    $school->dialcode = $request->dialcode;
    $school->type = $request->type;
    $school->country = $request->country;
    $school->area = $request->area;
    $school->address = $request->address;
    $school->nb_room = $request->nbroom;

    if ($request->hasFile('photo')) {
      $school->photo = $path;
    }
    $school->building_date = $request->building_date;
    $school->funder = $request->funder;
    $school->type_monthyear = $request->type_monthyear;
    if (isset($request->status)) {
      $school->status = $request->status;
    } else {
      $school->status = true;
    }

    $school->created_user = $current->id;
    $school->updated_user = $current->id;

    $school->save();

    if (Schoolyear::where('school_id', '=', $school->id)->count() == 0) {
      if (isset($request->user)) {
        $schoolyear = new Schoolyear;
        $schoolyear->year = date("Y-m-d");
        $schoolyear->school_id = $school->id;
        $schoolyear->created_user = $request->user;
        $schoolyear->updated_user = $request->user;
        $schoolyear->save();
      } else {
        $schoolyear = new Schoolyear;
        $schoolyear->year = date("Y-m-d");
        $schoolyear->school_id = $school->id;
        $schoolyear->created_user = $current->id;
        $schoolyear->updated_user = $current->id;
        $schoolyear->save();
      }
    }


    if (isset($request->user)) {
      $user = User::find($request->user);
      $user->school_id = $school->id;
      $user->status = $school->status;
      $user->save();
    } else if (!isset($request->user) && $current->root == false) {
      $current->school_id = $school->id;

      $current->save();
    } else {
      $current->school_id = NULL;

      $current->save();
    }

    return redirect()->route('home');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\School  $school
   * @return \Illuminate\Http\Response
   */
  public function show($id, School $school)
  {

    // settings code for current users
    $setting = Setting::where('user_id', Auth::id())->first();
    // settings code for current users

    $schools = School::find($id);

    // all schools users
    if ($schools != NULL) {
      $schooluser = User::where('school_id', $schools->id)->get();
      $schoolyear = Schoolyear::where([['school_id', $schools->id], ['is_over', false]])->first();
      $monthyear = Monthyear::where([['schoolyear_id', $schoolyear->id], ['is_over', false]])->first();
    }
    $current = User::find(Auth::id());

    if ($setting->language == 1) {
      if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en')) {
        $countries = DB::table('countries')->where(['code' => $current->country, 'language' => 1])->value('label');
      }
    } else {
      $countries = DB::table('countries')->where(['code' => $current->country, 'language' => 2])->value('label');
    }

    if ($schools != NULL && ($current->school_id == $schools->id || $current->root == true)) {
      return view('main.schools.page-schools-view')->with([
        'schools' => $schools,
        'schooluser' => $schooluser,
        'setting' => $setting,
        'countries' => $countries,
        'monthyear' => $monthyear
      ]);
    } else if ($schools != NULL && ($current->school_id != $schools->id || $current->root == false)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\School  $school
   * @return \Illuminate\Http\Response
   */
  public function edit($id, School $school)
  {

    // settings code for current users
    $setting = Setting::where('user_id', Auth::id())->first();
    // settings code for current users

    // users who's is currently connected
    $current = User::find(Auth::id());
    // users who's is currently connected

    // All users
    $school = School::find($id);
    // All users




    if ($school != NULL && ($current->school_id == $school->id || $current->root == true)) {
      return view('main.schools.page-schools-edit')->with([
        'setting' => $setting,
        'current' => $current,
        'schools' => $school
      ]);
    } else if ($school != NULL && ($current->school_id != $school->id || $current->root == false)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\School  $school
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, School $school)
  {
    //
    //
    $request->validate([
      'schoolname' => 'required',
      'phone' => 'required',
      'dialcode' => 'required',
      'type' => 'required',
      'country' => 'required',
      'area' => 'required',
      'address' => 'required',
      'nbroom' => 'required',
      'building_date' => 'required',
      'funder' => 'required',
      'type_monthyear' => 'required',
      'quotient' => 'required'
    ]);

    if ($request->hasFile('photo')) {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/schools/', $files);
      $resize = Image::make($files)->resize(500, 500)->save('storage/schools/' . basename($picture), 80);
      $path = Storage::url($picture);
    }



    $school = School::find($id);
    $current = User::find(Auth::id());
    $schooluser = User::where('school_id', $school->id)->get();
    $school->name = $request->schoolname;
    $school->phone = $request->phone;
    $school->dialcode = $request->dialcode;
    $school->type = $request->type;
    $school->country = $request->country;
    $school->area = $request->area;
    $school->address = $request->address;
    $school->nb_room = $request->nbroom;

    if ($request->hasFile('photo')) {
      $school->photo = $path;
    }

    $school->building_date = $request->building_date;
    $school->funder = $request->funder;
    $school->quotient = $request->quotient;
    $school->type_monthyear = $request->type_monthyear;

    if (isset($request->status)) {
      $school->status = $request->status;

      foreach ($schooluser as $schoolusers) {

        $schoolusers->status = $school->status;

        $schoolusers->save();
      }
    } else {
      $school->status = true;
    }
    $school->created_user = $current->id;
    $school->updated_user = $current->id;

    $school->save();

    if ($current->root == true) {
      $current->school_id = NULL;

      $current->save();
    } else {
      $current->school_id = $school->id;

      $current->save();
    }

    return redirect()->route('home');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\School  $school
   * @return \Illuminate\Http\Response
   */
  public function destroy(School $school)
  {
    //
  }
}
