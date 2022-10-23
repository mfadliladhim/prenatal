<?php
$date_created = date('Y-m-d H:i:a');
include '../config/connection.php';
switch ($_GET['a']) {

  case 'add_delivery_outcome':

    $tanggal_lahir_b        = date("Y-m-d",strtotime($_POST['tanggal_lahir_b']));
    $tanggal_t              = date("Y-m-d",strtotime($_POST['tanggal_t']));
    $tanggal_v              = date("Y-m-d",strtotime($_POST['tanggal_v']));
    $imp_komplikasi_janin_a = implode(", ", $_POST['komplikasi_janin_antepartum']);
    $komplikasi_ibu_a       = implode(", ", $_POST['komplikasi_ibu_antepartum']);
    $komplikasi_ibu_i       = implode(", ", $_POST['komplikasi_ibu_intrapartum']);
    $komplikasi_ibu_p       = implode(", ", $_POST['komplikasi_ibu_postpartum']);
    $gejala_dirasakan       = implode(", ", $_POST['gejala_dirasakan']);

    $query = $connection->query("INSERT INTO delivery VALUES (
      NULL,
      '".$_POST['identitas_id']."',
      '$tanggal_lahir_b',
      '".$_POST['tempat_lahir_b']."',
      '".$_POST['usia_kehamilan_saat_l']."',
      '".$_POST['cara_persalinan']."',
      '".$_POST['indikasi_induksi_persalinan']."',
      '".$_POST['indikasi_vakum_forsep_sc']."',
      '".$_POST['butuh_transfusi_darah']."',
      '".$_POST['jumlah_pendarahan']."',
      '$komplikasi_ibu_a',
      '$komplikasi_ibu_i',
      '$komplikasi_ibu_p',
      '".$_POST['catatan_persalinan']."',
      '".$_POST['data_klinis']."',
      '".$_POST['jenis_test_covid']."',
      '".$_POST['usia_kehamilan_saat_t']."',
      '$tanggal_t',
      '".$_POST['hasil_t']."',
      '".$_POST['komorbid']."',
      '".$_POST['sebutkan_komorbid']."',
      '$gejala_dirasakan',
      '".$_POST['alat_bantu_nafas']."',
      '".$_POST['masuk_icu']."',
      '".$_POST['obat_didapat']."',
      '".$_POST['vaksinasi_c']."',
      '".$_POST['jumlah_dosis']."',
      '$tanggal_v',
      '".$_POST['catatan_v']."',
      '$date_created')");

      $last_delivery_id  = $connection->insert_id;
      if ($_POST['jumlah_janin'] > 1) {
        $jumlah = $_POST['jumlah_janin'];
        for($x=0;$x<$jumlah;$x++){
          $query_delivery_persalinan_kembar = $connection->query("INSERT INTO delivery_persalinan_kembar VALUES (
            NULL,
            '$last_delivery_id',
            '".$_POST['berat_lahir_b'][$x]."',
            '".$_POST['panjang_lahir_b'][$x]."',
            '".$_POST['lingkar_kepala_bayi'][$x]."',
            '".$_POST['jenis_kelamin'][$x]."')");

          $query_delivery_neonatal_kembar = $connection->query("INSERT INTO delivery_neonatal_kembar VALUES (
            NULL,
            '$last_delivery_id',
            '".$_POST['as_1'][$x]."',
            '".$_POST['as_5'][$x]."',
            '".$_POST['butuh_cpap_mixsafe'][$x]."',
            '".$_POST['asfiksia'][$x]."',
            '".$_POST['rds'][$x]."',
            '".$_POST['sepsis'][$x]."',
            '".$_POST['kelainan_bawaan'][$x]."',
            '".$_POST['jenis_kelainan_bawaan'][$x]."',
            '".$_POST['kondisi_bayi_lahir'][$x]."',
            '".$_POST['komplikasi_janin_antepartum'][$x]."',
            '".$_POST['lama_rawat_nicu'][$x]."',
            '".$_POST['nicu_admission'][$x]."')");

        }
      } else {

        $query_delivery_persalinan_kembar = $connection->query("INSERT INTO delivery_persalinan_kembar VALUES (
          NULL,
          '$last_delivery_id',
          '".$_POST['berat_lahir_b']."',
          '".$_POST['panjang_lahir_b']."',
          '".$_POST['lingkar_kepala_bayi']."',
          '".$_POST['jenis_kelamin']."')");

        $query_delivery_neonatal_kembar = $connection->query("INSERT INTO delivery_neonatal_kembar VALUES (
          NULL,
          '$last_delivery_id',
          '".$_POST['as_1']."',
          '".$_POST['as_5']."',
          '".$_POST['butuh_cpap_mixsafe']."',
          '".$_POST['asfiksia']."',
          '".$_POST['rds']."',
          '".$_POST['sepsis']."',
          '".$_POST['kelainan_bawaan']."',
          '".$_POST['jenis_kelainan_bawaan']."',
          '".$_POST['kondisi_bayi_lahir']."',
          '".$_POST['komplikasi_janin_antepartum']."',
          '".$_POST['lama_rawat_nicu']."',
          '".$_POST['nicu_admission']."')");
      }


      // echo var_dump($query);
      if ($query = true) {
        header("location:../app/?p=delivery_outcome&id=".$_POST['identitas_id']."&id-s=".$_POST['id-s']."&id-d=".$last_delivery_id."&message=simDelivSuc");
      } else {
        header("location:../app/?p=add_delivery_outcome&id=".$_POST['identitas_id']."&message=simDelivFail");
      }
    break;

  case 'delete_delivery':
    $queryDelivery = $connection->query("DELETE FROM delivery WHERE delivery_outcome_id = '".$_GET['id-d']."'");
    if ($queryDelivery = true) {
      header('location:../app/?p=add_delivery&id='.$_GET['id'].'&message=delDelivSuc');
    } else {
      header('location:../app/?p=delivery_outcome&id='.$_GET['id'].'&id-d='.$_GET['id-d'].'&message=delDelivFail');
    }
    break;

  case 'add_skrining_data':
    header('location:../app/?p=add_delivery&id='.$_GET['id'].'&id-s='.$_POST['id-s']);

    break;

  default:
    // code...
    break;
}
 ?>
