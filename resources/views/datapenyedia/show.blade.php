@extends('layouts.sbadmin')

@section('content')
<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
<table class="table">
  <tr>
      <th class="bg-light" width="200">Nama Perusahaan</th>
      <td colspan="3"><strong>{{$datapenyedia->namaperusahaan}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Bentuk Usaha</th>
  <td colspan="3"><strong>{{$datapenyedia->bentukusaha}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Email</th>
<td><strong>{{$datapenyedia->email}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">NPWP</th>
  <td><strong>{{$datapenyedia->npwp}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Telpon</th>
  <td><strong>{{$datapenyedia->telp}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Alamat</th>
  <td><strong>{{$datapenyedia->alamat}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Tanggal Terdaftar</th>
<td><strong>{{$datapenyedia->created_at}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">File Kelengkapan Data Penyedia</th>
  <td><strong><a href="{{route('datapenyedia.download',[$datapenyedia->id])}}"><i class="fas fa-download fa-fw fa-sm"></i>{{$datapenyedia->nama_file}}</a></strong></td>
  </tr>
</table>
</div>
<a href="{{route('datapenyedia.edit',[$datapenyedia->id])}}" class="btn btn-primary btn-sm"><i class="far fa-edit fa-fw fa-sm"></i>Edit</a>
<a href="{{route('datapenyedia.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection