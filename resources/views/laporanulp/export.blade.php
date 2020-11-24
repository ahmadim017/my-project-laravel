<table>
    <thead>
        <tr><th colspan="10" ><b>Pemerintah Kabupaten Penajam Paser Utara</b></th></tr>
        <tr><th colspan="10" ><b>Sekretariat Daerah Bagian Barang Jasa</b></th></tr>
        <tr><th colspan="10" ><b></b></th></tr>

        <tr>
            <th>No</th>
            <th>No Usulan</th>
            <th>Tanggal Usulan</th>
            <th>Nama Paket</th>
            <th>SKPD</th>
            <th>Sumber Dana</th>
            <th>Tahun Anggaran</th>
            <th>PAGU</th>
            <th>HPS</th>
            <th>Waktu Pelaksanaan</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $u)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$u->nousul}}</td>
        <td>{{Date::createFromDate($u->tglusul)->format('j F Y')}}</td>
        <td>{{$u->namapaket}}</td>
        <td>{{$u->opd->opd}}</td>
        <td>{{$u->sumberdana}}</td>
        <td>{{$u->ta}}</td>
        <td>{{number_format($u->pagu)}}</td>
        <td>{{number_format($u->hps)}}</td>
        <td>{{$u->jangkawaktu}}</td>
        <td>{{$u->kategori}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>