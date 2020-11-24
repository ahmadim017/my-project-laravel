<?php

namespace App\Http\Controllers;

use App\hasillelang;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use PDF;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class hasillelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json()
    {
        return Datatables()->of(hasillelang::all())->toJson();
    }
    
    public function index()
    {
        Date::setlocale('id');
        $hasillelang = \App\hasillelang::orderBy('id','DESC')->get();
        return view('hasillelang.index',['hasillelang' => $hasillelang]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas = \App\tugas::all();
        return view('hasillelang.create',['tugas'=> $tugas]);
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
            "nohasil" => "required",
            "tglhasil" => "required",
            "id_tugas" => "required",
            "namapemenang" => "required",
            "npwp" => "required|min:7|max:20",
            "hargapenawaran" => "required",
            "hargaterkoreksi" => "required",
            "tglsppbj" => "required"
        ])->validated();
        
        $rupiah = $request->get('hargapenawaran');
        $pagu = preg_replace("/[^0-9]/","", $rupiah);
        $hargap = (int) $pagu;

        $rupiah1 = $request->get('hargaterkoreksi');
        $hps = preg_replace("/[^0-9]/","", $rupiah1);
        $hargat = (int) $hps;

        $hasillelang = new \App\hasillelang;
        $hasillelang->nohasil = $request->get('nohasil');
        $hasillelang->tglhasil = $request->get('tglhasil');
        $hasillelang->id_tugas = $request->get('id_tugas');
        $hasillelang->namapemenang = $request->get('namapemenang');
        $hasillelang->npwp = $request->get('npwp');
        $hasillelang->hargapenawaran = $hargap;
        $hasillelang->hargaterkoreksi = $hargat;
        $hasillelang->tglsppbj = $request->get('tglsppbj');
        $hasillelang->created_by = auth::user()->id;
        $hasillelang->save();
        return redirect()->route('hasillelang.create')->with('status','Data berhasil disimpan');
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
        $hasillelang = \App\hasillelang::findOrfail($id);
        return view('hasillelang.show',['hasillelang' => $hasillelang]);
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
        $hasillelang = hasillelang::findOrfail($id);
        return view('hasillelang.edit',['hasillelang' => $hasillelang,'tugas' => $tugas]);
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
            "nohasil" => "required",
            "tglhasil" => "required",
            "id_tugas" => "required",
            "namapemenang" => "required",
            "npwp" => "required|min:7|max:20",
            "hargapenawaran" => "required",
            "hargaterkoreksi" => "required",
            "tglsppbj" => "required"
        ])->validated();
        
        $rupiah = $request->get('hargapenawaran');
        $pagu = preg_replace("/[^0-9]/","", $rupiah);
        $hargap = (int) $pagu;

        $rupiah1 = $request->get('hargaterkoreksi');
        $hps = preg_replace("/[^0-9]/","", $rupiah1);
        $hargat = (int) $hps;

        $hasillelang = \App\hasillelang::findOrfail($id);
        $hasillelang->nohasil = $request->get('nohasil');
        $hasillelang->tglhasil = $request->get('tglhasil');
        $hasillelang->id_tugas = $request->get('id_tugas');
        $hasillelang->namapemenang = $request->get('namapemenang');
        $hasillelang->npwp = $request->get('npwp');
        $hasillelang->hargapenawaran = $hargap;
        $hasillelang->hargaterkoreksi = $hargat;
        $hasillelang->tglsppbj = $request->get('tglsppbj');
        $hasillelang->updated_by = auth::user()->id;
        $hasillelang->save();
        return redirect()->route('hasillelang.edit',[$id])->with('status','Data berhasil disimpan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasillelang = hasillelang::findOrfail($id);
        $hasillelang->delete();
        return redirect()->route('hasillelang.index')->with('Status','Data Berhasil dihapus');
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

    public function cetak_pdf($id)
    {
        Date::setlocale('id');
        
        $hasillelang = \App\hasillelang::findOrfail($id);
        $pdf = PDF::loadview('hasillelang.hasilcetak',['hasillelang' => $hasillelang]);
        return $pdf->stream();
    }

}
