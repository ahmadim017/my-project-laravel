<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use \App\tugas;
use \App\pokja;
class gruppokjaController extends Controller
{
    //
    public function index()
    {
        Date::setlocale('id');
        $id = Auth::user()->id;
        $pokja = pokja::where('id_user','LIKE',"%$id%")->where('status','ACTIVE')->get();
        foreach ($pokja as $p){
            $data = $p->id;
        }
        $tugas = tugas::where('id_pokja','LIKE',"%$data%")->get();
        
        //dd($data);
        return view('pokjaview.daftarpaket',['tugas' => $tugas]);
    }
    public function detail(Request $request, $id)
    {
        Date::setlocale('id');
        $user = \App\user::where('status','ACTIVE')->where('roles','POKJA')->get();
        $tugas = tugas::findOrfail($id);
        $idp = $tugas->id_pokja;
        $pokja = pokja::where('id','LIKE',"%$idp%")->Get();
        foreach ($pokja as $p){
            $data = json_decode($p->id_user);
        }
        //dd($data);
        return view('pokjaview.detail',['tugas' => $tugas,'user' => $user,'pokja' => $pokja,'data' => $data]);
    }
    public function dash()
    {
        $id = Auth::user()->id;
        $pokja = pokja::where('id_user','LIKE',"%$id%")->where('status','ACTIVE')->get();
        foreach ($pokja as $p){
            $data = $p->id;
        }
        $tugas = tugas::where('id_pokja','LIKE',"%$data%")->count();
        //dd($tugas);
        return view('pokjaview.dash',['tugas' => $tugas]);
    }
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function($request, $next){
            if(Auth::user()->roles == "POKJA"){
                return $next($request);
            }else{
                return redirect()->guest('/')->with(Auth::logout());
            }
        });
    }
}
