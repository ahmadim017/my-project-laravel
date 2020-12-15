@extends('layouts.sbadmin')

@section('content') 
<div class="col-md-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">Detail Surat Hasil Lelang</h6>
        </a>
    
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
          <div class="card-body">
            <div class="table-responsive">
<table class="table">
    <tr>
        <th class="bg-light" width="200">No Surat Tugas</th>
        <td colspan="3"><strong>{{$hasillelang->tugas->notugas}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Tugas</th>
    <td colspan="3"><strong>{{Date::createFromDate($hasillelang->tugas->tgltugas)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nomor Surat Usulan</th>
    <td><strong>{{$hasillelang->tugas->usulan->nousul}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Usulan</th>
    <td><strong>{{Date::createFromDate($hasillelang->tugas->usulan->tglusul)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nama Pekerjaan</th>
    <td><strong>{{$hasillelang->tugas->usulan->namapaket}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">SKPD</th>
    <td><strong>{{$hasillelang->tugas->opd->opd}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Sumber Dana</th>
    <td><strong>{{$hasillelang->tugas->usulan->sumberdana}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tahun Anggaran</th>
    <td><strong>{{$hasillelang->tugas->usulan->ta}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Pagu Dana</th>
    <td><strong>Rp.{{number_format($hasillelang->tugas->usulan->pagu)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">HPS</th>
    <td><strong>Rp.{{number_format($hasillelang->tugas->usulan->hps)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nama Pemenang</th>
    <td><strong>{{$hasillelang->namapemenang}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">NPWP</th>
    <td><strong>{{$hasillelang->npwp}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Harga Penawaran</th>
    <td><strong>Rp.{{number_format($hasillelang->hargapenawaran)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Harga Penawaran Terkoreksi</th>
    <td><strong>Rp.{{number_format($hasillelang->hargaterkoreksi)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Jangka Waktu Pelaksanaan</th>
    <td><strong>{{$hasillelang->tugas->usulan->jangkawaktu}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal SPPBJ</th>
    <td><strong>{{Date::createFromDate($hasillelang->tglsppbj)->format('j F Y')}}</strong></td>
    </tr>
</table>
<a href="{{route('hasillelang.cetak_pdf',[$hasillelang->id])}}" class="btn btn-info btn-sm" target="_blank"><i class="far fa-file-alt fa-fw fa-sm"></i>Cetak</a>
@if (Auth::user()->roles == "ADMIN")
      <a href="{{route('hasillelang.edit',[$hasillelang->id])}}" class="btn btn-primary btn-sm">Edit</a> 
      <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('hasillelang.destroy',[$hasillelang->id])}}" class="d-inline" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
          </form>
          </form>
          @endif
<a href="{{route('hasillelang.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
          </div>
        </div>
    </div>

    </div>
</div>
@endsection