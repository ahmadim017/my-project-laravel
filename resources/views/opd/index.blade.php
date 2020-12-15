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
    <div class="col-md-12 text-right">
    <a href="{{route('opd.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah Dinas</a>
    </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data Dinas</h6>
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
        <th scope="col">Nama Dinas</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($opd as $opd)
      <tr>
            <td>{{$opd->opd}}</td>
            <td>
                @if ($opd->status == 'ACTIVE')
                <span class="badge badge-info">{{$opd->status}}</span>
                @else 
                <span class="badge badge-warning">{{$opd->status}}</span>
                @endif
            </td>
          <td><a href="{{route('opd.edit',[$opd->id])}}" class="btn btn-primary btn-sm">Edit</a> 
          </form>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
</div>
</div>
</div>
@endsection