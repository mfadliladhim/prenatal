<?php $title ='Identitas Pasien';
include '../config/connection.php';
$query1 = $connection->query("SELECT * FROM trimester WHERE pemeriksa_id = '".$_GET['id']."'");
$value1 = $query1->fetch_assoc();
$row1 = $query1->num_rows;
 ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Trimester</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-light">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Skrining</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Identitas Pasien</li>
            </ol>
          </nav>
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
      <?php if (empty($_GET['id-s'])) { ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-bottom-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Ambil Data Skrining</h3>
                  </div>
                  <div class="col text-right">
                    <!-- <button data-toggle="modal" data-target="#editIdentitas" class="btn btn-sm btn-primary">Edit</button> -->
                  </div>
                </div>
              </div>
              <form class="" action="../controller/TrimesterController.php?a=add_skrining_data&id=<?php echo $_GET['id']; ?>" method="post">
                <div class="card-body pt-0">
                  <div class="form-group row mb-0">
                    <div class="col-md-10">
                      <!-- <input type="text" name="tempat_lahir_b" class="form-control"> -->
                      <select class="js-example-basic-single form-control" name="id-s">
                        <option value="">Pilih</option>
                        <?php $querySkrining = $connection->query("SELECT * FROM skrining WHERE identitas_id = '".$_GET['id']."'"); ?>
                        <?php foreach ($querySkrining as $key => $valueSkrining): ?>
                        <option value="<?= $valueSkrining['skrining_id']; ?>"><?php echo $valueSkrining['tanggal_pemeriksaan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-info btn-block" type="submit">Cari</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php } else {
        $query2 = $connection->query("SELECT * FROM skrining WHERE skrining_id = '".$_GET['id-s']."'");
        $value2 = $query2->fetch_assoc(); ?>
        <form class="" action="../controller/TrimesterController.php?a=add_trimester" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">PEMERIKSAAN FISIK</h3>
                      <input name="identitas_id" value="<?php echo $_GET['id']; ?>" type="text" class="form-control form-control-sm" hidden>
                      <input name="jumlah_janin" value="<?php echo $value2['jumlah_janin']; ?>" type="text" class="form-control form-control-sm" hidden>
                      <input name="id-s" value="<?php echo $_GET['id-s']; ?>" type="text" class="form-control form-control-sm" hidden>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editIdentitas" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Berat Badan</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="berat_badan" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">kg</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tinggi Badan</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="tinggi_badan" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">LILA</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="lila" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tekanan Darah</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="tekanan_darah" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mmHg</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Nadi</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="nadi" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">/menit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Suhu</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="suhu" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">°C</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Pernapasan</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="pernapasan" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">/menit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">KONDISI JANIN</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editMenstruasi" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jumlah Janin</label>
                    <div class="col-sm-4">
                      <input value="<?php echo $value2['jumlah_janin']; ?>" name="jumlah_janin" type="text" class="form-control form-control-sm" readonly>
                    </div>
                  </div>
                  <?php if (isset($value2['jumlah_janin'])): ?>
                  <?php if ($value2['jumlah_janin'] > '1'): ?>
                  <div class="form-group row mb-3">
                    <!-- <label class="col-sm-4 col-form-label form-control-label"></label> -->
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#trimester_kondisi_janin_kembar">
                        <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                      </button>
                    </div>
                  </div>
                  <?php else: ?>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Presentasi</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="presentasi">
                        <option value="">Pilih</option>
                        <option value="Kepala">Kepala</option>
                        <option value="Bokong">Bokong</option>
                        <option value="Lintang Dorsosuperior">Lintang Dorsosuperior</option>
                        <option value="Lintang Dorsoinferior">Lintang Dorsoinferior</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Oblique">Oblique</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Deyut Jantung Janin</label>
                    <div class="col-sm-5">
                      <input type="text" name="denyut_jantung_janin" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Irama</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="irama">
                        <option value="">Pilih</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Ireguler">Ireguler</option>
                        <option value="Tidak diperiksa">Tidak diperiksa</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Gerak Janin</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="gerak_janin">
                        <option value="">Pilih</option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak ada">Tidak ada</option>
                        <option value="Belum dinilai">Belum dinilai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Kondisi Organ</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="kondisi_organ">
                        <option value="">Pilih</option>
                        <option value="Tidak tampak kelainan kongenital mayor">Tidak tampak kelainan kongenital mayor</option>
                        <option value="Tampak kelainan kongenital mayor">Tampak kelainan kongenital mayor</option>
                        <option value="Tampak Anomali Janin">Tampak Anomali Janin</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Catatan</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="catatan" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="jenis_kelamin">
                        <option value="">Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Belum Tampak">Belum Tampak</option>
                        <option value="Tidak ingin diberitahu">Tidak ingin diberitahu</option>
                        <option value="Belum Dinilai">Belum Dinilai</option>
                      </select>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <div id="tableShowKondisiJanin" class="form-group row mb-0 d-none">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No</th>
                              <th>Presentasi</th>
                              <th>Deyut Jantung Janin</th>
                              <th>Irama</th>
                              <th>Gerak Janin</th>
                              <th>Kondisi Organ</th>
                              <th>Catatan</th>
                              <th>Jenis Kelamin</th>
                            </tr>
                          </thead>
                          <tbody id="td_kondisi_janin">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">BIOMETRI USG</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <?php if (isset($value2['jumlah_janin'])): ?>
                  <?php if ($value2['jumlah_janin'] > '1'): ?>
                  <div class="form-group row mt-2 mb-3">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#trimester_biometri_usg">
                        <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                      </button>
                    </div>
                  </div>
                  <?php else: ?>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Nasal Bone</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="nasal_bone" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">BPD</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="bpd" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">HC</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="hc" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">AC</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="ac" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">FL</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="fl" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">HL</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="hl" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">TBJ</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="tbj" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">gram</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="usia_kehamilan" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">minggu</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan berdasarkan</label>
                    <div class="col-sm-5 d-flex align-items-center">
                      <select class="form-control form-control-sm" name="usia_kehamilan_berdasarkan">
                        <option value="">Pilih</option>
                        <option value="CRL 11-14 minggu">CRL 11-14 minggu</option>
                        <option value="CRL < 11 minggu /early scan">CRL < 11 minggu /early scan</option>
                        <option value="Biometri USG Trimester 2/3">Biometri USG Trimester 2/3</option>
                        <option value="Tanggal Transfer Embrio H-3">Tanggal Transfer Embrio H-3</option>
                        <option value="Tanggal Transfer Embrio H-5">Tanggal Transfer Embrio H-5</option>
                        <option value="HPHT">HPHT</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Persentil</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input name="persentil" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">persentil</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <div id="tableShowBiometriUsg" class="form-group row mb-0 d-none">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No</th>
                              <th>Nasal Bone</th>
                              <th>BPD</th>
                              <th>HC</th>
                              <th>AC</th>
                              <th>FL</th>
                              <th>HL</th>
                              <th>TBJ</th>
                              <th>Usia Kehamilan</th>
                              <th>Usia Kehamilan berdasarkan</th>
                              <th>Persentil</th>
                            </tr>
                          </thead>
                          <tbody id="td_biometri_usg">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">PLASENTA, TALI PUSAT, AIR KETUBAN & SERVIKS</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Lokasi Plasenta</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="lokasi_plasenta">
                        <option value="">Pilih</option>
                        <option value="Anterior">Anterior</option>
                        <option value="Fundus">Fundus</option>
                        <option value="Posterior">Posterior</option>
                        <option value="Plasenta Previa Totalis">Plasenta Previa Totalis</option>
                        <option value="Plasenta Letak Rendah">Plasenta Letak Rendah</option>
                        <option value="Plasenta Previta Marginalis">Plasenta Previta Marginalis</option>
                        <option value="Antero-lateral">Antero-lateral</option>
                        <option value="Postero-lateral">Postero-lateral</option>
                        <option value="Lateral kanan">Lateral kanan</option>
                        <option value="Lateral kiri">Lateral kiri</option>
                        <option value="Belum dinilai">Belum dinilai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Kedalaman Plasenta</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="kedalaman_plasenta">
                        <option value="">Pilih</option>
                        <option value="Normal">Normal</option>
                        <option value="Suspek invasi plasenta abnormal">Suspek invasi plasenta abnormal</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Cairan Amnion ICA</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="cairan_amnion_ica" name="cairan_amnion_ica" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Cairan Amnion SDP</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="cairan_amnion_sdp" name="cairan_amnion_sdp" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Cervical Length</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="cervical_length" name="cervical_length" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if (isset($value2['jumlah_janin'])): ?>
                  <?php if ($value2['jumlah_janin'] > '1'): ?>
                  <div class="form-group row mt-2 mb-3">
                    <!-- <label class="col-sm-4 col-form-label form-control-label"></label> -->
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#trimester_plasenta_tali">
                        <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                      </button>
                    </div>
                  </div>
                  <?php else: ?>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Lilitan Tali Pusat</label>
                    <div class="col-sm-5">
                      <select class="form-control form-control-sm" name="lilitan_tali_pusat">
                        <option value="">Pilih</option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="Belum dinilai">Belum dinilai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Intercoil Distance</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="intercoil_distance" name="intercoil_distance" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <div id="tableShowPlasentaTali" class="form-group row mb-0 d-none">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No</th>
                              <th>Lokasi Plasenta</th>
                              <th>Kedalaman Plasenta</th>
                            </tr>
                          </thead>
                          <tbody id="td_plasenta_tali">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">PEMERIKSAAN DOPPLER</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">PI A. Uterina kanan</label>
                    <div class="col-sm-8">
                      <input type="text" name="pia_uterina_kanan" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">PI A. Uterina kiri</label>
                    <div class="col-sm-8">
                      <input type="text" name="pia_uterina_kiri" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Notching A.Uterina</label>
                    <div class="col-sm-8">
                      <select class="form-control form-control-sm" name="notching_uterina">
                        <option value="">Pilih</option>
                        <option value="Tidak diperiksa">Tidak diperiksa</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="Ada, kanan">Ada, kanan</option>
                        <option value="Ada, kiri">Ada, kiri</option>
                        <option value="Ada, keduanya">Ada, keduanya</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Ductus Venosus A Wave</label>
                    <div class="col-sm-8">
                      <select class="form-control form-control-sm" name="ductus_venosus_wave">
                        <option value="">Pilih</option>
                        <option value="Tidak dinilai">Tidak dinilai</option>
                        <option value="Positif">Positif</option>
                        <option value="Absent">Absent</option>
                        <option value="Reversed">Reversed</option>
                      </select>
                    </div>
                  </div>
                  <?php if (isset($value2['jumlah_janin'])): ?>
                  <?php if ($value2['jumlah_janin'] > '1'): ?>
                  <div class="form-group row mt-2 mb-3">
                    <!-- <label class="col-sm-4 col-form-label form-control-label"></label> -->
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#trimester_doppler">
                        <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                      </button>
                    </div>
                  </div>
                  <?php else: ?>
                    <div class="form-group row mb-0">
                      <label class="col-sm-4 col-form-label form-control-label">PI A. Umbilikalis</label>
                      <div class="col-sm-8">
                        <input type="text" name="pia_umbilikalis" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-sm-4 col-form-label form-control-label">S/D A. Umbilikalis</label>
                      <div class="col-sm-8">
                        <input type="text" name="sda_mbilikalis" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-sm-4 col-form-label form-control-label">Umbilical Artery Flow</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="umbilical_artery_flow">
                          <option value="">Pilih</option>
                          <option value="Normal">Normal</option>
                          <option value="Absent End Diastolic">Absent End Diastolic</option>
                          <option value="Reversed End Diastolic">Reversed End Diastolic</option>
                          <option value="Tidak diperiksa">Tidak diperiksa</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-sm-4 col-form-label form-control-label">PI A. Serebri Media</label>
                      <div class="col-sm-8">
                        <input type="text" name="pia_serebri_media" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <label class="col-sm-4 col-form-label form-control-label">PSV A. Serebri Media</label>
                      <div class="col-sm-8">
                        <input type="text" name="psva_serebri_media" class="form-control form-control-sm">
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <div id="tableShowDoppler" class="form-group row mb-0 d-none">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No</th>
                              <th>PI A. Umbilikalis</th>
                              <th>S/D A. Umbilikalis</th>
                              <th>Umbilical Artery Flow</th>
                              <th>PI A. Serebri Media</th>
                              <th>PSV A. Serebri Media</th>
                            </tr>
                          </thead>
                          <tbody id="td_doppler">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">CATATAN PEMERIKSAAN</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Kesimpulan</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="kesimpulan" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Assessment (S-O-A)</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="assessment" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Plan</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="plan" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Anjuran</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="anjuran" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Pemeriksa</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <select name="pemeriksa_id" class="form-control form-control-sm select-basic-single">
                        <option value="">- Pilih -</option>
                        <?php $queryPemeriksa = $connection->query("SELECT * FROM pemeriksa"); ?>
                        <?php foreach ($queryPemeriksa as $key => $valuePemeriksa): ?>
                          <option value="<?php echo $valuePemeriksa['pemeriksa_id']; ?>"><?php echo $valuePemeriksa['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Catatan (khusus dokter)</label>
                    <div class="col-sm-8">
                      <textarea class="form-control form-control-sm" name="catatan" rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-prenatal-orange float-right">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      <?php } ?>

      <!-- Modal kembar 1 -->
      <div class="modal fade" id="trimester_kondisi_janin_kembar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <form id="formShowKondisiJanin" class="" action="index.html" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Presentasi</label>
                  <div class="col-sm-5">
                    <select id="presentasi" class="form-control form-control-sm" name="presentasi">
                      <option value="">Pilih</option>
                      <option value="Kepala">Kepala</option>
                      <option value="Bokong">Bokong</option>
                      <option value="Lintang Dorsosuperior">Lintang Dorsosuperior</option>
                      <option value="Lintang Dorsoinferior">Lintang Dorsoinferior</option>
                      <option value="Mobile">Mobile</option>
                      <option value="Oblique">Oblique</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Deyut Jantung Janin</label>
                  <div class="col-sm-5">
                    <input id="denyut_jantung_janin" type="text" name="denyut_jantung_janin" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Irama</label>
                  <div class="col-sm-5">
                    <select id="irama" class="form-control form-control-sm" name="irama">
                      <option value="">Pilih</option>
                      <option value="Reguler">Reguler</option>
                      <option value="Ireguler">Ireguler</option>
                      <option value="Tidak diperiksa">Tidak diperiksa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Gerak Janin</label>
                  <div class="col-sm-5">
                    <select id="gerak_janin" class="form-control form-control-sm" name="gerak_janin">
                      <option value="">Pilih</option>
                      <option value="Ada">Ada</option>
                      <option value="Tidak ada">Tidak ada</option>
                      <option value="Belum dinilai">Belum dinilai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Kondisi Organ</label>
                  <div class="col-sm-5">
                    <select id="kondisi_organ" class="form-control form-control-sm" name="kondisi_organ">
                      <option value="">Pilih</option>
                      <option value="Tidak tampak kelainan kongenital mayor">Tidak tampak kelainan kongenital mayor</option>
                      <option value="Tampak kelainan kongenital mayor">Tampak kelainan kongenital mayor</option>
                      <option value="Tampak Anomali Janin">Tampak Anomali Janin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <label class="col-sm-4 col-form-label form-control-label">Catatan</label>
                  <div class="col-sm-8">
                    <textarea id="catatan" class="form-control form-control-sm" name="catatan" rows="4"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Jenis Kelamin</label>
                  <div class="col-sm-5">
                    <select id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin">
                      <option value="">Pilih</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                      <option value="Belum Tampak">Belum Tampak</option>
                      <option value="Tidak ingin diberitahu">Tidak ingin diberitahu</option>
                      <option value="Belum Dinilai">Belum Dinilai</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-prenatal-orange add-kondisi-janin">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal kembar 2 -->
      <div class="modal fade" id="trimester_biometri_usg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <form id="formShowBiometriUsg" action="index.html" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Nasal Bone</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="nasal_bone" name="nasal_bone" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">BPD</label>
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
                  <label class="col-sm-4 col-form-label form-control-label">HC</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="hc" name="hc" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">AC</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="ac" name="ac" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">FL</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="fl" name="fl" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">HL</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="hl" name="hl" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">TBJ</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="tbj" name="tbj" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">gram</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="usia_kehamilan" name="usia_kehamilan" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">minggu</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan berdasarkan</label>
                  <div class="col-sm-5 d-flex align-items-center">
                    <select id="usia_kehamilan_berdasarkan" class="form-control form-control-sm" name="usia_kehamilan_berdasarkan">
                      <option value="">Pilih</option>
                      <option value="CRL 11-14 minggu">CRL 11-14 minggu</option>
                      <option value="CRL < 11 minggu /early scan">CRL < 11 minggu /early scan</option>
                      <option value="Biometri USG Trimester 2/3">Biometri USG Trimester 2/3</option>
                      <option value="Tanggal Transfer Embrio H-3">Tanggal Transfer Embrio H-3</option>
                      <option value="Tanggal Transfer Embrio H-5">Tanggal Transfer Embrio H-5</option>
                      <option value="HPHT">HPHT</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Persentil</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="persentil" name="persentil" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">persentil</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-prenatal-orange add-biometri-usg">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal kembar 3 -->
      <div class="modal fade" id="trimester_plasenta_tali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <form id="formShowPlasentaTali" action="index.html" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Lilitan Tali Pusat</label>
                  <div class="col-sm-5">
                    <select id="lilitan_tali_pusat" class="form-control form-control-sm" name="lilitan_tali_pusat">
                      <option value="">Pilih</option>
                      <option value="Ada">Ada</option>
                      <option value="Tidak Ada">Tidak Ada</option>
                      <option value="Belum dinilai">Belum dinilai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Intercoil Distance</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input id="intercoil_distance" name="intercoil_distance" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-prenatal-orange add-plasenta-tali">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal kembar 4 -->
      <div class="modal fade" id="trimester_doppler" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <form id="formShowDoppler" action="index.html" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">PI A. Umbilikalis</label>
                  <div class="col-sm-8">
                    <input id="pia_umbilikalis" type="text" name="pia_umbilikalis" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">S/D A. Umbilikalis</label>
                  <div class="col-sm-8">
                    <input id="sda_mbilikalis" type="text" name="sda_mbilikalis" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">Umbilical Artery Flow</label>
                  <div class="col-sm-8">
                    <select id="umbilical_artery_flow" class="form-control form-control-sm" name="umbilical_artery_flow">
                      <option value="">Pilih</option>
                      <option value="Normal">Normal</option>
                      <option value="Absent End Diastolic">Absent End Diastolic</option>
                      <option value="Reversed End Diastolic">Reversed End Diastolic</option>
                      <option value="Tidak diperiksa">Tidak diperiksa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">PI A. Serebri Media</label>
                  <div class="col-sm-8">
                    <input id="pia_serebri_media" type="text" name="pia_serebri_media" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-sm-4 col-form-label form-control-label">PSV A. Serebri Media</label>
                  <div class="col-sm-8">
                    <input id="psva_serebri_media" type="text" name="psva_serebri_media" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-prenatal-orange add-doppler">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
<script type="text/javascript">
  let lineNo = 1;
  $('#kja_lainnya').click(function() {
    if ($('#kja_lainnya').is(':checked')) {
      $("#add-kja").removeClass("d-none");
    }
  });
  $('#kii_lainnya').click(function() {
    if ($('#kii_lainnya').is(':checked')) {
      $("#add-kii").removeClass("d-none");
    }
  });
  $('#kia_lainnya').click(function() {
    if ($('#kia_lainnya').is(':checked')) {
      $("#add-kia").removeClass("d-none");
    }
  });
  $('#kip_lainnya').click(function() {
    if ($('#kip_lainnya').is(':checked')) {
      $("#add-kip").removeClass("d-none");
    }
  });
  $('#gd_lainnya').click(function() {
    if ($('#gd_lainnya').is(':checked')) {
      $("#add-gd").removeClass("d-none");
    }
  });
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
  $(".add-kondisi-janin").click(function () {
      $("#tableShowKondisiJanin").removeClass("d-none");
      // const lineNo                = 1;
      const presentasi            = $("#presentasi").val();
      const denyut_jantung_janin  = $("#denyut_jantung_janin").val();
      const irama                 = $("#irama").val();
      const gerak_janin           = $("#gerak_janin").val();
      const kondisi_organ         = $("#kondisi_organ").val();
      const catatan               = $("#catatan").val();
      const jenis_kelamin         = $("#jenis_kelamin").val();

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+presentasi+"' name='presentasi[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+denyut_jantung_janin+"' name='denyut_jantung_janin[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+irama+"' name='irama[]' type='text' p class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+gerak_janin+"' type='text' name='gerak_janin[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+kondisi_organ+"' type='text' name='kondisi_organ[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+catatan+"' type='text' name='catatan[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+jenis_kelamin+"' type='text' name='jenis_kelamin[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_kondisi_janin").append(td_add);
      $("#trimester_kondisi_janin_kembar").modal('hide');
      $('#formShowKondisiJanin')[0].reset();
      // $('#formorgan')[0].reset();
      // hitung_max();
      lineNo++;
  });
  $(".add-biometri-usg").click(function () {
      $("#tableShowBiometriUsg").removeClass("d-none");
      const nasal_bone                  = $("#nasal_bone").val();
      const bpd                         = $("#bpd").val();
      const hc                          = $("#hc").val();
      const ac                          = $("#ac").val();
      const fl                          = $("#fl").val();
      const hl                          = $("#hl").val();
      const tbj                         = $("#tbj").val();
      const usia_kehamilan              = $("#usia_kehamilan").val();
      const usia_kehamilan_berdasarkan  = $("#usia_kehamilan_berdasarkan").val();
      const persentil                   = $("#persentil").val();
      console.log(nasal_bone);

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+nasal_bone+"' name='nasal_bone[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+bpd+"' name='bpd[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+hc+"' name='hc[]' type='text' p class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+ac+"' type='text' name='ac[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+fl+"' type='text' name='fl[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+hl+"' type='text' name='hl[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+tbj+"' type='text' name='tbj[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+usia_kehamilan+"' type='text' name='usia_kehamilan[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+usia_kehamilan_berdasarkan+"' type='text' name='usia_kehamilan_berdasarkan[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+persentil+"' type='text' name='persentil[]' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_biometri_usg").append(td_add);
      $("#trimester_biometri_usg").modal('hide');
      $("#formShowBiometriUsg")[0].reset();
      lineNo++;
  });
  $(".add-plasenta-tali").click(function () {
      $("#tableShowPlasentaTali").removeClass("d-none");
      const lilitan_tali_pusat  = $("#lilitan_tali_pusat").val();
      const intercoil_distance  = $("#intercoil_distance").val();

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+lilitan_tali_pusat+"' name='lilitan_tali_pusat[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+intercoil_distance+"' name='intercoil_distance[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_plasenta_tali").append(td_add);
      $("#trimester_plasenta_tali").modal('hide');
      $("#formShowPlasentaTali")[0].reset();
      lineNo++;
  });
  $(".add-doppler").click(function () {
      $("#tableShowDoppler").removeClass("d-none");
      const pia_umbilikalis       = $("#pia_umbilikalis").val();
      const sda_mbilikalis        = $("#sda_mbilikalis").val();
      const umbilical_artery_flow = $("#umbilical_artery_flow").val();
      const pia_serebri_media     = $("#pia_serebri_media").val();
      const psva_serebri_media    = $("#psva_serebri_media").val();

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+pia_umbilikalis+"' name='pia_umbilikalis[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+sda_mbilikalis+"' name='sda_mbilikalis[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+umbilical_artery_flow+"' name='umbilical_artery_flow[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+pia_serebri_media+"' name='pia_serebri_media[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+psva_serebri_media+"' name='psva_serebri_media[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_doppler").append(td_add);
      $("#trimester_doppler").modal('hide');
      $("#formShowDoppler")[0].reset();
      lineNo++;
  });
  $("#tableShowKondisiJanin, #tableShowBiometriUsg, #tableShowPlasentaTali, #tableShowDoppler").on('click','.remCF',function(){
    $(this).parent().parent().remove();
  });
</script>
<?php } ?>
