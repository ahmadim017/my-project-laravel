@extends('layouts.sbadmin')

@section('content')


<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail Surat Tugas</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
<table class="table">
  <tr>
      <th class="bg-light"  width="200">Nomor Surat Usulan</th>
  <td><strong>{{$tugas->nousul}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tanggal Surat Usulan</th>
  <td><strong>{{Date::createFromDate($tugas->tglusul)->format('j F Y')}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Nama Pekerjaan</th>
  <td><strong>{{$tugas->namapaket}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">SKPD</th>
  <td><strong>{{$tugas->opd->opd}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Sumber Dana</th>
  <td><strong>{{$tugas->sumberdana}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tahun Anggaran</th>
  <td><strong>{{$tugas->ta}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Pagu Dana</th>
  <td><strong>Rp.{{number_format($tugas->pagu)}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">HPS</th>
  <td><strong>Rp.{{number_format($tugas->hps)}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Jangka Waktu Pelaksanaan</th>
  <td><strong>{{$tugas->jangkawaktu}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Kode Rekening (MAK)</th>
<td><strong>{{$tugas->mak}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Kategori</th>
<td><strong>{{$tugas->kategori}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Usulan</th>
<td><strong>{{$tugas->usul}}</strong></td>
</tr>
  
</table>

       <a href="{{route('stugas.buatpaket',[$tugas->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-sm"></i> Buat Paket</a>
        <a href="{{route('stugas.lpaket')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
     
      
    </div>
    <!-- /.card-body -->
  </div><br>
  <!-- /.card -->
@endsection