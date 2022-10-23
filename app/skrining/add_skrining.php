<?php
include '../config/connection.php';
$query    = $connection->query("SELECT * FROM identitas WHERE identitas_id = '".$_GET['id']."'");
$value    = $query->fetch_assoc();
$query1   = $connection->query("SELECT * FROM skrining WHERE identitas_id = '".$_GET['id']."'");
$value1   = $query1->fetch_assoc();
$record1  = $query1->num_rows;
$title    = 'Tambah Skrining 11-13 Minggu'; ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Data Skrining</h6>
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
          <form class="" action="../controller/SkriningController.php?a=add_skrining" method="post">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h4 class="mb-0">DATA PASIEN</h4>
              </div>
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Nama</label>
                  <div class="col-md-5 d-flex align-items-center">
                    <input value="<?= $value['identitas_id']; ?>" name="identitas_id" class="form-control-plaintext" type="text" hidden>
                    <input value="<?= $value['nama_ibu']; ?>" name="nama" class="form-control-plaintext" type="text" readonly>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">No Rm</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <input value="<?= $value['no_rm']; ?>" name="no_rm" class="form-control-plaintext" type="text" readonly>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Tanggal Lahir</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <!-- <input id="tanggal_lahir" name="tanggal_lahir" class="form-control form-control-sm datepicker" type="text" required> -->
                    <input value="<?= date('d M Y', strtotime($value['tanggal_lahir_ibu'])); ?>" id="tanggal_lahir" name="tanggal_lahir" class="form-control-plaintext" type="text" readonly>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Usia</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <input value="<?= usia($value['tanggal_lahir_ibu']); ?>" name="usia" id="usia" class="form-control-plaintext" type="text" readonly>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">No HP</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <input value="<?= $value['telepon_ibu']; ?>" name="no_hp" class="form-control-plaintext" type="text" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion" id="accordionExample">
              <div style="overflow: visible !important;" class="card">
                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h4 class="mb-0">RIWAYAT KEHAMILAN</h4>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tanggal Pemeriksaan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <div class="input-group input-group-sm date" id="datetimepicker1">
                          <input id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" type="text" class="form-control" required>
                          <span class="input-group-addon input-group-append">
                            <button class="btn btn-outline-prenatal-orange" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Usia Kehamilan berdasarkan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <!-- <input name="" class="form-control form-control-sm" type="text" value=""> -->
                        <select id="usia_kehamilan_berdasarkan" name="usia_kehamilan_berdasarkan" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">CRL</option>
                          <option value="2">HPHT</option>
                          <option value="3">Tanggal Transfer Embrio Hari Ke 3</option>
                          <option value="4">Tanggal Transfer Embrio Hari Ke 5</option>
                          <!-- <option value="HPHT">HPHT</option> -->
                        </select>
                      </div>
                    </div>
                    <!-- crl -->
                    <div style="display:none;" id="crlForm2" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">CRL</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <small>Mohon isi CRL pada USG Skrining</small>
                        <!-- <div class="input-group input-group-sm input-group-merge">
                          <input class="form-control" type="text">
                          <div class="input-group-append">
                            <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <!-- hpht -->
                    <div style="display:none;" id="hphtForm" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">HPHT</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input value="<?= date('m/d/Y', strtotime($value['hpht'])); ?>" id="hpht" class="form-control form-control-sm datepicker" type="text">
                      </div>
                    </div>
                    <!-- Embrio Hari Ke 3 -->
                    <div style="display:none;" id="hariKe3Form" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tanggal Transfer Embrio Hari Ke 3</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input id="hari_ke_3" class="form-control form-control-sm datepicker" type="text">
                      </div>
                    </div>
                    <!-- Embrio Hari Ke 5 -->
                    <div style="display:none;" id="hariKe5Form" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tanggal Transfer Embrio Hari Ke 5</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input id="hari_ke_5" class="form-control form-control-sm datepicker" type="text">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Usia kehamilan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <!-- <input id="showDate" type="text" name="usia_kehamilan_out"> -->
                        <input id="showDate" type="text" name="usia_kehamilan_out" class="form-control form-control-sm">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Metode Konsepsi</label>
                      <div class="col-md-4 d-flex align-items-center">
                        <select name="metode_konsepsi" id="metode_konsepsi" class="form-control form-control-sm" required>
                          <option value="">-Pilih-</option>
                          <option value="0">Spontan</option>
                          <option value="1">IVF/Inseminasi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">G-P-A</label>
                      <div class="col-md-2 d-flex align-items-center">
                        <!-- <input name="g_p_a" class="form-control form-control-sm" type="text"> -->
                        <input name="gravida" class="form-control form-control-sm" type="text" placeholder="gravida" required>
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <input id="paritas" name="paritas" class="form-control form-control-sm" type="text" placeholder="paritas" required>
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <input name="abortus" class="form-control form-control-sm" type="text" placeholder="abortus" required>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Interval Kehamilan</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <select name="in_riwayat_kehamilan" id="in_riwayat_kehamilan" class="form-control form-control-sm" required>
                          <option value="">-Pilih-</option>
                          <option value="1">< 10 tahun/anak pertama</option>
                          <option value="0">>=10 tahun</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Anak Hidup</label>
                      <div class="col-md-6 d-flex align-items-center">
                        <input name="anak_hidup" class="form-control form-control-sm" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Kehamilan Sebelumnya</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#skrining_riwayat">
                          Tambah Isian
                        </button>
                      </div>
                    </div>
                    <div id="tableShowRiyawat" class="form-group row mb-0 d-none">
                      <label class="col-md-4 col-form-label form-control-label"></label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <div class="table-responsive">
                          <table class="table table-bordered">
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
                            <tbody id="td_riwayat">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Merokok saat hamil</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select name="merokok" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Ibu/kakak PE</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="riwayat_ibu_kakak_pe" name="riwayat_ibu_kakak_pe" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Penyakit Lupus</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select name="penyakit_lupus" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Penyakit APS</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select name="penyakit_aps" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Hipertensi Kronik</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="hipertensi_kronik" name="hipertensi_kronik" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Diabetes Mellitus</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="diabetes_militus" name="diabetes_militus" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div id="riwayat_hamil_peForm" style="display: none" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Hamil dengan PE</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="riwayat_hamil_pe" name="riwayat_hamil_pe" class="form-control form-control-sm">
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div id="riwayat_pjtForm" style="display: none" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat PJT</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="riwayat_pjt" name="riwayat_pjt" class="form-control form-control-sm">
                          <option value="">- Pilih -</option>
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div id="riwayat_preterm_birthForm" style="display: none" class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Riwayat Preterm Birth (<37 minggu)</label>
                          <div class="col-md-3 d-flex align-items-center">
                            <select id="riwayat_preterm_birth" name="riwayat_preterm_birth" class="form-control form-control-sm">
                              <option value="">- Pilih -</option>
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
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
                          <input id="berat_badan" name="berat_badan" class="form-control" type="text" required>
                          <div class="input-group-append">
                            <button class="btn btn-outline-prenatal-orange" type="button">kg</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Tinggi Badan</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm input-group-merge">
                          <input id="tinggi_badan" name="tinggi_badan" class="form-control" type="text" required>
                          <div class="input-group-append">
                            <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                          </div>
                        </div>
                      </div>
                      <label id="bmi" class="col-md-3 col-form-label form-control-label"></label>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Mean arterial pressure</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm">
                          <input name="map" id="final_map" type="text" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-outline-prenatal-orange" type="button">mmHg</button>
                            <button data-toggle="dropdown" class="btn btn-prenatal-orange" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                            <div class="dropdown-menu dropdown-map p-2">
                              <h4 class="mb-0 text-primary">Measurement 1</h4>
                              <hr class="my-1">
                              <table class="table-map" border="0">
                                <tr>
                                  <th width="100px"></th>
                                  <th>Left arm</th>
                                  <th>Right arm</th>
                                </tr>
                                <tr>
                                  <td>Systolic</td>
                                  <td>
                                    <input name="systolic_left_1" id="systolicLeft1" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                  <td>
                                    <input name="systolic_right_1" id="systolicRight1" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Diastolic</td>
                                  <td>
                                    <input name="diastolic_left_1" id="diastolicLeft1" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                  <td>
                                    <input name="diastolic_right_1" id="diastolicRight1" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                </tr>
                              </table>
                              <hr style="border: 1px dashed #5e72e4;" class="mt-3 mb-1">
                              <h4 class="mb-0 text-primary">Measurement 2</h4>
                              <hr class="my-1">
                              <table class="table-map" border="0">
                                <tr>
                                  <th width="100px"></th>
                                  <th>Left arm</th>
                                  <th>Right arm</th>
                                </tr>
                                <tr>
                                  <td>Systolic</td>
                                  <td>
                                    <input name="systolic_left_2" id="systolicLeft2" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                  <td>
                                    <input name="systolic_right_2" id="systolicRight2" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Diastolic</td>
                                  <td>
                                    <input name="diastolic_left_2" id="diastolicLeft2" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                  <td>
                                    <input name="diastolic_right_2" id="diastolicRight2" class="form-map form-control form-control-sm" type="number" required>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
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
                        <select name="kondisi_pemeriksaan" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="Lapang Pandang Cukup Optimal">Lapang Pandang Cukup Optimal</option>
                          <option value="Lapang Pandang Optimal">Lapang Pandang Optimal</option>
                          <option value="Lapang Pandang Suboptimal Karena Posisi Janin">Lapang Pandang Suboptimal Karena Posisi Janin</option>
                          <option value="Lapang Pandang Suboptimal Karena Pergerakan Janin">Lapang Pandang Suboptimal Karena Pergerakan Janin</option>
                          <option value="Lapang Pandang Suboptimal Karena Faktor Ibu">Lapang Pandang Suboptimal Karena Faktor Ibu</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Lokasi Kehamilan</label>
                      <div class="col-md-5 d-flex align-items-center">
                        <select name="lokasi_kehamilan" class="form-control form-control-sm" required>
                          <option value="">- Pilih -</option>
                          <option value="Intrauterin">Intrauterin</option>
                          <option value="Ekstrauterin">Ekstrauterin</option>
                          <option value="Pregnancy of Unknown Location (PUL)">Pregnancy of Unknown Location (PUL)</option>
                          <option value="Heterotropik">Heterotropik</option>
                          <option value="Belum Dapat Ditentukan">Belum Dapat Ditentukan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label" for="">Jumlah Janin</label>
                      <div class="col-md-4 d-flex align-items-center">
                        <input id="jumlah_janin" class="form-control form-control-sm" type="text" name="jumlah_janin" value="">
                      </div>
                    </div>
                    <div id="viewJaninShow" class="form-group row mb-0 d-none">
                      <label class="col-md-4 col-form-label form-control-label" for="">Data USG</label>
                      <div class="col-md-8 d-flex align-items-center">
                        <button id="tambah-janin" data-toggle="modal" data-target="#addJanin" type="button" class="btn btn-prenatal-orange btn-sm">Tambah Data Usg Janin</button>
                      </div>
                    </div>
                    <div id="viewJaninOne" class="d-none">
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Denyut Jantung Janin</label>
                        <div class="col-md-3 d-flex align-items-center">
                          <div class="input-group input-group-sm input-group-merge">
                            <input id="denyut_jantung_janin" name="denyut_jantung_janin" class="form-control" type="text" required>
                            <div class="input-group-append">
                              <button class="btn btn-outline-prenatal-orange" type="button">dpm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Regurgitasi Trikuspid</label>
                        <div class="col-md-3 d-flex align-items-center">
                          <select id="regurgitasi_trikuspid" name="regurgitasi_trikuspid" class="form-control form-control-sm" required>
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
                          <select id="irama" name="irama" class="form-control form-control-sm" required>
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
                          <select id="gerak_janin" name="gerak_janin" class="form-control form-control-sm" required>
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
                            <input id="bpd" name="bpd" class="form-control" type="text">
                            <div class="input-group-append">
                              <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">NT</label>
                        <div class="col-md-3 d-flex align-items-center">
                          <div class="input-group input-group-sm input-group-merge">
                            <input id="nt" name="nt" class="form-control" type="text">
                            <div class="input-group-append">
                              <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">NB</label>
                        <div class="col-md-3 d-flex align-items-center">
                          <select id="nb" name="nb" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="1">Ada</option>
                            <option value="0">Tidak ada</option>
                            <!-- <option value="3">Tidak dinilai</option> -->
                          </select>
                        </div>
                      </div>
                      <div style="display:none;" id="crlForm" class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">CRL</label>
                        <div class="col-md-6 d-flex align-items-center">
                          <div class="input-group input-group-sm input-group-merge">
                            <input id="crl" class="form-control" type="text">
                            <div class="input-group-append">
                              <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Kondisi organ</label>
                        <div class="col-md-4 d-flex align-items-center">
                          <select id="kondisi_organ" name="kondisi_organ" class="form-control form-control-sm" required>
                            <option value="">- Pilih -</option>
                            <option value="Tidak tampak kelainan">Tidak tampak kelainan</option>
                            <option value="Tampak kelainan">Tampak kelainan</option>
                            <!-- <option value="Tampak Anomali Janin">Tampak Anomali Janin</option> -->
                          </select>
                          <!-- <input class="d-none" id="organInSem" type="text" name="organ_in_sem"> -->
                          <input id="organInSem" type="text" name="organ_in_sem" hidden>
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
                          <textarea id="keterangan_organ" class="form-control" name="keterangan_organ" rows="4"></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">PI Ductus Venosus</label>
                        <div class="col-md-4 d-flex align-items-center">
                          <input id="ductus_venosus" name="ductus_venosus" class="form-control form-control-sm" type="text">
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">A wave Ductus Venosus</label>
                        <div class="col-md-3 d-flex align-items-center">
                          <select id="awdv" name="awdv" class="form-control form-control-sm">
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
                          <select id="cairan_ketuban" name="cairan_ketuban" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                            <option value="Tidak Diperiksa">Tidak Diperiksa</option>
                          </select>
                        </div>
                      </div>
                    </div>
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
                        <select id="plasenta_in" name="plasenta" class="form-control form-control-sm">
                          <option value="">- Pilih -</option>
                          <option value="Anterior">Anterior</option>
                          <option value="Posterior">Posterior</option>
                          <option value="Menutupi OUI">Menutupi OUI</option>
                          <option value="Antero-lateral">Antero-lateral</option>
                          <option value="Postero-lateral">Postero-lateral</option>
                          <option value="Lateral kanan">Lateral kanan</option>
                          <option value="Lateral kiri">Lateral kiri</option>
                          <option value="Fundus">Fundus</option>
                          <option value="Belum dinilai">Belum dinilai</option>
                        </select>
                      </div>
                      <div class="col-md-3 d-flex align-items-center">
                        <select id="plasenta_right" name="plasenta_right" class="form-control form-control-sm d-none">
                          <option value="">- Pilih -</option>
                          <option value="Dikorion diamnion">Dikorion diamnion</option>
                          <option value="Monokorionik monoamniotic">Monokorionik monoamniotic</option>
                          <option value="Monokorionik diamniotic">Monokorionik diamniotic</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Mean UtPI</label>
                      <div class="col-md-4 d-flex align-items-center">
                        <div class="input-group input-group-sm">
                          <input name="mean_utpi" id="mean_utpi" type="text" class="form-control">
                          <div class="input-group-append">
                            <!-- <button class="btn btn-outline-prenatal-orange" type="button">MoM</button> -->
                            <button data-toggle="dropdown" class="btn btn-prenatal-orange" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                            <div class="dropdown-menu dropdown-map p-2">
                              <table class="table-map" border="0">
                                <tr>
                                  <td>Kiri</td>
                                  <td>
                                    <input name="utpi_kiri" id="uterina_kiri" class="form-map form-control form-control-sm" type="text">
                                  </td>
                                </tr>
                                <tr>
                                  <td>Kanan</td>
                                  <td>
                                    <input name="utpi_kanan" id="uterina_kanan" class="form-map form-control form-control-sm" type="text">
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <label id="mom_mean_utpi" class="col-md-3 col-form-label form-control-label mb-0"></label>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">PR Ophtalmica</label>
                      <div class="col-md-3 d-flex align-items-center">
                        <div class="input-group input-group-sm">
                          <input id="pr_ophtalmica" type="text" class="form-control">
                          <div class="input-group-append">
                            <button data-toggle="dropdown" class="btn btn-prenatal-orange" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                            <div class="dropdown-menu dropdown-map p-2">
                              <table class="table-map" border="0">
                                <tr>
                                  <td>Psv1</td>
                                  <td>
                                    <input name="psv1" id="psv1" class="form-map form-control form-control-sm" type="text">
                                  </td>
                                </tr>
                                <tr>
                                  <td>Psv2</td>
                                  <td>
                                    <input name="psv2" id="psv2" class="form-map form-control form-control-sm" type="text">
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <label id="mom_pr_ophtalmica" class="col-md-3 col-form-label form-control-label"></label>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Kesimpulan USG</label>
                      <div class="col-md-8 d-flex align-items-center py-2">
                        <textarea class="form-control" name="kesimpulan_usg" rows="4"></textarea>
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
                          <input name="pglf" id="mom_plgf" class="form-control" type="text">
                        </div>
                      </div>
                      <label id="final_mom_plgf" class="col-md-3 col-form-label form-control-label"></label>
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
                        <input name="trisomies_risk_assessment" class="form-control form-control-sm" type="text">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 34 weeks</label>
                          <div class="col-md-4 d-flex mt-2">
                            <input id="poh_pe_34" name="poh_pe_34" class="form-control form-control-sm" type="text">
                          </div>
                          <label id="ket_poh_pe_34" class="col-md-3 col-form-label form-control-label mb-0"></label>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 37 weeks</label>
                          <div class="col-md-4 d-flex mt-2">
                            <input id="poh_pe_37" name="poh_pe_37" class="form-control form-control-sm" type="text">
                          </div>
                          <label id="ket_poh_pe_37" class="col-md-3 col-form-label form-control-label"></label>
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
                          <textarea class="form-control" name="asesmen_pasien_s" rows="3" placeholder="S"></textarea>
                        </div>
                        <div class="col-md-2 d-flex align-items-center py-2">
                          <textarea class="form-control" name="asesmen_pasien_o" rows="3" placeholder="O"></textarea>
                        </div>
                        <div class="col-md-2 d-flex align-items-center py-2">
                          <textarea class="form-control" name="asesmen_pasien_a" rows="3" placeholder="A"></textarea>
                        </div>
                        <div class="col-md-2 d-flex align-items-center py-2">
                          <textarea class="form-control" name="asesmen_pasien_p" rows="3" placeholder="P"></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Rencana Tindak Lanjut (P)</label>
                        <div class="col-md-8 d-flex align-items-center py-2">
                          <textarea class="form-control" name="rtl" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Pemeriksa</label>
                        <div class="col-md-6 d-flex align-items-center">
                          <select name="pemeriksa" class="form-control form-control-sm select-basic-single">
                            <option value="">- Pilih -</option>
                            <?php $queryPemeriksa = $connection->query("SELECT * FROM pemeriksa"); ?>
                            <?php foreach ($queryPemeriksa as $key => $valuePemeriksa): ?>
                              <option value="<?php echo $valuePemeriksa['pemeriksa_id']; ?>"><?php echo $valuePemeriksa['nama']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-0">
                        <label class="col-md-4 col-form-label form-control-label">Catatan (khusus dokter)</label>
                        <div class="col-md-8 d-flex align-items-center py-2">
                          <textarea class="form-control" name="catatan" rows="3"></textarea>
                        </div>
                      </div>
                      <input name="akurasi_34" id="akurasi_34" type="text" hidden>
                      <input name="akurasi_37" id="akurasi_37" type="text" hidden>
                      <!-- <button type="submit" class="btn btn-prenatal-orange">Simpan</button> -->
                    </div>
                    <div class="card-footer text-right">
                      <button type="reset" class="btn btn-prenatal-grey">Batal</button>
                      <button type="submit" class="btn btn-prenatal-orange">Simpan</button>
                    </div>
                  </div>
                </div>
            </div>
          </form>
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
                          <button class="btn btn-outline-prenatal-orange" type="button">dpm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Regurgitasi Trikuspid</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="regurgitasi_trikuspid_in" name="regurgitasi_trikuspid" class="form-control form-control-sm" required>
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
                      <select id="irama_in" name="irama" class="form-control form-control-sm" required>
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
                      <select id="gerak_janin_in" name="gerak_janin" class="form-control form-control-sm" required>
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
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
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
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">NB</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="nb_in" name="nb" class="form-control form-control-sm">
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
                        <!-- <input class="form-control" type="text"> -->
                        <input id="crl_out" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Kondisi organ</label>
                    <div class="col-md-4 d-flex align-items-center">
                      <select id="kondisi_organ_in" name="kondisi_organ" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="Tidak tampak kelainan">Tidak tampak kelainan</option>
                        <option value="Tampak kelainan">Tampak kelainan</option>
                        <!-- <option value="Tampak Anomali Janin">Tampak Anomali Janin</option> -->
                      </select>
                      <!-- <input class="d-none" id="organInSem" type="text" name="organ_in_sem"> -->
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                      <button id="organDetailSemM" type="button" class="btn btn-default btn-sm d-none" data-toggle="modal" data-target="#addP">
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
                      <input id="ductus_venosus_in" name="ductus_venosus" class="form-control form-control-sm" type="text">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">A wave Ductus Venosus</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="awdv_in" name="awdv" class="form-control form-control-sm">
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
                      <select id="cairan_ketuban_in" name="cairan_ketuban" class="form-control form-control-sm">
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
                  <button type="button" class="btn btn-prenatal-orange add-td">Simpan</button>
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
                          <input id="organ_otak" class="form-control form-control-sm py-4" type="text" name="organ_otak">
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
                          <input id="organ_leher" class="form-control form-control-sm py-4" type="text" name="organ_leher">
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
                          <input id="organ_wajah" class="form-control form-control-sm py-4" type="text" name="" value="">
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
                          <input id="organ_tulang" class="form-control form-control-sm py-4" type="text" name="" value="">
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
                          <input id="organ_jantung" class="form-control form-control-sm py-4" type="text" name="" value="">
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
                          <input id="organ_toraks" class="form-control form-control-sm py-4" type="text" name="" value="">
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
                          <input id="organ_abdomen" class="form-control form-control-sm py-4" type="text" name="" value="">
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
                          <input id="organ_extrimitas" class="form-control form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div>
                    <!-- <div class="card mb-0 shadow-none border-top border-bottom">
                      <div class="card-header py-1" id="headingNineOrgan">
                        <h2 class="mb-0">
                          <button class="px-0 btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNineOrgan" aria-expanded="false" aria-controls="collapseNineOrgan">
                            Plasenta
                          </button>
                        </h2>
                      </div>
                      <div id="collapseNineOrgan" class="collapse" aria-labelledby="headingNineOrgan" data-parent="#accordionOrgan">
                        <div class="card-body py-3 px-4">
                          <input id="organ_plasenta" class="form-control form-control-sm py-4" type="text" name="" value="">
                        </div>
                      </div>
                    </div> -->
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button id="tombol-hidden" type="button" class="btn btn-prenatal-orange add-organ">Simpan</button>
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
script
<?php } ?>

