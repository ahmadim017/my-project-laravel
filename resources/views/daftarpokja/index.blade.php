@extends('layouts.sbadmin')

@section('content')
<div class="row">
    <div class="col-md-6">
    <form action="{{route('daftarpokja.index')}}">
    <div class="input-group mb-3">
    <input value="{{Request::get('keyword')}}" type="text" class="form-control col-md-10" name="keyword" placeholder="Cari Nama">
      <div class="input-group-append">
        <button type="submit"  class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
      </div>
    </div>
    </form>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('daftarpokja.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Tambah</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai UKPBJ</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
  
    @if(session('Status'))
      <div class="alert alert-danger">
      {{session('Status')}}
    </div>
    @endif
    <div class="table-responsive"> 
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Nip</th>
        <th scope="col">Golongan</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($daftarpokja as $dp)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{route('daftarpokja.edit',[$dp->id])}}">{{$dp->nama}}</a></td>
            <td>{{$dp->nip}}</td>
            <td>{{$dp->golongan}}</td>
            <td>{{$dp->role}}</td>
            <td>@if ($dp->status == 'ACTIVE')
                <span class="badge badge-info">{{$dp->status}}</span>
                @else 
                <span class="badge badge-warning">{{$dp->status}}</span>
                @endif
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$daftarpokja->links()}}
    </div>
</div>
</div>
</div>
@endsection