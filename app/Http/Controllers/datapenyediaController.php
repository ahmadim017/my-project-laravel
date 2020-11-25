<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datapenyedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class datapenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->Get('keyword');
        $datapenyedia = datapenyedia::where('namaperusahaan','LIKE',"%$keyword%")->paginate(10);
        return view('datapenyedia.index',['datapenyedia' => $datapenyedia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datapenyedia.create');
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
            "email" => "required|email|unique:users",
        ])->validate();

        $datapenyedia = new datapenyedia;
        $datapenyedia->namaperusahaan = $request->get('namaperusahaan');
        $datapenyedia->bentukusaha = $request->get('bentukusaha');
        $datapenyedia->npwp = $request->get('npwp');
        $datapenyedia->alamat = $request->get('alamat');
        $datapenyedia->telp = $request->get('telp');
        $datapenyedia->email = $request->get('email');
        if ($request->file('file')) {
            $file = $request->file('file')->store('file_penyedia','public');
            $datapenyedia->file = $file;
            $datapenyedia->nama_file = $request->file('file')->getClientOriginalName();
        }
        $datapenyedia->created_by = Auth::user()->id;
        $datapenyedia->save();
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
        $datapenyedia = datapenyedia::findOrfail($id);
        return view('datapenyedia.show',['datapenyedia' => $datapenyedia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datapenyedia = datapenyedia::findOrfail($id);
        return view('datapenyedia.edit',['datapenyedia' => $datapenyedia]);
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
            "npwp" => "required",
            "alamat" => "required",
            "telp" => "required|digits_between:10,12",
            "email" => "required|email|unique:users",
            "file" => "required|max:5mb",
            "nama_file" => "required",
        ])->validate();

        $datapenyedia = datapenyedia::findOrfail($id);
        $datapenyedia->namaperusahaan = $request->get('namaperusahaan');
        $datapenyedia->bentukusaha = $request->get('bentukusaha');
        $datapenyedia->npwp = $request->get('npwp');
        $datapenyedia->alamat = $request->get('alamat');
        $datapenyedia->telp = $request->get('telp');
        $datapenyedia->email = $request->get('email');
        if ($request->file('file')) {
            if ($datapenyedia->file && file_exists(storage_path('app/public'. $datapenyedia->file))){
                Storage::delete('public/'.$datapenyedia->file);
            }
            $file = $request->file('file')->store('file_penyedia','public');
            $datapenyedia->file = $file;
            $datapenyedia->nama_file = $request->file('file')->getClientOriginalName();
        }
        $datapenyedia->updated_by = Auth::user()->id;
        $datapenyedia->save();
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
        $datapenyedia = datapenyedia::findOrfail($id);
        return response()->download(storage_path('app/public/'. $datapenyedia->file));
    }
}
