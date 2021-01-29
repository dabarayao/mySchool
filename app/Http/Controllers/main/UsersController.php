<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

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

    //code for settings implementation
    $setting = Setting::where('user_id', Auth::id())->first();

    $user = User::all()->sortByDesc('created_at');

    return view('main.users.page-users-list')->with(
      [
        'superuser' => $superuser,
        'user' => $user,
        'setting' => $setting
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
    $request->validate([
      'photo' => 'required',
      'familyname' => 'required',
      'givenname' => 'required',
      'familyname' => 'required',
      'email' => 'required',
      'password' => 'required',
      'gender' => 'required',
      'country' => 'required',
      'dialcode' => 'required',
      'phone' => 'required',
      'job' => 'required',
      'address' => 'required',
    ]);

    if (User::where('email', $request->email)->count() == 0)
    {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/users/', $files);
      $resize = Image::make($files)->resize(200, 200)->save('storage/users/' . basename($picture), 80);
      $path = Storage::url($picture);



      $user = new User;
      $current = User::find(Auth::id());
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
      $user->created_user = $current->id;
      $user->updated_user = $current->id;
      if (isset($request->root)) {
      $user->root = $request->root;
      }
      if (isset($request->status)) {
        $user->status = $request->status;
      }

      if ($current->root == false) {
        $user->school_id = $current->school_id;
      }


        $user->save();

        $setting = new Setting;
        $setting->theme = "semi-dark";
        $setting->language = 1;
        $setting->user_id = User::where('email', $request->email)->value('id');
        $setting->created_user = $current->id;
        $setting->updated_user = $current->id;

        $setting->save();


        return redirect()->route('users-list');
    }
    else
    {
      session()->flash('emailroradd', 1);
      return redirect()->route('users-list');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

    // auth connected state code sample
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->state == false); {
        $util->state = true;
        $util->save();
      }
    }

    //
    $superuser = User::find(Auth::id());
    $user = User::find($id);
    $setting = Setting::where('user_id', Auth::id())->first();


    // code to calculate age of hte users
    if($user != NULL)
    {
      $age = floor((time() - strtotime($user->birthdate)) / 31556926);


      if ($setting->language == 1)
      {
        if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en') ) {
          $countries = DB::table('countries')->where(['code' => $user->country, 'language' => 1])->value('label');
        }
      }
      else {
        $countries = DB::table('countries')->where(['code' => $user->country, 'language' => 2])->value('label');
      }




      $write_user = User::find($user->created_user);
      $edit_user = User::find($user->updated_user);

    }


    if($user != NULL)
    {
      return view('main.users.page-users-view')->with([
        'user' => $user,
        'country' => $countries,
        'superuser' => $superuser,
        'age' => $age,
        'writeby' => $write_user,
        'editby' => $edit_user,
        'setting' => $setting
      ]);
    }
    else
    {
      return view('errors.404');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id, Request $request)
  {

    // auth connected state code sample
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->state == false); {
        $util->state = true;
        $util->save();
      }
    }

    //
    $superuser = User::find(Auth::id());
    $user = User::find($id);
    $setting = Setting::where('user_id', Auth::id())->first();


    return view('main.users.page-users-edit')->with([
      'user' => $user,
      'superuser' => $superuser,
      'setting' => $setting]);
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
      'job' => 'required',
      'address' => 'required',
    ]);

    if (User::where('email', $request->email)->count() == 0)
    {
      if($request->hasFile('photo'))
      {
      //code to store an resize the image
      $files = $request->file('photo');

      $picture = Storage::putFile('public/users/', $files);
      $resize = Image::make($files)->resize(200, 200)->save('storage/users/' . basename($picture), 80);
      $path = Storage::url($picture);
      }


      $user = User::find($id);
      $current = User::find(Auth::id());
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
      $user->updated_user = $current->id;
      if (isset($request->status)) {
        $user->status = $request->status;
      }

      if ($current->root == false)
      {
        $user->school_id = $current->school_id;
      }

      $user->save();

      $user_set = User::where('email', '=', $request->email)->value('id');
      if( Setting::where('user_id', '=', $user_set)->count() == 0)
      {

      $setting = new Setting;
      $setting->theme = "semi-dark";
      $setting->language = 1;
      $setting->user_id = User::where('email', $request->email)->value('id');
      $setting->created_user = $current->id;
      $setting->updated_user = $current->id;
      $setting->save();
      }

      return redirect()->route('users-list');

    }
    else
    {
      $user = User::find($id);
      session()->flash('emailroredit', $request->email);
      return redirect()->route('users-edit-form', $user->id);
    }
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $user = User::find($id);

    // code to archive deleted users
    $userCopy = $user;
    $current = User::find(Auth::id());
    $userCopy->deleted_user = $current->id;
    $userCopy->save();


    $user->delete();


    return redirect()->route('users-list');
  }
}
