<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Exports\usulanExport;
use App\Exports\prosesExport;
use App\Exports\hasilExport;
use Excel;
use Illuminate\Support\Facades\Validator;

class laporanulpController extends Controller
{
    public function lapusulan(Request $request)
    {
    $opd = \App\opd::all();
    $kategori = \App\kategori::all();
    //dd($usulan);
    return view('laporanulp.usulanlelang',['opd' => $opd,'kategori' => $kategori]);
    }
    public function lapproses(Request $request)
    {
        $opd = \App\opd::all();
        return view('laporanulp.proseslelang',['opd' => $opd]);
    }

    public function laphasil(Request $request)
    {
        return view('laporanulp.hasillelang');
    }

    public function export_excel(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "date1" => "required",
            "date2" => "required"
        ])->validated();

        $opd = $request->get('opd');
        $kategori = $request->get('kategori');
        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        //dd($opd);
        return Excel::download(new usulanExport($opd,$kategori,$date1,$date2), 'usulan.xlsx');
    }

    public function export_prosesexcel(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "date1" => "required",
            "date2" => "required"
        ])->validated();

        $opd = $request->get('opd');
        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        //dd($opd);
        return Excel::download(new prosesExport ($opd,$date1,$date2), 'proseslelang.xlsx');
    }

    public function export_hasilexcel(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "date1" => "required",
            "date2" => "required"
        ])->validated();

        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        //dd($opd);
        return Excel::download(new hasilExport ($date1,$date2), 'hasillelang.xlsx');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
