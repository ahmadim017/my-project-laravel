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
$('#pokja').select2({
      placeholder : 'Select Daftar Pokja',
      allowClear :true
});
</script>

@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Data Surat Tugas</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        <form action="{{route('stugas.store')}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="{{$tugas->id}}" name="id_usulan">
        <div class="row">
          <div class="col-5">
            <label for="">No Surat Tugas</label>
            <input type="text" name="notugas" class="form-control {{$errors->first('notugas') ? "is-invalid" : ""}}" value="" placeholder="Nomor Surat Tugas">
          <div class="invalid-feedbeck">{{$errors->first('notugas')}}</div>
          </div>
          <div class="col-5">
            <label for="">Tanggal Surat Tugas</label>
          <input type="date" class="form-control {{$errors->first('tgltugas') ? "is-invalid" : ""}}" name="tgltugas" value="">
          <div class="invalid-feedbeck">{{$errors->first('tgltugas')}}</div>
        </div>
        </div><br>
        <div class="row">
          <div class="col-5">
            <label for="">No Surat Usulan</label>
          <input type="text" name="nousul" class="form-control" value="{{$tugas->nousul}}" placeholder="Nomor Surat Usulan" disabled>
          </div>
          <div class="col-5">
            <label for="">Tanggal Surat Usulan</label>
          <input type="date" class="form-control" name="tglusul" value="{{$tugas->tglusul}}" disabled>
          </div>
        </div><br>
        <div class="row">
            <div class="col-10">
                <label for="">Dinas</label>
                <input type="text" hidden>
                <select name="id_opd" id="" class="form-control">
                  <option value=""></option>
                    @foreach ($opd as $opd)
                    <option @if ($tugas->id_opd == $opd->id) selected @endif value="{{$opd->id}}">{{$opd->opd}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-10">
                <label for="">Nama Pekerjaan</label> 
                <input type="text" name="namapaket" id="namapaket" class="form-control" placeholder="Nama Paket" value="{{$tugas->namapaket}}" disabled>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-5">
          <label for="">Sumber Dana</label>
          <select name="sumberdana" id="dana" class="form-control" disabled>
              <option value=""></option>
              @foreach ($dana as $dana)
              <option @if ($tugas->sumberdana == $dana->sumberdana) selected
              @endif value="{{$dana->sumberdana}}">{{$dana->sumberdana}}</option>
              @endforeach
          </select><br><br>
        </div>
        <div class="col-5">
          <label for="">Tahun Anggaran</label>
          <select name="ta" id="ta" class="form-control" disabled>
            <option value=""></option>
            @foreach ($ta as $ta)
            <option @if ($tugas->ta == $ta->tahunanggaran) selected 
            @endif value="{{$ta->tahunanggaran}}">{{$ta->tahunanggaran}}</option>
            @endforeach
          </select>
        </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label for="">Pagu</label>
          <input type="text" name="pagu" id="pagu" class="form-control" placeholder="Pagu" value="{{$tugas->pagu}}" disabled>
          </div>
          <div class="col-5">
            <label for="">Hps</label>
          <input type="text" name="hps" id="hps" class="form-control" placeholder="Hps" value="{{$tugas->hps}}" disabled>
          </div>
        </div><br>
        <div class="row">
          <div class="col-5">
            <label for="">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" disabled>
              <option value=""></option>
                @foreach ($kategori as $kategori)
                <option @if ($tugas->kategori == $kategori->kategori) selected
                @endif value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                @endforeach
            </select>
          </div>
            <div class="col-5">
                <label for="">Usulan</label>
                <select name="usul" id="usul" class="form-control" disabled>
                    <option value=""></option>
                    @foreach ($usul as $usul)
                    <option @if ($tugas->usul == $usul->usul) selected       
                    @endif value="{{$usul->usul}}">{{$usul->usul}}</option>
                    @endforeach
                </select>
            </div>
        </div><br>
        <div class="row">
          <div class="col-10">
              <label for="">Daftar Pokja</label>
          <select name="id_pokja" id="pokja" class="form-control {{$errors->first('id_pokja') ? "is-invalid" : ""}}">
                <option value=""></option>
                  @foreach ($pokja as $dp)
                  <option value="{{$dp->id}}">{{$dp->namapokja}}</option>
                  @endforeach
              </select>
            <div class="invalid-feedbeck">{{$errors->first('id_pokja')}}</div>
          </div>
      </div>
      <br>
        <div class="row">
          <div class="col-6">
            <label for="">Jangka Waktu Pelaksanaan</label>
          <input type="text" name="jangkawaktu" placeholder="Waktu Pelaksanaan" class="form-control" value="{{$tugas->jangkawaktu}}" disabled>
          </div>
        </div><br>
        <div class="row">
          <div class="col-6">
            <label for="">Kode Anggaran</label>
          <input type="text" name="mak" placeholder="Mak" class="form-control" value="{{$tugas->mak}}" disabled>
          </div>
        </div><br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('stugas.lpaket')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
    </div>
</div>
@endsection