<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print skrining</title>
    <link rel="stylesheet" href="../../assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <style>
      .body, table, td, div, span, div, p, textarea {
        font: 8px Verdana, sans-serif;
        /* line-height: 15px; */
        color: #333333
      }
      #con {
        width: 100%;
        text-align: left;
        margin: 0 auto
      }
      #cont {
        padding: 15px 15px 15px
      }
      .edit_submission {
        width: 100%
      }

      .edit_submission h3 {
        border-bottom: 1px solid #cccccc;
        margin: 0 0 8px;
        color: #4b6c4e;
        font-size: 5pt;
        letter-spacing: 1px
      }

      .edit_submission .list_table {
        margin-bottom: 7px
      }
      .list_table, .submissions_table {
        border: 1px solid #dddddd;
        border-spacing: 1px;
        width: 100%;
      }
      .list_table th, .submissions_table p {
        margin: 0;
        padding: 0
      }
      .list_table th td {
        vertical-align: middle
      }

      .list_table td {
        vertical-align: middle
      }

      .list_table tr {
        background-color: #f2f2f2;
        /* height: 21px */
      }
      .edit_submission {
        /* margin-top: 55px; */
      }
      .pad_left_small {
        padding-left: 4px;
        width:200px;
      }
      .text-center {
        text-align: center;
      }
       .title-footer {
        padding: 5px 5px 5px 5px;
        background-color: #f2f2f2;
        margin-top: 5px;
        text-align:center;
        white-space: nowrap;
      }
      .footer {
        position: fixed;
        bottom: 0;
        left: 50%;
      transform: translateX(-50%);
      }
      .print-skrining {
        background-color: #d23a3a;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 1.5rem;
      }
      .no-print {
        text-align: right;
      }
      .fa-print {
        margin-right: 5px;
      }
      @media print {
        .no-print {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <?php
    include '../../config/connection.php';
    include '../../config/function.php';

    $query  = $connection->query("SELECT * FROM skrining JOIN identitas ON identitas.identitas_id = skrining.identitas_id WHERE skrining_id = '".$_GET['id']."'");
    $hasil  = $query->fetch_assoc();

    $queryRiwayat  = $connection->query("SELECT * FROM skrining_riwayat_kehamilan WHERE skrining_id = '".$_GET['id']."'");
    $hasilRiwayat  = $queryRiwayat->fetch_assoc();

    // $coba6                = $hasil['crl']/10;
    // $coba5                = 1.684969+(0.315646*$coba6)-(0.049306*(pow($coba6,2)))+(0.004057*(pow($coba6,3)))-(0.000120456*(pow($coba6,4)));
    // $coba4                = pow(2.71828183,$coba5);
    // $coba3                = round($coba4*7);
    // $coba2                = 280-$coba3;
    // $taksiran_persalinan  = date('Y-m-d', strtotime('+'.$coba2.' days', strtotime($hasil['tanggal_pemeriksaan'])));
    //
    // $minggu_kehamilan = substr($coba4,0,2);
    // $hari_kehamilan   = round(($coba4-$minggu_kehamilan)*7);
    //
    // $bmi = ($hasil['berat_badan'])/(($hasil['tinggi_badan']/100)*($hasil['tinggi_badan']/100));
    //
    // $mom_map = $hasil['map']/82.6;
     ?>
    <!-- <div class="no-print">
     <button type="button" class="print-skrining"><i class="fas fa-print"></i>print</button>
    </div> -->
    <div class="body">
      <div id="con">
        <div id="">
          <table cellspacing="0" cellpadding="0" width="100%">
            <tbody>
              <tr>
                <td> <img width="70px" src="../../assets/img/brand/blue.png" alt=""> </td>
              </tr>
              <tr>
                <td >
                  <div class="edit_submission">
                    <!-- <form> -->
                    	<h2 style="margin-bottom:5px;">Skrining 11-13 Minggu</h2>
                        <h3>IDENTITAS</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="pad_left_small" >Nama</td>
                              <td ><?= $hasil['nama_ibu']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >No Rm</td>
                              <td ><?= $hasil['no_rm']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >Tanggal Lahir</td>
                              <td ><?= date_format(date_create($hasil['tanggal_lahir_ibu']),'d/m/Y'); ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >Usia</td>
                              <td ><?= usia($hasil['tanggal_lahir_ibu']); ?> Tahun</td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >No HP</td>
                              <td ><?= $hasil['telepon_ibu']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >Tanggal Pemeriksaan</td>
                              <td ><?= date_format(date_create($hasil['tanggal_pemeriksaan']),'d/m/Y H:i'); ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >Usia Kehamilan Berdasarkan</td>
                              <td ><?= $hasil['usia_kehamilan_berdasarkan'].' : '.$hasil['usia_kehamilan_in']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small" >Uisa Kehamilan</td>
                              <td ><?= $hasil['usia_kehamilan_out']; ?></td>
                            </tr>
                          </tbody>
                        </table>

                        <h3>RIWAYAT KEHAMILAN</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="pad_left_small">Metode Konsepsi</td>
                              <td width="25%"><?= ($hasil['metode_konsepsi'] == '0') ? 'Spontan' : 'IVF/Inseminasi' ; ?></td>
                              <td class="pad_left_small">Riwayat Hamil dengan PE</td>
                              <td><?= ($hasil['riwayat_hamil_pe'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">G-P-A</td>
                              <td><?= $hasil['g_p_a']; ?></td>
                              <td class="pad_left_small">Riwayat PJT</td>
                              <td><?= ($hasil['riwayat_pjt'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Interval Kehamilan</td>
                              <td><?= ($hasil['interval_kehamilan'] == '0') ? '>=10 tahun' : '< 10 tahun/anak pertama' ; ?></td>
                              <td class="pad_left_small">Riwayat Preterm Birth (<37 minggu)</td>
                              <td><?= ($hasil['riwayat_preterm_birth'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Anak Hidup</td>
                              <td><?= $hasil['anak_hidup']; ?></td>
                              <td class="pad_left_small" colspan="2"><b>Riwayat Kehamilan Sebelumnya</b></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Merokok saat Hamil</td>
                              <td><?= ($hasil['merokok'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                              <td class="pad_left_small" colspan="2" rowspan="6">
                                Tanggal Lahir : <?= $hasilRiwayat['tanggal_lahir_riwayat']; ?>,
                                Berat Badan : <?= $hasilRiwayat['berat_lahir_riwayat']; ?>,
                                Jenis Kelamin : <?= $hasilRiwayat['jenis_kelamin_riwayat']; ?>,
                                Usia Kehamilan : <?= $hasilRiwayat['usia_kehamilan_saat_lahir_riwayat']; ?>,
                                Cara Persalinan : <?= $hasilRiwayat['cara_persalinan_riwayat']; ?>,
                                Kondisi : <?= $hasilRiwayat['kondisi_saat_lahir_riwayat']; ?>.<br>
                              </td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Riwayat Ibu/kakak PE</td>
                              <td><?= ($hasil['riwayat_ibu_kakak_pe'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Penyakit Lupus</td>
                              <td><?= ($hasil['penyakit_lupus'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Penyakit APS</td>
                              <td><?= ($hasil['penyakit_aps'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Hipertensi Kronik</td>
                              <td><?= ($hasil['hipertensi_kronik'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Diabetes Mellitus</td>
                              <td><?= ($hasil['diabetes_militus'] == '0') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                          </tbody>
                        </table>

                        <h3>PEMERIKSAAN FISIK</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td  class="pad_left_small">Berat Badan</td>
                              <td><?= $hasil['berat_badan']; ?> kg</td>
                            </tr>
                            <tr>
                              <td  class="pad_left_small">Tinggi Badan</td>
                              <td><?= $hasil['tinggi_badan']; ?> cm</td>
                            </tr>
                            <tr>
                              <td  class="pad_left_small">BMI</td>
                              <td><?= round($hasil['bmi'], 2); ?></td>
                            </tr>
                            <tr>
                              <td  class="pad_left_small">Mean arterial pressure</td>
                              <td><?= $hasil['map']; ?> (<?= $mom_map = round($hasil['map']/82.6, 3); ?> MoM)</td>
                            </tr>
                          </tbody>
                        </table>

                        <h3>USG SKRINING</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="pad_left_small">Kondisi Pemeriksaan</td>
                              <td><?= $hasil['kondisi_pemeriksaan']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Lokasi Kehamilan</td>
                              <td><?= $hasil['lokasi_kehamilan']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Denyut Jantung Janin</td>
                              <td><?php //$hasil['denyut_jantung_janin']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Regurgitasi Trikuspid</td>
                              <td><?php // ($hasil['regurgitasi_trikuspid'] == '0') ? 'Tidak ada' : 'Ada'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Irama</td>
                              <td><?php // $hasil['irama']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Gerak Janin</td>
                              <td><?php //($hasil['gerak_janin'] == '0') ? 'Tidak ada' : 'Ada'; ?></td>
                            </tr>
                            <?php if ($hasil['usia_kehamilan_berdasarkan'] == 'CRL'): ?>
                              <tr>
                                <td class="pad_left_small">CRL</td>
                                <td><?= $hasil['usia_kehamilan_in']; ?></td>
                              </tr>
                            <?php endif; ?>
                            <tr>
                              <td class="pad_left_small">BPD</td>
                              <td><?php // $hasil['bpd']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">NT</td>
                              <td><?php // $hasil['nt']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">NB</td>
                              <td><?php //($hasil['nb'] == '0') ? 'Tidak ada' : 'Ada'; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Kondisi organ</td>
                              <td><?php // $hasil['kondisi_organ']; ?></td>
                            </tr>
                            <?php //if (isset($hasil['keterangan_organ']) !== ''): ?>
                              <tr>
                                <td class="pad_left_small">Keterangan organ</td>
                                <td><?php // $hasil['keterangan_organ']; ?></td>
                              </tr>
                            <?php //endif; ?>
                            <tr>
                              <td class="pad_left_small">Plasenta</td>
                              <td><?= $hasil['plasenta']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Mean UtPI</td>
                              <td><?= $hasil['mean_utpi']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">PI Ductus Venosus</td>
                              <td><?php //$hasil['ductus_venosus']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">PR Ophtalmica</td>
                              <td><?= $hasil['aospr']; ?> (<?= $utpi = round($hasil['aospr']/0.56,3); ?> MoM)</td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">A wave Ductus Venosus</td>
                              <td><?php // $hasil['awdv']; ?></td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Cairan Ketuban</td>
                              <td><?php // $hasil['cairan_ketuban']; ?></td>
                            </tr>
                            <?php if ($hasil['kesimpulan_usg'] !== ''): ?>
                              <tr>
                                <td class="pad_left_small">Kesimpulan USG</td>
                                <td><?= $hasil['kesimpulan_usg']; ?></td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>

                        <h3>PEMERIKSAAN BIOKIMIAWI</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="pad_left_small">PLGF</td>
                              <td><?= $hasil['plgf']; ?> (<?= $mom_plgf = round($hasil['plgf']/49.82, 3); ?> MoM)</td>
                            </tr>
                          </tbody>
                        </table>

                        <h3>PENILAIAN RISIKO</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <?php if ($hasil['trisomies_risk_assessment'] !== ''): ?>
                              <tr>
                                <td class="pad_left_small">Trisomies Risk Assessment</td>
                                <td><?= $hasil['trisomies_risk_assessment']; ?></td>
                              </tr>
                            <?php endif; ?>
                            <tr>
                              <td class="pad_left_small">Probability of having Pre-Eclampsia< 34 weeks</td>
                              <td>
                                <?= $hasil['pohp_34']; ?>

                                <!-- Oph + Pglf + Utpi -->
                                <?php if ($hasil['aospr'] !== '' || $hasil['pglf'] !== '' || $hasil['mean_utpi'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<49): ?>
                                    (High risk, Akurasi : 100%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 100%)
                                  <?php endif; ?>

                                <!-- Oph + Utpi -->
                                <?php elseif ($hasil['aospr'] !== '' || $hasil['mean_utpi'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<57): ?>
                                    (High risk, Akurasi : 100%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 100%)
                                  <?php endif; ?>

                                <!-- Oph + Plgf -->
                                <?php elseif ($hasil['aospr'] !== '' || $hasil['plgf'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<8): ?>
                                    (High risk, Akurasi : 78%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 78%)
                                  <?php endif; ?>

                                <!-- Utpi + Pglf -->
                                <?php elseif ($hasil['mean_utpi'] !== '' || $hasil['plgf'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<8): ?>
                                    (High risk, Akurasi : 89%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 89%)
                                  <?php endif; ?>

                                <!-- Utpi -->
                                <?php elseif ($hasil['mean_utpi'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<6): ?>
                                    (High risk, Akurasi : 89%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 89%)
                                  <?php endif; ?>

                                <!-- Oph -->
                                <?php elseif ($hasil['aospr'] !== ''): ?>
                                  <?php if ($hasil['pohp_34']<6): ?>
                                    (High risk, Akurasi : 67%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 67%)
                                  <?php endif; ?>
                                <?php endif; ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="pad_left_small">Probability of having Pre-Eclampsia< 37 weeks</td>
                              <td>
                                <?= $hasil['pohp_37']; ?>

                                <!-- Oph + Plgf + Utpi -->
                                <?php if ($hasil['aospr'] !== '' || $hasil['pglf'] !== '' || $hasil['mean_utpi'] !== ''): ?>
                                  <?php if ($hasil['pohp_37']<13): ?>
                                    (High risk, Akurasi : 71%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 71%)
                                  <?php endif; ?>

                                  <!-- Oph + Utpi -->
                                <?php elseif ($hasil['aospr'] !== '' || $hasil['mean_utpi'] !== ''): ?>
                                  <?php if ($hasil['pohp_37']<15): ?>
                                    (High risk, Akurasi : 67%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 67%)
                                  <?php endif; ?>

                                <!-- Oph + Pglf -->
                                <?php elseif ($hasil['aospr'] !== '' || $hasil['plgf'] !== ''): ?>
                                  <?php if ($hasil['pohp_37']<2): ?>
                                    (High risk, Akurasi : 52%)
                                  <?php else: ?>
                                    (Low risk, Akurasi : 52%)
                                  <?php endif; ?>

                                  <!-- Utpi + Pglf -->
                                  <?php elseif ($hasil['mean_utpi'] !== '' || $hasil['plgf'] !== ''): ?>
                                    <?php if ($hasil['pohp_37']<2): ?>
                                      (High risk, Akurasi : 62%)
                                    <?php else: ?>
                                      (Low risk, Akurasi : 62%)
                                    <?php endif; ?>

                                  <!-- Utpi -->
                                  <?php elseif ($hasil['mean_utpi'] !== ''): ?>
                                    <?php if ($hasil['pohp_37']<2): ?>
                                      (High risk, Akurasi : 52%)
                                    <?php else: ?>
                                      (Low risk, Akurasi : 52%)
                                    <?php endif; ?>

                                  <!-- Oph -->
                                  <?php elseif ($hasil['aospr'] !== ''): ?>
                                    <?php if ($hasil['pohp_37']<1.5): ?>
                                      (High risk, Akurasi : 43%)
                                    <?php else: ?>
                                      (Low risk, Akurasi : 43%)
                                    <?php endif; ?>
                                <?php endif; ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <h3>CATATAN PEMERIKSAAN</h3>
                        <table class="list_table" cellpadding="1" cellspacing="1" border="0" width="100%">
                          <tbody>
                            <tr>
                              <td class="pad_left_small">Asesmen Pasien (S-O-A)</td>
                              <td><?= $hasil['asesmen_pasien']; ?></td>
                            </tr>
                            <?php if ($hasil['rtl'] !== ''): ?>
                              <tr>
                                <td class="pad_left_small">Rencana Tindak Lanjut (P)</td>
                                <td><?= $hasil['rtl']; ?></td>
                              </tr>
                            <?php endif; ?>
                            <?php if ($hasil['catatan'] !== ''): ?>
                              <tr>
                                <td class="pad_left_small">Catatan (khusus dokter)</td>
                                <td><?= $hasil['catatan']; ?></td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                        <table width="100%" class="text-center">
                          <tbody>
                            <tr>
                              <td></td>
                              <td width="50%">Pemeriksa</td>
                            </tr>
                            <tr>
                              <td colspan="2"><br><br></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong><?php echo $hasil['pemeriksa']; ?></strong></td>
                            </tr>
                          </tbody>
                        </table>
                      <!-- </form> -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="footer">
    	<div class="title-footer">
            <p style="margin:0;">Hasil pemeriksaan USG ini bersifat sewaktu, akurasi sangat bervariasi dipengaruhi kondisi ibu, posisi janin, alat dan operator.</p>
        </div>
    </div>
    <div style="page-break-after: always;"></div>
  </body>
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
  // function printDiv()
  //   {
  //
  //   var divToPrint=document.getElementById('DivIdToPrint');
  //
  //   var newWin=window.open('','Print-Window');
  //
  //   newWin.document.open();
  //
  //   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  //
  //   newWin.document.close();
  //
  //   setTimeout(function(){newWin.close();},10);
  //
  // }
  // $('#SelectorToPrint').show().printElement();
  // $(document).ready( function () {
  //     window.print();
  //     setTimeout(function(){window.close();},10);
  // });

  </script>
</html>
