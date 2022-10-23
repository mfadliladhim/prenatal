<?php
include '../config/connection.php';
switch ($_GET['a']) {

  case 'add_skrining_data':

      header('location:../app/?p=add_trimester&id='.$_GET['id'].'&id-s='.$_POST['id-s']);

      // if ($query = true) {
      //   header('location:../app/?p=add_skrining&message=success');
      // } else {
      //   header('location:../app/?p=add_skrining&message=error');
      // }

    break;

  case 'add_trimester':
      $date_created = date('Y-m-d H:i:a');
      $query = $connection->query("INSERT INTO trimester VALUES (
        NULL,
        '".$_POST['identitas_id']."',
        '1',
        '".$_POST['berat_badan']."',
        '".$_POST['tinggi_badan']."',
        '".$_POST['lila']."',
        '".$_POST['tekanan_darah']."',
        '".$_POST['nadi']."',
        '".$_POST['suhu']."',
        '".$_POST['pernapasan']."',
        '".$_POST['lokasi_plasenta']."',
        '".$_POST['kedalaman_plasenta']."',
        '".$_POST['cairan_amnion_ica']."',
        '".$_POST['cairan_amnion_sdp']."',
        '".$_POST['cervical_length']."',
        '".$_POST['pia_uterina_kanan']."',
        '".$_POST['pia_uterina_kiri']."',
        '".$_POST['notching_uterina']."',
        '".$_POST['ductus_venosus_wave']."',
        '".$_POST['kesimpulan']."',
        '".$_POST['assessment']."',
        '".$_POST['plan']."',
        '".$_POST['anjuran']."',
        '".$_POST['pemeriksa_id']."',
        '".$_POST['catatan']."',
        '$date_created')");

        $last_trimester_id  = $connection->insert_id;
        if ($_POST['jumlah_janin'] > 1) {
          $jumlah = $_POST['jumlah_janin'];
          for($x=0;$x<$jumlah;$x++){
            $query_kondisi_janin = $connection->query("INSERT INTO trimester_kondisi_janin_kembar VALUES (
              NULL,
              '$last_trimester_id',
              '".$_POST['presentasi'][$x]."',
              '".$_POST['denyut_jantung_janin'][$x]."',
              '".$_POST['irama'][$x]."',
              '".$_POST['gerak_janin'][$x]."',
              '".$_POST['kondisi_organ'][$x]."',
              '".$_POST['catatan'][$x]."',
              '".$_POST['jenis_kelamin'][$x]."')");

            $query_biometri_usg = $connection->query("INSERT INTO trimester_biometri_usg_kembar VALUES (
              NULL,
              '$last_trimester_id',
              '".$_POST['nasal_bone'][$x]."',
              '".$_POST['bpd'][$x]."',
              '".$_POST['hc'][$x]."',
              '".$_POST['ac'][$x]."',
              '".$_POST['fl'][$x]."',
              '".$_POST['hl'][$x]."',
              '".$_POST['tbj'][$x]."',
              '".$_POST['usia_kehamilan'][$x]."',
              '".$_POST['usia_kehamilan_berdasarkan'][$x]."',
              '".$_POST['persentil'][$x]."')");

            $query_plasenta_tali = $connection->query("INSERT INTO trimester_plasenta_tali VALUES (
              NULL,
              '$last_trimester_id',
              '".$_POST['lilitan_tali_pusat'][$x]."',
              '".$_POST['intercoil_distance'][$x]."')");

            $query_doppler = $connection->query("INSERT INTO trimester_doppler VALUES (
              NULL,
              '$last_trimester_id',
              '".$_POST['pia_umbilikalis'][$x]."',
              '".$_POST['sda_mbilikalis'][$x]."',
              '".$_POST['umbilical_artery_flow'][$x]."',
              '".$_POST['pia_serebri_media'][$x]."',
              '".$_POST['psva_serebri_media'][$x]."')");
          }
        } else {
          $jumlah = $_POST['jumlah_janin'];
          $query_kondisi_janin = $connection->query("INSERT INTO trimester_kondisi_janin_kembar VALUES (
            NULL,
            '$last_trimester_id',
            '".$_POST['presentasi']."',
            '".$_POST['denyut_jantung_janin']."',
            '".$_POST['irama']."',
            '".$_POST['gerak_janin']."',
            '".$_POST['kondisi_organ']."',
            '".$_POST['catatan']."',
            '".$_POST['jenis_kelamin']."')");

          $query_biometri_usg = $connection->query("INSERT INTO trimester_biometri_usg_kembar VALUES (
            NULL,
            '$last_trimester_id',
            '".$_POST['nasal_bone']."',
            '".$_POST['bpd']."',
            '".$_POST['hc']."',
            '".$_POST['ac']."',
            '".$_POST['fl']."',
            '".$_POST['hl']."',
            '".$_POST['tbj']."',
            '".$_POST['usia_kehamilan']."',
            '".$_POST['usia_kehamilan_berdasarkan']."',
            '".$_POST['persentil']."')");

          $query_plasenta_tali = $connection->query("INSERT INTO trimester_plasenta_tali VALUES (
            NULL,
            '$last_trimester_id',
            '".$_POST['lilitan_tali_pusat']."',
            '".$_POST['intercoil_distance']."')");

          $query_doppler = $connection->query("INSERT INTO trimester_doppler VALUES (
            NULL,
            '$last_trimester_id',
            '".$_POST['pia_umbilikalis']."',
            '".$_POST['sda_mbilikalis']."',
            '".$_POST['umbilical_artery_flow']."',
            '".$_POST['pia_serebri_media']."',
            '".$_POST['psva_serebri_media']."')");
        }
      if ($query = true) {
        header('location:../app/?p=trimester&id='.$_POST['identitas_id'].'&id-s='.$_POST['id-s'].'&id-t='.$last_trimester_id.'&message=simTrimSuc');
      } else {
        header('location:../app/?p=add_trimester&id='.$_POST['identitas_id'].'&message=simTrimFail');
      }
    break;

  case 'delete_trimester':
  echo "bisa";
  $queryTrimester = $connection->query("DELETE FROM trimester WHERE trimester_id = '".$_GET['id-t']."'");
  if ($queryTrimester = true) {
    header('location:../app/?p=add_trimester&id='.$_GET['id'].'&message=delDelivSuc');
  } else {
    header('location:../app/?p=trimester&id='.$_GET['id'].'&id-t='.$_GET['id-t'].'&message=delDelivFail');
  }
    break;

  default:
    // code...
    break;
}
 ?>
