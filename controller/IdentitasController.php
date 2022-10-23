<?php
date_default_timezone_set('Asia/Jakarta');
include '../config/connection.php';
switch ($_GET['a']) {

  case 'add_identitas':

    $tanggal_lahir_ibu    = date("Y-m-d",strtotime($_POST['tanggal_lahir_ibu']));
    $tanggal_lahir_suami  = date("Y-m-d",strtotime($_POST['tanggal_lahir_suami']));
    $hpht                 = date("Y-m-d",strtotime($_POST['hpht']));
    $penyakit_dahulu      = ($_POST['radio_dahulu'] == 'Ada') ? $_POST['riwayat_penyakit_dahulu_pengobatan'] : $_POST['radio_dahulu'];
    $penyakit_keluarga    = ($_POST['radio_keluarga'] == 'Ada') ? $_POST['riwayat_penyakit_keluarga'] : $_POST['radio_keluarga'];
    $penyakit_alergi      = ($_POST['radio_alergi'] == 'Ada') ? $_POST['riwayat_alergi'] : $_POST['radio_alergi'];
    $penyakit_operasi     = ($_POST['radio_operasi'] == 'Ada') ? $_POST['riwayat_operasi'] : $_POST['radio_operasi'];
    // $tanggal_pemeriksaan  = date("Y-m-d H:i:s",strtotime($_POST['tanggal_pemeriksaan']));
    $date_created = date("Y-m-d H:i:s");
    $query = $connection->query("INSERT INTO identitas VALUES (
      NULL,
      '".$_POST['unit_id']."',
      '".$_POST['no_rm']."',
      '".$_POST['nama_ibu']."',
      '".$_POST['nama_suami']."',
      '".$_POST['nik_ibu']."',
      '".$_POST['nik_suami']."',
      '".$_POST['jkn_tk_rujukan_ibu']."',
      '".$_POST['jkn_tk_rujukan_suami']."',
      '".$_POST['gol_darah_ibu']."',
      '".$_POST['gol_darah_suami']."',
      '".$_POST['tempat_lahir_ibu']."',
      '".$_POST['tempat_lahir_suami']."',
      '".$tanggal_lahir_ibu."',
      '".$tanggal_lahir_suami."',
      '".$_POST['pendidikan_ibu']."',
      '".$_POST['pendidikan_suami']."',
      '".$_POST['pekerjaan_ibu']."',
      '".$_POST['pekerjaan_suami']."',
      '".$_POST['alamat']."',
      '".$_POST['telepon_ibu']."',
      '".$_POST['telepon_suami']."',
      '".$_POST['email']."',
      '".$_POST['penghasilan']."',
      '".$_POST['pembiayaan']."',
      '".$_POST['tempat_control_k']."',
      '".$_POST['nama_tempat_control']."',
      '".$_POST['faskes_persalinan']."',
      '".$_POST['nama_faskes_persalinan']."',
      '".$hpht."',
      '".$_POST['siklus']."',
      '".$_POST['regularitas_hpht']."',
      '".$penyakit_dahulu."',
      '".$penyakit_keluarga."',
      '".$penyakit_alergi."',
      '".$penyakit_operasi."',
      '".$date_created."')");

      // echo var_dump($query);
      if ($query = true) {
        header('location:../app/?p=identitas&message=simIndenSuc');
      } else {
        header('location:../app/?p=add_identitas&message=simIndenFail');
      }

    break;

  case 'edit_skrining':

    $tanggal_lahir        = date("Y-m-d",strtotime($_POST['tanggal_lahir']));
    $tanggal_pemeriksaan  = date("Y-m-d H:i:s",strtotime($_POST['tanggal_pemeriksaan']));
    $g_p_a = $_POST['gravida']."-".$_POST['paritas']."-".$_POST['abortus'];
    $bmi   = $_POST['berat_badan']/(($_POST['tinggi_badan']/100)*($_POST['tinggi_badan']/100));
    $pr_ophtalmica     = $_POST['psv2']/$_POST['psv1'];

    if ($_POST['usia_kehamilan_berdasarkan'] == 1) {
      $usia_kehamilan_berdasarkan = 'CRL';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 2) {
      $usia_kehamilan_berdasarkan = 'HPHT';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 3) {
      $usia_kehamilan_berdasarkan = 'Tanggal Transfer Embrio Hari Ke 3';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 4) {
      $usia_kehamilan_berdasarkan = 'Tanggal Transfer Embrio Hari Ke 5';
    }

    $query = $connection->query("UPDATE skrining SET
      nama = '".$_POST['nama']."',
      no_rm = '".$_POST['no_rm']."',
      tanggal_lahir = '$tanggal_lahir',
      usia = '".$_POST['usia']."',
      no_hp = '".$_POST['no_hp']."',
      tanggal_pemeriksaan = '$tanggal_pemeriksaan',
      usia_kehamilan_berdasarkan = '$usia_kehamilan_berdasarkan',
      usia_kehamilan_in = '".$_POST['usia_kehamilan_in']."',
      usia_kehamilan_out = '".$_POST['usia_kehamilan_out']."',
      metode_konsepsi = '".$_POST['metode_konsepsi']."',
      g_p_a = '$g_p_a',
      interval_kehamilan = '".$_POST['in_riwayat_kehamilan']."',
      anak_hidup = '".$_POST['anak_hidup']."',
      merokok = '".$_POST['merokok']."',
      riwayat_ibu_kakak_pe = '".$_POST['riwayat_ibu_kakak_pe']."',
      penyakit_lupus = '".$_POST['penyakit_lupus']."',
      penyakit_aps = '".$_POST['penyakit_aps']."',
      hipertensi_kronik = '".$_POST['hipertensi_kronik']."',
      diabetes_militus = '".$_POST['diabetes_militus']."',
      riwayat_hamil_pe = '".$_POST['riwayat_hamil_pe']."',
      riwayat_pjt = '".$_POST['riwayat_pjt']."',
      riwayat_preterm_birth = '".$_POST['riwayat_preterm_birth']."',
      berat_badan = '".$_POST['berat_badan']."',
      tinggi_badan = '".$_POST['tinggi_badan']."',
      bmi = '$bmi',
      systolic_left_1 = '".$_POST['systolic_left_1']."',
      systolic_right_1 = '".$_POST['systolic_right_1']."',
      diastolic_left_1 = '".$_POST['diastolic_left_1']."',
      diastolic_right_1 = '".$_POST['diastolic_right_1']."',
      systolic_left_2 = '".$_POST['systolic_left_2']."',
      systolic_right_2 = '".$_POST['systolic_right_2']."',
      diastolic_left_2 = '".$_POST['diastolic_left_2']."',
      diastolic_right_2 = '".$_POST['diastolic_right_2']."',
      map = '".$_POST['map']."',
      plgf = '".$_POST['pglf']."',
      kondisi_pemeriksaan = '".$_POST['kondisi_pemeriksaan']."',
      lokasi_kehamilan = '".$_POST['lokasi_kehamilan']."',
      denyut_jantung_janin = '".$_POST['denyut_jantung_janin']."',
      regurgitasi_trikuspid = '".$_POST['regurgitasi_trikuspid']."',
      irama = '".$_POST['irama']."',
      gerak_janin = '".$_POST['gerak_janin']."',
      bpd = '".$_POST['bpd']."',
      nt = '".$_POST['nt']."',
      nb = '".$_POST['nb']."',
      kondisi_organ = '".$_POST['kondisi_organ']."',
      keterangan_organ = '".$_POST['keterangan_organ']."',
      plasenta = '".$_POST['plasenta']."',
      utpi_kiri = '".$_POST['utpi_kiri']."',
      utpi_kanan = '".$_POST['utpi_kanan']."',
      mean_utpi = '".$_POST['mean_utpi']."',
      ductus_venosus = '".$_POST['ductus_venosus']."',
      psv1 = '".$_POST['psv1']."',
      psv2 = '".$_POST['psv2']."',
      aospr = '$pr_ophtalmica',
      awdv = '".$_POST['awdv']."',
      cairan_ketuban = '".$_POST['cairan_ketuban']."',
      kesimpulan_usg = '".$_POST['kesimpulan_usg']."',
      trisomies_risk_assessment = '".$_POST['trisomies_risk_assessment']."',
      pohp_34 = '".$_POST['poh_pe_34']."',
      pohp_37 = '".$_POST['poh_pe_37']."',
      asesmen_pasien = '".$_POST['asesmen_pasien']."',
      rtl = '".$_POST['rtl']."',
      pemeriksa = '".$_POST['pemeriksa']."',
      catatan = '".$_POST['catatan']."'
      WHERE skrining.id = '".$_POST['skrining_id']."'");

      if ($query = true) {
        header('location:../app/?p=edit_skrining&id='.$_POST['skrining_id'].'&message=success');
      } else {
        header('location:../app/?p=edit_skrining&id='.$_POST['skrining_id'].'&message=error');
      }
    break;

  case 'delete_identitas':
    // $queryIdentitas = $connection->query("DELETE FROM identitas WHERE identitas_id = '".$_GET['id']."'");
    //
    // $querySkrining = $connection->query("SELECT skrining_id FROM skrining WHERE identitas_id = '".$_GET['id']."'");
    // foreach ($querySkrining as $key => $valueSkrining) {
    //   $querySkrining = $connection->query("DELETE FROM skrining WHERE skrining_id = '".$resultSkrining['id']."'");
    // }
    // // $resultSkrining = $querySkrining->fetch_assoc();
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // $queryRiwayat = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    // if ($query = true) {
    //   header('location:../app/?p=skrining&message=success');
    // } else {
    //   header('location:../app/?p=skrining&message=error');
    // }
    break;

  default:
    // code...
    break;
}
 ?>
