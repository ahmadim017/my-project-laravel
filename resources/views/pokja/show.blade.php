@extends('layouts.sbadmin')

@section('content')
<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail POKJA</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <div class="table-responsive">
<table class="table">
  <tr>
      <th class="bg-light" width="200">Nama Pokja</th>
      <td colspan="3"><strong>{{$pokja->namapokja}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Status</th>
  <td colspan="3"><strong>@if ($pokja->status == "ACTIVE")
      <span class="badge badge-success">{{$pokja->status}}</span>
      @else 
  <span class="badge badge-warning">{{$pokja->status}}</span>
  @endif</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tanggal Pembuatan</th>
  <td><strong>{{Date::createFromDate($pokja->tglpembuatan)->format('j F Y')}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Daftar Pegawai Pokja</th>
  <td><div class="breadcrumb">
    Daftar Pegawai UKPBJ
</div>
<table  class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Nip</th>
            <th>Golongan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $d)
        @foreach ($data as $da)
                    @if ($da == $d->id)
            <tr>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->nip}}</td>
                    <td>{{$d->golongan}}</td> 
            </tr>
            @endif 
            @endforeach
        @endforeach
    </tbody>
</table></td>
  </tr>
  
</table>
<a href="{{route('pokja.edit',[$pokja->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit fa-fw fa-sm"></i>Edit</a>
<a href="{{route('pokja.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
      </div>

  </div>
</div>
@endsection



