<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Tanda Terima Honorarium Pokja</title>
<style type="text/css">

.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.style4 {font-size: 12px}

</style>
</head>

<body>
<p align="center" class="style1"><strong>DAFTAR TANDA TERIMA HONORARIUM POKJA UKPBJ PER PAKET PEKERJAAN</strong></p>
<p align="center" class="style1"><strong>TAHUN ANGGARAN {{$spj->tugas->usulan->ta}} </strong></p>
<p align="center" class="style1"><strong>Bagian Pengadaan Barang dan Jasa </strong></p>
<p class="style3">No. Rek. 4.00.01.01.15.46.5.2.1.01.01</p>
<p class="style3">Kegiatan : Unit Layanan Pengadaan (ULP) Pemkab. PPU</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="145"><span class="style3">Nama Paket Pekerjaan</span></td>
    <td width="5">:</td>
    <td ><span class="style3">{{$spj->tugas->usulan->namapaket}}</span></td>
  </tr>
  <tr>
    <td><span class="style3">Pagu Pekerjaan</span></td>
    <td>:</td>
    <td><span class="style3">Rp.{{number_format($spj->tugas->usulan->pagu)}}</span></td>
  </tr>
  <tr>
    <td><span class="style3">SKPD</span></td>
    <td>:</td>
    <td><span class="style3">{{$spj->tugas->opd->opd}}</span></td>
  </tr>
  <tr>
    <td><span class="style3">No Surat Usulan Dari SKPD</span></td>
    <td>:</td>
    <td><span class="style3">{{$spj->tugas->usulan->nousul}}</span></td>
  </tr>
  <tr>
    <td><span class="style3">Laporan Hasil Pemilihan</span></td>
    <td>:</td>
    <td><span class="style3">{{$spj->hasil->nohasil}}</span></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellspacing="0" cellpadding="6">
  <tr>
    <td width="25"><div align="center" class="style3">No</div></td>
    <td width="125"><div align="center" class="style3">Nama</div></td>
    <td width="80"><div align="center" class="style3">Jabatan Di ULP </div></td>
    <td width="100"><div align="center" class="style3">Besaran Honor Per Paket </div></td>
    <td width="100"><div align="center" class="style3">PPh 21 </div></td>
    <td width="100"><div align="center" class="style3">Jumlah Yang Diterima </div></td>
    <td width="100"><div align="center" class="style3">Tanda Tangan </div></td>
  </tr>
  @foreach ($pegawai as $d)
  @foreach ($data as $da)
    @if ($da == $d->id)
  <tr>
    <td><div align="center" class="style4">{{$loop->iteration}}</div></td>
    <td><div align="center" class="style4">{{$d->nama}}</div></td>
    <td><div align="center" class="style4">{{$spj->tugas->pokja->namapokja}}</div></td>
    <td><div align="center" class="style4">Rp. {{number_format($honor)}}</div></td>
    <td><div align="center" class="style4">5% = Rp. {{number_format($pph)}}</div></td>
    <td><div align="center" class="style4">Rp. {{number_format($terima)}}</div></td>
    <td><span class="style4">{{$loop->iteration}} .................... </span></td>
  </tr>
  @endif 
  @endforeach
  @endforeach
  
  <tr>
    <td colspan="3"><div align="center" class="style3">Jumlah</div></td>
    <td><div align="center" class="style4">Rp. {{number_format($jmlhonor)}}</div></td>
    <td><div align="center" class="style4">Rp. {{number_format($jmlpph)}}</div></td>
    <td><div align="center" class="style4">Rp. {{number_format($jmlterima)}}</div></td>
    <td><span class="style4"></span></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100"><div align="center" class="style3">Pejabat Pelaksana Teknis Kegiatan </div></td>
    <td width="100"><div align="center" class="style3">Pengguna Anggaran / Kuasa Pengguna Anggaran </div></td>
  </tr>
  <tr>
    <td><span class="style3"></span>&nbsp;</td>
    <td><span class="style3"></span>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style3"></span>&nbsp;</td>
    <td><span class="style3"></span>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style3"></span>&nbsp;</td>
    <td><span class="style3"></span>&nbsp;</td>
  </tr>
  <tr>
    @foreach ($pptk as $p)
    <td><div align="center"><span class="style3"><u>{{$p->nama}}</u></span></div></td>
    @endforeach
    @foreach ($kepala as $k)
    <td><div align="center"><span class="style3"><u>{{$k->nama}}</u></span></div></td>
    @endforeach
  </tr>
  <tr>
    @foreach ($pptk as $p)
    <td><div align="center"><span class="style3">NIP. {{$p->nip}}</span></div></td>
    @endforeach
    @foreach ($kepala as $k)
    <td><div align="center"><span class="style3">NIP. {{$k->nip}} </span></div></td>
    @endforeach
  </tr>
</table>
</body>
</html>
