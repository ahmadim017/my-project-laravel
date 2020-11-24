<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class datapokjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tambahdatapokja($id)
    {
        $user = \App\User::where('roles','=','POKJA')->where('status','=','ACTIVE')->get();
        $pokja = \App\pokja::findOrfail($id);
        return view('datapokja.tambahdatapokja',['user' => $user,'pokja' => $pokja]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapokja = new \App\datapokja;
       
            $datapokja->id_pokja = $request->get('id_pokja');
            $datapokja->id_user = $request->get('id_user');
            $datapokja->save();
        return redirect()->route('pokja.index')->with('status','Data Anggota Pokja berhasil ditambah');

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
        $datapokja = \App\datapokja::findOrfail($id);
        $datapokja->delete();
        return redirect()->route('pokja.index')->with('Status','Data Berhasil dihapus');
    }

    public function destroyuser($id)
    {
        
    }
}
