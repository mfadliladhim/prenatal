<?php
include '../config/connection.php';
switch ($_GET['a']) {

  case 'add_skrining':

    $tanggal_lahir        = date("Y-m-d",strtotime($_POST['tanggal_lahir']));
    $tanggal_pemeriksaan  = date("Y-m-d H:i:s",strtotime($_POST['tanggal_pemeriksaan']));
    // $hpht                 = date("Y-m-d",strtotime($_POST['hpht']));
    // $taksiran_persalinan  = date("Y-m-d",strtotime($_POST['taksiran_persalinan']));

    // $diff   = time() - strtotime($_POST['tanggal_lahir']);
    // $usia   = floor($diff / (60 * 60 * 24 * 365));
    $g_p_a = $_POST['gravida']."-".$_POST['paritas']."-".$_POST['abortus'];
    $s_o_a_p = $_POST['asesmen_pasien_s']."-".$_POST['asesmen_pasien_o']."-".$_POST['asesmen_pasien_a']."-".$_POST['asesmen_pasien_p'];
    $bmi   = $_POST['berat_badan']/(($_POST['tinggi_badan']/100)*($_POST['tinggi_badan']/100));
    $pr_ophtalmica     = $_POST['psv2']/$_POST['psv1'];
    // $mom_pr_ophtalmica = $pr_ophtalmica/0.56;

    if ($_POST['usia_kehamilan_berdasarkan'] == 1) {
      $usia_kehamilan_berdasarkan = 'CRL';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 2) {
      $usia_kehamilan_berdasarkan = 'HPHT';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 3) {
      $usia_kehamilan_berdasarkan = 'Tanggal Transfer Embrio Hari Ke 3';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 4) {
      $usia_kehamilan_berdasarkan = 'Tanggal Transfer Embrio Hari Ke 5';
    }
    $query = $connection->query("INSERT INTO skrining VALUES (
      NULL,
      '".$_POST['identitas_id']."',
      '1',
      '".$_POST['usia']."',
      '$tanggal_pemeriksaan',
      '$usia_kehamilan_berdasarkan',
      '".$_POST['usia_kehamilan_in']."',
      '".$_POST['usia_kehamilan_out']."',
      '".$_POST['metode_konsepsi']."',
      '$g_p_a',
      '".$_POST['in_riwayat_kehamilan']."',
      '".$_POST['anak_hidup']."',
      '".$_POST['merokok']."',
      '".$_POST['riwayat_ibu_kakak_pe']."',
      '".$_POST['penyakit_lupus']."',
      '".$_POST['penyakit_aps']."',
      '".$_POST['hipertensi_kronik']."',
      '".$_POST['diabetes_militus']."',
      '".$_POST['riwayat_hamil_pe']."',
      '".$_POST['riwayat_pjt']."',
      '".$_POST['riwayat_preterm_birth']."',
      '".$_POST['berat_badan']."',
      '".$_POST['tinggi_badan']."',
      '$bmi',
      '".$_POST['systolic_left_1']."',
      '".$_POST['systolic_right_1']."',
      '".$_POST['diastolic_left_1']."',
      '".$_POST['diastolic_right_1']."',
      '".$_POST['systolic_left_2']."',
      '".$_POST['systolic_right_2']."',
      '".$_POST['diastolic_left_2']."',
      '".$_POST['diastolic_right_2']."',
      '".$_POST['map']."',
      '".$_POST['pglf']."',
      '".$_POST['kondisi_pemeriksaan']."',
      '".$_POST['lokasi_kehamilan']."',
      '".$_POST['jumlah_janin']."',
      '".$_POST['plasenta']."',
      '".$_POST['plasenta_right']."',
      '".$_POST['utpi_kiri']."',
      '".$_POST['utpi_kanan']."',
      '".$_POST['mean_utpi']."',
      '".$_POST['psv1']."',
      '".$_POST['psv2']."',
      '$pr_ophtalmica',
      '".$_POST['kesimpulan_usg']."',
      '".$_POST['trisomies_risk_assessment']."',
      '".$_POST['poh_pe_34']."',
      '".$_POST['poh_pe_37']."',
      '".$_POST['akurasi_34']."',
      '".$_POST['akurasi_37']."',
      '$s_o_a_p',
      '".$_POST['rtl']."',
      '".$_POST['pemeriksa']."',
      '".$_POST['catatan']."')");

      $last_skrining_id  = $connection->insert_id;

      if (isset($_POST['tanggal_lahir_riwayat'])) {
        $jumlah = count($_POST['tanggal_lahir_riwayat']);
        for($x=0;$x<$jumlah;$x++){
        	// mysql_query("INSERT INTO makanan values('','$makanan[$x]')");
          $query2 = $connection->query("INSERT INTO skrining_riwayat_kehamilan VALUES (
            NULL,
            '$last_skrining_id',
            '".$_POST['tanggal_lahir_riwayat'][$x]."',
            '".$_POST['berat_lahir_riwayat'][$x]."',
            '".$_POST['jenis_kelamin_riwayat'][$x]."',
            '".$_POST['usia_kehamilan_saat_lahir_riwayat'][$x]."',
            '".$_POST['cara_persalinan_riwayat'][$x]."',
            '".$_POST['kondisi_saat_lahir_riwayat'][$x]."')");
        }
      }
      if (!is_array($_POST['denyut_jantung_janin'])) {
        if (empty($_POST['crl'])) { $crl = ''; } else { $crl = $_POST['crl']; }
        $query3 = $connection->query("INSERT INTO skrining_janin VALUES (
          NULL,
          '$last_skrining_id',
          '".$_POST['denyut_jantung_janin']."',
          '".$_POST['regurgitasi_trikuspid']."',
          '".$_POST['irama']."',
          '".$_POST['gerak_janin']."',
          '".$_POST['bpd']."',
          '".$_POST['nt']."',
          '".$_POST['nb']."',
          '".$_POST['kondisi_organ']."',
          '".$_POST['keterangan_organ']."',
          '$crl',
          '".$_POST['ductus_venosus']."',
          '".$_POST['awdv']."',
          '".$_POST['cairan_ketuban']."')");
      }
      else {
        $jumlah3 = count($_POST['denyut_jantung_janin']);
        if (empty($_POST['crl'])) { $crl = ''; } else { $crl = $_POST['crl']; }
        for($i=0;$i<$jumlah3;$i++){
          $query3 = $connection->query("INSERT INTO skrining_janin VALUES (
            NULL,
            '$last_skrining_id',
            '".$_POST['denyut_jantung_janin'][$i]."',
            '".$_POST['regurgitasi_trikuspid'][$i]."',
            '".$_POST['irama'][$i]."',
            '".$_POST['gerak_janin'][$i]."',
            '".$_POST['bpd'][$i]."',
            '".$_POST['nt'][$i]."',
            '".$_POST['nb'][$i]."',
            '".$_POST['kondisi_organ'][$i]."',
            '".$_POST['keterangan_organ'][$i]."',
            '$crl',
            '".$_POST['ductus_venosus'][$i]."',
            '".$_POST['awdv'][$i]."',
            '".$_POST['cairan_ketuban'][$i]."')");
        }
      }
      if ($query = true) {
        header('location:../app/?p=detail_skrining&id='.$_POST['identitas_id'].'&id-s='.$last_skrining_id.'&message=simSkriSuc');
      } else {
        header('location:../app/?p=add_skrining&id='.$_POST['identitas_id'].'&message=simSkriFail');
      }

    break;

  case 'edit_skrining':

    $tanggal_lahir        = date("Y-m-d",strtotime($_POST['tanggal_lahir']));
    $tanggal_pemeriksaan  = date("Y-m-d H:i:s",strtotime($_POST['tanggal_pemeriksaan']));
    $g_p_a = $_POST['gravida']."-".$_POST['paritas']."-".$_POST['abortus'];
    $bmi   = $_POST['berat_badan']/(($_POST['tinggi_badan']/100)*($_POST['tinggi_badan']/100));
    $pr_ophtalmica     = $_POST['psv2']/$_POST['psv1'];

    if ($_POST['usia_kehamilan_berdasarkan'] == 1) {
      $usia_kehamilan_in          = '#';
      $usia_kehamilan_berdasarkan = 'CRL';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 2) {
      $usia_kehamilan_in          = $_POST['usia_kehamilan_in'];
      $usia_kehamilan_berdasarkan = 'HPHT';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 3) {
      $usia_kehamilan_in          = $_POST['usia_kehamilan_in'];
      $usia_kehamilan_berdasarkan = 'Tanggal Transfer Embrio Hari Ke 3';
    } elseif ($_POST['usia_kehamilan_berdasarkan'] == 4) {
      $usia_kehamilan_in          = $_POST['usia_kehamilan_in'];
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
      usia_kehamilan_in = '$usia_kehamilan_in',
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

  case 'delete_skrining':
    $querySkrining = $connection->query("DELETE FROM skrining WHERE skrining_id = '".$_GET['id-s']."'");
    // $query2 = $connection->query("DELETE FROM riwayat_kehamilan_sebelumnya WHERE riwayat_kehamilan_sebelumnya.skrining_id = '".$_GET['id']."'");
    if ($querySkrining = true) {
      header('location:../app/?p=add_skrining&id='.$_GET['id'].'&message=delSkriSuc');
    } else {
      header('location:../app/?p=skrining&id='.$_GET['id'].'&id-s='.$_GET['id-s'].'&message=delSkriFail');
    }
    break;

  default:
    // code...
    break;
}
 ?>
