<!-- <form id="formjanin" class="" action="#" method="post">
  <div class="modal-body"> -->
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
        <select id="nb_in" name="nb" class="form-control form-control-sm">
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
            <button class="btn btn-outline-primary" type="button">mm</button>
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
  <!-- </div>
  <div class="modal-footer">
    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary add-td">Simpan</button>
  </div>
</form> -->

<!-- Modal -->
<div class="modal fade" id="addP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-items-center">
        <h5 class="modal-title" id="exampleModalLabel">Syarat kelainan</h5>
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
            <div class="card mb-0 shadow-none border-top border-bottom">
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
        <h5 class="modal-title" id="exampleModalLabel">Tabel Penilaian</h5>
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
