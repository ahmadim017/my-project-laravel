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
            <h6 class="m-0 font-weight-bold text-primary">Buat Hasil Lelang</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('hasillelang.store')}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
            @csrf
            <div class="row">
                <div class="col-7">
                    <label for="">No Hasil Lelang</label>
                    <input type="text" name="nohasil" placeholder="No Hasil Lelang..." class="form-control">
                </div>
                <div class="col-5">
                    <label for="">tanggal Hasil Lelang</label>
                    <input type="date" name="tglhasil" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <label for="">Nama Paket</label>
                    <select name="id_tugas" id="tugas" class="form-control">
                        <option value=""></option>
                        @foreach ($tugas as $t)
                    <option value="{{$t->id}}">{{$t->usulan->namapaket}} | Tahun : {{$t->usulan->ta}} | SKPD : {{$t->usulan->opd->opd}}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">
                    <label for="">Nama Pemenang</label>
                    <input type="text" name="namapemenang" class="form-control" placeholder="Nama Pemenang...">
                </div>
                <div class="col-6">
                <label for="">NPWP</label>
                <input type="text" name="npwp" class="form-control" placeholder="NPWP Perusahaan...">
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">
                    <label for="">Harga Penawaran</label>
                    <input type="text" name="hargapenawaran" id="hargap" class="form-control" placeholder="Harga Penawaran..">
                </div>
                <div class="col-6">
                    <label for="">Harga Penawaran Terkoreksi</label>
                    <input type="text" name="hargaterkoreksi" id="hargat" class="form-control" placeholder="Harga Terkoreksi..">
                </div>
            </div><br>
            <div class="row">
                <div class="col-6">
                    <label for="">Tanggal SPPBJ</label>
                    <input type="date" name="tglsppbj" class="form-control">
                </div>
            </div><br>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw fa-sm"></i>Simpan</button>
            <a href="{{route('hasillelang.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection