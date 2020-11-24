@extends('layouts.sbadmin')

@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Pokja</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('pokja.update',[$pokja->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="name">Nama Pokja</label>
        <input class="form-control" placeholder="Group Pokja" type="text" name="namapokja" value="{{$pokja->namapokja}}"/>
        <br>
        <label for="">Status</label>
        <br>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="ACTIVE" value="ACTIVE" {{$pokja->status == "ACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="ACTIVE">ACTIVE</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="INACTIVE" value="INACTIVE" {{$pokja->status == "INACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="INACTIVE">INACTIVE</label>
        </div><br>
        <div class="row">
            <div class="col-6">
                <label for="">Tanggal Pembuatan</label>
            <input type="date" class="form-control" name="tglpembuatan" value="{{$pokja->tglpembuatan}}">
            </div> 
        </div>
          <br>
          <button class="btn btn-primary btn-sm" value="submit" type="submit"><i class="fa fa-save fa-sm"></i> Simpan</button>
          <a href="#collapseCardExample" data-toggle="collapse" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Ubah Data Pokja</a>
          <a href="{{route('pokja.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a><br>
          <br>
          <div class="collapse" id="collapseCardExample">
          <div class="row">
            <div class="col-12">
              <div class="breadcrumb">
                Daftar Pegawai UKPBJ
            </div>
            <table  class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Golongan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $d)
                    
                        <tr>
                        <td>
                        <input type="checkbox"  @foreach ($datapokja as $da) @if ($d->id == $da) checked @endif @endforeach class="checkbox" name="id_user[]" value="{{$d->id}}"/>
                        </td>
                                <td>{{$d->nama}}</td>
                                <td>{{$d->nip}}</td>
                                <td>{{$d->golongan}}</td> 
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
          </div><br>
      </form>
      </div>
    </div>
</div>
@endsection