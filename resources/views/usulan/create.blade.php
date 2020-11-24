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
      $( '#uang' ).mask('000.000.000.000.000', {reverse: true});
      $( '#hps' ).mask('000.000.000.000.000', {reverse: true});

  })
</script>
@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Usulan Lelang</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        <form action="{{route('usulan.store')}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <div class="row">
          <div class="col-6">
            <label for="">No Surat Usulan</label>
          <input type="text" name="nousul" class="form-control {{$errors->first('nousul') ? "is-invalid" : ""}}" placeholder="Nomor Surat Usulan">
          <div class="invalid-feedbeck">{{$errors->first('nousul')}}</div>
        </div>
          <div class="col-6">
            <label for="">Tanggal Surat Usulan</label>
          <input type="date" class="form-control {{$errors->first('tglusul') ? "is-invalid" : ""}}" name="tglusul">
          <div class="invalid-feedbeck">{{$errors->first('tglusul')}}</div>
        </div>
        </div><br>
        <div class="row">
          <div class="col-12">
            <label for="">Dinas</label>
          <select name="id_opd" id="opd" class="form-control {{$errors->first('id_opd') ? "is-invalid" : ""}}">
                <option value=""></option>
                @foreach ($opd as $opd)
                <option value="{{$opd->id}}">{{$opd->opd}}</option>
                @endforeach
            </select>
            <div class="invalid-feedbeck">{{$errors->first('id_opd')}}</div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <label for="">Nama Pekerjaan</label> 
            <input type="text" name="namapaket" class="form-control {{$errors->first('namapaket') ? "is-invalid" : ""}}" placeholder="Nama Paket">
            <div class="invalid-feedbeck"> {{$errors->first('namapaket')}}</div>
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col-6">
          <label for="">Sumber Dana</label>
          <select name="sumberdana" id="dana" class="form-control {{$errors->first('sumberdana') ? "is-invalid" : ""}}">
              <option value=""></option>
              @foreach ($dana as $dana)
              <option value="{{$dana->sumberdana}}">{{$dana->sumberdana}}</option>
              @endforeach
          </select><br><br>
          <div class="invalid-feedbeck"> {{$errors->first('sumberdana')}}</div>
        </div>
        <div class="col-6">
          <label for="">Tahun Anggaran</label>
          <select name="ta" id="ta" class="form-control {{$errors->first('ta') ? "is-invalid" : ""}}">
            <option value=""></option>
            @foreach ($ta as $ta)
            <option value="{{$ta->tahunanggaran}}">{{$ta->tahunanggaran}}</option>
            @endforeach
          </select>
          <div class="invalid-feedbeck"> {{$errors->first('ta')}}</div>
        </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label for="">Pagu</label>
            <input type="text" name="pagu" id="uang" class="form-control {{$errors->first('pagu') ? "is-invalid" : ""}}" placeholder="Pagu">
            <div class="invalid-feedbeck"> {{$errors->first('pagu')}}</div>
          </div>
          <div class="col-6">
            <label for="">Hps</label>
            <input type="text" name="hps" id="hps" class="form-control {{$errors->first('hps') ? "is-invalid" : ""}}" placeholder="Hps">
            <div class="invalid-feedbeck"> {{$errors->first('hps')}}</div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Kategori</label>
            <select name="kategori" id="kategori" class="form-control {{$errors->first('kategori') ? "is-invalid" : ""}}">
              <option value=""></option>
                @foreach ($kategori as $kategori)
                <option value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                @endforeach
            </select>
            <div class="invalid-feedbeck"> {{$errors->first('kategori')}}</div>
          </div>
          <div class="col-6">
            <label for="">Usulan</label>
            <select name="usul" id="usul" class="form-control {{$errors->first('usul') ? "is-invalid" : ""}}">
                <option value=""></option>
                @foreach ($usul as $usul)
                <option value="{{$usul->usul}}">{{$usul->usul}}</option>
                @endforeach
            </select>
            <div class="invalid-feedbeck"> {{$errors->first('usul')}}</div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Jangka Waktu Pelaksanaan</label>
            <input type="text" name="jangkawaktu" placeholder="Waktu Pelaksanaan" class="form-control {{$errors->first('jangkawaktu') ? "is-invalid" : ""}}">
            <div class="invalid-feedbeck"> {{$errors->first('jangkawaktu')}}</div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Kode Anggaran</label>
            <input type="text" name="mak" placeholder="Mak" class="form-control {{$errors->first('mak') ? "is-invalid" : ""}}">
            <div class="invalid-feedbeck"> {{$errors->first('mak')}}</div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">File Usulan</label>
            <input type="file" class="form-control {{$errors->first('file_usulan') ? "is-invalid" : ""}}" name="file_usulan">
          <div class="invalid-feedbeck"> {{$errors->first('file_usulan')}}</div>
            <small>*file bertipe PDF maximal size 5mb</small>
          </div>
        </div><br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('usulan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
    </div>
</div>
@endsection