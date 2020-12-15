@extends('layouts.sbadmin')

@section('content') 
<div class="col-md-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">Detail BA Pembuktian</h6>
        </a>
    
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
          <div class="card-body">
            <div class="table-responsive">
<table class="table">
    <tr>
        <th class="bg-light" width="200">No Surat Pembuktian</th>
        <td colspan="3"><strong>{{$pembuktian->nopembuktian}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Pembuktian</th>
    <td colspan="3"><strong>{{Date::createFromDate($pembuktian->tglpembuktian)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nomor Surat Tugas</th>
    <td><strong>{{$pembuktian->tugas->notugas}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Tugas</th>
    <td><strong>{{Date::createFromDate($pembuktian->tugas->tgltugas)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nomor Surat Usulan</th>
    <td><strong>{{$pembuktian->tugas->usulan->nousul}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Usulan</th>
    <td><strong>{{Date::createFromDate($pembuktian->tugas->usulan->tglusul)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nama Pekerjaan</th>
    <td><strong>{{$pembuktian->tugas->usulan->namapaket}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">SKPD</th>
    <td><strong>{{$pembuktian->tugas->opd->opd}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Sumber Dana</th>
    <td><strong>{{$pembuktian->tugas->usulan->sumberdana}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tahun Anggaran</th>
    <td><strong>{{$pembuktian->tugas->usulan->ta}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Pagu Dana</th>
    <td><strong>Rp.{{number_format($pembuktian->tugas->usulan->pagu)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">HPS</th>
    <td><strong>Rp.{{number_format($pembuktian->tugas->usulan->hps)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Jangka Waktu Pelaksanaan</th>
    <td><strong>{{$pembuktian->tugas->usulan->jangkawaktu}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Pokja UKPBJ</th>
    <td><strong>{{$pembuktian->tugas->pokja->namapokja}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Dokumen Pembuktian</th>
    <td><strong><a href="{{route('pembuktian.download',[$pembuktian->id])}}"><i class="fas fa-download fa-fw fa-sm"></i>{{$pembuktian->nama_file}}</a></strong></td>
    </tr>
    <tr>
        <th class="bg-light">Foto Dokumentasi Pembuktian</th>
        <td> 
        @foreach ($data as $d)
        <a href="#"><img src="{{asset('public/foto_dokumentasi/'.$d)}}" width="200px" class="img-thumbnail"></a>
        @endforeach
        </td>
    </tr>
</table>
@if (Auth::user()->roles == "ADMIN")
<a href="{{route('pembuktian.edit',[$pembuktian->id])}}" class="btn btn-primary btn-sm">Edit</a> 
<form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('pembuktian.destroy',[$pembuktian->id])}}" class="d-inline" method="POST">
@csrf
<input type="hidden" name="_method" value="DELETE">
<input type="submit" value="Delete" class="btn btn-danger btn-sm">
</form>
@endif
<a href="{{route('pembuktian.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
          </div>
        </div>
    </div>

    </div>
</div>
@endsection