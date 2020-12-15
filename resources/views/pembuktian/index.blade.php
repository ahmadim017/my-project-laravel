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
    <a href="{{route('pembuktian.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah BA Pembuktian</a>
    </div> 
</div><br>

  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data Berita Acara Pembuktian</h6>
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
        <th scope="col">No BA Pembuktian</th>
        <th scope="col">Tanggal BA Pembuktian</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">Pokja</th>
        <th scope="col">Tahun Anggaran</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($pembuktian as $pb)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td><a href="{{route('pembuktian.show',[$pb->id])}}">{{$pb->nopembuktian}}</a></td>
        <td>{{Date::createFromDate($pb->tglpembuktian)->format('j F Y')}}</td>
          <td>
           {{$pb->tugas->usulan->namapaket}}
          </td>
          <td>
           {{$pb->tugas->pokja->namapokja}}
          </td>
          <td>
            {{$pb->tugas->usulan->ta}}
          </td>
          @endforeach
    </tr> 
       
      
      
    </tbody>
  </table>
    </div>
</div>
</div>
</div>
@endsection