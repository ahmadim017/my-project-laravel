<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\daftarpokja;
use Illuminate\Support\Facades\Validator;
class daftarPokjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarpokja = daftarpokja::paginate(10);
        return view('daftarpokja.index',['daftarpokja' => $daftarpokja]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftarpokja.create');
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
            "nama" => "required|min:5",
            "nip" => "required",
            "golongan" => "required",
            "role" => "required"
        ])->validate();

        $daftarpokja = new daftarpokja;
        $daftarpokja->nama = $request->get('nama');
        $daftarpokja->nip = $request->get('nip');
        $daftarpokja->golongan = $request->get('golongan');
        $daftarpokja->status = $request->get('status');
        $daftarpokja->role = $request->get('role');
        $daftarpokja->save();

        return redirect()->route('daftarpokja.index')->with('status','Data Anggota Berhasil ditambahkan');
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
        $daftarpokja = daftarpokja::findOrfail($id);
        return view('daftarpokja.edit',['daftarpokja' => $daftarpokja]);
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
        $daftarpokja = daftarpokja::findOrfail($id);

        $validation = Validator::make($request->all(),[
            "nama" => "required|min:5",
            "nip" => "required",
            "golongan" => "required",
            "status" => "required",
            "role" => "required"
        ])->validate();

        $daftarpokja->nama = $request->get('nama');
        $daftarpokja->golongan = $request->get('golongan');
        $daftarpokja->nip = $request->get('nip');
        $daftarpokja->status = $request->get('status');
        $daftarpokja->role = $request->get('role');
        $daftarpokja->save();

        return redirect()->back()->with('status','Data Berhasil di Update');
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
