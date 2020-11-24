<?php

namespace App\Http\Controllers;

use App\daftarpokja;
use Illuminate\Http\Request;
use App\pokja;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
class pokjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $pokja = \App\pokja::paginate(10);
        return view('pokja.index',['pokja' => $pokja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \App\daftarpokja::where('status','=','ACTIVE')->where('role','=','POKJA')->get();
        return view('pokja.create',['user' => $user]);
    }
//salah
    //public function tambah($id)
    //{
      //  $user = \App\User::where('status','=','ACTIVE')->where('roles','=','POKJA')->get();
      //  $pokja = \App\pokja::findOrfail($id);
       // return view('pokja.tambahdatapokja',['pokja' => $pokja,'user' => $user]);
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "namapokja" => "required|min:5|max:15",
            "status" => "required",
            "tglpembuatan" => "required"
        ])->validate();

        $pokja = new pokja;
        $pokja->namapokja = $request->get('namapokja');
        $pokja->status = $request->get('status');
        $pokja->tglpembuatan = $request->get('tglpembuatan');
        $pokja->id_user = json_encode($request->get('id_user'));
        $pokja->save();

        return redirect()->route('pokja.create')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DATE::setlocale('id');
        $user = \App\daftarpokja::all();
        $pokja = pokja::findOrfail($id);
        $data = json_decode($pokja->id_user);
        return view('pokja.show',['pokja' => $pokja,'user' => $user,'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request, $id)
    {
        //$datapokja = DB::table('datapokja')->Join('users','datapokja.id_user','=','users.id')
        //->where('id_pokja','=',[$id])->select('datapokja.*')->get();
        $pokja = pokja::findOrfail($id);
        $user = \App\daftarpokja::where('status','=','ACTIVE')->where('role','=','POKJA')->get();
        $datapokja = json_decode($pokja->id_user);
        //dd($datapokja);
        return view('pokja.edit',['pokja' => $pokja,'datapokja' => $datapokja,'user' => $user]);
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
            "namapokja" => "required|min:5|max:15",
            "status" => "required",
            "tglpembuatan" => "required",
            "id_user" => "required"
        ])->validate();
        $data = json_encode($request->get('id_user'));
        $pokja = pokja::findOrfail($id);
        $pokja->namapokja = $request->get('namapokja');
        $pokja->status = $request->get('status');
        $pokja->tglpembuatan = $request->get('tglpembuatan');
        $pokja->id_user = $data;
        //dd($data);
        $pokja->save();
        return redirect()->route('pokja.edit',[$id])->with('status','Data Berhasil diupdate');
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
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            if(Auth::user()->roles == "ADMIN" ) {
                return $next($request);
            }else{
                return redirect()->guest('/404');
            }
        });
    }
}
