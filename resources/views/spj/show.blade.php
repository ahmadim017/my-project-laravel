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
                    <th class="bg-light" width="200">No Surat Hasil Lelang</th>
                    <td colspan="3"><strong>{{$spj->hasil->nohasil}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tanggal Surat Hasil Lelang</th>
                    <td colspan="3"><strong>{{Date::createFromDate($spj->hasil->tglthasil)->format('j F Y')}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light" width="200">No Surat Tugas</th>
                    <td colspan="3"><strong>{{$spj->tugas->notugas}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tanggal Surat Tugas</th>
                <td colspan="3"><strong>{{Date::createFromDate($spj->tugas->tgltugas)->format('j F Y')}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Nomor Surat Usulan</th>
                <td><strong>{{$spj->tugas->usulan->nousul}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tanggal Surat Usulan</th>
                <td><strong>{{Date::createFromDate($spj->tugas->usulan->tglusul)->format('j F Y')}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Nama Pekerjaan</th>
                <td><strong>{{$spj->tugas->usulan->namapaket}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">SKPD</th>
                <td><strong>{{$spj->tugas->opd->opd}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Sumber Dana</th>
                <td><strong>{{$spj->tugas->usulan->sumberdana}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tahun Anggaran</th>
                <td><strong>{{$spj->tugas->usulan->ta}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Pagu Dana</th>
                <td><strong>Rp.{{number_format($spj->tugas->usulan->pagu)}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Pokja UKPBJ</th>
                <td><strong>{{$spj->tugas->pokja->namapokja}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Daftar Pegawai Pokja</th>
                        <td><div class="breadcrumb">Daftar Pegawai Pokja</div>
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nip</th>
                                    <th>Golongan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $d)
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
                        </table>
                    </td>
                </tr>
            </table>
            </div>
            <a href="{{route('spj.cetak_pdf',[$spj->id])}}" class="btn btn-info btn-sm" target="_blank"><i class="far fa-file-alt fa-fw fa-sm"></i>Cetak</a>
            <a href="{{route('spj.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
          </div>
        </div>
    

    </div>
</div>
@endsection