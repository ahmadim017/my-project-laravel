<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Surat Tugas Pokja {{$tugas->notugas}}</title>
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
                        <td valign="top">{{$tugas->notugas}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Lamp.</td>
                        <td align="center" valign="top"><strong>:</strong></td>
                        <td valign="top">1 (satu) berkas</td>
                      </tr>
                      <tr>
                        <td valign="top">Perihal</td>
                        <td align="center" valign="top"><strong>:</strong></td>
                        <td valign="top"><em><strong><u>Surat Tugas</u></strong></em></td>
                      </tr>
                    </tr>
            </table>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>Penajam, {{Date::createFromDate($tugas->tgltugas)->format('j F Y')}}</td>
              </tr>
            <tr>
              <td>Kepada Yth. </td>
            </tr>
            </table>

            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td>{{$tugas->pokja->namapokja}} UKPBJ&nbsp;</td>
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
                  <td valign="top">{{$tugas->opd->opd}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Nomor Surat</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$tugas->usulan->nousul}}</td>
                  </tr>
                  
                  <tr>
                    <td valign="top">Tanggal Surat</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">{{Date::createFromDate($tugas->usulan->tglusul)->format('j F Y')}}</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td> <br>          &nbsp; &nbsp; &nbsp; &nbsp; Sehubungan hal tersebut diatas, ditugaskan kepada Saudara untuk melaksanakan proses pemilihan penyedia barang dan jasa pada paket pekerjaan berikut  :</td>
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
                  <td valign="top">{{$tugas->usulan->namapaket}}</td>
                  </tr>
                  <tr>
                    <td valign="top">SKPD</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">{{$tugas->opd->opd}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Sumber Dana</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$tugas->usulan->sumberdana}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Tahun Anggaran</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$tugas->usulan->ta}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Pagu Dana</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">Rp. {{number_format($tugas->usulan->pagu)}} </td>
                  </tr>
                  <tr>
                    <td valign="top">HPS</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                    <td valign="top">Rp. {{number_format($tugas->usulan->hps)}}</td>
                  </tr>
                  <tr>
                    <td valign="top">Jangka Waktu Pelaksanaan</td>
                    <td align="center" valign="top"><strong>:</strong></td>
                  <td valign="top">{{$tugas->usulan->jangkawaktu}}</td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><br>          
                &nbsp; &nbsp; &nbsp; &nbsp; Demikian disampaikan untuk segera dilaksanakan dengan berpedoman pada ketentuan yang berlaku dan wajib melapor kembali setelah tugas selesai.</td>
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
