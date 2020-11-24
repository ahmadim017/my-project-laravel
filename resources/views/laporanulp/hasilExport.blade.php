<table>
    <thead>
        <tr><th colspan="10" ><b>Pemerintah Kabupaten Penajam Paser Utara</b></th></tr>
        <tr><th colspan="10" ><b>Sekretariat Daerah Bagian Barang Jasa</b></th></tr>
        <tr><th colspan="10" ><b>Laporan Hasil Lelang</b></th></tr>

        <tr>
            <th>No</th>
            <th>No Surat Hasil Lelang</th>
            <th>Tanggal</th>
            <th>Nama Paket</th>
            <th>SKPD</th>
            <th>Sumber Dana</th>
            <th>Tahun Anggaran</th>
            <th>PAGU</th>
            <th>HPS</th>
            <th>Nama Pemenang</th>
            <th>NPWP</th>
            <th>Harga Penawaran</th>
            <th>Harga Terkoreksi</th>
            <th>Tanggal SPPBJ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $u)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$u->nohasil}}</td>
        <td>{{Date::createFromDate($u->tgltugas)->format('j F Y')}}</td>
        <td>{{$u->tugas->usulan->namapaket}}</td>
        <td>{{$u->tugas->opd->opd}}</td>
        <td>{{$u->tugas->usulan->sumberdana}}</td>
        <td>{{$u->tugas->usulan->ta}}</td>
        <td>{{number_format($u->tugas->usulan->pagu)}}</td>
        <td>{{number_format($u->tugas->usulan->hps)}}</td>
        <td>{{$u->namapemenang}}</td>
        <td>{{$u->npwp}}</td>
        <td>{{$u->hargapenawaran}}</td>
        <td>{{$u->hargaterkoreksi}}</td>
        <td>{{Date::createFromDate($u->tglsppbj)->format('j F Y')}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>