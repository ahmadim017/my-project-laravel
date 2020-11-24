@extends('layouts.sbadmin')

@section('content')
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Hasil Lelang</h6>
            </div>
            <div class="card-body">
            <form action="{{route('laporanhasil.cetak')}}" class="bg-white shadow-sm p-3">
            <h5 class="font-weight-bold text-primary">Laporan Perperiode</h5>
            <div class="row">
                <div class="col-5">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control {{$errors->first('date1') ? "is-invalid" : ""}}" name="date1" >
                    <div class="invalid-feedbeck">
                        {{$errors->first('date1')}}
                    </div>
                </div>
                <div class="col-5">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control {{$errors->first('date2') ? "is-invalid" : ""}}" name="date2" >
                    <div class="invalid-feedbeck">
                        {{$errors->first('date2')}}
                    </div>
                </div>
                </div><br>
            <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-excel fa-fw"></i>Cetak</button>
            </form>
            
            </div>
        </div>
    </div>
@endsection