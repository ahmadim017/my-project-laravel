@extends('layouts.sbadmin')

@section('content')
<div class="row">
    <div class="col-md-6">
    <form action="{{route('rubahpenyedia.index')}}">
    <div class="input-group mb-3">
    <input value="{{Request::get('keyword')}}" type="text" class="form-control col-md-10" name="keyword" placeholder="Cari Nama Perusahaan">
      <div class="input-group-append">
        <button type="submit"  class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
      </div>
    </div>
    </form>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('rubahpenyedia.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Tambah</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Perubahan Data Penyedia</h6>
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
        <th scope="col">Nama Perusahaan</th>
        <th scope="col">Bentuk Usaha</th>
        <th scope="col">NPWP</th>
        <th scope="col">Email</th>
        <th scope="col">Tanggal Perubahan</th>
        <th scope="col">Keterangan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($perubahanpenyedia as $dp)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{route('rubahpenyedia.show',[$dp->id])}}">{{$dp->namaperusahaan}}</a></td>
            <td>{{$dp->bentukusaha}}</td>
            <td>{{$dp->npwp}}</td>
            <td>{{$dp->email}}</td>
            <td>{{$dp->created_at}}</td>
            <td>{{$dp->keterangan}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
    {{$perubahanpenyedia->links()}}
    </div>
</div>
</div>
</div>
@endsection