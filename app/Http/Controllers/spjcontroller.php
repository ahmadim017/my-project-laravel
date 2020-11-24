<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tugas;
use App\hasillelang;
use App\spj;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
}
