<?php

namespace App\Http\Controllers\main;

use App\Classroom;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\School;
use Illuminate\Support\Facades\Auth;
use App\Setting;
use App\User;
use App\Kins;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class KinsContoller extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus', 'checkUserSchools', 'checkUserClassrooms', 'scolarSystem']);
  }


  public function index()
  {
    //
    $current = User::find(Auth::id());

    $school = School::all();





    if ($current->root == false) {

      $kins =  Kins::where('school_id', $current->school_id)->get();
    } else {

      $kins = Kins::all();
    }


    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.students.page-kins-list')->with([
      'current' => $current,
      'school' => $school,
      'setting' => $setting,
      'student' => $kins
    ]);
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
      'familyname' => 'required',
      'givenname' => 'required',
      'gender' => 'required',
      'country' => 'required',
      'dialcode' => 'required',
      'birthdate' => 'required',
      'birthcity' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'job' => 'required',
      'password' => 'required',
      'email' => 'required'
    ]);

    $current = User::find(Auth::id());

    if ($request->hasFile('photo')) {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/kins', $files);
      $resize = Image::make($files)->resize(300, 300)->save('storage/kins' . basename($picture), 80);
      $path = Storage::url($picture);
    }


    $current = User::find(Auth::id());

    $kins = new Student;


    if ($request->hasFile('photo')) {
      $kins->photo = $path;
    }

    $kins->familyname = $request->familyname;
    $kins->givenname = $request->givenname;
    $kins->gender = $request->gender;
    $kins->birthdate = $request->birthdate;
    $kins->birthcity = $request->birthcity;
    $kins->country = $request->country;
    $kins->dialcode = $request->dialcode;
    $kins->phone = $request->phone;
    $kins->address = $request->address;
    $kins->email = $request->is_oriented;
    $kins->job = $request->is_handicap;
    $kins->password = $request->password;


    $kins->classroom_id = $request->classroom_id;
    $kins->created_user = $current->id;
    $kins->updated_user = $current->id;



    $kins->save();

    return redirect()->route('student-list');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Student  $kins
   * @return \Illuminate\Http\Response
   */
  public function show($id, Student $kins)
  {
    //
    $current = User::find(Auth::id());
    $kins = Student::find($id);
    $setting = Setting::where('user_id', Auth::id())->first();
    $classroom = Classroom::find($kins->classroom_id);
    $school = School::find($classroom->school_id);

    if ($setting->language == 1) {
      if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en')) {
        $countries = DB::table('countries')->where(['code' => $kins->country, 'language' => 1])->value('label');
      }
    } else {
      $countries = DB::table('countries')->where(['code' => $kins->country, 'language' => 2])->value('label');
    }

    return view('main.students.page-kins-view')->with([
      'current' => $current,
      'student' => $kins,
      'school' => $school,
      'classroom' => $classroom,
      'setting' => $setting,
      'countries' => $countries
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Student  $kins
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Student $kins)
  {
    //
    $current = User::find(Auth::id());
    $kins = Student::find($id);
    $classroom = Classroom::find($kins->classroom_id);
    $school = School::find($classroom->school_id);
    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.students.page-kins-edit')->with([
      'current' => $current,
      'student' => $kins,
      'school' => $school,
      'classroom' => $classroom,
      'setting' => $setting
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Student  $kins
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Student $kins)
  {
    //
    $request->validate([
      'familyname' => 'required',
      'givenname' => 'required',
      'gender' => 'required',
      'country' => 'required',
      'dialcode' => 'required',
      'birthdate' => 'required',
      'birthcity' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'job' => 'required',
      'password' => 'required',
      'email' => 'required'
    ]);

    $current = User::find(Auth::id());

    if ($request->hasFile('photo')) {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/students', $files);
      $resize = Image::make($files)->resize(300, 300)->save('storage/students' . basename($picture), 80);
      $path = Storage::url($picture);
    }


    $current = User::find(Auth::id());

    $kins = Student::find($id);


    if ($request->hasFile('photo')) {
      $kins->photo = $path;
    }
    $kins->familyname = $request->familyname;
    $kins->givenname = $request->givenname;
    $kins->gender = $request->gender;
    $kins->birthdate = $request->birthdate;
    $kins->birthcity = $request->birthcity;
    $kins->country = $request->country;
    $kins->dialcode = $request->dialcode;
    $kins->phone = $request->phone;
    $kins->address = $request->address;
    $kins->email = $request->is_oriented;
    $kins->job = $request->is_handicap;
    $kins->password = $request->password;


    $kins->updated_user = $current->id;



    $kins->save();

    return redirect()->route('kins-list');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Student  $kins
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, Student $kins)
  {
    //
    $kins = Kins::find($id);

    // code to archive deleted users
    $studentCopy = $kins;
    $current = User::find(Auth::id());

    $studentCopy->deleted_user = $current->id;
    $studentCopy->save();
    $kins->delete();

    return redirect()->route('kins-list');
  }
}
