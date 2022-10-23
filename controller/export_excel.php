<?php
include '../config/connection.php';
require '../app/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->setActiveSheetIndex(0);
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'No RM');
$sheet->setCellValue('D1', 'Tanggal Lahir');
$sheet->setCellValue('E1', 'Usia');
$sheet->setCellValue('F1', 'No Hp');
$sheet->setCellValue('G1', 'Tanggal Pemeriksaan');
$sheet->setCellValue('H1', 'Usia Kehamilan Berdasarkan');
$sheet->setCellValue('I1', 'Usia Kehamilan In');
$sheet->setCellValue('J1', 'Usia Kehamilan Out');
$sheet->setCellValue('K1', 'Taksiran Persalinan');
$sheet->setCellValue('L1', 'Metode Konsepsi');
$sheet->setCellValue('M1', 'G P A');
$sheet->setCellValue('N1', 'Interval Kehamilan');
$sheet->setCellValue('O1', 'Anak Hidup');
$sheet->setCellValue('P1', 'Merokok');
$sheet->setCellValue('Q1', 'Riwayat ibu/kakak PE');
$sheet->setCellValue('R1', 'Penyakit Lupus');
$sheet->setCellValue('S1', 'Penyakit Aps');
$sheet->setCellValue('T1', 'Hipertensi Kronik');
$sheet->setCellValue('U1', 'Diabetes Militus');
$sheet->setCellValue('V1', 'Riwayat Hamil dengan PE');
$sheet->setCellValue('W1', 'Riwayat Pjt');
$sheet->setCellValue('X1', 'Riwayat Preterm Birth (<37 minggu)');
$sheet->setCellValue('Y1', 'Berat Badan');
$sheet->setCellValue('Z1', 'Tinggi Badan');
$sheet->setCellValue('AA1', 'BMI');
$sheet->setCellValue('AB1', 'Systolic Left arm 1');
$sheet->setCellValue('AC1', 'Systolic Right arm 1');
$sheet->setCellValue('AD1', 'Diastolic Left arm 1');
$sheet->setCellValue('AE1', 'Diastolic Right arm 1');
$sheet->setCellValue('AF1', 'Systolic Left arm 2');
$sheet->setCellValue('AG1', 'Systolic Right arm 2');
$sheet->setCellValue('AH1', 'Diastolic Left arm 2');
$sheet->setCellValue('AI1', 'Diastolic Right arm 2');
$sheet->setCellValue('AJ1', 'Mean arterial pressure');
$sheet->setCellValue('AK1', 'MAP Mom');
$sheet->setCellValue('AL1', 'PGLF');
$sheet->setCellValue('AM1', 'Pglf Mom');
$sheet->setCellValue('AN1', 'Kondisi Pemeriksaan');
$sheet->setCellValue('AO1', 'Lokasi Kehamilan');
$sheet->setCellValue('AP1', 'Denyut Jantung Janin');
$sheet->setCellValue('AQ1', 'Regurgitasi Trikuspid');
$sheet->setCellValue('AR1', 'Irama');
$sheet->setCellValue('AS1', 'Gerak Janin');
$sheet->setCellValue('AT1', 'BPD');
$sheet->setCellValue('AU1', 'NT');
$sheet->setCellValue('AV1', 'NB');
$sheet->setCellValue('AW1', 'Kondisi organ');
$sheet->setCellValue('AX1', 'Keterangan organ');
$sheet->setCellValue('AY1', 'Plasenta');
$sheet->setCellValue('AZ1', 'Mean UtPI Kiri');
$sheet->setCellValue('BA1', 'Mean UtPI Kanan');
$sheet->setCellValue('BB1', 'Mean UtPI');
$sheet->setCellValue('BC1', 'Utpi Mom');
$sheet->setCellValue('BD1', 'PI Ductus Venosus');
$sheet->setCellValue('BE1', 'Psv1');
$sheet->setCellValue('BF1', 'Psv2');
$sheet->setCellValue('BG1', 'PR Ophtalmica');
$sheet->setCellValue('BH1', 'PR Ophtalmica Mom');
$sheet->setCellValue('BI1', 'A wave Ductus Venosus');
$sheet->setCellValue('BJ1', 'Cairan Ketuban');
$sheet->setCellValue('BK1', 'Kesimpulan USG');
$sheet->setCellValue('BL1', 'Trisomies Risk Assessment');
$sheet->setCellValue('BM1', 'Probability of having Pre-Eclampsia< 34 weeks');
$sheet->setCellValue('BN1', 'Probability of having Pre-Eclampsia< 37 weeks');
$sheet->setCellValue('BO1', 'Asesmen Pasien (S-O-A)');
$sheet->setCellValue('BP1', 'Rencana Tindak Lanjut (P)');
$sheet->setCellValue('BQ1', 'Pemeriksa');
$sheet->setCellValue('BR1', 'Catatan (khusus dokter)');

