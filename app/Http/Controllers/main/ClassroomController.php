<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Classroom;
use App\School;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $current = User::find(Auth::id());

    $school = School::all();
    $classroom = Classroom::where('school_id', $current->school_id)->get();
    $classroomAll = Classroom::all();
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
    $setting = Setting::where('user_id', Auth::id())->first();

    $classroom = Classroom::find($id);

    return view('main.classrooms.page-classrooms-view')->with([
      'current' => $current,
      'school' => $school,
      'classroom' => $classroom,
      'setting' => $setting
    ]);
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
    $setting = Setting::where('user_id', Auth::id())->first();

    $classroom = Classroom::find($id);

    return view('main.classrooms.page-classrooms-edit')->with([
      'current' => $current,
      'school' => $school,
      'classroom' => $classroom,
      'setting' => $setting
    ]);
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
    $current = User::find(Auth::id());

    $classroom = Classroom::find($id);
    $classroom->label = $request->label;
    $classroom->code = $request->code;
    $classroom->isexam = $request->isexam;
    $classroom->updated_user = $current->id;

    $classroom->save();

    return redirect()->route('classroom-list');
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

    $classroom = Classroom::find($id);
    $classroomCopy = $classroom;

    $classroomCopy->deleted_user = $current->id;
    $classroomCopy->save();


    $classroom->delete();

    return redirect()->route('classroom-list');
  }
}
