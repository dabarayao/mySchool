<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class UsersController extends Controller
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
    // auth connected state code sample
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->state == false); {
        $util->state = true;
        $util->save();
      }
    }


    //code for root user or superuser
    $superuser = User::find(Auth::id());
    //code for root user or superuser

    $user = User::all()->sortByDesc('created_at');

    return view('main.users.page-users-list')->with(
      [
        'superuser' => $superuser,
        'user' => $user
      ]
    );
  }

  /* Display store form */
  public function storeDisplay()
  {


    //code for root user or superuser
    $superuser = User::find(Auth::id());
    //code for root user or superuser


    return view('main.users.page-users-add')->with(
      [
        'superuser' => $superuser
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
    //
    $files = $request->file('photo');

    $picture = Storage::putFile('public', $files);
    $resize = Image::make($files)->resize(200, 200)->save('storage/' . basename($picture), 80);
    $path = Storage::url($picture);


    $user = new User;
    $user->photo = $path;
    $user->familyname = $request->familyname;
    $user->givenname = $request->givenname;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->gender = $request->gender;
    $user->birthdate = $request->birthdate;
    $user->country = $request->country;
    $user->dialcode = $request->dialcode;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->job = $request->job;
    if (isset($request->status)) {
      $user->status = $request->status;
    }

    $user->save();

    return redirect()->route('users-list');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
    $superuser = User::find(Auth::id());
    $user = User::find($id);

    $age = floor((time() - strtotime($user->birthdate)) / 31556926);


    if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
      $countries = DB::table('countries')->where(['code' => $user->country, 'language' => 1])->value('label');
    } else {
      $countries = DB::table('countries')->where(['code' => $user->country, 'language' => 2])->get('label');
    }


    return view('main.users.page-users-view')->with([
      'user' => $user,
      'country' => $countries,
      'superuser' => $superuser,
      'age' => $age
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Request $request)
  {
    //
    $superuser = User::find(Auth::id());
    $user = User::find($id);


    return view('main.users.page-users-edit')->with(['user' => $user, 'superuser' => $superuser]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    if($request->hasFile('photo'))
    {
    $files = $request->file('photo');

    $picture = Storage::putFile('public', $files);
    $resize = Image::make($files)->resize(200, 200)->save('storage/' . basename($picture), 80);
    $path = Storage::url($picture);
    }


    $user = User::find($id);
    if ($request->hasFile('photo')) {
    $user->photo = $path;
    }
    $user->familyname = $request->familyname;
    $user->givenname = $request->givenname;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->gender = $request->gender;
    $user->birthdate = $request->birthdate;
    $user->country = $request->country;
    $user->dialcode = $request->dialcode;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->job = $request->job;
    if (isset($request->status)) {
      $user->status = $request->status;
    }

    $user->save();

    return redirect()->route('users-list');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