$query = $connection->query("SELECT * FROM identitas JOIN skrining ON skrining.identitas_id = identitas.identitas_id");
$i = 2;
$no = 1;
while($row = $query->fetch_assoc())
{
	$sheet->setCellValue('A'.$i, $no++);
  $sheet->setCellValue('B'.$i, $row['nama_ibu']);
  $sheet->setCellValue('C'.$i, $row['no_rm']);
  $sheet->setCellValue('D'.$i, $row['tanggal_lahir_ibu']);
  $sheet->setCellValue('E'.$i, $row['usia']);
  $sheet->setCellValue('F'.$i, $row['telepon_ibu']);
  $sheet->setCellValue('G'.$i, $row['tanggal_pemeriksaan']);
  $sheet->setCellValue('H'.$i, $row['usia_kehamilan_berdasarkan']);
  $sheet->setCellValue('I'.$i, $row['usia_kehamilan_in']);
  $sheet->setCellValue('J'.$i, $row['usia_kehamilan_out']);
  if ($row['usia_kehamilan_berdasarkan'] == 'CRL') {
    $coba6 = $row['usia_kehamilan_in']/10;
    $coba5 = 1.684969+(0.315646*$coba6)-(0.049306*(pow($coba6,2)))+(0.004057*(pow($coba6,3)))-(0.000120456*(pow($coba6,4)));
    $coba4 = pow(2.71828183,$coba5);
    $coba3 = round($coba4*7);
    $coba2 = 280-$coba3;
    $taksiran_persalinan = date('d M Y', strtotime('+'.$coba2.' days', strtotime($row['tanggal_pemeriksaan'])));
  } elseif ($row['usia_kehamilan_berdasarkan'] == 'HPHT') {
    $rumus = 263;
    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($row['usia_kehamilan_in'])));
  } elseif ($row['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 3') {
    $rumus = 261;
    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($row['usia_kehamilan_in'])));
  } elseif ($row['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 5') {
    $rumus = 280;
    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($row['usia_kehamilan_in'])));
  }
  $sheet->setCellValue('K'.$i, $taksiran_persalinan);
  $sheet->setCellValue('L'.$i, $row['metode_konsepsi']);
  $sheet->setCellValue('M'.$i, $row['g_p_a']);
  $sheet->setCellValue('N'.$i, $row['interval_kehamilan']);
  $sheet->setCellValue('O'.$i, $row['anak_hidup']);
  $sheet->setCellValue('P'.$i, $row['merokok']);
  $sheet->setCellValue('Q'.$i, $row['riwayat_ibu_kakak_pe']);
  $sheet->setCellValue('R'.$i, $row['penyakit_lupus']);
  $sheet->setCellValue('S'.$i, $row['penyakit_aps']);
  $sheet->setCellValue('T'.$i, $row['hipertensi_kronik']);
  $sheet->setCellValue('U'.$i, $row['diabetes_militus']);
  $sheet->setCellValue('V'.$i, $row['riwayat_hamil_pe']);
  $sheet->setCellValue('W'.$i, $row['riwayat_pjt']);
  $sheet->setCellValue('X'.$i, $row['riwayat_preterm_birth']);
  $sheet->setCellValue('Y'.$i, $row['berat_badan']);
  $sheet->setCellValue('Z'.$i, $row['tinggi_badan']);
  $sheet->setCellValue('AA'.$i, round($row['bmi'],3));
  $sheet->setCellValue('AB'.$i, $row['systolic_left_1']);
  $sheet->setCellValue('AC'.$i, $row['systolic_right_1']);
  $sheet->setCellValue('AD'.$i, $row['diastolic_left_1']);
  $sheet->setCellValue('AE'.$i, $row['diastolic_right_1']);
  $sheet->setCellValue('AF'.$i, $row['systolic_left_2']);
  $sheet->setCellValue('AG'.$i, $row['systolic_right_2']);
  $sheet->setCellValue('AH'.$i, $row['diastolic_left_2']);
  $sheet->setCellValue('AI'.$i, $row['diastolic_right_2']);
	$map_mom = $row['map']/82.6;
  $sheet->setCellValue('AJ'.$i, round($row['map'],3));
  $sheet->setCellValue('AK'.$i, round($map_mom,2).' MoM');
	$mom_plgf = $row['plgf']/49.82;
  $sheet->setCellValue('AL'.$i, round($row['plgf'],3));
  $sheet->setCellValue('AM'.$i, round($mom_plgf,3).' MoM');
  $sheet->setCellValue('AN'.$i, $row['kondisi_pemeriksaan']);
  $sheet->setCellValue('AO'.$i, $row['lokasi_kehamilan']);
  // $sheet->setCellValue('AP'.$i, $row['denyut_jantung_janin']);
  // $sheet->setCellValue('AQ'.$i, $row['regurgitasi_trikuspid']);
  // $sheet->setCellValue('AR'.$i, $row['irama']);
  // $sheet->setCellValue('AS'.$i, $row['gerak_janin']);
  // $sheet->setCellValue('AT'.$i, $row['bpd']);
  // $sheet->setCellValue('AU'.$i, $row['nt']);
  // $sheet->setCellValue('AV'.$i, $row['nb']);
  // $sheet->setCellValue('AW'.$i, $row['kondisi_organ']);
  // $sheet->setCellValue('AX'.$i, $row['keterangan_organ']);
  $sheet->setCellValue('AY'.$i, $row['plasenta']);
  $sheet->setCellValue('AZ'.$i, $row['utpi_kiri']);
  $sheet->setCellValue('BA'.$i, $row['utpi_kanan']);
	$mom_mean_utpi = $row['mean_utpi']/1.76;
  $sheet->setCellValue('BB'.$i, round($row['mean_utpi'],3));
  $sheet->setCellValue('BC'.$i, round($mom_mean_utpi,3).' MoM');
  // $sheet->setCellValue('BD'.$i, $row['ductus_venosus']);
  $sheet->setCellValue('BE'.$i, $row['psv1']);
  $sheet->setCellValue('BF'.$i, $row['psv2']);
	$mom_pr_ophtalmica = $row['aospr']/0.56;
  $sheet->setCellValue('BG'.$i, round($row['aospr'],3));
  $sheet->setCellValue('BH'.$i, round($mom_pr_ophtalmica,3).' MoM');
  // $sheet->setCellValue('BI'.$i, $row['awdv']);
  // $sheet->setCellValue('BJ'.$i, $row['cairan_ketuban']);
  $sheet->setCellValue('BK'.$i, $row['kesimpulan_usg']);
  $sheet->setCellValue('BL'.$i, $row['trisomies_risk_assessment']);
  $sheet->setCellValue('BM'.$i, $row['pohp_34']);
  $sheet->setCellValue('BN'.$i, $row['pohp_37']);
  $sheet->setCellValue('BO'.$i, $row['asesmen_pasien']);
  $sheet->setCellValue('BP'.$i, $row['rtl']);
  $sheet->setCellValue('BQ'.$i, $row['pemeriksa']);
  $sheet->setCellValue('BR'.$i, $row['catatan']);
	$i++;
}
$spreadsheet->getActiveSheet()->setTitle("Data Skrining");

