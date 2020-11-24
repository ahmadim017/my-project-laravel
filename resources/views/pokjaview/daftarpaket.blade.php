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

  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data Surat Tugas</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">
    <div class="table-responsive">    
<table class="table table-striped" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">No Surat Tugas</th>
        <th scope="col">Tanggal Surat</th>
        <th scope="col">SKPD</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">Pokja</th>
        <th scope="col">Tahun Anggaran</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tugas as $t)
        <tr>
          <td>{{$loop->iteration}}</td>
        <td><a href="{{route('pokjaview.detail',[$t->id])}}">{{$t->notugas}}</a></td>
          <td>{{Date::createFromDate($t->tgltugas)->format('j F Y')}}</td>
          <td>
           {{$t->opd->opd}}
          </td>
          <td>
           {{$t->usulan->namapaket}}
          </td>
          <td>
           {{$t->pokja->namapokja}}
          </td>
          <td>
            {{$t->usulan->ta}}
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