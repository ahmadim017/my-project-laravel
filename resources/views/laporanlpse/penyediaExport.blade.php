<table>
    <thead>
        <tr><th colspan="10" ><b>Pemerintah Kabupaten Penajam Paser Utara</b></th></tr>
        <tr><th colspan="10" ><b>Sekretariat Daerah Bagian Barang Jasa</b></th></tr>
        <tr><th colspan="10" ><b>Laporan Penyedia Baru</b></th></tr>

        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Bentuk Usaha</th>
            <th>NPWP</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $u)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$u->namaperusahaan}}</td>
        <td>{{$u->bentukusaha}}</td>
        <td>{{$u->npwp}}</td>
        <td>{{$u->alamat}}</td>
        <td>{{$u->email}}</td>
        <td>{{$u->telp}}</td>
        <td>{{$u->created_at}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>