<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class usulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        Date::setlocale('id');
        $usulan = \App\usulan::orderBy('id','DESC')->get();
        //$keyword = $request->get('keyword');
        //if ($keyword) {
          //  $usulan = \App\usulan::where('namapaket','LIKE',"%$keyword%")->get();
        //}
        return view('usulan.index',['usulan' => $usulan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = \App\kategori::all();
        $opd = \App\opd::where('status','ACTIVE')->get();
        $dana = \App\dana::all();
        $usul = \App\usul::all();
        $ta = \App\tahunanggaran::all();
        return view('usulan.create',['kategori' => $kategori,'opd' => $opd,'dana' => $dana,'usul' => $usul,'ta' => $ta]);
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
            "nousul" => "required",
            "tglusul" => "required",
            "namapaket" => "required|min:5",
            "pagu" => "required",
            "hps" => "required",
            "ta" => "required",
            "sumberdana" => "required",
            "id_opd" => "required",
            "kategori" => "required",
            "jangkawaktu" => "required",
            "mak" => "required",
            "usul" => "required",
            "file_usulan" => "required|file|mimes:pdf|max:5048"
        ])->validated();

        $rupiah = $request->get('pagu');
        $pagu = preg_replace("/[^0-9]/","", $rupiah);
        $pagufix = (int) $pagu;

        $rupiah1 = $request->get('hps');
        $hps = preg_replace("/[^0-9]/","", $rupiah1);
        $hpsfix = (int) $hps;
        //dd($hpsfix);
        $usulan = new \App\usulan;
        $usulan->nousul = $request->get('nousul');
        $usulan->tglusul = $request->get('tglusul');
        $usulan->namapaket = $request->get('namapaket');
        $usulan->pagu = $pagufix;
        $usulan->hps = $hpsfix;
        $usulan->ta = $request->get('ta');
        $usulan->sumberdana = $request->get('sumberdana');
        $usulan->id_opd = $request->get('id_opd');
        $usulan->kategori = $request->get('kategori');
        $usulan->jangkawaktu = $request->get('jangkawaktu');
        $usulan->mak = $request->get('mak');
        $usulan->usul = $request->get('usul');
        $usulan->created_by = Auth::user()->id;
        if ($request->file('file_usulan')) {
            $file = $request->file('file_usulan')->store('file_usulan','public');
            $usulan->file_usulan = $file;
            $usulan->tittle = $request->file('file_usulan')->getClientOriginalName();
        }
        $usulan->save();
        return redirect()->route('usulan.create')->with('status','Data Berhasil disimpan');
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
        $usulan = \App\usulan::findOrfail($id);
        return view('usulan.show',['usulan' => $usulan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opd = \App\opd::all();
        $kategori = \App\kategori::all();
        $ta = \App\tahunanggaran::all();
        $dana = \App\dana::all();
        $usul = \App\usul::all();
        $usulan = \App\usulan::findOrfail($id);
        return view('usulan.edit',['usulan'=> $usulan,'kategori' => $kategori,'opd' => $opd,'dana' => $dana,'usul' => $usul,'ta' => $ta]);
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
            "nousul" => "required",
            "tglusul" => "required",
            "namapaket" => "required|min:5",
            "pagu" => "required",
            "hps" => "required",
            "ta" => "required",
            "sumberdana" => "required",
            "id_opd" => "required",
            "kategori" => "required",
            "jangkawaktu" => "required",
            "mak" => "required",
            "usul" => "required",
            "file_usulan" => "required|file|mimes:pdf|max:5048"
        ])->validated();
        
        $rupiah = $request->get('pagu');
        $pagu = preg_replace("/[^0-9]/","", $rupiah);
        $pagufix = (int) $pagu;

        $rupiah1 = $request->get('hps');
        $hps = preg_replace("/[^0-9]/","", $rupiah1);
        $hpsfix = (int) $hps;

        $usulan = \App\usulan::findOrfail($id);
        $usulan->nousul = $request->get('nousul');
        $usulan->tglusul = $request->get('tglusul');
        $usulan->namapaket = $request->get('namapaket');
        $usulan->pagu = $pagufix;
        $usulan->hps = $hpsfix;
        $usulan->ta = $request->get('ta');
        $usulan->sumberdana = $request->get('sumberdana');
        $usulan->id_opd = $request->get('id_opd');
        $usulan->kategori = $request->get('kategori');
        $usulan->jangkawaktu = $request->get('jangkawaktu');
        $usulan->mak = $request->get('mak');
        $usulan->usul = $request->get('usul');
        $usulan->updated_by = Auth::user()->id;
        if ($request->file('file_usulan')) {

            if ($usulan->file_usulan && file_exists(storage_path('app/public/'.$usulan->file_usulan))){
                Storage::delete('public/'.$usulan->file_usulan);
            }
            $file = $request->file('file_usulan')->store('file_usulan','public');
            $usulan->file_usulan = $file;
            $usulan->tittle = $request->file('file_usulan')->getClientOriginalName();
        }
        $usulan->save();
        return redirect()->route('usulan.edit',[$id])->with('status','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usulan = \App\usulan::findOrfail($id);
        if ($usulan->file_usulan && file_exists(storage_path('app/public/'.$usulan->file_usulan))){
        Storage::delete('public/'. $usulan->file_usulan);
            }
        $usulan->delete();
        return redirect()->route('usulan.index',[$id])->with('Status','Data Berhasil dihapus');
    }
    public function download($id)
    {
        $usulan = \App\usulan::findOrfail($id);
        return response()->download(storage_path('app/public/'. $usulan->file_usulan));
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
