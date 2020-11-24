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
        <th class="bg-light" width="200">No Surat Tugas</th>
        <td colspan="3"><strong>{{$tugas->notugas}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Tugas</th>
    <td colspan="3"><strong>{{Date::createFromDate($tugas->tgltugas)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nomor Surat Usulan</th>
    <td><strong>{{$tugas->usulan->nousul}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tanggal Surat Usulan</th>
    <td><strong>{{Date::createFromDate($tugas->usulan->tglusul)->format('j F Y')}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Nama Pekerjaan</th>
    <td><strong>{{$tugas->usulan->namapaket}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">SKPD</th>
    <td><strong>{{$tugas->opd->opd}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Sumber Dana</th>
    <td><strong>{{$tugas->usulan->sumberdana}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Tahun Anggaran</th>
    <td><strong>{{$tugas->usulan->ta}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Pagu Dana</th>
    <td><strong>Rp.{{number_format($tugas->usulan->pagu)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">HPS</th>
    <td><strong>Rp.{{number_format($tugas->usulan->hps)}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Jangka Waktu Pelaksanaan</th>
    <td><strong>{{$tugas->usulan->jangkawaktu}}</strong></td>
    </tr>
    <tr>
        <th class="bg-light">Pokja UKPBJ</th>
    <td>
        <div class="breadcrumb">
            Daftar Pegawai UKPBJ
        </div>
        <table  class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>User ID</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $d)
                @foreach ($data as $da)
                            @if ($da == $d->id)
                    <tr>
                            <td>#</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->username}}</td>
                            <td>{{$d->email}}</td> 
                    </tr>
                    @endif 
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </td>
    </tr>
</table>
<a href="{{route('pokjaview.daftarpaket')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
          </div>
        </div>
    

    </div>
</div>
@endsection