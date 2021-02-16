<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Exam;
use App\School;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    // the authenitfication middleware for the app
    $this->middleware(['verified', 'auth', 'checkUserStatus', 'checkUserSchools', 'scolarSystem']);
  }


  public function index()
  {
    //
    $current = User::find(Auth::id());

    $school = School::all();
    $examAll = Exam::all();
    $exam = Exam::where('school_id', $current->school_id)->get();
    $setting = Setting::where('user_id', Auth::id())->first();

    return view('main.classrooms.page-exams-list')->with(
      [
        'current' => $current,
        'school' => $school,
        'exam' => $exam,
        'examAll' => $examAll,
        'setting' => $setting
      ]
    );
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
      'type' => 'required',
      'date' => 'required'
    ]);

    $current = User::find(Auth::id());

    $exam = new Exam;
    $exam->label = $request->label;
    $exam->type = $request->type;
    $exam->date = $request->date;
    if (isset($request->school)) {
      $exam->school_id = $request->school;
    } else {
      $exam->school_id = $current->school_id;
    }

    $exam->created_user = $current->id;
    $exam->updated_user = $current->id;

    $exam->save();

    return redirect()->route('exam-list');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Exam  $exam
   * @return \Illuminate\Http\Response
   */
  public function show(Exam $exam)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Exam  $exam
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Exam $exam)
  {
    //
    $current = User::find(Auth::id());

    $schoolCur = School::where('id', $current->school_id)->first();
    $school = School::all();

    $exam = Exam::find($id);
    $setting = Setting::where('user_id', Auth::id())->first();

    if ($exam != NULL && ($current->root == true || $exam->school_id == $schoolCur->id)) {
      return view('main.classrooms.page-exams-edit')->with(
        [
          'current' => $current,
          'school' => $school,
          'exam' => $exam,
          'setting' => $setting
        ]
      );
    } else  if ($exam != NULL && ($exam->school_id != $schoolCur->id && $current->root == false)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Exam  $exam
   * @return \Illuminate\Http\Response
   */
  public function update($id, Request $request, Exam $exam)
  {
    //
    //
    $request->validate([
      'label' => 'required',
      'type' => 'required',
      'date' => 'required'
    ]);

    $current = User::find(Auth::id());

    $exam = Exam::find($id);
    $exam->label = $request->label;
    $exam->type = $request->type;
    $exam->date = $request->date;

    $exam->updated_user = $current->id;

    $exam->save();

    return redirect()->route('exam-list');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Exam  $exam
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, Exam $exam)
  {
    //
    $current = User::find(Auth::id());




    $exam = Exam::find($id);
    $schoolCur = School::where('id', $current->school_id)->first();


    if ($exam != NULL && ($current->root == true || $exam->school_id == $schoolCur->id)) {
      $examCopy = $exam;

      $examCopy->deleted_user = $current->id;
      $examCopy->save();


      $exam->delete();

      return redirect()->route('exam-list');
    } else  if ($exam != NULL && ($exam->school_id != $schoolCur->id && $current->root == false)) {
      return view('errors.not-authorized');
    } else {
      return view('errors.404');
    }
  }
}
