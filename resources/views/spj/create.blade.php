@extends('layouts.sbadmin')
@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$('#tugas').select2({
      placeholder : 'Cari..',
      allowClear :true
});

$('#hasil').select2({
      placeholder : 'Cari..',
      allowClear :true
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
  
        // Format mata uang.
        $( '#hargap' ).mask('000.000.000.000.000', {reverse: true});
        $( '#hargat' ).mask('000.000.000.000.000', {reverse: true});
  
    })
  </script>
@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat SPJ Paket</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('spj.store')}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="">Nomor Hasil Lelang</label>
                    <select name="id_hasil" id="hasil" class="form-control {{$errors->first('id_hasil') ? "is-invalid" : ""}}">
                        <option value=""></option>
                        @foreach ($hasil as $h)
                    <option value="{{$h->id}}">{{$h->nohasil}} | Tahun : {{$h->tugas->usulan->ta}} | Nama Paket : {{$h->tugas->usulan->namapaket}}</option>
                        @endforeach
                    </select>
                <div class="invalid-feedbeck">{{$errors->first('hasil')}}</div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <label for="">Nomor Surat Tugas</label>
                    <select name="id_tugas" id="tugas" class="form-control  {{$errors->first('id_tugas') ? "is-invalid" : ""}}">
                        <option value=""></option>
                        @foreach ($tugas as $t)
                    <option value="{{$t->id}}">{{$t->notugas}} | Tahun : {{$t->usulan->ta}} | Nama Paket : {{$t->usulan->namapaket}}</option>
                        @endforeach
                    </select>
                <div class="invalid-feedbeck">{{$errors->first('tugas')}}</div>
                </div>
            </div><br>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw fa-sm"></i>Simpan</button>
            <a href="{{route('spj.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection