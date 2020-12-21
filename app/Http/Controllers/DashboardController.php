<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware(['verified', 'auth', 'checkUserStatus']);
  }

  //ecommerce
  public function dashboardEcommerce()
  {
    // auth connected state code sample
    if (Auth::check()) {
      $util = User::find(Auth::id());
      if ($util->state == false); {
        $util->state = true;
        $util->save();
      }
    }



    return view('pages.dashboard-ecommerce');
  }
  // analystic
  public function dashboardAnalytics()
  {


    return view('pages.dashboard-analytics');
  }
}
