<?php

namespace App\Http\Controllers;

use App\daftarpokja;
use Illuminate\Http\Request;
use App\tugas;
use App\hasillelang;
use App\spj;
use App\pokja;
use App\usulan;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Date\Date;
class spjcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spj =  spj::all();
        return view ('spj.index',['spj' => $spj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas = tugas::all();
        $hasil = hasillelang::all();
        return view('spj.create',['tugas' => $tugas, 'hasil' => $hasil]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = validator::make($request->all(),[
            "id_hasil" => "required",
            "id_tugas" => "required",
        ])->validate();

        $spj = new spj;
        $spj->id_tugas = $request->get('id_tugas');
        $spj->id_hasil = $request->get('id_hasil');
        $spj->created_by = auth::user()->id;
        $spj->save();
        return redirect()->route('spj.index')->with('status','data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Date::setLocale('id');
        $pegawai = daftarpokja::where('role','=','POKJA')->get();
        $spj = spj::findOrfail($id);
        $tugas = $spj->id_tugas;
        $stugas = tugas::findOrfail($tugas);
        $pokja = $stugas->id_pokja;
        $daftarpokja = pokja::findOrfail($pokja);
        $data = json_decode($daftarpokja->id_user);
        return view('spj.show',['spj' => $spj, 'pegawai' => $pegawai, 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function cetak_pdf($id)
    {
        Date::setlocale('id');
        $pegawai = daftarpokja::where('role','=','POKJA')->get();
        $spj = spj::findOrfail($id);
        $tugas = $spj->id_tugas;
        $stugas = tugas::findOrfail($tugas);
        $pokja = $stugas->id_pokja;
        $usul = $stugas->id_usulan;
        $daftarpokja = pokja::findOrfail($pokja);
        $data = json_decode($daftarpokja->id_user);
        foreach ($pegawai as $p) {
            foreach ($data as $da) {
                if ($da == $p->id)  
                $nama1 = $p->nama;     
            }
        }
       
        $usulan = usulan::findOrfail($usul);
        if ($usulan->kategori === "Pekerjaan Konstruksi" || $usulan->kategori === "Pengadaan Barang" ){
            if ($usulan->pagu >= 200000000 && $usulan->pagu <= 500000000) {
                $honor = 850000;
            } elseif ($usulan->pagu >= 500000000 && $usulan->pagu <= 1000000000){
                $honor = 1020000;
            } elseif ($usulan->pagu >= 1000000000 && $usulan->pagu <= 2500000000){
                $honor = 1270000;
            } elseif ($usulan->pagu >= 2500000000 && $usulan->pagu <= 5000000000){
                $honor = 1520000;
            } elseif ($usulan->pagu >= 5000000000 && $usulan->pagu <= 10000000000){
                $honor = 1780000;
            } elseif ($usulan->pagu >= 10000000000 && $usulan->pagu <= 25000000000){
                $honor = 2120000;
            } elseif ($usulan->pagu >= 25000000000){
                $honor = 2450000;
            }
        }
        if ($usulan->kategori === "Jasa Lainnya" || $usulan->kategori === "Jasa Konsultansi" ){
            if ($usulan->pagu >= 100000000 && $usulan->pagu <= 250000000) {
                $honor = 480000;
            } elseif ($usulan->pagu >= 250000000 && $usulan->pagu <= 500000000){
                $honor = 600000;
            } elseif ($usulan->pagu >= 500000000 && $usulan->pagu <= 1000000000){
                $honor = 720000;
            } elseif ($usulan->pagu >= 1000000000 && $usulan->pagu <= 2500000000){
                $honor = 910000;
            } elseif ($usulan->pagu >= 2500000000){
                $honor = 1090000;
            }
        }
        $pph = $honor * 0.05;
        $terima = $honor - $pph;
        $jmlhonor = $honor * 3;
        $jmlpph = $pph * 3;
        $jmlterima =  $terima * 3;
        $pdf = PDF::loadview('spj.cetak',['spj' => $spj ,'pegawai' => $pegawai, 'data' => $data , 'honor' => $honor, 'pph' => $pph, 'terima' => $terima ,'jmlhonor' => $jmlhonor, 'jmlpph' => $jmlpph, 'jmlterima' => $jmlterima])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
