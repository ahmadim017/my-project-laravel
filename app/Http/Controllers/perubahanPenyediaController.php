<?php

namespace App\Http\Controllers;

use App\perubahanpenyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class perubahanPenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perubahanpenyedia = perubahanpenyedia::all();
        return view('rubahpenyedia.index',['perubahanpenyedia' => $perubahanpenyedia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubahpenyedia.create');
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
            "namaperusahaan" => "required|min:5",
            "bentukusaha" => "required",
            "npwp" => "required|min:18",
            "alamat" => "required",
            "telp" => "required|digits_between:10,12",
            "email" => "required|email",
        ])->validate();

        $perubahanpenyedia = new perubahanpenyedia;
        $perubahanpenyedia->namaperusahaan = $request->get('namaperusahaan');
        $perubahanpenyedia->bentukusaha = $request->get('bentukusaha');
        $perubahanpenyedia->npwp = $request->get('npwp');
        $perubahanpenyedia->alamat = $request->get('alamat');
        $perubahanpenyedia->telp = $request->get('telp');
        $perubahanpenyedia->email = $request->get('email');
        $perubahanpenyedia->keterangan = $request->get('keterangan');
        if ($request->file('file')) {
            $file = $request->file('file')->store('file_perubahan','public');
            $perubahanpenyedia->file = $file;
            $perubahanpenyedia->nama_file = $request->file('file')->getClientOriginalName();
        }
        $perubahanpenyedia->created_by = Auth::user()->id;
        $perubahanpenyedia->save();
        return redirect()->back()->with('status','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perubahanpenyedia = perubahanpenyedia::findOrfail($id);
        return view('rubahpenyedia.show',['perubahanpenyedia' => $perubahanpenyedia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perubahanpenyedia = perubahanpenyedia::findOrfail($id);
        return view('rubahpenyedia.edit',['perubahanpenyedia' => $perubahanpenyedia]);
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
            "namaperusahaan" => "required|min:5",
            "bentukusaha" => "required",
            "npwp" => "required|min:18",
            "alamat" => "required",
            "telp" => "required|digits_between:10,12",
            "email" => "required|email",
        ])->validate();

        $perubahanpenyedia = perubahanpenyedia::findOrfail($id);
        $perubahanpenyedia->namaperusahaan = $request->get('namaperusahaan');
        $perubahanpenyedia->bentukusaha = $request->get('bentukusaha');
        $perubahanpenyedia->npwp = $request->get('npwp');
        $perubahanpenyedia->alamat = $request->get('alamat');
        $perubahanpenyedia->telp = $request->get('telp');
        $perubahanpenyedia->email = $request->get('email');
        $perubahanpenyedia->keterangan = $request->get('keterangan');
        if ($request->file('file')) {
            if ($perubahanpenyedia->file && file_exists(storage_path('app/public/'. $perubahanpenyedia->file))) {
               Storage::delete('public/'. $perubahanpenyedia->file);
            }
            $file = $request->file('file')->store('file_perubahan','public');
            $perubahanpenyedia->file = $file;
            $perubahanpenyedia->nama_file = $request->file('file')->getClientOriginalName();
        }
        $perubahanpenyedia->updated_by = Auth::user()->id;
        $perubahanpenyedia->save();
        return redirect()->back()->with('status','Data Berhasil diperbaharui');
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
    public function download($id)
    {
        $perubahanpenyedia = perubahanpenyedia::findOrfail($id);
        return response()->download(storage_path('app/public/'. $perubahanpenyedia->file));
    }
}
