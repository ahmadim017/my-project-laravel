@extends('layouts.sbadmin')

@section('content')
<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail Usulan Lelang</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
<table class="table">
  <tr>
      <th class="bg-light" width="200">No surat Usulan</th>
      <td colspan="3"><strong>{{$usulan->nousul}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tanggal Surat Usulan</th>
  <td colspan="3"><strong>{{Date::createFromDate($usulan->tglusul)->format('j F Y')}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Usulan</th>
<td><strong>{{$usulan->usul}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Nama Pekerjaan</th>
  <td><strong>{{$usulan->namapaket}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">SKPD</th>
  <td><strong>{{$usulan->opd->opd}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Sumber Dana</th>
  <td><strong>{{$usulan->sumberdana}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tahun Anggaran</th>
  <td><strong>{{$usulan->ta}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Pagu Dana</th>
  <td><strong>Rp.{{number_format($usulan->pagu)}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">HPS</th>
  <td><strong>Rp.{{number_format($usulan->hps)}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Kode Rekening (MAK)</th>
<td><strong>{{$usulan->mak}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Jangka Waktu Pelaksanaan</th>
  <td><strong>{{$usulan->jangkawaktu}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Kategori Pengadaan</th>
    <td><strong>{{$usulan->kategori}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">File Surat Usulan</th>
  <td><strong><a href="{{route('usulan.download',[$usulan->id])}}"><i class="fas fa-download fa-fw fa-sm"></i>{{$usulan->tittle}}</a></strong></td>
  </tr>
</table>
</div>
<a href="{{route('usulan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection