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
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class StudentController extends Controller
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
      $classroom = Classroom::where('school_id', $current->school_id)->get();
    } else {
      $classroom = Classroom::all();
    }


    if ($current->root == false) {

      $student =  DB::table('students')
        ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
        ->join('schools', 'schools.id', '=', 'classrooms.school_id')
        ->select('students.*', 'classrooms.*', 'schools.name', 'schools.id')
        ->where([
          ['students.deleted_at', '=', NULL],
          ['schools.deleted_at', '=', NULL],
          ['classrooms.deleted_at', '=', NULL],
          ['schools.id', '=', $current->school_id]
        ])
        ->get();
    } else {

      $student =  DB::table('students')
        ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
        ->join('schools', 'schools.id', '=', 'classrooms.school_id')
        ->select('students.*', 'classrooms.*', 'schools.name', 'schools.id')
        ->where([
          ['students.deleted_at', '=', NULL],
          ['schools.deleted_at', '=', NULL],
          ['classrooms.deleted_at', '=', NULL],
        ])
        ->get();
    }

    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.students.page-students-list')->with([
      'current' => $current,
      'school' => $school,
      'setting' => $setting,
      'student' => $student,
      'classroom' => $classroom
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
      'reg_number' => 'required',
      'familyname' => 'required',
      'givenname' => 'required',
      'familyname' => 'required',
      'gender' => 'required',
      'country' => 'required',
      'dialcode' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'is_oriented' => 'required',
      'is_handicap' => 'required'
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

    $student = new Student;


    if ($request->hasFile('photo')) {
      $student->photo = $path;
    }

    $student->reg_number = $request->reg_number;
    $student->familyname = $request->familyname;
    $student->givenname = $request->givenname;
    $student->gender = $request->gender;
    $student->birthdate = $request->birthdate;
    $student->country = $request->country;
    $student->dialcode = $request->dialcode;
    $student->phone = $request->phone;
    $student->address = $request->address;
    $student->is_oriented = $request->is_oriented;
    $student->is_handicap = $request->is_handicap;

    if ($request->is_oriented == 1) {
      $student->oriented_percent = $request->oriented_percent;
    }

    if ($request->is_handicap == 1) {
      $student->label_handicap = $request->label_handicap;
      $student->desc_handicap = $request->desc_handicap;
    }

    $student->classroom_id = $request->classroom_id;
    $student->created_user = $current->id;
    $student->updated_user = $current->id;



    $student->save();

    return redirect()->route('student-list');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function show($id, Student $student)
  {
    //
    $student = Student::find($id);
    $school = School::all();
    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.students.page-students-view')->with([
      'student' => $student,
      'school' => $school,
      'setting' => $setting
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Student $student)
  {
    //
    $student = Student::find($id);
    $school = School::all();
    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.students.page-students-edit')->with([
      'student' => $student,
      'school' => $school,
      'setting' => $setting
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Student $student)
  {
    //
    $request->validate([
      'familyname' => 'required',
      'givenname' => 'required',
      'familyname' => 'required',
      'email' => 'required',
      'password' => 'required',
      'gender' => 'required',
      'country' => 'required',
      'dialcode' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'is_oriented' => 'required',
      'is_handicap' => 'required'
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

    $student = Student::find($id);


    if ($request->hasFile('photo')) {
      $student->photo = $path;
    }
    $student->familyname = $request->familyname;
    $student->givenname = $request->givenname;
    $student->gender = $request->gender;
    $student->birthdate = $request->birthdate;
    $student->country = $request->country;
    $student->dialcode = $request->dialcode;
    $student->phone = $request->phone;
    $student->address = $request->address;
    $student->is_oriented = $request->is_oriented;
    $student->is_handicap = $request->is_handicap;

    if ($request->oriented_percent && $request->label_handicap) {
      $student->oriented_percent = $request->oriented_percent;
      $student->label_handicap = $request->label_handicap;
      $student->desc_handicap = $request->desc_handicap;
    }

    $student->classroom_id = $request->classroom_id;
    $student->updated_user = $current->id;



    $student->save();

    return redirect()->route('student-list');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, Student $student)
  {
    //
    $student = Student::find($id);

    // code to archive deleted users
    $studentCopy = $student;
    $current = User::find(Auth::id());

    $studentCopy->deleted_user = $current->id;
    $studentCopy->save();
    $student->delete();

    return redirect()->route('users-list');
  }
}
