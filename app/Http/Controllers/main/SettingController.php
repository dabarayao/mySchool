<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
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

        $setting = Setting::where('user_id', Auth::id())->first();


        //code for root user or superuser
        $current = User::find(Auth::id());
        //code for root user or superuser

        return view('main.settings.page-account-settings')->with([
          'setting' => $setting,
          'current' => $current]);
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
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->hasFile('photo'))
        {
        //code to store an resize the image
        $files = $request->file('photo');

        $picture = Storage::putFile('public/users/', $files);
        $resize = Image::make($files)->resize(200, 200)->save('storage/users/' . basename($picture), 80);
        $path = Storage::url($picture);

        $user = User::find(Auth::id());
        $user->photo = $path;
        $user->save();

        }

        $setting = Setting::find(Auth::id());
        $setting->theme = $request->theme;
        $setting->language = $request->language;
        $setting->updated_user = Auth::id();
        $setting->save();

        return redirect()->route('settings-display');
    }

    public function updatePass(Request $request){
      $user = User::find(Auth::id());
      dd($request->old_password);
      if($user->password === Hash::make($request->old_password))
      {
        $user->password = Hash::make($request->password);
        session()->forget('error');

        return redirect()->route('settings-display');
      }
      else
      {
        session()->flash('error', 1);
        return redirect()->route('settings-display');
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
