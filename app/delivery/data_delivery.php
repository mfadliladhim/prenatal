<?php $query = $connection->query("SELECT * FROM delivery_outcome WHERE identitas_id = '".$_GET['id']."'"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Data Delivery Outcome</h3>
          </div>
          <div class="col text-right">
            <button data-toggle="modal" data-target="#add_delivery_outcome" class="btn btn-sm btn-primary">Tambah</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal Lahir Bayi</th>
                <th>Cara Persalinan</th>
                <th>Tempat Lahir Bayi</th>
                <th>Berat Bayi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($query as $key => $value): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value['tanggal_lahir_b']; ?></td>
                  <td><?= $value['cara_persalinan']; ?></td>
                  <td><?= $value['tempat_lahir_b']; ?></td>
                  <td><?= $value['berat_lahir_b']; ?></td>
                  <td>
                    <button data-url="/kosambi-admin/app/skrining/print_skrining.php?id=<?php echo $value['id']; ?>" id="modal-print" class="btn btn-transparent btn-sm print m-0"><i class="fas fa-print text-primary fa-lg"></i></button>
                    <a class="btn btn-transparent btn-sm mr-0" href="?p=edit_skrining&id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt text-success fa-lg"></i></a>
                    <a class="btn btn-transparent btn-sm mr-0" href="#" data-toggle="modal" data-target="#modal-delete" data-url="../controller/SkriningController.php?a=delete_skrining&id=<?php echo $value['id']; ?>" data-message="Hapus data skrining <?php echo $value['nama']; ?>"><i class="fas fa-trash-alt text-danger fa-lg"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<style media="screen">
@media (min-width: 576px) {
  .modal-dialog {
      max-width: 900px;
      margin: 1.75rem auto;
  }
}
</style>
<!-- Modal PENYAKIT -->
<div class="modal fade" id="add_delivery_outcome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-bottom align-items-center">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DELIVERY OUTCOME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="../controller/DeliveryController.php?a=add_delivery_outcome" method="post">
        <div class="modal-body p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow-none mb-0">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Data Persalinan</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editIdentitas" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- <div class="form-row">
                    <div class="form-group col-md-12">
                      <label class="form-control-label col-sm-5">Nama Unit</label> -->
                      <!-- <input type="text" name="" class="form-control form-control-sm"> -->
                      <!-- <div class="form-none-border">
                        KMNC Tangsel
                      </div> -->
                    <!-- </div>
                  </div> -->
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tanggal Lahir</label>
                    <div class="col-sm-5 d-flex align-items-center">
                      <input value="<?= $_GET['id']; ?>" type="text" name="identitas_id" class="form-control form-control-sm" hidden>
                      <input type="date" name="tanggal_lahir_b" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tempat Lahir</label>
                    <div class="col-sm-4 d-flex align-items-center">
                      <input type="text" name="tempat_lahir_b" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Berat Lahir Bayi</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="berat_lahir_b" name="berat_lahir_b" class="form-control" type="text" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">gram</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Panjang Lahir Bayi</label>
                    <!-- <div class="col-sm-8 d-flex align-items-center">
                      <input type="text" name="panjang_lahir_b" class="form-control form-control-sm">
                    </div> -->
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="panjang_lahir_b" name="panjang_lahir_b" class="form-control" type="text" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Lingkar Kepala Bayi</label>
                    <!-- <div class="col-sm-8">
                      <input type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
                    </div> -->
                    <div class="col-md-3 d-flex align-items-center">
                      <div class="input-group input-group-sm input-group-merge">
                        <input id="lingkar_kepala_bayi" name="lingkar_kepala_bayi" class="form-control" type="text" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">cm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan Saat Lahir</label>
                    <div class="col-sm-8">
                      <input type="text" name="usia_kehamilan_saat_l" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Cara Persalinan</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="cara_persalinan" class="form-control form-control-sm"> -->
                      <select class="form-control form-control-sm" name="cara_persalinan">
                        <option value="">- Pilih -</option>
                        <option value="Spontan">Spontan</option>
                        <option value="Vakum">Vakum</option>
                        <option value="Forsep">Forsep</option>
                        <option value="Spontan + Induksi">Spontan + Induksi</option>
                        <option value="Spontan + penyulit ">Spontan + penyulit </option>
                        <option value="SC">Seksio Sesaria</option>
                        <option value="Kuretase">Kuretase</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                      <!-- <input type="text" name="jenis_kelamin" class="form-control form-control-sm"> -->
                      <select class="form-control form-control-sm" name="jenis_kelamin">
                        <option value="">- Pilih -</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Belum Tampak">Belum Tampak</option>
                        <option value="Belum Dinilai">Belum Dinilai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Indikasi Induksi Persalinan</label>
                    <div class="col-sm-8">
                      <input type="text" name="indikasi_induksi_persalinan" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Indikasi Vakum/Forsep/SC</label>
                    <div class="col-sm-8">
                      <input type="text" name="indikasi_vakum_forsep_sc" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Butuh Transfusi Darah</label>
                    <div class="col-sm-4">
                      <!-- <input type="text" name="butuh_transfusi_darah" class="form-control form-control-sm"> -->
                      <select name="butuh_transfusi_darah" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jumlah Perdarahan</label>
                    <div class="col-sm-8">
                      <input type="text" name="jumlah_pendarahan" class="form-control form-control-sm">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card shadow-none mb-0">
                <div class="card-header border-top">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Neonatal Outcome</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editMenstruasi" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">AS 1</label>
                    <div class="col-sm-8">
                      <input type="text" name="as_1" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">AS 5</label>
                    <div class="col-sm-8">
                      <input type="text" name="as_5" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Butuh CPAP/Mixsafe</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="butuh_cpap_mixsafe" class="form-control form-control-sm" > -->
                      <select name="butuh_cpap_mixsafe" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Asfiksia</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="asfiksia" class="form-control form-control-sm"> -->
                      <select name="asfiksia" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">RDS</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="rds" class="form-control form-control-sm" > -->
                      <select name="rds" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Sepsis</label>
                    <div class="col-sm-8">
                      <!-- <input type="text"  name="sepsis" class="form-control form-control-sm" > -->
                      <select name="sepsis" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Kelainan Bawaan</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="kelainan_bawaan" class="form-control form-control-sm" > -->
                      <select name="kelainan_bawaan" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ada">Ada</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="Tidak dinilai">Tidak dinilai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Jenis Kelainan Bawaan</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="jenis_kelainan_bawaan" class="form-control form-control-sm" > -->
                      <textarea class="form-control form-control-sm" name="jenis_kelainan_bawaan" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Kondisi Bayi Saat Lahir</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="kondisi_bayi_lahir" class="form-control form-control-sm" > -->
                      <select class="form-control form-control-sm" name="kondisi_bayi_lahir">
                        <option value="">- Pilih -</option>
                        <option value="Lahir Hidup">Lahir Hidup</option>
                        <option value="Abortus (<20 minggu)">Abortus (&lt;20 minggu)</option>
                        <option value="Stillbirth (>20 minggu)">Stillbirth (&gt;20 minggu)</option>
                        <option value="Intrapartum stillbirth (>20 minggu)">Intrapartum stillbirth (&gt;20 minggu)</option>
                        <option value="Neonatal Death (within 28 first days)">Neonatal Death (within 28 first days)</option>
                        <option value="Mola Hidatidosa">Mola Hidatidosa</option>
                        <option value="Kehamilan Ektopik">Kehamilan Ektopik</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Komplikasi Janin Antepartum</label>
                    <div class="col-sm-8">
                      <div class="form-row mb-3">
                        <?php $query_kja = $connection->query("SELECT * FROM option_komplikasi_janin_antepartum"); ?>
                        <?php foreach ($query_kja as $key => $value_kja): ?>
                          <div class="col-sm-6">
                            <div class="form-check">
                              <input name="komplikasi_janin_antepartum[]" class="form-check-input" type="checkbox" value="<?php echo $value_kja['nama_kja']; ?>" id="kja_<?php echo $value_kja['kja_id']; ?>">
                              <label class="form-check-label text-sm" for="kja_<?php echo $value_kja['kja_id']; ?>">
                                <?php echo $value_kja['nama_kja']; ?>
                              </label>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Lama Rawat NICU (hari)</label>
                    <div class="col-sm-8">
                      <input type="text" name="lama_rawat_nicu" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">NICU admission</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="nicu_admission" class="form-control form-control-sm" > -->
                      <select name="nicu_admission" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card shadow-none mb-0">
                <div class="card-header border-top">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Maternal Outcome</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Antepartum</label>
                    <div class="col-sm-8">
                      <div class="form-row mb-3">
                        <?php $query_kia = $connection->query("SELECT * FROM option_komplikasi_ibu_antepartum"); ?>
                        <?php foreach ($query_kia as $key => $value_kia): ?>
                          <div class="col-sm-6">
                            <div class="form-check">
                              <input name="komplikasi_ibu_antepartum[]" class="form-check-input" type="checkbox" value="<?php echo $value_kia['nama_kia']; ?>" id="kia_<?php echo $value_kia['kia_id']; ?>">
                              <label class="form-check-label text-sm" for="kia_<?php echo $value_kia['kia_id']; ?>">
                                <?php echo $value_kia['nama_kia']; ?>
                              </label>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <hr class="mt-0 mb-3">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Intrapartum</label>
                    <div class="col-sm-8">
                      <div class="form-row mb-3">
                        <?php $query_kii = $connection->query("SELECT * FROM option_komplikasi_ibu_intrapartum"); ?>
                        <?php foreach ($query_kii as $key => $value_kii): ?>
                          <div class="col-sm-6">
                            <div class="form-check">
                              <input name="komplikasi_ibu_intrapartum[]" class="form-check-input" type="checkbox" value="<?php echo $value_kii['nama_kii']; ?>" id="kii_<?php echo $value_kii['kii_id']; ?>">
                              <label class="form-check-label text-sm" for="kii_<?php echo $value_kii['kii_id']; ?>">
                                <?php echo $value_kii['nama_kii']; ?>
                              </label>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <!-- <input type="text" name="komplikasi_ibu_intrapartum" class="form-control form-control-sm" > -->
                    </div>
                  </div>
                  <hr class="mt-0 mb-3">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Postpartum</label>
                    <div class="col-sm-8">
                      <div class="form-row mb-3">
                        <?php $query_kip = $connection->query("SELECT * FROM option_komplikasi_ibu_postpartum"); ?>
                        <?php foreach ($query_kip as $key => $value_kip): ?>
                          <div class="col-sm-6">
                            <div class="form-check">
                              <input name="komplikasi_ibu_postpartum[]" class="form-check-input" type="checkbox" value="<?php echo $value_kip['nama_kip']; ?>" id="kip_<?php echo $value_kip['kip_id']; ?>">
                              <label class="form-check-label text-sm" for="kip_<?php echo $value_kip['kip_id']; ?>">
                                <?php echo $value_kip['nama_kip']; ?>
                              </label>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <!-- <input type="text" name="komplikasi_ibu_postpartum" class="form-control form-control-sm" > -->
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Catatan Persalinan</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="catatan_persalinan" class="form-control form-control-sm" > -->
                      <textarea class="form-control form-control-sm" name="catatan_persalinan" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Data Klinis/Lab Pendukung</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="data_klinis" class="form-control form-control-sm" > -->
                      <textarea class="form-control form-control-sm" name="data_klinis" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card shadow-none mb-0">
                <div class="card-header border-top">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Covid-19 Record</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jenis Test COVID</label>
                    <div class="col-sm-5">
                      <!-- <input type="text" name="jenis_test_covid" class="form-control form-control-sm" > -->
                      <select name="jenis_test_covid" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Swab Antigen">Swab Antigen</option>
                        <option value="Swab PCR">Swab PCR</option>
                        <option value="Rapid Test Antibodi">Rapid Test Antibodi</option>
                        <option value="Tidak Diperiksa">Tidak Diperiksa</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan Saat Test</label>
                    <div class="col-sm-8">
                      <input type="text" name="usia_kehamilan_saat_t" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tanggal Test</label>
                    <div class="col-sm-8">
                      <input type="date" name="tanggal_t" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Hasil Test</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="hasil_t" class="form-control form-control-sm" > -->
                      <select name="hasil_t" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Positif</option>
                        <option value="Tidak">Negatif</option>
                        <option value="Tidak tahu">Tidak diperiksa</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Komorbid</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="komorbid" class="form-control form-control-sm" > -->
                      <select name="komorbid" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Sebutkan (Komorbid)</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="sebutkan_komorbid" class="form-control form-control-sm" > -->
                      <textarea class="form-control form-control-sm" name="sebutkan_komorbid" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Gejala Yang Diirasakan</label>
                    <div class="col-sm-8">
                      <div class="form-row mb-3">
                        <?php $query_gd = $connection->query("SELECT * FROM option_gejala_dirasakan"); ?>
                        <?php foreach ($query_gd as $key => $value_gd): ?>
                          <div class="col-sm-6">
                            <div class="form-check">
                              <input name="gejala_dirasakan[]" class="form-check-input" type="checkbox" value="<?php echo $value_gd['nama_gd']; ?>" id="gd_<?php echo $value_gd['gd_id']; ?>">
                              <label class="form-check-label text-sm" for="gd_<?php echo $value_gd['gd_id']; ?>">
                                <?php echo $value_gd['nama_gd']; ?>
                              </label>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <!-- <input type="text" name="gejala_dirasakan" class="form-control form-control-sm" > -->
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Alat Bantu Napas</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="alat_bantu_nafas" class="form-control form-control-sm" > -->
                      <select name="alat_bantu_nafas" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="Oksigen">Oksigen</option>
                        <option value="Ventilator">Ventilator</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Masuk ICU</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="masuk_icu" class="form-control form-control-sm" > -->
                      <select name="masuk_icu" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Tidak tahu">Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label form-control-label">Obat-Obatan yang didapat</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="obat_didapat" class="form-control form-control-sm" > -->
                      <textarea class="form-control form-control-sm" name="obat_didapat" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Vaksinasi COVID</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="vaksinasi_c" class="form-control form-control-sm" > -->
                      <select name="vaksinasi_c" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Tidak">Tidak Ada</option>
                        <option value="Sinovac / Coronavac">Sinovac / Coronavac</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer">Pfizer</option>
                        <option value="Astra Zeneca">Astra Zeneca</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Jumlah Dosis</label>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="jumlah_dosis" class="form-control form-control-sm" > -->
                      <select name="jumlah_dosis" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="Tidak">Tidak</option>
                        <option value="1 dosis">1 dosis</option>
                        <option value="2 dosis">2 dosis</option>
                        <option value="3 dosis">3 dosis</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Tanggal Vaksin</label>
                    <div class="col-sm-8">
                      <input type="date" name="tanggal_v" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-sm-4 col-form-label form-control-label">Catatan Vaksin / Test</label>
                    <div class="col-sm-8">
                      <input type="text" name="catatan_v" class="form-control form-control-sm" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php function codeScripts(){ ?>
<?php } ?>
