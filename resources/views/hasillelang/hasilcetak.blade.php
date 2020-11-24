<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Surat Hasil Lelang {{$hasillelang->nohasil}}</title>
</head>
<body>
    <div class="container">
        <table width="100%">
            <tr>
                <td width="90" height="80" align="center"><img src="{{ ('logo/logo.jpg') }}" width="100px"></td>
                <td><center><font size="4"><b> PEMERINTAH KABUPATEN PENAJAM PASER UTARA</b></font><br>
                    <font size="4"><b> SEKRETARIAT DAERAH</font></b><br>
                    <font size = "4"><b> UNIT KERJA PENGADAAN BARANG/JASA (UKPBJ)</b></font><br>
                    <font size ="2"><b>Jalan Propinsi Km.9 Nipah-Nipah Telp.(0542) 7211400 Fax. (0542) 7211515 PENAJAM - KALIMANTAN TIMUR<b></font></center>
                    
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
        </table>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="60%" valign="top" style="padding-right:10px">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="60" valign="top">Nomor</td>
                        <td width="10" align="center" valign="top"><strong>:</strong></td>
                        <td valign="top">{{$hasillelang->nohasil}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Lamp.</td>
                        <td align="center" valign="top"><strong>:</strong></td>
                        <td valign="top">1 (satu) berkas</td>
                      </tr>
                      <tr>
                        <td valign="top">Perihal</td>
                        <td align="center" valign="top"><strong>:</strong></td>
                        <td valign="top"><em><strong><u>Laporan Hasil Pelaksanaan Pemilihan Penyedia Barang/Jasa</u></strong></em></td>
                      </tr>
                    </tr>
            </table>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>Penajam, {{Date::createFromDate($hasillelang->tglhasil)->format('j F Y')}}</td>
              </tr>
            <tr>
              <td>Kepada Yth. </td>
            </tr>
            </table>

            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                <td>Kepala {{$hasillelang->tugas->opd->opd}}&nbsp;</td>
                </tr>
                <tr>
                    <td>Penajam Paser Utara</td>
                  </tr>
                  <tr>
                    <td>di -</td>
                  </tr>
                  <tr>
                    <td>&nbsp; &nbsp; &nbsp; Tempat</td><br><br>
                
                  </tr>
            </table></td><br>
            <br>
            <br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="70">&nbsp;</td>
                <td>Menindaklanjuti surat usulan dari <strong>:</strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
            </tr>
              <tr>
                <td>&nbsp;</td>
                <td style="padding-left:10px">
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr>
                    <td width="150" valign="top">SKPD</td>
                    <td width="15" align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->tugas->opd->opd}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Nomor Surat</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->tugas->usulan->nousul}}</td>
                  </tr>
                  
                  <tr>
                    <td valign="top">Tanggal Surat</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">{{Date::createFromDate($hasillelang->tugas->usulan->tglusul)->format('j F Y')}}</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td> <br>          &nbsp; &nbsp; &nbsp; &nbsp; Sehubungan hal tersebut diatas, disampaikan bahwa proses pemilihan penyedia barang/jasa secara E-Purchasing telah selesai dilaksanakan dengan hasil sebagai berikut  :</td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;<br></td>
                <td style="padding-left:10px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150" valign="top">Nama Pekerjaan</td>
                    <td width="15" align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->tugas->usulan->namapaket}}</td>
                  </tr>
                  <tr>
                    <td valign="top">HPS</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">Rp. {{number_format($hasillelang->tugas->usulan->hps)}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Sumber Dana</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->tugas->usulan->sumberdana}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Nama Pemenang</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->namapemenang}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Harga Penawaran</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">Rp. {{number_format($hasillelang->hargapenawaran)}} </td>
                  </tr>
                  <tr>
                    <td valign="top">Harga Penawaran Terkoreksi</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">Rp. {{number_format($hasillelang->hargaterkoreksi)}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Tahun Anggaran</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->tugas->usulan->ta}}</td>
                  </tr>
                  <tr>
                    <td valign="top">NPWP</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$hasillelang->npwp}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Tanggal SPPBJ</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{Date::createFromDate($hasillelang->tglsppbj)->format('j F Y')}}</td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><br>          
                &nbsp; &nbsp; &nbsp; &nbsp; Demikian disampaikan untuk dapat dipergunakan sebagaimana mestinya dalam proses selanjutnya dengan berkas terlampir.</td>
              </tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              
              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="60%" valign="top" style="padding-right:10px">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;<br></td>
                        </tr>
                </table>
            <td valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><br><br></td>
                    </tr>
                <tr>
                <td><center> Kepala Bagian Barang dan Jasa</center></td>
                  </tr>
                <tr>
                  <td><center> Selaku Kepala UKPBJ</center></td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td><center><b><u>Irwan Ardana, ST.,MT</u></b></center></td>
                </tr>
                <tr>
                    <td><center><b>NIP. 197911102007011020</b></center></td>
                </tr>
                </table>
            </table>
              
    </div>
        
</body>
</html>
