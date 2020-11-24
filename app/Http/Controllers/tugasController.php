<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class tugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Date::setlocale('id');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '' ;
        $tugas = \App\tugas::with('usulan')->whereHas('usulan', function($q) use($keyword){
            $q->where('namapaket','LIKE','%' .$keyword. '%');
        })->orderBy('id','DESC')->get();
        //return response()->json(['data' => $tugas]);
        return view('stugas.index',['tugas' => $tugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lpaket(Request $request)
    {
        $keyword = $request->get('keyword');
        //$ta = $request->get('tahunanggaran');
        $opd = \App\opd::all();
        $tahunanggaran = \App\tahunanggaran::all();
        $usulan = \App\usulan::where('namapaket','LIKE',"%$keyword%")->paginate(10);
        return view('stugas.lpaket',['usulan' => $usulan,'opd' => $opd,'tahunanggaran' => $tahunanggaran]);

    }

    public function create()
    {
        //
    }

    public function buatpaket($id)
    {
        $opd = \App\opd::all();
        $dana = \App\dana::all();
        $ta = \App\tahunanggaran::all();
        $kategori = \App\kategori::all();
        $usul = \App\usul::all();
        $pokja = \App\pokja::all();
        $tugas = \App\usulan::findOrfail($id);
        return view('stugas.buatpaket',['tugas' => $tugas,'opd' => $opd,'dana' => $dana,'ta' => $ta,'kategori' => $kategori,'usul' => $usul,'pokja' => $pokja]);
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
            "notugas" => "required",
            "tgltugas" => "required",
            "id_pokja" => "required"
        ])->validated(); 

        $tugas = new \App\tugas;
        $tugas->notugas = $request->get('notugas');
        $tugas->tgltugas = $request->get('tgltugas');
        $tugas->id_usulan = $request->get('id_usulan');
        $tugas->id_pokja = $request->get('id_pokja');
        $tugas->id_opd = $request->get('id_opd');
        $tugas->created_by = Auth::user()->id;
        $tugas->save();

        return redirect()->route('stugas.index')->with('status','Data surat berhasil ditambahkan');
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
        $tugas = \App\tugas::findOrfail($id);
        return view('stugas.show',['tugas' => $tugas]);
    }

    public function view($id)
    {
        date::setlocale('id');
        $opd = \App\opd::all();
        $tugas = \App\usulan::findOrfail($id);
        return view('stugas.view',['tugas' => $tugas,'opd' => $opd]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = \App\tugas::findOrfail($id);
        $pokja = \App\pokja::all();
        return view('stugas.edit',['tugas' => $tugas,'pokja' => $pokja]);
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
            "notugas" => "required",
            "tgltugas" => "required",
            "id_pokja" => "required"
        ])->validated();

        $tugas = \App\tugas::findOrfail($id);
        $tugas->notugas = $request->get('notugas');
        $tugas->tgltugas = $request->get('tgltugas');
        $tugas->id_pokja = $request->get('id_pokja');
        $tugas->updated_by = Auth::user()->id;
        $tugas->save();
        return redirect()->route('stugas.edit',[$id])->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = \App\tugas::findOrfail($id);
        $tugas->delete();
        return redirect()->Route('stugas.index',[$id])->with('Status',' Data Surat Tugas Berhasil dihapus');
    }

    public function cetak_pdf($id)
    {
        Date::setlocale('id');
        
        $tugas = \App\tugas::findOrfail($id);
        $pdf = PDF::loadview('stugas.tugascetak',['tugas' => $tugas]);
        return $pdf->stream();
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
