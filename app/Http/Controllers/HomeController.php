<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if( Auth::user()->roles == "ADMIN" && auth::user()->status == "ACTIVE"){
                return $next($request);
            }elseif(Auth::user()->roles == "AUDITOR" && auth::user()->status == "ACTIVE"){
                return $next($request);
            }elseif(Auth::user()->roles == "POKJA" && auth::user()->status == "ACTIVE"){
                return $next($request);
            }elseif(Auth::user()->roles == "USER" && auth::user()->status == "ACTIVE"){
                return $next($request);
            }else{
                return redirect('login')->with(Auth::logout())->with('status','USER Anda Inactive');
            }
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->roles == "ADMIN"){
            return view('home');
        } elseif (Auth::user()->roles == "POKJA"){
            return view('pokja');
        }else{
            return view('user');
        }
    }
}
