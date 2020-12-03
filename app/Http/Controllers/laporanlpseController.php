<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Excel;
use Carbon;
use App\Exports\penyediaExport;
use App\Exports\perubahanExport;
class laporanlpseController extends Controller
{
    public function lappenyedia(Request $request)
    {
        return view('laporanlpse.penyediabaru');
    }

    public function lapperubahan(Request $request)
    {
        return view('laporanlpse.perubahanpenyedia');
    }

    public function export_penyediaexcel(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "date1" => "required",
            "date2" => "required"
        ])->validated();
        $tanggal = Carbon\Carbon::now();
        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        //dd($opd);
        return Excel::download(new penyediaExport ($date1,$date2), $tanggal. 'daftarpenyedia.xlsx');
    }

    public function export_perubahanexcel(Request $request)
    {
        $validation = Validator::make($request->All(),[
            "date1" => "required",
            "date2" => "required"
        ])->validated();
        $tanggal = Carbon\Carbon::now();
        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        //dd($opd);
        return Excel::download(new perubahanExport ($date1,$date2), $tanggal. 'perubahanpenyedia.xlsx');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
