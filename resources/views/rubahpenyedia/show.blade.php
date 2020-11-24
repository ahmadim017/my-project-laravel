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
      <td colspan="3"><strong>{{$perubahanpenyedia->namaperusahaan}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Bentuk Usaha</th>
  <td colspan="3"><strong>{{$perubahanpenyedia->bentukusaha}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Email</th>
<td><strong>{{$perubahanpenyedia->email}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">NPWP</th>
  <td><strong>{{$perubahanpenyedia->npwp}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Telpon</th>
  <td><strong>{{$perubahanpenyedia->telp}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Alamat</th>
  <td><strong>{{$perubahanpenyedia->alamat}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Tanggal Perubahan</th>
    <td><strong>{{$perubahanpenyedia->created_at}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">keterangan</th>
    <td><strong>{{$perubahanpenyedia->keterangan}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">File Pendukung</th>
  <td><strong><a href="{{route('rubahpenyedia.download',[$perubahanpenyedia->id])}}"><i class="fas fa-download fa-fw fa-sm"></i>{{$perubahanpenyedia->nama_file}}</a></strong></td>
  </tr>
</table>
</div>
<a href="{{route('rubahpenyedia.edit',[$perubahanpenyedia->id])}}" class="btn btn-primary btn-sm"><i class="far fa-edit fa-fw fa-sm"></i>Edit</a>
<a href="{{route('rubahpenyedia.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection