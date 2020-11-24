<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    { 
        $user = \App\User::paginate(10);
        $keyword = $request->get('keyword');
        if ($keyword) {
            $user = \App\User::where('name','LIKE',"%$keyword%")->get();
        }
        return view('users.index',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:100|unique:users",
            "roles" => "required",
            "alamat" => "required|min:20|max:200",
            "telpon" => "required|digits_between:10,12",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ])->validate();
        
        $user = new \App\User;
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->telpon = $request->get('telpon');
        $user->alamat = $request->get('alamat');
        $user->password = \Hash::make($request->get('password'));
        $user->roles = $request->get('roles');

        if ($request->file('avatar')) {
            $file = $request->file('avatar')->store('avatar','public');
            $user->avatar = $file;
        }
        $user->save();

        return redirect()->route('users.create')->with('status','Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::findOrfail($id);
        return view('users.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrfail($id);
        return view('users.edit',['user' => $user]);
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
        $validation = Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "roles" => "required",
            "alamat" => "required|min:20|max:200",
            "telpon" => "required|digits_between:10,12",
        ])->validate();

        $user = \App\User::findOrfail($id);
        $user->name = $request->get('name');
        $user->alamat = $request->get('alamat');
        $user->telpon = $request->get('telpon');
        $user->status = $request->get('status');
        $user->roles = $request->get('roles');
        if ($request->file('avatar')) {

            if ($user->avatar && file_exists(storage_path('app/public/'.$user->avatar))){
                \Storage::delete('public/'.$user->avatar);
            }
            $file = $request->file('avatar')->store('avatar','public');
            $user->avatar = $file;
        }
        $user->save();
        return redirect()->route('users.edit',[$id])->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrfail($id);
        $user->delete();
        return redirect()->route('users.index',[$id])->with('Status','Data Berhasil dihapus');
    }


    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware(function($request, $next){
            if(Auth::user()->roles == "ADMIN"){
                return $next($request);
            }
            return redirect()->guest('/404');
        });
    }
}
