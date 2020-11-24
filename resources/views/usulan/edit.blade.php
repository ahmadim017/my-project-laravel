@extends('layouts.sbadmin')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$('#opd').select2({
      placeholder : 'Select Dinas',
      allowClear :true
});
$('#kategori').select2({
      placeholder : 'Select Kategori',
      allowClear :true
});
$('#dana').select2({
      placeholder : 'Select Sumber Dana',
      allowClear :true
});
$('#usul').select2({
      placeholder : 'Select Usulan',
      allowClear :true
});
$('#ta').select2({
      placeholder : 'Select Tahun Anggaran',
      allowClear :true
});
</script>
<script type="text/javascript">
  $(document).ready(function(){

      // Format mata uang.
      $( '#pagu' ).mask('000.000.000.000.000', {reverse: true});
      $( '#hps' ).mask('000.000.000.000.000', {reverse: true});

  })
</script>
@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Usulan Lelang</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        <form action="{{route('usulan.update',[$usulan->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="row">
          <div class="col-5">
            <label for="">No Surat Usulan</label>
          <input type="text" name="nousul" class="form-control" value="{{$usulan->nousul}}" placeholder="Nomor Surat Usulan">
          </div>
          <div class="col-5">
            <label for="">Tanggal Surat Usulan</label>
          <input type="date" class="form-control" name="tglusul" value="{{$usulan->tglusul}}">
          </div>
        </div><br>
        <div class="row">
            <div class="col-10">
                <label for="">Dinas</label>
                <select name="id_opd" id="opd" class="form-control">
                    @foreach ($opd as $opd)
                    <option @if ($usulan->id_opd == $opd->id) selected @endif value="{{$opd->id}}">{{$opd->opd}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-10">
                <label for="">Nama Pekerjaan</label> 
                <input type="text" name="namapaket" id="namapaket" class="form-control" placeholder="Nama Paket" value="{{$usulan->namapaket}}">
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-5">
          <label for="">Sumber Dana</label>
          <select name="sumberdana" id="dana" class="form-control">
              <option value=""></option>
              @foreach ($dana as $dana)
              <option @if ($usulan->sumberdana == $dana->sumberdana) selected
              @endif value="{{$dana->sumberdana}}">{{$dana->sumberdana}}</option>
              @endforeach
          </select><br><br>
        </div>
        <div class="col-5">
          <label for="">Tahun Anggaran</label>
          <select name="ta" id="ta" class="form-control">
            <option value=""></option>
            @foreach ($ta as $ta)
            <option @if ($usulan->ta == $ta->tahunanggaran) selected 
            @endif value="{{$ta->tahunanggaran}}">{{$ta->tahunanggaran}}</option>
            @endforeach
          </select>
        </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label for="">Pagu</label>
          <input type="text" name="pagu" id="pagu" class="form-control" placeholder="Pagu" value="{{$usulan->pagu}}">
          </div>
          <div class="col-5">
            <label for="">Hps</label>
          <input type="text" name="hps" id="hps" class="form-control" placeholder="Hps" value="{{$usulan->hps}}">
          </div>
        </div><br>
        <div class="row">
          <div class="col-5">
            <label for="">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option value=""></option>
                @foreach ($kategori as $kategori)
                <option @if ($usulan->kategori == $kategori->kategori) selected
                @endif value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                @endforeach
            </select>
          </div>
            <div class="col-5">
                <label for="">Usulan</label>
                <select name="usul" id="usul" class="form-control">
                    <option value=""></option>
                    @foreach ($usul as $usul)
                    <option @if ($usulan->usul == $usul->usul) selected       
                    @endif value="{{$usul->usul}}">{{$usul->usul}}</option>
                    @endforeach
                </select>
            </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Jangka Waktu Pelaksanaan</label>
          <input type="text" name="jangkawaktu" placeholder="Waktu Pelaksanaan" class="form-control" value="{{$usulan->jangkawaktu}}">
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Kode Anggaran</label>
          <input type="text" name="mak" placeholder="Mak" class="form-control" value="{{$usulan->mak}}">
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">File Usulan</label>
            <input type="file" class="form-control" name="file_usulan">
            <small>*Kosongkan Jika Tidak Mengganti File & size Max 5mb</small>
          </div>
        </div><br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('usulan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
    </div>
</div>
@endsection