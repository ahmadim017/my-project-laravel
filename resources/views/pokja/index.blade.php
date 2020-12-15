@extends('layouts.sbadmin')

@section('content')
<div class="row">
    <div class="col-md-6">
    <form action="{{route('pokja.index')}}">
    <div class="input-group mb-3">
    <input value="{{Request::get('keyword')}}" type="text" class="form-control col-md-10" name="keyword" placeholder="Cari Nama Pekerjaan">
      <div class="input-group-append">
        <button type="submit"  class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
      </div>
    </div>
    </form>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('pokja.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-fw fa-sm text-white-50"></i>Tambah Pokja</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data Pokja ULP</h6>
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
    
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal Pembuatan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pokja as $pokja)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{route('pokja.show',[$pokja->id])}}">{{$pokja->namapokja}}</a></td>
            <td>@if ($pokja->status == 'ACTIVE')
              <span class="badge badge-info">{{$pokja->status}}</span>
              @else 
              <span class="badge badge-warning">{{$pokja->status}}</span>
              @endif</td>
            <td>{{$pokja->tglpembuatan}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
@endsection