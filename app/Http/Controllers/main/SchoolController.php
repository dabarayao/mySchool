<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\School;
use App\Setting;
use App\User;
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

      // users who's is currently connected
      $current = User::find(Auth::id());
      // users who's is currently connected

      // All users
      $user = User::all();
      // All users






      return view('main.schools.page-schools-add')->with([
        'setting' => $setting,
        'current' => $current,
        'user' => $user]);
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

        if($request->hasFile('photo'))
        {
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
        if($request->hasFile('photo'))
        {
        $school->photo = $path;
        }
        $school->building_date = $request->building_date;
        $school->funder = $request->funder;
        $school->type_monthyear = $request->type_monthyear;
        if(isset($request->status))
        {
        $school->status = $request->status;
        }
        else
        {
        $school->status = true;
        }
        $school->created_user = $current->id;
        $school->updated_user = $current->id;

        $school->save();

        if(isset($request->user))
        {
          $user= User::find($request->user);
          $user->school_id = $school->id;
          $user->status = $school->status;
          $user->save();
        }
        else
        {
          $current->school_id = $school->id;

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
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
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
