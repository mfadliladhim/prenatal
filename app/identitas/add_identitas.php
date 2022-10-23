<?php $title ='Identitas Pasien'; ?>

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
              <li class="breadcrumb-item active" aria-current="page">Tambah Identitas Pasien</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <form class="" action="../controller/IdentitasController.php?a=add_identitas" method="post">
        <div class="card">
          <div class="card-header">
            <!-- <h5 class="mb-0">UNIT</h5> -->
            <h4 class="mb-0">UNIT</h4>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="form-control-label">Nama Unit</label>
                <!-- <input type="text" class="form-control form-control-sm"> -->
                <select name="unit_id" class="form-control form-control-sm" name="">
                  <option value="">- Pilih -</option>
                  <option value="1">KMNC Tangsel</option>
                  <option value="2">KMNC Jaktim</option>
                  <option value="3">KMNC Jaksel</option>
                  <option value="4">RSAB Harapan Kita</option>
                </select>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="form-control-label">No RM</label>
                <input name="no_rm" type="text" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">IDENTITAS IBU</h4>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Nama Ibu (KTP)</label>
                <input name="nama_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Tempat Lahir Ibu</label>
                <input name="tempat_lahir_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Tanggal Lahir Ibu</label>
                <input name="tanggal_lahir_ibu" type="date" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">NIK Ibu</label>
                <input name="nik_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">NO.JKN</label>
                <input name="jkn_tk_rujukan_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Golongan Darah Ibu</label>
                <!-- <input name="gol_darah_ibu" type="text" class="form-control form-control-sm"> -->
                <select class="form-control form-control-sm" name="gol_darah_ibu">
                  <option value="">- Pilih -</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Pendidikan Ibu</label>
                <input name="pendidikan_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Pekerjaan Ibu</label>
                <input name="pekerjaan_ibu" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Telepon Ibu</label>
                <input name="telepon_ibu" type="text" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">IDENTITAS SUAMI</h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Nama Suami (KTP)</label>
                <input name="nama_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Tempat Lahir Suami</label>
                <input name="tempat_lahir_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Tanggal Lahir Suami</label>
                <input name="tanggal_lahir_suami" type="date" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">NIK Suami</label>
                <input name="nik_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">NO.JKN</label>
                <input name="jkn_tk_rujukan_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Golongan Darah Suami</label>
                <!-- <input name="gol_darah_suami" type="text" class="form-control form-control-sm"> -->
                <select class="form-control form-control-sm" name="gol_darah_suami">
                  <option value="">- Pilih -</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Pendidikan Suami</label>
                <input name="pendidikan_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Pekerjaan Suami</label>
                <input name="pekerjaan_suami" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Telepon Suami</label>
                <input name="telepon_suami" type="text" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">IDENTITAS LAINNYA</h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-12 mb-3">
                <label class="form-control-label">Alamat</label>
                <!-- <input name="alamat" type="text" class="form-control form-control-sm"> -->
                <textarea class="form-control" name="alamat" rows="4"></textarea>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Email</label>
                <input name="email" type="text" class="form-control form-control-sm">
              </div>
              <!-- <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Penghasilan/Bulan</label>
                <input name="penghasilan" type="text" class="form-control form-control-sm">
              </div> -->
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Penghasilan/Bulan</label>
                <div class="input-group input-group-sm input-group-merge">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button">Rp.</button>
                  </div>
                  <input id="" name="penghasilan" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Pembiayaan</label>
                <!-- <input type="text" class="form-control form-control-sm"> -->
                <select name="pembiayaan" class="form-control form-control-sm" name="">
                  <option value=""> - Pilih -</option>
                  <option value="Umum">Umum</option>
                  <option value="Asuransi">Asuransi</option>
                  <option value="BPJS">BPJS</option>
                </select>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Tempat Kontrol Kehamilan</label>
                <!-- <input type="text" class="form-control form-control-sm"> -->
                <select id="tempat_control" name="tempat_control_k" class="form-control form-control-sm" name="">
                  <option value=""> - Pilih -</option>
                  <option value="Bidan">Bidan</option>
                  <option value="Dokter Umum">Dokter Umum</option>
                  <option value="SpOG">SpOG</option>
                </select>
                <small id="sm_tempat_control" class="form-text text-muted">

                </small>
              </div>
              <div class="form-group col-md-4 mb-3">
                <label class="form-control-label">Faskes Persalinan</label>
                <!-- <input type="text" class="form-control form-control-sm"> -->
                <select id="faskes_persalinan" name="faskes_persalinan" class="form-control form-control-sm" name="">
                  <option value=""> - Pilih -</option>
                  <option value="Bidan">Bidan</option>
                  <option value="Klinik">Klinik</option>
                  <option value="Puskesmas">Puskesmas</option>
                  <option value="Rumah Sakit">Rumah Sakit</option>
                </select>
                <small id="sm_faskes_persalinan" class="form-text text-muted">

                </small>
              </div>
              <!-- Modal faskes persalinan -->
              <div class="modal fade" id="modal_faskes_persalinan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom">
                      <h5 class="modal-title" id="label_nama_faskes_persalinan"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group mb-0">
                        <label class="form-control-label"></label>
                        <input name="nama_faskes_persalinan" id="nama_faskes_persalinan" type="text" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                      <button type="button" class="btn btn-primary btn_faskes_persalinan">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal faskes persalinan -->
              <div class="modal fade" id="modal_tempat_control" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header border-bottom">
                      <h5 class="modal-title" id="label_nama_tempat_control"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group mb-0">
                        <label class="form-control-label"></label>
                        <input name="nama_tempat_control" id="nama_tempat_control" type="text" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                      <button type="button" class="btn btn-primary btn_tempat_control">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">RIWAYAT MENSTRUASI</h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="form-control-label">HPHT</label>
                <input name="hpht" type="date" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label class="form-control-label">Siklus</label>
                <input name="siklus" type="text" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-4">
                <label class="form-control-label">Regularitas HPHT</label>
                <!-- <input type="text" class="form-control form-control-sm"> -->
                <select name="regularitas_hpht" class="form-control form-control-sm" name="">
                  <option value=""> - Pilih -</option>
                  <option value="Reguler">Reguler</option>
                  <option value="Ireguler">Ireguler</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">RIWAYAT PENYAKIT</h4>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6 mb-3">
                <label class="form-control-label">Riwayat Penyakit Dahulu dan Pengobatan</label>
                <div class="form-row mb-0">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_dahulu" id="radioDahuluAda" value="Ada">
                      <label class="form-check-label" for="radioDahuluAda">
                        Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_dahulu" id="radioDahuluTidakada" value="Tidak Ada">
                      <label class="form-check-label" for="radioDahuluTidakada">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div id="addDahulu" class="col-md-12 mt-2 d-none">
                    <!-- <input  type="text" name="riwayat_penyakit_dahulu_pengobatan"> -->
                    <textarea class="form-control" rows="3" name="riwayat_penyakit_dahulu_pengobatan"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="form-control-label">Riwayat Penyakit Keluarga</label>
                <div class="form-row mb-0">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_keluarga" id="radioKeluargaAda" value="Ada">
                      <label class="form-check-label" for="radioKeluargaAda">
                        Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_keluarga" id="radioKeluargaTidakada" value="Tidak Ada">
                      <label class="form-check-label" for="radioKeluargaTidakada">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div id="addKeluarga" class="col-md-12 mt-2 d-none">
                    <!-- <input class="form-control" type="text" name=""> -->
                    <textarea class="form-control" rows="3" name="riwayat_penyakit_keluarga"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6 mb-0">
                <label class="form-control-label">Riwayat Alergi</label>
                <div class="form-row mb-0">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_alergi" id="radioAlergiAda" value="Ada">
                      <label class="form-check-label" for="radioAlergiAda">
                        Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_alergi" id="radioAlergiTidakada" value="Tidak Ada">
                      <label class="form-check-label" for="radioAlergiTidakada">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div id="addAlergi" class="col-md-12 mt-2 d-none">
                    <!-- <input class="form-control" type="text" name="riwayat_alergi"> -->
                    <textarea class="form-control" rows="3" name="riwayat_alergi"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6 mb-0">
                <label class="form-control-label">Riwayat Operasi</label>
                <div class="form-row mb-0">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_operasi" id="radioOperasiAda" value="Ada">
                      <label class="form-check-label" for="radioOperasiAda">
                        Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio_operasi" id="radioOperasiTidakada" value="Tidak Ada">
                      <label class="form-check-label" for="radioOperasiTidakada">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div id="addOperasi" class="col-md-12 mt-2 d-none">
                    <!-- <input class="form-control" type="text" name="riwayat_operasi"> -->
                    <textarea class="form-control" rows="3" name="riwayat_operasi"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
  <script type="text/javascript">
  $("#faskes_persalinan").on("change",
    () => {
      const faskes_persalinan = $("#faskes_persalinan").val();
      $("#label_nama_faskes_persalinan").text('Nama '+faskes_persalinan);
      const pilih_fas = $("#faskes_persalinan").val();
      $('#modal_faskes_persalinan').modal('show');
      $(".btn_faskes_persalinan").click(function() {
        const nama_faskes_persalinan = $("#nama_faskes_persalinan").val();
        $("#sm_faskes_persalinan").text('Nama '+pilih_fas+' : '+nama_faskes_persalinan);
        $('#modal_faskes_persalinan').modal('hide');
      });
  });
  $("#tempat_control").on("change",
    () => {
      const tempat_control = $("#tempat_control").val();
      $("#label_nama_tempat_control").text('Nama '+tempat_control);
      const pilih_tem = $("#tempat_control").val();
      $('#modal_tempat_control').modal('show');
      $(".btn_tempat_control").click(function() {
        const nama_tempat_control = $("#nama_tempat_control").val();
        $("#sm_tempat_control").text('Nama '+pilih_tem+' : '+nama_tempat_control);
        $('#modal_tempat_control').modal('hide');
      });
  });
  $('#radioAlergiAda').click(function() {
     if($('#radioAlergiAda').is(':checked')) {
       $("#addAlergi").removeClass("d-none");
     }
  });
  $('#radioAlergiTidakada').click(function() {
    if($('#radioAlergiTidakada').is(':checked')) {
      $("#addAlergi").addClass("d-none");
    }
  });
  $('#radioOperasiAda').click(function() {
     if($('#radioOperasiAda').is(':checked')) {
       $("#addOperasi").removeClass("d-none");
     }
  });
  $('#radioOperasiTidakada').click(function() {
    if($('#radioOperasiTidakada').is(':checked')) {
      $("#addOperasi").addClass("d-none");
    }
  });
  $('#radioDahuluAda').click(function() {
     if($('#radioDahuluAda').is(':checked')) {
       $("#addDahulu").removeClass("d-none");
     }
  });
  $('#radioDahuluTidakada').click(function() {
    if($('#radioDahuluTidakada').is(':checked')) {
      $("#addDahulu").addClass("d-none");
    }
  });
  $('#radioKeluargaAda').click(function() {
     if($('#radioKeluargaAda').is(':checked')) {
       $("#addKeluarga").removeClass("d-none");
     }
  });
  $('#radioKeluargaTidakada').click(function() {
    if($('#radioKeluargaTidakada').is(':checked')) {
      $("#addKeluarga").addClass("d-none");
    }
  });
  </script>
<?php } ?>
