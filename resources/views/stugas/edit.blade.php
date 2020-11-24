@extends('layouts.sbadmin')

@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Surat Tugas</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        <form action="{{route('stugas.update',[$tugas->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="row">
          <div class="col-5">
            <label for="">No Surat Tugas</label>
          <input type="text" name="notugas" class="form-control" value="{{$tugas->notugas}}" placeholder="Nomor Surat Tugas">
          </div>
          <div class="col-5">
            <label for="">Tanggal Surat Tugas</label>
          <input type="date" class="form-control" name="tgltugas" value="{{$tugas->tgltugas}}">
          </div>
        </div><br>
        <div class="row">
            <div class="col-5">
              <label for="">No Surat Usulan</label>
            <input type="text" name="" class="form-control" value="{{$tugas->usulan->nousul}}" placeholder="Nomor Surat Tugas" disabled>
            </div>
            <div class="col-5">
              <label for="">Tanggal Surat usulan</label>
            <input type="date" class="form-control" name="" value="{{$tugas->usulan->tglusul}}" disabled>
            </div>
          </div><br>
          <div class="row">
            <div class="col-10">
            <textarea class="form-control" disabled>{{$tugas->usulan->namapaket}}</textarea>
            </div>
          </div><br>
          <div class="row">
              <div class="col-10">
              <input type="text" class="form-control" disabled value="{{$tugas->opd->opd}}">
              </div>
          </div><br>
          <div class="row">
            <div class="col-5">
              <label for="">Sumber Dana</label>
            <input type="text" name="" class="form-control" value="{{$tugas->usulan->sumberdana}}"  disabled>
            </div>
            <div class="col-5">
              <label for="">Tahun Anggaran</label>
            <input type="text" class="form-control" name="" value="{{$tugas->usulan->ta}}" disabled>
            </div>
          </div><br>
          <div class="row">
            <div class="col-5">
              <label for="">Pagu</label>
            <input type="text" name="" class="form-control" value="{{number_format($tugas->usulan->pagu)}}"  disabled>
            </div>
            <div class="col-5">
              <label for="">HPS</label>
            <input type="text" class="form-control" name="" value="{{number_format($tugas->usulan->hps)}}" disabled>
            </div>
          </div><br>
        <div class="row">
            <div class="col-10">
                <select name="id_pokja" id="pokja" class="form-control">
                    <option value=""></option>
                    @foreach ($pokja as $p)
                    <option @if ($tugas->id_pokja == $p->id) selected
                        
                    @endif value="{{$p->id}}">{{$p->namapokja}}</option>
                        
                    @endforeach
                </select>
            </div>
        </div><br>
        <div class="row">
            <div class="col-10">
              <label for="">Jangka Waktu Pelaksanaan</label>
            <input type="text" name="" class="form-control" value="{{$tugas->usulan->jangkawaktu}}"  disabled>
            </div>
        </div><br>
        <button type="submit" class="btn btn-primary btn-sm" value="Simpan"><i class="fa fa-save fa-fw fa-sm"></i>Update</button>
        <a href="{{route('stugas.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
    </div>
</div>  
@endsection
