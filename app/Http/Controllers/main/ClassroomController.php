<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Classroom;
use App\School;
use App\User;
use App\Setting;
use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
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


  public function index()
  {
    //
    $current = User::find(Auth::id());

    $school = School::all();
    $classroom = Classroom::where('school_id', $current->school_id)->orderBy('created_at', 'DESC')->get();
    $classroomAll = Classroom::all()->sortByDesc('created_at');
    $setting = Setting::where('user_id', Auth::id())->first();


    return view('main.classrooms.page-classrooms-list')->with([
      'current' => $current,
      'school' => $school,
      'classroom' => $classroom,
      'classroomAll' => $classroomAll,
      'setting' => $setting
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
      'label' => 'required',
      'code' => 'required',
      'description' => 'required',
      'isexam' => 'required'
    ]);

    $current = User::find(Auth::id());

    $classroom = new Classroom;
    $classroom->label = $request->label;
    $classroom->code = $request->code;
    $classroom->description = $request->description;
    $classroom->isexam = $request->isexam;
    if (isset($request->school)) {
      $classroom->school_id = $request->school;
    } else {
      $classroom->school_id = $current->school_id;
    }
    $classroom->created_user = $current->id;
    $classroom->updated_user = $current->id;

    $classroom->save();

    return redirect()->route('classroom-list');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Classroom  $classroom
   * @return \Illuminate\Http\Response
   */
  public function show($id, Classroom $classroom)
  {
    //
    $current = User::find(Auth::id());
    $school = School::all();
    $schoolCur = School::where('id', $current->school_id)->first();
    $setting = Setting::where('user_id', Auth::id())->first();

    $classroom = Classroom::find($id);



    if ($classroom != NULL && ($current->root == true || $schoolCur->id == $classroom->school_id)) {

      return view('main.classrooms.page-classrooms-view')->with([
        'current' => $current,
        'school' => $school,
        'classroom' => $classroom,
        'setting' => $setting
      ]);
    } else if ($classroom != NULL && ($current->root == false && $schoolCur->id != $classroom->school_id)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Classroom  $classroom
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Classroom $classroom)
  {
    //
    $current = User::find(Auth::id());
    $school = School::all();
    $schoolCur = School::where('id', $current->school_id)->first();
    $setting = Setting::where('user_id', Auth::id())->first();

    $classroom = Classroom::find($id);

    if ($classroom->isexam == true) {
      $exam = Exam::where('school_id', $classroom->school_id)->orderBy('created_at', 'DESC')->get();
    }


    if ($classroom != NULL && ($current->root == true || $schoolCur->id == $classroom->school_id)) {

      if ($classroom->isexam == true) {
        return view('main.classrooms.page-classrooms-edit')->with([
          'current' => $current,
          'school' => $school,
          'classroom' => $classroom,
          'exam' => $exam,
          'setting' => $setting
        ]);
      } else {
        return view('main.classrooms.page-classrooms-edit')->with([
          'current' => $current,
          'school' => $school,
          'classroom' => $classroom,
          'setting' => $setting
        ]);
      }
    } else if ($classroom != NULL && ($current->root == false && $schoolCur->id != $classroom->school_id)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Classroom  $classroom
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Classroom $classroom)
  {
    //
    $request->validate([
      'label' => 'required',
      'code' => 'required',
      'description' => 'required',
      'isexam' => 'required'
    ]);

    $current = User::find(Auth::id());
    $schoolCur = School::where('id', $current->school_id)->first();




    if ($classroom != NULL && ($current->root == true || $schoolCur->id == $classroom->school_id)) {

      $classroom = Classroom::find($id);
      $classroom->label = $request->label;
      $classroom->code = $request->code;
      $classroom->description = $request->description;
      $classroom->isexam = $request->isexam;
      if (isset($request->examname)) {
        dd($classroom->exam_id = $request->examname);
      }
      $classroom->updated_user = $current->id;

      $classroom->save();

      return redirect()->route('classroom-list');
    } else if ($classroom != NULL && ($current->root == false && $schoolCur->id != $classroom->school_id)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Classroom  $classroom
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, Classroom $classroom)
  {
    //
    $current = User::find(Auth::id());


    $schoolCur = School::where('id', $current->school_id)->first();

    $classroom = Classroom::find($id);


    if ($classroom != NULL && ($current->root == true || $schoolCur->id == $classroom->school_id)) {

      $classroomCopy = $classroom;

      $classroomCopy->deleted_user = $current->id;
      $classroomCopy->save();


      $classroom->delete();

      return redirect()->route('classroom-list');
    } else if ($classroom != NULL && ($current->root == false && $schoolCur->id != $classroom->school_id)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }
}
