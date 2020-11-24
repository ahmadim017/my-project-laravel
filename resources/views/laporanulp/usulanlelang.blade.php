@extends('layouts.sbadmin')

@section('content')
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Usulan Lelang</h6>
            </div>
            <div class="card-body">
            <form action="{{route('laporanulp.cetak')}}" class="bg-white shadow-sm p-3">
            <h5 class="font-weight-bold text-primary" >Laporan Per SKPD</h5>
            <div class="row">
                <div class="col-10">
                    <label for="">SKPD</label>
                    <select name="opd" id="" class="form-control">
                        <option value=""></option>
                        @foreach ($opd as $p)
                        <option value="{{$p->id}}">{{$p->opd}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <h5 class="font-weight-bold text-primary">Laporan Per Kategori Pengadaan</h5>
            <div class="row">
                <div class="col-10">
                    <label for="">Kategori Pengadaan</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value=""></option>
                        @foreach ($kategori as $k)
                    <option value="{{$k->kategori}}">{{$k->kategori}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>

            <h5 class="font-weight-bold text-primary">Laporan Perperiode</h5>
            <div class="row">
                <div class="col-5">
                    <label for="">Tanggal</label>
                <input type="date" class="form-control {{$errors->first('date1') ? "is-invalid" : ""}}" name="date1" >
                <div class="invalid-feedbeck">{{$errors->first('date1')}}</div>
                </div>
                <div class="col-5">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control {{$errors->first('date2') ? "is-invalid" : ""}}" name="date2" >
                    <div class="invalid-feedbeck">{{$errors->first('date2')}}</div>
                </div>
                </div><br>
            <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-excel fa-fw"></i>Cetak</button>
            </form>
            
            </div>
        </div>
    </div>
@endsection