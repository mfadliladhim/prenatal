<?php $title ='Identitas Pasien';
include '../config/connection.php';
$query1 = $connection->query("SELECT * FROM identitas WHERE identitas_id = '".$_GET['id']."'");
$value1 = $query1->fetch_assoc(); ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Identitas Pasien</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-light">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Skrining</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Biodata Identitas Pasien</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-prenatal-orange"><i class="fas fa-print mr-1"></i> Print</a>
          <button href="#" class="btn btn-sm btn-prenatal-orange"><i class="fas fa-pencil-alt mr-1"></i> Edit</button>
          <button data-url="" data-toggle="modal" data-target="#ConfirmDelete" class="btn btn-sm btn-prenatal-orange"><i class="fas fa-trash mr-1"></i> Hapus</button>
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
              <h4 class="mb-0">Data Identitas</h4>
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
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="mb-0">IDENTITAS PASIEN</h4>
                </div>
                <div class="col text-right">
                  <!-- <button data-toggle="modal" data-target="#editIdentitas" class="btn btn-sm btn-prenatal-orange">Edit</button> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- <div class="form-row">
                <div class="form-group col-md-12">
                  <label class="form-control-label col-sm-5">Nama Unit</label> -->
                  <!-- <input type="text" class="form-control form-control-sm"> -->
                  <!-- <div class="form-none-border">
                    KMNC Tangsel
                  </div> -->
                <!-- </div>
              </div> -->
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Nama Unit</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['unit_id']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">No RM</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['no_rm']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Usia</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="33">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['email']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Penghasilan/bulan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['penghasilan']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Pembiayaan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['pembiayaan']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Faskes Persalinan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['faskes_persalinan'].' ('.$value1['nama_faskes_persalinan'].')'; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Tempat Kontrol Kehamilan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['tempat_control_k'].' ('.$value1['nama_tempat_kontrol'].')'; ?>">
                </div>
              </div>
              <hr class="my-0">
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label"></label>
                <label class="col-sm-4 col-form-label form-control-label">IBU</label>
                <label class="col-sm-4 col-form-label form-control-label">SUAMI</label>
              </div>
              <hr class="my-0">
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['nama_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['nama_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">NIK</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['nik_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['nik_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">NO.JKN</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Faskes TK 1</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Faskes rujukan</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['jkn_tk_rujukan_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Gol. Darah</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['gol_darah_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['gol_darah_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Tempat Tanggal Lahir</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['tempat_lahir_ibu']; ?>, <?= date("d M Y",strtotime($value1['tanggal_lahir_ibu'])); ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['tempat_lahir_suami']; ?>, <?= date("d M Y",strtotime($value1['tanggal_lahir_suami'])); ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Pendidikan</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['pendidikan_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['pendidikan_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Pekerjaan</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['pekerjaan_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['pekerjaan_suami']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Alamat Rumah</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['alamat']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Telepon</label>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['telepon_ibu']; ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['telepon_suami']; ?>">
                </div>
              </div>
              <hr class="mt-0 mb-3">

            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="mb-0">RIWAYAT MENSTRUASI</h4>
                </div>
                <div class="col text-right">
                  <!-- <button data-toggle="modal" data-target="#editMenstruasi" class="btn btn-sm btn-primary">Edit</button> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">HPHT</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= date("d M Y",strtotime($value1['hpht'])); ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Siklus</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['siklus']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Regularitas HPHT</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['regularitas_hpht']; ?>">
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
                  <h4 class="mb-0">RIWAYAT PENYAKIT</h4>
                </div>
                <div class="col text-right">
                  <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Riwayat Penyakit Dahulu dan Pengobatan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['riwayat_penyakit_dahulu_pengobatan']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Riwayat Penyakit Keluarga</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['riwayat_penyakit_keluarga']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Riwayat Alergi</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['riwayat_alergi']; ?>">
                </div>
              </div>
              <div class="form-group row mb-0">
                <label class="col-sm-4 col-form-label form-control-label">Riwayat Operasi</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext border-bottom form-control-sm" value="<?= $value1['riwayat_operasi']; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
<?php } ?>
