@extends('layouts.sbadmin')
@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
    <form action="{{route('spj.index')}}">
    <div class="input-group mb-3">
    <input value="{{Request::get('keyword')}}" type="text" class="form-control col-md-10" name="keyword" placeholder="Cari Group Pokja">
      <div class="input-group-append">
        <button type="submit"  class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
      </div>
    </div>
    </form>
    </div>
  </div>

<div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('spj.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Tambah</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar SPJ</h6>
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
<table class="table table-striped" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">OPD</th>
        <th scope="col">Tahun Anggaran</th>
        <th scope="col">Pagu</th>
        <th scope="col">Group Pokja</th>
        <th scope="col">Tanggal dibuat</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($spj as $s)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{route('spj.show',[$s->id])}}">{{$s->tugas->usulan->namapaket}}</a></td>
            <td>{{$s->tugas->opd->opd}}</td>
            <td>{{$s->tugas->usulan->ta}}</td>
            <td>Rp.{{number_format($s->tugas->usulan->pagu)}}</td>
            <td>{{$s->tugas->pokja->namapokja}}</td>
            <td>{{$s->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
</div>
</div>
</div>
@endsection