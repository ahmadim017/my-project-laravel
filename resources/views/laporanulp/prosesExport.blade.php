<table>
    <thead>
        <tr><th colspan="10" ><b>Pemerintah Kabupaten Penajam Paser Utara</b></th></tr>
        <tr><th colspan="10" ><b>Sekretariat Daerah Bagian Barang Jasa</b></th></tr>
        <tr><th colspan="10" ><b>Laporan Proses Lelang</b></th></tr>

        <tr>
            <th>No</th>
            <th>No Surat Tugas</th>
            <th>Tanggal Surat Tugas</th>
            <th>Nama Paket</th>
            <th>SKPD</th>
            <th>Sumber Dana</th>
            <th>Tahun Anggaran</th>
            <th>PAGU</th>
            <th>HPS</th>
            <th>Pokja</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $u)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$u->notugas}}</td>
        <td>{{Date::createFromDate($u->tgltugas)->format('j F Y')}}</td>
        <td>{{$u->usulan->namapaket}}</td>
        <td>{{$u->opd->opd}}</td>
        <td>{{$u->usulan->sumberdana}}</td>
        <td>{{$u->usulan->ta}}</td>
        <td>{{number_format($u->usulan->pagu)}}</td>
        <td>{{number_format($u->usulan->hps)}}</td>
        <td>{{$u->pokja->namapokja}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>