<!-- Modal kembar 1 -->
<div class="modal fade" id="skrining_riwayat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formShowRiwayat" action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Tanggal Lahir</label>
            <div class="col-sm-7">
              <input id="tanggal_lahir_riwayat" type="text" name="panjang_lahir_b" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Berat Badan</label>
            <div class="col-sm-7">
              <input id="berat_lahir_riwayat" type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Jenis Kelamin</label>
            <div class="col-sm-5">
              <select id="jenis_kelamin_riwayat" class="form-control form-control-sm" name="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Belum Tampak">Belum Tampak</option>
                <option value="Belum Dinilai">Belum Dinilai</option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Usia Kehamilan Saat Lahir</label>
            <div class="col-sm-7">
              <input id="usia_kehamilan_saat_lahir_riwayat" type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Cara Persalinan</label>
            <div class="col-sm-7">
              <input id="cara_persalinan_riwayat" type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label form-control-label">Kondisi Saat Lahir</label>
            <div class="col-sm-7">
              <input id="kondisi_saat_lahir_riwayat" type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-prenatal-orange add-riwayat">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
        <button type="button" class="btn btn-prenatal-orange">Save changes</button>
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
        <button type="button" class="btn btn-prenatal-orange">Save changes</button>
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
        <button type="button" class="btn btn-prenatal-orange">Save changes</button>
      </div>
    </div>
  </div>
</div>
