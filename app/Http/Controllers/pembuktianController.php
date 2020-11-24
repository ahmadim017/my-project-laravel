<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class pembuktianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Date::setlocale('id');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        $pembuktian = \App\pembuktian::orderBy('id','DESC')->get();
        
        //$pembuktian = \App\pembuktian::with('usulan')->WhereHas('usulan', function ($q) use($keyword){
        //$q->where('namapaket','LIKE','%'. $keyword .'%');
         //})->orderBy('id','DESC')->paginate(10);
        
        return view('pembuktian.index',['pembuktian' => $pembuktian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas = \App\tugas::all();
        //$usulan = \App\usulan::all();
        return view('pembuktian.create',['tugas'=> $tugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "nopembuktian" => "required",
            "tglpembuktian" => "required",
            "id_tugas" => "required",
            "dokumentasi" => "required",
            "file_pembuktian" => "required"
        ])->validated();

        $pembuktian = new \App\pembuktian;
        $pembuktian->nopembuktian = $request->get('nopembuktian');
        $pembuktian->tglpembuktian = $request->get('tglpembuktian');
        $pembuktian->id_tugas = $request->get('id_tugas');
       // $pembuktian->id_usulan = $request->get('id_usulan');
        if ($request->hasfile('dokumentasi')){
           foreach($request->file('dokumentasi') as $foto){
               $name = $foto->getClientOriginalName();
               $foto->move(public_path().'/foto_dokumentasi/',$name);
               $data[] = $name;
           }
           $pembuktian->dokumentasi= json_encode($data);
        }
        if ($request->file('file_pembuktian')){
            $file = $request->file('file_pembuktian')->store('file_pembuktian','public');
            $pembuktian->file_pembuktian = $file;
            $pembuktian->nama_file = $request->file('file_pembuktian')->getClientOriginalName();
            
        }
        $pembuktian->created_by = Auth::user()->id;
        $pembuktian->save();
        return redirect()->route('pembuktian.create')->with('status','Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Date::setlocale('id');
        $pembuktian = \App\pembuktian::findOrfail($id);
        //$tglpembuktian = Date::createFromDate($pembuktian->tglpembuktian)->format('j F Y');
        //dd($tglpembuktian);
        $data = json_decode($pembuktian->dokumentasi);
        return view('pembuktian.show',['pembuktian' => $pembuktian,'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = \App\tugas::all();
        //$usulan = \App\usulan::all();
        $pembuktian = \App\pembuktian::findOrfail($id);
        return view('pembuktian.edit',['pembuktian' => $pembuktian,'tugas' => $tugas]);
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
        $validation = Validator::make($request->All(),[
            "nopembuktian" => "required",
            "tglpembuktian" => "required",
            "id_tugas" => "required"
        ])->validated();
        
        $pembuktian = \App\pembuktian::findOrfail($id);
        $pembuktian->nopembuktian = $request->get('nopembuktian');
        $pembuktian->tglpembuktian = $request->get('tglpembuktian');
        $pembuktian->id_tugas = $request->get('id_tugas');
       // $pembuktian->id_usulan = $request->get('id_usulan');
        $pembuktian->updated_by = auth::user()->id;
        if ($request->file('file_pembuktian')){
            if ($pembuktian->file_pembuktian && file_exists(storage_path('app/public/'.$pembuktian->file_pembuktian))){
                storage::delete('public/'.$pembuktian->file_pembuktian);
            }
            $file = $request->file('file_pembuktian')->store('file_pembuktian','public');
            $pembuktian->file_pembuktian = $file;
            $pembuktian->nama_file = $request->file('file_pembuktian')->getClientOriginalName(); 
        }
        
        if ($request->HasFile('dokumentasi')){
            $img = json_decode($pembuktian->dokumentasi);
            foreach ($img as $im){
            $image_path = public_path('/foto_dokumentasi/'.$im);
            if(file_exists($image_path)){
            \File::delete($image_path);
            }
            }
            foreach($request->file('dokumentasi') as $foto){
                $name = $foto->getClientOriginalName();
                $foto->move(public_path().'/foto_dokumentasi/',$name);
                $data[] = $name;
            }
            $pembuktian->dokumentasi= json_encode($data);
        }
        $pembuktian->save();
        return redirect()->route('pembuktian.edit',[$id])->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembuktian = \App\pembuktian::findOrfail($id);
        if ($pembuktian->file_pembuktian && file_exists(storage_path('app/public/'.$pembuktian->file_pembuktian))){
        Storage::delete('public/'. $pembuktian->file_pembuktian);
        }
        $img = json_decode($pembuktian->dokumentasi);
        foreach ($img as $im){
        $image_path = public_path('/foto_dokumentasi/'.$im);
        if(file_exists($image_path)){
            \File::delete($image_path);
            }
        }
        $pembuktian->delete();
        return redirect()->route('pembuktian.index')->with('Status','Data Berhasil dihapus');
    }
    
    public function download($id)
    {
        $pembuktian = \App\pembuktian::findOrfail($id);
        return response()->download(storage_path('app/public/'. $pembuktian->file_pembuktian));
    } 

    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if( Auth::user()->roles == "ADMIN"){
                return $next($request);
            }elseif(Auth::user()->roles == "AUDITOR"){
                return $next($request);
            }elseif(Auth::user()->roles == "USER"){
                return $next($request);
            }else{
                return redirect()->guest('/404');
            }
        });
    }

}