$spreadsheet->createSheet();
$sheet2 = $spreadsheet->setActiveSheetIndex(1);
$sheet2->setCellValue('A1', 'No');
$sheet2->setCellValue('B1', 'No RM');
$sheet2->setCellValue('C1', 'Tanggal Lahir');
$sheet2->setCellValue('D1', 'Berat Lahir');
$sheet2->setCellValue('E1', 'Jenis Kelamin');
$sheet2->setCellValue('F1', 'Usia Kehamilan saat lahir');
$sheet2->setCellValue('G1', 'Cara Persalinan');
$sheet2->setCellValue('H1', 'Kondisi Saat Lahir');

$query2 = $connection->query("SELECT * FROM skrining_riwayat_kehamilan JOIN skrining ON skrining.skrining_id = skrining_riwayat_kehamilan.skrining_id");
$a = 2;
$no2 = 1;
while($row2 = $query2->fetch_assoc())
{
	$sheet2->setCellValue('A'.$a, $no2++);
	$sheet2->setCellValue('B'.$a, $row2['no_rm']);
	$sheet2->setCellValue('C'.$a, $row2['tanggal_lahir_riwayat']);
	$sheet2->setCellValue('D'.$a, $row2['berat_lahir_riwayat']);
	$sheet2->setCellValue('E'.$a, $row2['jenis_kelamin_riwayat']);
	$sheet2->setCellValue('F'.$a, $row2['usia_kehamilan_saat_lahir_riwayat']);
	$sheet2->setCellValue('G'.$a, $row2['cara_persalinan_riwayat']);
	$sheet2->setCellValue('H'.$a, $row2['kondisi_saat_lahir_riwayat']);

	$a++;
}

$spreadsheet->getActiveSheet()->setTitle("Riwayat Kehamilan");

$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$a = $a - 1;
$sheet->getStyle('A1:BN'.$i)->applyFromArray($styleArray);
$sheet2->getStyle('A1:H'.$a)->applyFromArray($styleArray);


// $writer = new Xlsx($spreadsheet);
// Proses file excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Data Skrining.xlsx'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>
