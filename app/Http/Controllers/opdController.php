<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class opdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$opd = \App\opd::paginate(10);
        $opd = \App\opd::get();
        return view('opd.index',['opd' => $opd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opd.create');
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
            "opd" => "required",
            "status" => "required"
        ])->validate();

        $opd = new \App\opd;
        $opd->opd = $request->get('opd');
        $opd->status = $request->get('status');
        $opd->save();

        return redirect()->route('opd.create')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opd = \App\opd::findOrfail($id);
        return view('opd.edit',['opd' => $opd]);
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
            "opd" => "required",
            "status" => "required"
        ])->validate();
        
        $opd = \App\opd::findOrfail($id);
        $opd->opd = $request->get('opd');
        $opd->status = $request->get('status');
        $opd->save();
        return redirect()->route('opd.edit',[$id])->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opd = \App\opd::findOrfail($id);
        $opd->delete();
        return redirect()->route('opd.index',[$id])->with('Status','Data Berhasil dihapus');
    }

    public function __construct()
    {
        $this->middleware(function ($request, $next){
            if (Auth::user()->roles == "ADMIN"){
                return $next($request);
            }else{
                return redirect()->guest('/404');
            }
        });
    }
}
