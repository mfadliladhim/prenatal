<?php
include '../config/connection.php';
$query    = $connection->query("SELECT * FROM identitas WHERE identitas_id = '".$_GET['id']."'");
$value    = $query->fetch_assoc();
$query1   = $connection->query("SELECT * FROM skrining WHERE identitas_id = '".$_GET['id']."'");
$value1   = $query1->fetch_assoc();
$record1  = $query1->num_rows;
$title    = 'Tambah Skrining 11-13 Minggu';
$no       = 1; ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Detail Skrining</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-light">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Skrining</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Data Skrining</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <button id="showAll" class="btn btn-sm btn-prenatal-orange"><i class="far fa-eye mr-1"></i>Show All</button>
          <button data-url="/kosambi-admin/app/skrining/print_skrining.php?id=<?php echo $_GET['id-s']; ?>" type="button" class="btn btn-sm btn-prenatal-orange print"><i class="fas fa-print mr-1"></i> Print</button>
          <a href="#" class="btn btn-sm btn-prenatal-orange"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
          <button data-url="../controller/SkriningController.php?a=delete_skrining&id=<?php echo $_GET['id'].'&id-s='.$_GET['id-s']; ?>" data-toggle="modal" data-target="#ConfirmDelete" class="btn btn-sm btn-prenatal-orange"><i class="fas fa-trash mr-1"></i> Hapus</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <!-- <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Data Identitas</h3>
            </div>
          </div>
        </div> -->
        <?php include 'partials/menu.php'; ?>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4 class="mb-0">DATA PASIEN</h4>
            </div>
            <div class="card-body">
              <div class="form-group row mb-0">
                <label class="col-md-4 col-form-label form-control-label">Nama</label>
                <div class="col-md-5 d-flex align-items-center">
                  <input value="<?= $value['identitas_id']; ?>" name="identitas_id" class="form-control-plaintext" type="text" hidden>
                  <input value="<?= $value['nama_ibu']; ?>" name="nama" class="form-control-plaintext border-bottom" type="text" readonly>
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-md-4 col-form-label form-control-label">No Rm</label>
                <div class="col-md-6 d-flex align-items-center">
                  <input value="<?= $value['no_rm']; ?>" name="no_rm" class="form-control-plaintext border-bottom" type="text" readonly>
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-md-4 col-form-label form-control-label">Tanggal Lahir</label>
                <div class="col-md-6 d-flex align-items-center">
                  <input value="<?= date('d M Y', strtotime($value['tanggal_lahir_ibu'])); ?>" id="tanggal_lahir" name="tanggal_lahir" class="form-control-plaintext border-bottom" type="text" readonly>
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-md-4 col-form-label form-control-label">Usia</label>
                <div class="col-md-6 d-flex align-items-center">
                  <input value="<?= usia($value['tanggal_lahir_ibu']); ?>" name="usia" id="usia" class="form-control-plaintext border-bottom" type="text" readonly>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-md-4 col-form-label form-control-label">No HP</label>
                <div class="col-md-6 d-flex align-items-center">
                  <input value="<?= $value['telepon_ibu']; ?>" class="form-control-plaintext border-bottom" type="text">
                </div>
              </div>
            </div>
          </div>

          <div class="accordion" id="accordionExample">
            <form class="" action="../controller/SkriningController.php?a=add_skrining" method="post">

              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h4 class="mb-0">RIWAYAT KEHAMILAN</h4>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tanggal Pemeriksaan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <div class="input-group input-group-sm date">
                          <input value="<?php echo $value1['tanggal_pemeriksaan']; ?>" type="text" class="form-control-plaintext form-control-sm border-bottom">
                          <span class="input-group-addon input-group-append">
                            <button class="btn border-bottom btn-prenatal-orange" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Usia Kehamilan berdasarkan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input value="<?php echo $value1['usia_kehamilan_berdasarkan']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text" value="">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label"><?php echo $value1['usia_kehamilan_berdasarkan']; ?></label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input value="<?php echo $value1['usia_kehamilan_in']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Usia kehamilan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <!-- <input id="showDate" type="text" name="usia_kehamilan_out"> -->
                        <input value="<?php echo $value1['usia_kehamilan_out']; ?>" type="text" name="usia_kehamilan_out" class="form-control-plaintext form-control-sm border-bottom">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Metode Konsepsi</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <select class="form-control-plaintext form-control-sm border-bottom">
                          <option value="0" <?php echo ($value1['metode_konsepsi'] == '0') ? 'selected' : ''; ?>>Spontan</option>
                          <option value="1" <?php echo ($value1['metode_konsepsi'] == '1') ? 'selected' : ''; ?>>IVF/Inseminasi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">G-P-A</label>
                      <div class="col-md-2 d-flex align-items-center">
                        <?php $g_p_a = explode("-",$value1['g_p_a']) ?>
                        <input value="<?php echo $g_p_a[0]; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <input value="<?php echo $g_p_a[1]; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <input value="<?php echo $g_p_a[2]; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Interval Kehamilan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <select name="in_riwayat_kehamilan" id="in_riwayat_kehamilan" class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['interval_kehamilan'] == '1') ? 'selected' : ''; ?>>< 10 tahun/anak pertama</option>
                          <option value="0" <?php echo ($value1['interval_kehamilan'] == '0') ? 'selected' : ''; ?>>>=10 tahun</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Anak Hidup</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input value="<?php echo $value1['anak_hidup']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0 mt-4">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Kehamilan Sebelumnya</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <?php $queryRiwayat = $connection->query("SELECT * FROM skrining_riwayat_kehamilan WHERE skrining_id = '".$_GET['id-s']."'");
                        $rowRiwayat = $queryRiwayat->num_rows; ?>
                        <?php if ($rowRiwayat == 0): ?>
                          <div style="width:50%" class="form-control-plaintext border-bottom form-control-sm">
                            Kehamilan sebelumnya tidak ada
                          </div>
                        <?php else: ?>
                          <div class="table-responsive">
                            <table class="table table-bordered table-custom">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>No</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Berat Badan</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Usia Kehamilan saat lahir</th>
                                  <th>Cara Persalinan</th>
                                  <th>Kondisi Saat Lahir</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($queryRiwayat as $key => $valueRiwayat): ?>
                                  <tr>
                                    <td>

                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $valueRiwayat['tanggal_lahir_riwayat']; ?></td>
                                    <td><?php echo $valueRiwayat['berat_lahir_riwayat']; ?></td>
                                    <td><?php echo $valueRiwayat['jenis_kelamin_riwayat']; ?></td>
                                    <td><?php echo $valueRiwayat['usia_kehamilan_saat_lahir_riwayat']; ?></td>
                                    <td><?php echo $valueRiwayat['cara_persalinan_riwayat']; ?></td>
                                    <td><?php echo $valueRiwayat['kondisi_saat_lahir_riwayat']; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Merokok saat hamil</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['merokok'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['merokok'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Ibu/kakak PE</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['riwayat_ibu_kakak_pe'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['riwayat_ibu_kakak_pe'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Penyakit Lupus</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['penyakit_lupus'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['penyakit_lupus'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Penyakit APS</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['penyakit_aps'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['penyakit_aps'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Hipertensi Kronik</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['hipertensi_kronik'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['hipertensi_kronik'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Diabetes Mellitus</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['diabetes_militus'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['diabetes_militus'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Hamil dengan PE</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['riwayat_hamil_pe'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['riwayat_hamil_pe'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat PJT</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['riwayat_pjt'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['riwayat_pjt'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Preterm Birth (&gt;37 minggu)</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select class="form-control-plaintext border-bottom form-control-sm">
                          <option value="1" <?php echo ($value1['riwayat_preterm_birth'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                          <option value="0" <?php echo ($value1['riwayat_preterm_birth'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h4 class="mb-0">PEMERIKSAAN FISIK</h4>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Berat Badan</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm input-group-merge">
                          <input value="<?php echo $value1['berat_badan']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text" required>
                          <div class="input-group-append">
                            <button class="btn border-bottom text-prenatal-orange" type="button">kg</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tinggi Badan</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm input-group-merge">
                          <input value="<?php echo $value1['tinggi_badan']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          <div class="input-group-append">
                            <button class="btn border-bottom text-prenatal-orange" type="button">cm</button>
                          </div>
                        </div>
                      </div>
                      <label class="col-md-3 col-form-label form-control-label"><?php echo "BMI : ".number_format($value1['bmi'],3); ?></label>
                    </div>
                    <div class="form-group row mt-2 mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Mean arterial pressure</label>
                      <div class="col-md-3 d-flex align-items-start">
                        <div class="input-group input-group-sm">
                          <input value="<?php echo $value1['map']; ?>" type="text" class="form-control-plaintext border-bottom form-control-sm">
                          <div class="input-group-append">
                            <button class="btn border-bottom text-prenatal-orange" type="button">mmHg</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 d-flex align-items-start">
                        <div class="table-responsive">
                          <table class="table table-bordered table-custom">
                            <tr>
                              <th colspan="3">Measurement 1</th>
                            </tr>
                            <tr>
                              <th></th>
                              <th>Left arm</th>
                              <th>Right arm</th>
                            </tr>
                            <tr>
                              <td>Systolic</td>
                              <td><?php echo $value1['systolic_left_1']; ?></td>
                              <td><?php echo $value1['systolic_right_1']; ?></td>
                            </tr>
                            <tr>
                              <td>Diastolic</td>
                              <td><?php echo $value1['diastolic_left_1']; ?></td>
                              <td><?php echo $value1['diastolic_right_1']; ?></td>
                            </tr>
                            <tr>
                              <th colspan="3">Measurement 2</th>
                            </tr>
                            <tr>
                              <th></th>
                              <th>Left arm</th>
                              <th>Right arm</th>
                            </tr>
                            <tr>
                              <td>Systolic</td>
                              <td><?php echo $value1['systolic_left_2']; ?></td>
                              <td><?php echo $value1['systolic_right_2']; ?></td>
                            </tr>
                            <tr>
                              <td>Diastolic</td>
                              <td><?php echo $value1['diastolic_left_2']; ?></td>
                              <td><?php echo $value1['diastolic_right_2']; ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <label id="mom_map" class="col-md-3 col-form-label form-control-label"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <h4 class="mb-0">USG SKRINING</h4>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Kondisi Pemeriksaan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input value="<?php echo $value1['kondisi_pemeriksaan']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Lokasi Kehamilan</label>
                      <div class="col-md-5 d-flex align-items-center">
                        <input value="<?php echo $value1['lokasi_kehamilan']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label" for="">Jumlah Janin</label>
                      <div class="col-md-4 d-flex align-items-center">
                        <input value="<?php echo $value1['jumlah_janin']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <?php $queryJanin = $connection->query("SELECT * FROM skrining_janin WHERE skrining_id = '".$_GET['id-s']."'"); ?>
                    <?php if ($value1['jumlah_janin'] > 1): ?>
                      <div class="form-group row mb-0 mt-4">
                        <label class="col-md-4 col-form-label form-control-label"></label>
                        <div class="col-md-8 d-flex align-items-start">
                          <div class="table-responsive mt-2">
                            <table class="table table-bordered table-custom">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Denyut Jantung Janin</th>
                                  <th>Regurgitasi Trikuspid</th>
                                  <th>Irama</th>
                                  <th>Gerak Janin</th>
                                  <th>BPD</th>
                                  <th>NT</th>
                                  <th>NB</th>
                                  <th>Kondisi Organ</th>
                                  <th>Keterangan organ</th>
                                  <th>Crl</th>
                                  <th>PI Ductus Venosus</th>
                                  <th>A wave Ductus Venosus</th>
                                  <th>Cairan Ketuban</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($queryJanin as $key => $valueJanin): ?>
                                  <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $valueJanin['denyut_jantung']; ?></td>
                                    <td><?php echo $valueJanin['regurgitasi_trikuspid']; ?></td>
                                    <td><?php echo $valueJanin['irama']; ?></td>
                                    <td><?php echo $valueJanin['gerak_janin']; ?></td>
                                    <td><?php echo $valueJanin['pbd']; ?></td>
                                    <td><?php echo $valueJanin['nt']; ?></td>
                                    <td><?php echo $valueJanin['nb']; ?></td>
                                    <td><?php echo $valueJanin['kondisi_organ']; ?></td>
                                    <td><?php echo $valueJanin['keterangan_organ']; ?></td>
                                    <td><?php echo ($valueJanin['crl'] == '') ? '' : $valueJanin['crl']; ?></td>
                                    <td><?php echo $valueJanin['ductus_venosus']; ?></td>
                                    <td><?php echo $valueJanin['awdv']; ?></td>
                                    <td><?php echo $valueJanin['cairan_ketuban']; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <?php else: ?>
                    <?php
                    // echo var_dump($queryJanin);
                     $hasilJanin = $queryJanin->fetch_assoc(); ?>
                      <div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Denyut Jantung Janin</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <div class="input-group input-group-sm input-group-merge">
                              <input value="<?php echo $hasilJanin['denyut_jantung']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                              <div class="input-group-append">
                                <button class="btn text-prenatal-orange" type="button">dpm</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Regurgitasi Trikuspid</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <select class="form-control-plaintext border-bottom form-control-sm" required>
                              <option value="1" <?php echo ($hasilJanin['regurgitasi_trikuspid'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                              <option value="0" <?php echo ($hasilJanin['regurgitasi_trikuspid'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Irama</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <input value="<?php echo $hasilJanin['irama']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Gerak Janin</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <select class="form-control-plaintext border-bottom form-control-sm" required>
                              <option value="1" <?php echo ($hasilJanin['gerak_janin'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                              <option value="0" <?php echo ($hasilJanin['gerak_janin'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">BPD</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <div class="input-group input-group-sm input-group-merge">
                              <input value="<?php echo $hasilJanin['bpd']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                              <div class="input-group-append">
                                <button class="btn text-prenatal-orange" type="button">mm</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">NT</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <div class="input-group input-group-sm input-group-merge">
                              <input value="<?php echo $hasilJanin['nt']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                              <div class="input-group-append">
                                <button class="btn text-prenatal-orange" type="button">mm</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">NB</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <select class="form-control-plaintext border-bottom form-control-sm" required>
                              <option value="1" <?php echo ($hasilJanin['nb'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                              <option value="0" <?php echo ($hasilJanin['nb'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                            </select>
                          </div>
                        </div>
                        <?php if ($hasilJanin['crl'] != ''): ?>
                          <div class="form-group row mb-0">
                            <label class="col-md-4 col-form-label form-control-label">CRL</label>
                            <div class="col-md-3 d-flex align-items-center">
                              <div class="input-group input-group-sm input-group-merge">
                                <input value="<?php echo $hasilJanin['crl']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                                <div class="input-group-append">
                                  <button class="btn text-prenatal-orange" type="button">mm</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Kondisi organ</label>
                          <div class="col-md-4 d-flex align-items-center">
                            <input value="<?php echo $hasilJanin['kondisi_organ']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                            <!-- <input class="d-none" id="organInSem" type="text" name="organ_in_sem"> -->
                            <input id="organInSem" type="text" name="organ_in_sem" hidden>
                          </div>
                          <div class="col-md-1 d-flex align-items-center">
                            <button id="organDetailSem" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addP">
                              Detail
                            </button>
                          </div>
                          <!-- <button type="button" class="btn btn-info">sdsd</button> -->
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Keterangan organ</label>
                          <div class="col-md-6 d-flex align-items-center py-2">
                            <textarea class="form-control-plaintext border-bottom form-control-sm" type="text"><?php echo $hasilJanin['keterangan_organ']; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">PI Ductus Venosus</label>
                          <div class="col-md-4 d-flex align-items-center">
                            <input value="<?php echo $hasilJanin['ductus_venosus']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">A wave Ductus Venosus</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <input value="<?php echo $hasilJanin['awdv']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                          <label class="col-md-4 col-form-label form-control-label">Cairan Ketuban</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <input value="<?php echo $hasilJanin['cairan_ketuban']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                    <!-- <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label" for="">nyoba</label>
                      <div class="col-md-8 d-flex align-items-center">

                      </div>
                    </div> -->
                    <div style="display:none;" id="tableShow" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label" for=""></label>
                      <div class="col-md-8 d-flex align-items-center">
                        <div class="table-responsive">
                          <table class="table-no-wrap">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Denyut Jantung Janin</th>
                                <th>Regurgitasi Trikuspid</th>
                                <th>Irama</th>
                                <th>Gerak Janin</th>
                                <th>BPD</th>
                                <th>NT</th>
                                <th>NB</th>
                                <th>Kondisi Organ</th>
                                <th>Keterangan organ</th>
                                <th>Crl</th>
                                <th>PI Ductus Venosus</th>
                                <th>A wave Ductus Venosus</th>
                                <th>Cairan Ketuban</th>
                                <th>#</th>
                              </tr>
                            </thead>
                            <tbody id="td_add">

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Plasenta</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <input value="<?php echo $value1['plasenta']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label class="col-md-4 col-form-label form-control-label">Mean UtPI</label>
                      <div class="col-md-4">
                        <div class="input-group input-group-sm">
                          <input value="<?php echo $value1['mean_utpi']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          <div class="input-group-append">
                            <!-- <button class="btn btn-outline-primary" type="button">MoM</button> -->
                            <button data-toggle="dropdown" class="btn btn-prenatal-orange" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="table-responsive">
                          <table class="table table-bordered table-custom">
                            <tr>
                              <th width='50%'>Kiri</th>
                              <td><?php echo $value1['utpi_kiri']; ?></td>
                            </tr>
                            <tr>
                              <th>Kanan</th>
                              <td><?php echo $value1['utpi_kanan']; ?></td>
                            </tr>
                            <tr>
                              <th colspan="2"><?php echo $mom_utpi = round($value1['mean_utpi']/1.76,3).' MoM'; ?></th>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">PR Ophtalmica</label>
                      <div class="col-md-4">
                        <div class="input-group input-group-sm">
                          <input value="<?php echo $value1['aospr']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          <div class="input-group-append">
                            <button data-toggle="dropdown" class="btn btn-prenatal-orange" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="table-responsive">
                          <table class="table table-bordered table-custom">
                            <tr>
                              <th width='50%'>Psv1</th>
                              <td><?php echo $value1['psv1']; ?></td>
                            </tr>
                            <tr>
                              <th>Psv2</th>
                              <td><?php echo $value1['psv2']; ?></td>
                            </tr>
                            <tr>
                              <th colspan="2"><?php echo $mom_aospr = round($value1['aospr']/0.56,3).' MoM'; ?></th>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Kesimpulan USG</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <textarea class="form-control-plaintext border-bottom" name="kesimpulan_usg" rows="2" placeholder="Tulis disini"><?php echo $value1['kesimpulan_usg']; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="card-header border-top">
                    <h4 class="mb-0">PEMERIKSAAN BIOKIMIAWI</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">PLGF</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm input-group-merge">
                          <input value="<?php echo $value1['plgf']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                        </div>
                      </div>
                      <label id="final_mom_plgf" class="col-md-3 col-form-label form-control-label"><?php echo $mom_plgf = round($value1['plgf']/49.82,3).' MoM'; ?></label>
                    </div>
                  </div>
                </div>
              </div>

              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <h4 class="mb-0">PENILAIAN RISIKO</h4>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Trisomies Risk Assessment</label>
                      <div class="col-md-4 d-flex align-items-center">
                        <input value="<?php echo $value1['trisomies_risk_assessment']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 34 weeks</label>
                          <div class="col-md-4 d-flex mt-2">
                            <input value="<?php echo $value1['pohp_34']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                      <label class="col-md-4 col-form-label form-control-label mb-0"><?php echo $value1['akurasi_34']; ?></label>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 37 weeks</label>
                          <div class="col-md-4 d-flex mt-2">
                            <input value="<?php echo $value1['pohp_37']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                          </div>
                          <label class="col-md-4 col-form-label form-control-label"><?php echo $value1['akurasi_34']; ?></label>
                    </div>
                  </div>
                </div>
              </div>

              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <h4 class="mb-0">CATATAN PEMERIKSAAN</h4>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Asesmen Pasien (S-O-A-P)</label>
                      <div class="col-md-2 d-flex align-items-center py-2">
                        <textarea value="<?php echo $value1['pohp_37']; ?>" class="form-control-plaintext border-bottom" rows="2" placeholder="S"></textarea>
                      </div>
                      <div class="col-md-2 d-flex align-items-center py-2">
                        <textarea value="<?php echo $value1['pohp_37']; ?>" class="form-control-plaintext border-bottom" rows="2" placeholder="O"></textarea>
                      </div>
                      <div class="col-md-2 d-flex align-items-center py-2">
                        <textarea value="<?php echo $value1['pohp_37']; ?>" class="form-control-plaintext border-bottom" rows="2" placeholder="A"></textarea>
                      </div>
                      <div class="col-md-2 d-flex align-items-center py-2">
                        <textarea value="<?php echo $value1['pohp_37']; ?>" class="form-control-plaintext border-bottom" rows="2" placeholder="P"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Rencana Tindak Lanjut (P)</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <textarea class="form-control-plaintext border-bottom" name="rtl" rows="2"><?php echo $value1['rtl']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Pemeriksa</label>
                      <div class="col-md-8 d-flex align-items-center">
                        <input value="<?php echo $value1['pemeriksa']; ?>" class="form-control-plaintext border-bottom form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Catatan (khusus dokter)</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <textarea class="form-control-plaintext border-bottom" name="catatan" rows="2"><?php echo $value1['catatan']; ?></textarea>
                      </div>
                    </div>
                    <!-- <input name="akurasi_34" id="akurasi_34" type="text">
                    <input name="akurasi_37" id="akurasi_37" type="text"> -->
                    <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                  </div>
                  <div class="card-footer text-right">
                    <button type="reset" class="btn btn-prenatal-grey">Batal</button>
                    <button type="submit" class="btn btn-prenatal-orange">Simpan</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addJanin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Data USG Janin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="formjanin" class="" action="#" method="post">
                <div class="modal-body">
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Denyut Jantung Janin</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="denyut_jantung_janin_in" name="denyut_jantung_janin" class="form-control" type="text" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">dpm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Regurgitasi Trikuspid</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="regurgitasi_trikuspid_in" name="regurgitasi_trikuspid" class="form-control-plaintext border-bottom form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1">Ada</option>
                        <option value="0">Tidak ada</option>
                        <!-- <option value="3">Tidak dinilai</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Irama</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="irama_in" name="irama" class="form-control-plaintext border-bottom form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Ireguler">Ireguler</option>
                        <option value="Tidak Diperiksa">Tidak Diperiksa</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Gerak Janin</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="gerak_janin_in" name="gerak_janin" class="form-control-plaintext border-bottom form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1">Ada</option>
                        <option value="0">Tidak ada</option>
                        <!-- <option value="3">Tidak dinilai</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">BPD</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="bpd_in" name="bpd" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">NT</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="nt_in" name="nt" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">NB</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="nb_in" name="nb" class="form-control-plaintext border-bottom form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="1">Ada</option>
                        <option value="0">Tidak ada</option>
                        <!-- <option value="3">Tidak dinilai</option> -->
                      </select>
                    </div>
                  </div>
                  <div style="display:none;" id="crlForm3" class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">CRL</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="crl" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Kondisi organ</label>
                    <div class="col-md-4 d-flex align-items-center">
                      <select id="kondisi_organ_in" name="kondisi_organ" class="form-control-plaintext border-bottom form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="Tidak tampak kelainan">Tidak tampak kelainan</option>
                        <option value="Tampak kelainan">Tampak kelainan</option>
                        <!-- <option value="Tampak Anomali Janin">Tampak Anomali Janin</option> -->
                      </select>
                      <input class="d-none" id="organInSem" type="text" name="organ_in_sem">
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                      <button id="organDetailSem" type="button" class="btn btn-default btn-sm d-none" data-toggle="modal" data-target="#addP">
                        Detail
                      </button>
                    </div>
                    <!-- <button type="button" class="btn btn-info">sdsd</button> -->
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Keterangan organ</label>
                    <div class="col-md-6 d-flex align-items-center py-2">
                      <textarea id="keterangan_organ_in" class="form-control" name="keterangan_organ" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">PI Ductus Venosus</label>
                    <div class="col-md-4 d-flex align-items-center">
                      <input id="ductus_venosus_in" name="ductus_venosus" class="form-control-plaintext border-bottom form-control-sm" type="text">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">A wave Ductus Venosus</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="awdv_in" name="awdv" class="form-control-plaintext border-bottom form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Positif">Positif</option>
                        <option value="Absent">Absent</option>
                        <option value="Reversed">Reversed</option>
                        <option value="Tidak Dinilai ">Tidak Dinilai </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Cairan Ketuban</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="cairan_ketuban_in" name="cairan_ketuban" class="form-control-plaintext border-bottom form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                        <option value="Tidak Diperiksa">Tidak Diperiksa</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="button" class="btn btn-primary add-td">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header align-items-center">
                <h4 class="modal-title" id="exampleModalLabel">Syarat kelainan</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <a href="#" class="btn-transparent" data-toggle="modal" data-target="#tabelPenilaian">
                  <!-- <span aria-hidden="true">&times;</span> -->
                  <i class="fas fa-info-circle text-danger fa-lg"></i>
                </a>
              </div>
              <form id="formorgan" class="" action="#" method="post">
                <div class="modal-body p-0">
                  <div class="accordion" id="accordionOrgan">
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingOneOrgan">
                        <h2 class="mb-0">
                          <button class=" px-0 btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOneOrgan" aria-expanded="true" aria-controls="collapseOneOrgan">
                            Kranium dan Otak
                          </button>
                        </h2>
                      </div>
                      <div id="collapseOneOrgan" class="collapse" aria-labelledby="headingOneOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_otak" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="organ_otak">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingTwoOrgan">
                        <h2 class="mb-0">
                          <button class=" px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoOrgan" aria-expanded="false" aria-controls="collapseTwoOrgan">
                            Leher
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwoOrgan" class="collapse" aria-labelledby="headingTwoOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_leher" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="organ_leher">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingThreeOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeOrgan" aria-expanded="false" aria-controls="collapseThreeOrgan">
                            Wajah
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThreeOrgan" class="collapse" aria-labelledby="headingThreeOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_wajah" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingFourOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFourOrgan" aria-expanded="false" aria-controls="collapseFourOrgan">
                            Tulang Belakang
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFourOrgan" class="collapse" aria-labelledby="headingFourOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_tulang" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingFiveOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveOrgan" aria-expanded="false" aria-controls="collapseFiveOrgan">
                            Jantung
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFiveOrgan" class="collapse" aria-labelledby="headingFiveOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_jantung" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingSixOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSixOrgan" aria-expanded="false" aria-controls="collapseSixOrgan">
                            Toraks
                          </button>
                        </h2>
                      </div>
                      <div id="collapseSixOrgan" class="collapse" aria-labelledby="headingSixOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_toraks" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingSevenOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSevenOrgan" aria-expanded="false" aria-controls="collapseSevenOrgan">
                            Abdomen
                          </button>
                        </h2>
                      </div>
                      <div id="collapseSevenOrgan" class="collapse" aria-labelledby="headingSevenOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_abdomen" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="card mb-0 shadow-none border-top">
                      <div class="card-header py-1" id="headingEightOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEightOrgan" aria-expanded="false" aria-controls="collapseEightOrgan">
                            Extrimitas
                          </button>
                        </h2>
                      </div>
                      <div id="collapseEightOrgan" class="collapse" aria-labelledby="headingEightOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_extrimitas" class="form-control-plaintext border-bottom form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button id="tombol-hidden" type="button" class="btn btn-primary add-organ">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="tabelPenilaian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header align-items-center">
                <h4 class="modal-title" id="exampleModalLabel">Tabel Penilaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <!-- <button type="button" class="btn"> -->
                  <span aria-hidden="true">&times;</span>
                  <!-- <i class="fas fa-info-circle text-danger fa-lg"></i> -->
                </button>
              </div>
              <div class="modal-body p-0">
                <img class="img-fluid" src="../data/resource/syarat.jpeg" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
<script src="../assets/js/add_skrining.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).on('click','.print',function(e) {
  var url     = $(this).attr("data-url");
  var origin  = window.location.origin;
  window.open(origin+url,"_blank","toolbar,scrollbars,resizable,top=50,left=150,width=1000,height=600");
});
</script>
<?php } ?>

<!-- Modal Identitas -->
<div class="modal fade" id="editIdentitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Identitas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal MENSTRUASI -->
<div class="modal fade" id="editMenstruasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Menstruasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal PENYAKIT -->
<div class="modal fade" id="editPenyakit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Penyakit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
