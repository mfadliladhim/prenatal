
    <div class="col-md-10">

        <div class="accordion" id="accordionExample">
          <form class="" action="../controller/SkriningController.php?a=edit_skrining" method="post">
          <div style="overflow: visible !important;" class="card">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h5 class="mb-0">IDENTITAS</h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Nama</label>
                    <div class="col-md-5 d-flex align-items-center">
                      <input value="<?php echo $value1['skrining_id']; ?>" name="skrining_id" type="text" required hidden>
                      <input value="<?php echo $value['nama_ibu']; ?>" name="nama" class="form-control form-control-sm" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">No Rm</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value['no_rm']; ?>" name="no_rm" class="form-control form-control-sm" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Tanggal Lahir</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo date('m/d/Y', strtotime($value['tanggal_lahir_ibu'])); ?>" id="tanggal_lahir" name="tanggal_lahir" class="form-control form-control-sm datepicker" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Usia</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <!-- <input id="usia" class="form-control form-control-sm" type="number" readonly> -->
                      <!-- <button class="btn btn-primary btn-sm" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button> -->
                      <div class="input-group input-group-sm input-group-merge">
                        <input value="<?php echo $value1['usia']; ?>" name="usia" id="usia" class="form-control" type="text" readonly required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">tahun</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">No HP</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value['telepon_ibu']; ?>" name="no_hp" class="form-control form-control-sm" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Tanggal Pemeriksaan</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="input-group input-group-sm date" id="datetimepicker1">
                        <input value="<?php echo date('m/d/Y', strtotime($value['tanggal_lahir_ibu'])); ?>" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" type="text" class="form-control" required>
                        <!-- <span class="input-group-addon input-group-append">
                          <button class="btn btn-outline-primary" type="button" id="button-addon2"> <span class="fa fa-calendar"></span></button>
                        </span> -->
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Usia Kehamilan berdasarkan</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <!-- <input name="" class="form-control form-control-sm" type="text" value=""> -->
                      <select id="usia_kehamilan_berdasarkan" name="usia_kehamilan_berdasarkan" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'CRL') ? 'selected' : '' ; ?>>CRL</option>
                        <option value="2" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'HPHT') ? 'selected' : '' ; ?>>HPHT</option>
                        <option value="3" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 3') ? 'selected' : '' ; ?>>Tanggal Transfer Embrio Hari Ke 3</option>
                        <option value="4" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 5') ? 'selected' : '' ; ?>>Tanggal Transfer Embrio Hari Ke 5</option>
                        <!-- <option value="HPHT">HPHT</option> -->
                      </select>
                    </div>
                  </div>
                  <!-- crl -->
                  <div style="<?php echo ($value1['usia_kehamilan_berdasarkan'] == 'CRL') ? '' : 'display:none;' ; ?>" id="crlForm2" class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">CRL</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <small>Isian di Usg Skrining</small>
                      <!-- <div class="input-group input-group-sm input-group-merge">
                        <input id="crl" class="form-control" type="text">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">mm</button>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <!-- hpht -->
                  <div style="<?php echo ($value1['usia_kehamilan_berdasarkan'] == 'HPHT') ? '' : 'display:none;' ; ?>" id="hphtForm" class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">HPHT</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value1['usia_kehamilan_in']; ?>" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'HPHT') ? 'name="usia_kehamilan_in"' : '' ; ?> id="hpht" class="form-control form-control-sm datepicker" type="text">
                    </div>
                  </div>
                  <!-- hpht -->
                  <div style="<?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 3') ? '' : 'display:none;' ; ?>" id="hariKe3Form" class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Tanggal Transfer Embrio Hari Ke 3</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value1['usia_kehamilan_in']; ?>" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 3') ? 'name="usia_kehamilan_in"' : '' ; ?> id="hari_ke_3" class="form-control form-control-sm datepicker" type="text">
                    </div>
                  </div>
                  <!-- hpht -->
                  <div style="<?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 5') ? '' : 'display:none;' ; ?>" id="hariKe5Form" class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Tanggal Transfer Embrio Hari Ke 5</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value1['usia_kehamilan_in']; ?>" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 5') ? 'name="usia_kehamilan_in"' : '' ; ?> id="hari_ke_5" class="form-control form-control-sm datepicker" type="text">
                    </div>
                  </div>

                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Usia kehamilan</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value1['usia_kehamilan_out']; ?>" id="showDate" name="usia_kehamilan_out" class="form-control form-control-sm" type="text">
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h5 class="mb-0">RIWAYAT KEHAMILAN</h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Metode Konsepsi</label>
                    <div class="col-md-4 d-flex align-items-center">
                      <select name="metode_konsepsi" id="metode_konsepsi" class="form-control form-control-sm" required>
                        <option value="">-Pilih-</option>
                        <option value="0" <?php echo ($value1['metode_konsepsi'] == '0') ? 'selected' : '' ; ?>>Spontan</option>
                        <option value="1" <?php echo ($value1['metode_konsepsi'] == '1') ? 'selected' : '' ; ?>>IVF/Inseminasi</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">G-P-A</label>
                    <?php $ex = explode('-',$value1['g_p_a']); ?>
                    <div class="col-md-2 d-flex align-items-center">
                      <!-- <input name="g_p_a" class="form-control form-control-sm" type="text"> -->
                      <input value="<?php echo $ex[0]; ?>" name="gravida" class="form-control form-control-sm" type="text" placeholder="gravida" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                      <input value="<?php echo $ex[1]; ?>" id="paritas" name="paritas" class="form-control form-control-sm" type="text" placeholder="paritas" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                      <input value="<?php echo $ex[2]; ?>" name="abortus" class="form-control form-control-sm" type="text" placeholder="abortus" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Interval Kehamilan</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <select name="in_riwayat_kehamilan" id="in_riwayat_kehamilan" class="form-control form-control-sm" required>
                        <option value="">-Pilih-</option>
                        <option value="1" <?php echo ($value1['interval_kehamilan'] == '1') ? 'selected' : '' ; ?>>< 10 tahun/anak pertama</option>
                        <option value="0" <?php echo ($value1['interval_kehamilan'] == '0') ? 'selected' : '' ; ?>>>=10 tahun</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Anak Hidup</label>
                    <div class="col-md-6 d-flex align-items-center">
                      <input value="<?php echo $value1['anak_hidup']; ?>" name="anak_hidup" class="form-control form-control-sm" type="text" required>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Riwayat Kehamilan Sebelumnya</label>
                    <div class="col-md-8 d-flex align-items-center py-2">
                      <button type="button" class="add-row btn btn-primary btn-sm">
                          Tambah Isian
                      </button>
                    </div>
                    <div class="col-md-12 d-flex align-items-center py-2">
                      <table border="1" class="riwayat">
                          <thead>
                              <tr>
                                <th>#</th>
                                <th>Tanggal Lahir</th>
                                <th>Berat Badan</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia Kehamilan saat lahir</th>
                                <th>Cara Persalinan</th>
                                <th>Kondisi Saat Lahir</th>
                              </tr>
                          </thead>
                          <!-- <tbody id="riwayat">
                          </tbody> -->
                          <tbody id="riwayat">
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Merokok saat hamil</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select name="merokok" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['merokok'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['merokok'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['merokok'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Riwayat Ibu/kakak PE</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="riwayat_ibu_kakak_pe" name="riwayat_ibu_kakak_pe" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['riwayat_ibu_kakak_pe'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['riwayat_ibu_kakak_pe'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['riwayat_ibu_kakak_pe'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Penyakit Lupus</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select name="penyakit_lupus" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['penyakit_lupus'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['penyakit_lupus'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['penyakit_lupus'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Penyakit APS</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select name="penyakit_aps" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['penyakit_aps'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['penyakit_aps'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['penyakit_aps'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Hipertensi Kronik</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="hipertensi_kronik" name="hipertensi_kronik" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['hipertensi_kronik'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['hipertensi_kronik'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['hipertensi_kronik'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Diabetes Mellitus</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="diabetes_militus" name="diabetes_militus" class="form-control form-control-sm" required>
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['diabetes_militus'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['diabetes_militus'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['diabetes_militus'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div id="riwayat_hamil_peForm"  class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Riwayat Hamil dengan PE</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select id="riwayat_hamil_pe" name="riwayat_hamil_pe" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['riwayat_hamil_pe'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['riwayat_hamil_pe'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['riwayat_hamil_pe'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div id="riwayat_pjtForm"  class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Riwayat PJT</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select name="riwayat_pjt" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['riwayat_pjt'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['riwayat_pjt'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['riwayat_pjt'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                  <div id="riwayat_preterm_birthForm"  class="form-group row mb-0">
                    <label class="col-md-4 col-form-label form-control-label">Riwayat Preterm Birth (<37 minggu)</label>
                    <div class="col-md-3 d-flex align-items-center">
                      <select name="riwayat_preterm_birth" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <option value="1" <?php echo ($value1['riwayat_preterm_birth'] == '1') ? 'selected' : '' ; ?>>Ya</option>
                        <option value="0" <?php echo ($value1['riwayat_preterm_birth'] == '0') ? 'selected' : '' ; ?>>Tidak</option>
                        <option value="2" <?php echo ($value1['riwayat_preterm_birth'] == '2') ? 'selected' : '' ; ?>>Tidak tahu</option>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <h5 class="mb-0">PEMERIKSAAN FISIK</h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Berat Badan</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['berat_badan']; ?>" id="berat_badan" name="berat_badan" class="form-control" type="text" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">kg</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Tinggi Badan</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['tinggi_badan']; ?>" id="tinggi_badan" name="tinggi_badan" class="form-control" type="text" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">cm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Mean arterial pressure</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm">
                      <input value="<?php echo $value1['map']; ?>" name="map" id="final_map" type="text" class="form-control">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">mmHg</button>
                        <button data-toggle="dropdown" class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
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
                                <input value="<?php echo $value1['systolic_left_1']; ?>" name="systolic_left_1" id="systolicLeft1" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                              <td>
                                <input value="<?php echo $value1['systolic_right_1']; ?>" name="systolic_right_1" id="systolicRight1" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                            </tr>
                            <tr>
                              <td>Diastolic</td>
                              <td>
                                <input value="<?php echo $value1['diastolic_left_1']; ?>" name="diastolic_left_1" id="diastolicLeft1" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                              <td>
                                <input value="<?php echo $value1['diastolic_right_1']; ?>" name="diastolic_right_1" id="diastolicRight1" class="form-map form-control form-control-sm" type="number" required>
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
                                <input value="<?php echo $value1['systolic_left_2']; ?>" name="systolic_left_2" id="systolicLeft2" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                              <td>
                                <input value="<?php echo $value1['systolic_right_2']; ?>" name="systolic_right_2" id="systolicRight2" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                            </tr>
                            <tr>
                              <td>Diastolic</td>
                              <td>
                                <input value="<?php echo $value1['diastolic_left_2']; ?>" name="diastolic_left_2" id="diastolicLeft2" class="form-map form-control form-control-sm" type="number" required>
                              </td>
                              <td>
                                <input value="<?php echo $value1['diastolic_right_2']; ?>" name="diastolic_right_2" id="diastolicRight2" class="form-map form-control form-control-sm" type="number" required>
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
              <div class="card-header border-top">
                <h5 class="mb-0">PEMERIKSAAN BIOKIMIAWI</h5>
              </div>
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">PLGF</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['plgf']; ?>" name="pglf" id="mom_plgf" class="form-control" type="text">
                    </div>
                  </div>
                  <label id="final_mom_plgf" class="col-md-3 col-form-label form-control-label"></label>
                </div>
              </div>
            </div>
          </div>
          <!-- <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
              <h5 class="mb-0">PEMERIKSAAN BIOKIMIAWI</h5>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
              <div class="card-body">
              </div>
            </div>
          </div> -->

          <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <h5 class="mb-0">USG SKRINING</h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Kondisi Pemeriksaan</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <select name="kondisi_pemeriksaan" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="Lapang Pandang Cukup Optimal" <?php echo ($value1['kondisi_pemeriksaan'] == 'Lapang Pandang Cukup Optimal') ? 'selected' : '' ; ?>>Lapang Pandang Cukup Optimal</option>
                      <option value="Lapang Pandang Optimal" <?php echo ($value1['kondisi_pemeriksaan'] == 'Lapang Pandang Optimal') ? 'selected' : '' ; ?>>Lapang Pandang Optimal</option>
                      <option value="Lapang Pandang Suboptimal Karena Posisi Janin" <?php echo ($value1['kondisi_pemeriksaan'] == 'Lapang Pandang Suboptimal Karena Posisi Janin') ? 'selected' : '' ; ?>>Lapang Pandang Suboptimal Karena Posisi Janin</option>
                      <option value="Lapang Pandang Suboptimal Karena Pergerakan Janin" <?php echo ($value1['kondisi_pemeriksaan'] == 'Lapang Pandang Suboptimal Karena Pergerakan Janin') ? 'selected' : '' ; ?>>Lapang Pandang Suboptimal Karena Pergerakan Janin</option>
                      <option value="Lapang Pandang Suboptimal Karena Faktor Ibu" <?php echo ($value1['kondisi_pemeriksaan'] == 'Lapang Pandang Suboptimal Karena Faktor Ibu') ? 'selected' : '' ; ?>>Lapang Pandang Suboptimal Karena Faktor Ibu</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Lokasi Kehamilan</label>
                  <div class="col-md-5 d-flex align-items-center">
                    <select name="lokasi_kehamilan" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="Intrauterin" <?php echo ($value1['lokasi_kehamilan'] == 'Intrauterin') ? 'selected' : '' ; ?>>Intrauterin</option>
                      <option value="Ekstrauterin" <?php echo ($value1['lokasi_kehamilan'] == 'Ekstrauterin') ? 'selected' : '' ; ?>>Ekstrauterin</option>
                      <option value="Pregnancy of Unknown Location (PUL)" <?php echo ($value1['lokasi_kehamilan'] == 'Pregnancy of Unknown Location (PUL)') ? 'selected' : '' ; ?>>Pregnancy of Unknown Location (PUL)</option>
                      <option value="Heterotropik" <?php echo ($value1['lokasi_kehamilan'] == 'Heterotropik') ? 'selected' : '' ; ?>>Heterotropik</option>
                      <option value="Belum Dapat Ditentukan" <?php echo ($value1['lokasi_kehamilan'] == 'Belum Dapat Ditentukan') ? 'selected' : '' ; ?>>Belum Dapat Ditentukan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Denyut Jantung Janin</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['denyut_jantung_janin']; ?>" name="denyut_jantung_janin" class="form-control" type="text" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">dpm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Regurgitasi Trikuspid</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="regurgitasi_trikuspid" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="1" <?php echo ($value1['regurgitasi_trikuspid'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                      <option value="0" <?php echo ($value1['regurgitasi_trikuspid'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                      <option value="3" <?php echo ($value1['regurgitasi_trikuspid'] == '3') ? 'selected' : '' ; ?>>Tidak dinilai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Irama</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="irama" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="Reguler" <?php echo ($value1['irama'] == 'Reguler') ? 'selected' : '' ; ?>>Reguler</option>
                      <option value="Ireguler" <?php echo ($value1['irama'] == 'Ireguler') ? 'selected' : '' ; ?>>Ireguler</option>
                      <option value="Tidak Diperiksa" <?php echo ($value1['irama'] == 'Tidak Diperiksa') ? 'selected' : '' ; ?>>Tidak Diperiksa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Gerak Janin</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="gerak_janin" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="1" <?php echo ($value1['regurgitasi_trikuspid'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                      <option value="0" <?php echo ($value1['regurgitasi_trikuspid'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                      <option value="3" <?php echo ($value1['regurgitasi_trikuspid'] == '3') ? 'selected' : '' ; ?>>Tidak dinilai</option>
                    </select>
                  </div>
                </div>
                <div nam style="<?php echo ($value1['usia_kehamilan_berdasarkan'] == 'CRL') ? '' : 'display:none;' ; ?>" id="crlForm" class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">CRL</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['usia_kehamilan_in']; ?>" <?php echo ($value1['usia_kehamilan_berdasarkan'] == 'CRL') ? 'name="usia_kehamilan_in"' : '' ; ?> id="crl" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">BPD</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm input-group-merge">
                      <input value="<?php echo $value1['bpd']; ?>" name="bpd" class="form-control" type="text">
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
                      <input value="<?php echo $value1['nt']; ?>" name="nt" class="form-control" type="text">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">mm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">NB</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="nb" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="1" <?php echo ($value1['regurgitasi_trikuspid'] == '1') ? 'selected' : '' ; ?>>Ada</option>
                      <option value="0" <?php echo ($value1['regurgitasi_trikuspid'] == '0') ? 'selected' : '' ; ?>>Tidak ada</option>
                      <option value="3" <?php echo ($value1['regurgitasi_trikuspid'] == '3') ? 'selected' : '' ; ?>>Tidak dinilai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Kondisi organ</label>
                  <div class="col-md-5 d-flex align-items-center">
                    <select name="kondisi_organ" class="form-control form-control-sm" required>
                      <option value="">- Pilih -</option>
                      <option value="Tidak tampak kelainan kongenital mayor" <?php echo ($value1['kondisi_organ'] == 'Tidak tampak kelainan kongenital mayor') ? 'selected' : '' ; ?>>Tidak tampak kelainan kongenital mayor</option>
                      <option value="Tampak kelainan kongenital mayor" <?php echo ($value1['kondisi_organ'] == 'Tampak kelainan kongenital mayor') ? 'selected' : '' ; ?>> Tampak kelainan kongenital mayor</option>
                      <option value="Tampak Anomali Janin" <?php echo ($value1['kondisi_organ'] == 'Tampak Anomali Janin') ? 'selected' : '' ; ?>>Tampak Anomali Janin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Keterangan organ</label>
                  <div class="col-md-6 d-flex align-items-center py-2">
                    <textarea class="form-control" name="keterangan_organ" rows="4"><?php echo $value1['keterangan_organ']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Plasenta</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="plasenta" class="form-control form-control-sm">
                      <option value="">- Pilih -</option>
                      <option value="Anterior" <?php echo ($value1['plasenta'] == 'Anterior') ? 'selected' : '' ; ?>>Anterior</option>
                      <option value="Posterior" <?php echo ($value1['plasenta'] == 'Posterior') ? 'selected' : '' ; ?>>Posterior</option>
                      <option value="Menutupi OUI" <?php echo ($value1['plasenta'] == 'Menutupi OUI') ? 'selected' : '' ; ?>>Menutupi OUI</option>
                      <option value="Antero-lateral" <?php echo ($value1['plasenta'] == 'Antero-lateral') ? 'selected' : '' ; ?>>Antero-lateral</option>
                      <option value="Postero-lateral" <?php echo ($value1['plasenta'] == 'Postero-lateral') ? 'selected' : '' ; ?>>Postero-lateral</option>
                      <option value="Lateral kanan" <?php echo ($value1['plasenta'] == 'Lateral kanan') ? 'selected' : '' ; ?>>Lateral kanan</option>
                      <option value="Lateral kiri" <?php echo ($value1['plasenta'] == 'Lateral kiri') ? 'selected' : '' ; ?>>Lateral kiri</option>
                      <option value="Fundus" <?php echo ($value1['plasenta'] == 'Fundus') ? 'selected' : '' ; ?>>Fundus</option>
                      <option value="Belum dinilai" <?php echo ($value1['plasenta'] == 'Belum dinilai') ? 'selected' : '' ; ?>>Belum dinilai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Mean UtPI</label>
                  <div class="col-md-4 d-flex align-items-center">
                    <div class="input-group input-group-sm">
                      <input value="<?php echo $value1['mean_utpi']; ?>" name="mean_utpi" id="mean_utpi" type="text" class="form-control">
                      <div class="input-group-append">
                        <!-- <button class="btn btn-outline-primary" type="button">MoM</button> -->
                        <button data-toggle="dropdown" class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                        <div class="dropdown-menu dropdown-map p-2">
                          <table class="table-map" border="0">
                            <tr>
                              <td>Kiri</td>
                              <td>
                                <input value="<?php echo $value1['utpi_kiri']; ?>" name="utpi_kiri" id="uterina_kiri" class="form-map form-control form-control-sm" type="text">
                              </td>
                            </tr>
                            <tr>
                              <td>Kanan</td>
                              <td>
                                <input value="<?php echo $value1['utpi_kanan']; ?>" name="utpi_kanan" id="uterina_kanan" class="form-map form-control form-control-sm" type="text">
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
                  <label class="col-md-4 col-form-label form-control-label">PI Ductus Venosus</label>
                  <div class="col-md-4 d-flex align-items-center">
                    <input value="<?php echo $value1['ductus_venosus']; ?>" name="ductus_venosus" class="form-control form-control-sm" type="text">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">PR Ophtalmica</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <div class="input-group input-group-sm">
                      <input value="<?php echo $value1['aospr']; ?>" id="pr_ophtalmica" type="text" class="form-control">
                      <div class="input-group-append">
                        <button data-toggle="dropdown" class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-calculator"></i></button>
                        <div class="dropdown-menu dropdown-map p-2">
                          <table class="table-map" border="0">
                            <tr>
                              <td>Psv1</td>
                              <td>
                                <input value="<?php echo $value1['psv1']; ?>" name="psv1" id="psv1" class="form-map form-control form-control-sm" type="text">
                              </td>
                            </tr>
                            <tr>
                              <td>Psv2</td>
                              <td>
                                <input value="<?php echo $value1['psv2']; ?>" name="psv2" id="psv2" class="form-map form-control form-control-sm" type="text">
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
                  <label class="col-md-4 col-form-label form-control-label">A wave Ductus Venosus</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="awdv" class="form-control form-control-sm">
                      <option value="">- Pilih -</option>
                      <option value="Positif" <?php echo ($value1['awdv'] == 'Positif') ? 'selected' : '' ; ?>>Positif</option>
                      <option value="Absent" <?php echo ($value1['awdv'] == 'Absent') ? 'selected' : '' ; ?>>Absent</option>
                      <option value="Reversed" <?php echo ($value1['awdv'] == 'Reversed') ? 'selected' : '' ; ?>>Reversed</option>
                      <option value="Tidak Dinilai" <?php echo ($value1['awdv'] == 'Tidak Dinilai') ? 'selected' : '' ; ?>>Tidak Dinilai </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Cairan Ketuban</label>
                  <div class="col-md-3 d-flex align-items-center">
                    <select name="cairan_ketuban" class="form-control form-control-sm">
                      <option value="">- Pilih -</option>
                      <option value="Normal" <?php echo ($value1['cairan_ketuban'] == 'Normal') ? 'selected' : '' ; ?>>Normal</option>
                      <option value="Abnormal" <?php echo ($value1['cairan_ketuban'] == 'Abnormal') ? 'selected' : '' ; ?>>Abnormal</option>
                      <option value="Tidak Diperiksa" <?php echo ($value1['cairan_ketuban'] == 'Tidak Diperiksa') ? 'selected' : '' ; ?>>Tidak Diperiksa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Kesimpulan USG</label>
                  <div class="col-md-8 d-flex align-items-center py-2">
                    <textarea class="form-control" name="kesimpulan_usg" rows="4"><?php echo $value1['kesimpulan_usg']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              <h5 class="mb-0">PENILAIAN RISIKO</h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Trisomies Risk Assessment</label>
                  <div class="col-md-4 d-flex align-items-center">
                    <input value="<?php echo $value1['trisomies_risk_assessment']; ?>" name="trisomies_risk_assessment" class="form-control form-control-sm" type="text">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 34 weeks</label>
                  <div class="col-md-4 d-flex mt-2">
                    <input class="form-control form-control-sm" type="text" value="<?php echo $value1['pohp_34']; ?>" readonly>
                    <input id="poh_pe_34" name="poh_pe_34" class="form-control form-control-sm" type="text">
                  </div>
                  <label id="ket_poh_pe_34" class="col-md-3 col-form-label form-control-label mb-0"></label>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Probability of having Pre-Eclampsia< 37 weeks</label>
                  <div class="col-md-4 d-flex mt-2">
                    <input class="form-control form-control-sm" type="text" value="<?php echo $value1['pohp_37']; ?>" readonly>
                    <input id="poh_pe_37" name="poh_pe_37" class="form-control form-control-sm" type="text">
                  </div>
                  <label id="ket_poh_pe_37" class="col-md-3 col-form-label form-control-label"></label>
                </div>
              </div>
            </div>
          </div>
          <div style="overflow: visible !important;" class="card my-2">
            <div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              <h5 class="mb-0">CATATAN PEMERIKSAAN</h5>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Asesmen Pasien (S-O-A)</label>
                  <div class="col-md-8 d-flex align-items-center py-2">
                    <textarea class="form-control" name="asesmen_pasien" rows="4"><?php echo $value1['asesmen_pasien']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Rencana Tindak Lanjut (P)</label>
                  <div class="col-md-8 d-flex align-items-center py-2">
                    <textarea class="form-control" name="rtl" rows="4"><?php echo $value1['rtl']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Pemeriksa</label>
                  <div class="col-md-6 d-flex align-items-center">
                    <select name="pemeriksa" class="form-control form-control-sm">
                      <option value="">- Pilih -</option>
                      <option value="dr. Adly Nanda Al Fattah, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Adly Nanda Al Fattah, Sp. OG') ? 'selected' : '' ; ?>>dr. Adly Nanda Al Fattah, Sp. OG</option>
                      <option value="dr. Renny Anggia, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Renny Anggia, Sp. OG') ? 'selected' : '' ; ?>>dr. Renny Anggia, Sp. OG</option>
                      <option value="dr. Zakiah Tourik, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Zakiah Tourik, Sp. OG') ? 'selected' : '' ; ?>>dr. Zakiah Tourik, Sp. OG</option>
                      <option value="dr. Gita Ruryatesa,SpOG" <?php echo ($value1['pemeriksa'] == 'dr. Gita Ruryatesa,SpOG') ? 'selected' : '' ; ?>>dr. Gita Ruryatesa,Sp. OG</option>
                      <option value="dr. Jimmy S Nanda B, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Jimmy S Nanda B, Sp. OG') ? 'selected' : '' ; ?>>dr. Jimmy S Nanda B, Sp. OG</option>
                      <option value="dr. Kartika Iswaranti, Sp OG" <?php echo ($value1['pemeriksa'] == 'dr. Kartika Iswaranti, Sp OG') ? 'selected' : '' ; ?>>dr. Kartika Iswaranti, Sp OG</option>
                      <option value="dr. Anak Agung Rai D. M, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Anak Agung Rai D. M, Sp. OG') ? 'selected' : '' ; ?>>dr. Anak Agung Rai D. M, Sp. OG</option>
                      <option value="dr. Putri Deva Karimah. Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Putri Deva Karimah. Sp. OG') ? 'selected' : '' ; ?>>dr. Putri Deva Karimah. Sp. OG</option>
                      <option value="dr. Naela Fadhila, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Naela Fadhila, Sp. A') ? 'selected' : '' ; ?>>dr. Naela Fadhila, Sp. A</option>
                      <option value="dr. Jeshika Febi,Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Jeshika Febi,Sp. A') ? 'selected' : '' ; ?>>dr. Jeshika Febi,Sp. A</option>
                      <option value="dr Karina Faisha, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr Karina Faisha, Sp. A') ? 'selected' : '' ; ?>>dr Karina Faisha, Sp. A</option>
                      <option value="dr. Henni Wahyu, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Henni Wahyu, Sp. A') ? 'selected' : '' ; ?>>dr. Henni Wahyu, Sp. A</option>
                      <option value="dr. Stephanie Amanda, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Stephanie Amanda, Sp. A') ? 'selected' : '' ; ?>>dr. Stephanie Amanda, Sp. A</option>
                      <option value="dr. Sarah Audia Hasna" <?php echo ($value1['pemeriksa'] == 'dr. Sarah Audia Hasna') ? 'selected' : '' ; ?>>dr. Sarah Audia Hasna</option>
                      <option value="dr. M. Ilham Kosman, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. M. Ilham Kosman, Sp. OG') ? 'selected' : '' ; ?>>dr. M. Ilham Kosman, Sp. OG</option>
                      <option value="Bd. Dea" <?php echo ($value1['pemeriksa'] == 'Bd. Dea') ? 'selected' : '' ; ?>>Bd. Dea</option>
                      <option value="Bd. Dewi" <?php echo ($value1['pemeriksa'] == 'Bd. Dewi') ? 'selected' : '' ; ?>>Bd. Dewi</option>
                      <option value="Bd. Wiwit" <?php echo ($value1['pemeriksa'] == 'Bd. Wiwit') ? 'selected' : '' ; ?>>Bd. Wiwit</option>
                      <option value="Bd. Denies" <?php echo ($value1['pemeriksa'] == 'Bd. Denies') ? 'selected' : '' ; ?>>Bd. Denies</option>
                      <option value="Bd. Ficka" <?php echo ($value1['pemeriksa'] == 'Bd. Ficka') ? 'selected' : '' ; ?>>Bd. Ficka</option>
                      <option value="Bd. Nita" <?php echo ($value1['pemeriksa'] == 'Bd. Nita') ? 'selected' : '' ; ?>>Bd. Nita</option>
                      <option value="Bd. Nova" <?php echo ($value1['pemeriksa'] == 'Bd. Nova') ? 'selected' : '' ; ?>>Bd. Nova</option>
                      <option value="Bd. Diah" <?php echo ($value1['pemeriksa'] == 'Bd. Diah') ? 'selected' : '' ; ?>>Bd. Diah</option>
                      <option value="Bd. Yeyen" <?php echo ($value1['pemeriksa'] == 'Bd. Yeyen') ? 'selected' : '' ; ?>>Bd. Yeyen</option>
                      <option value="Bd. Rani" <?php echo ($value1['pemeriksa'] == 'Bd. Rani') ? 'selected' : '' ; ?>>Bd. Rani </option>
                      <option value="Bd. Riana" <?php echo ($value1['pemeriksa'] == 'Bd. Riana') ? 'selected' : '' ; ?>>Bd. Riana </option>
                      <option value="Bd. Sevi" <?php echo ($value1['pemeriksa'] == 'Bd. Sevi') ? 'selected' : '' ; ?>>Bd. Sevi </option>
                      <option value="Bd. Annisa" <?php echo ($value1['pemeriksa'] == 'Bd. Annisa') ? 'selected' : '' ; ?>>Bd. Annisa</option>
                      <option value="Bd. Dinda" <?php echo ($value1['pemeriksa'] == 'Bd. Dinda') ? 'selected' : '' ; ?>>Bd. Dinda</option>
                      <option value="Bd. Vania" <?php echo ($value1['pemeriksa'] == 'Bd. Vania') ? 'selected' : '' ; ?>>Bd. Vania</option>
                      <option value="Bd. Anisah" <?php echo ($value1['pemeriksa'] == 'Bd. Anisah') ? 'selected' : '' ; ?>>Bd. Anisah</option>
                      <option value="Bd. Fergie" <?php echo ($value1['pemeriksa'] == 'Bd. Fergie') ? 'selected' : '' ; ?>>Bd. Fergie</option>
                      <option value="Bd. Dana" <?php echo ($value1['pemeriksa'] == 'Bd. Dana') ? 'selected' : '' ; ?>>Bd. Dana</option>
                      <option value="Bd. Afifah" <?php echo ($value1['pemeriksa'] == 'Bd. Afifah') ? 'selected' : '' ; ?>>Bd. Afifah</option>
                      <option value="Pr. Pagit" <?php echo ($value1['pemeriksa'] == 'Pr. Pagit') ? 'selected' : '' ; ?>>Pr. Pagit</option>
                      <option value="Bd. Fauziah" <?php echo ($value1['pemeriksa'] == 'Bd. Fauziah') ? 'selected' : '' ; ?>>Bd. Fauziah</option>
                      <option value="Bd. Wulan" <?php echo ($value1['pemeriksa'] == 'Bd. Wulan') ? 'selected' : '' ; ?>>Bd. Wulan</option>
                      <option value="dr. Ribhki Amalia Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Ribhki Amalia Sp. OG') ? 'selected' : '' ; ?>>dr. Ribhki Amalia Sp. OG</option>
                      <option value="dr. Trisna Novika Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Trisna Novika Sp. OG') ? 'selected' : '' ; ?>>dr. Trisna Novika Sp. OG</option>
                      <option value="dr. Caroline Gladys Puspita Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Caroline Gladys Puspita Sp. OG') ? 'selected' : '' ; ?>>dr. Caroline Gladys Puspita Sp. OG</option>
                      <option value="dr. Arie Aldila Pratama, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Arie Aldila Pratama, Sp. OG') ? 'selected' : '' ; ?>>dr. Arie Aldila Pratama Sp. OG</option>
                      <option value="dr. M. Ramdhani Yassien, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. M. Ramdhani Yassien, Sp. A') ? 'selected' : '' ; ?>>dr. M. Ramdhani Yassien, Sp. A</option>
                      <option value="dr. Lucyana, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Lucyana, Sp. A') ? 'selected' : '' ; ?>>dr. Lucyana, Sp. A</option>
                      <option value="dr. Fatimah Saidah, Sp. A" <?php echo ($value1['pemeriksa'] == 'dr. Fatimah Saidah, Sp. A') ? 'selected' : '' ; ?>>dr. Fatimah Saidah, Sp. A</option>
                      <option value="dr. Riska Nyutan Hadji Putri Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Riska Nyutan Hadji Putri Sp. OG') ? 'selected' : '' ; ?>>dr. Riska Nyutan Hadji Putri Sp. OG</option>
                      <option value="dr. Adri Anggayana, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Adri Anggayana, Sp. OG') ? 'selected' : '' ; ?>>dr. Adri Anggayana, Sp. OG</option>
                      <option value="dr. Leonita T. A. Sutrisna, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Leonita T. A. Sutrisna, Sp. OG') ? 'selected' : '' ; ?>>dr. Leonita T. A. Sutrisna, Sp. OG</option>
                      <option value="dr. Nicholas Marco Hutauruk, Sp. OG" <?php echo ($value1['pemeriksa'] == 'dr. Nicholas Marco Hutauruk, Sp. OG') ? 'selected' : '' ; ?>>dr. Nicholas Marco Hutauruk, Sp. OG</option>
                      <option value="Bd. Fentin" <?php echo ($value1['pemeriksa'] == 'Bd. Fentin') ? 'selected' : '' ; ?>>Bd. Fentin</option>
                      <option value="Bd. Mita" <?php echo ($value1['pemeriksa'] == 'Bd. Mita') ? 'selected' : '' ; ?>>Bd.Mita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <label class="col-md-4 col-form-label form-control-label">Catatan (khusus dokter)</label>
                  <div class="col-md-8 d-flex align-items-center py-2">
                    <textarea class="form-control" name="catatan" rows="4"><?php echo $value1['catatan']; ?></textarea>
                  </div>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
              </div>
              <div class="card-footer text-right">
                <button type="reset" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>

<?php function codeScripts(){ ?>
  <script type="text/javascript">
  let lineNo = 1;
  $(document).ready(function () {
    // $("#uterina_kiri, #uterina_kanan, #psv1, #psv2, #poh_pe_34, #poh_pe_37, #systolicLeft1, #systolicRight1, #diastolicLeft1, #diastolicRight1, #systolicLeft2, #systolicRight2, #diastolicLeft2, #diastolicRight2, #final_map, #mean_utpi, #pr_ophtalmica, #plgf, #paritas, #in_riwayat_kehamilan, #metode_konsepsi, #riwayat_hamil_pe, #diabetes_militus, #hipertensi_kronik, #riwayat_ibu_kakak_pe, #usia, #berat_badan, #tinggi_badan, #plgf, #poh_pe_34, #poh_pe_37").on("change",
    //   () => {

      const map   = parseFloat($("#final_map").val()); // belum
      const utpi  = parseFloat($("#mean_utpi").val()); // ok
      const oph   = parseFloat($("#pr_ophtalmica").val()); // ok
      const plgf  = parseFloat($("#mom_plgf").val()); // ok

      // const paritas               =  // ok
      const paritas_origin        = parseFloat($("#paritas").val()); // ok
      if (paritas_origin == 0) {
        paritas = 1;
      } else {
        paritas = 0;
      }
      const in_riwayat_kehamilan  = parseFloat($("#in_riwayat_kehamilan").val()); // ok
      const metode_konsepsi       = parseFloat($("#metode_konsepsi").val()); // ok
      const riwayat_hamil_pe      = parseFloat($("#riwayat_hamil_pe").val()); // ok
      const diabetes_militus      = parseFloat($("#diabetes_militus").val()); // ok
      const hipertensi_kronik     = parseFloat($("#hipertensi_kronik").val()); // ok
      const riwayat_ibu_kakak_pe  = parseFloat($("#riwayat_ibu_kakak_pe").val()); //ok
      const usia                  = parseFloat($("#usia").val()); // ok

      const berat_badan           = parseFloat($("#berat_badan").val()); // ok
      const tinggi_badan          = parseFloat($("#tinggi_badan").val()); // ok
      const bmi                   = berat_badan/((tinggi_badan/100)*(tinggi_badan/100)); // ok

      const map_risk  = Math.log10(map/83.25);
      const utpi_risk = Math.log10(utpi/1.78);
      const oph_risk  = Math.log10(oph/0.57);
      const plgf_risk = Math.log10(plgf/49.395);

      const rumus1_34 = Math.exp((-2.65E-28)*(Math.pow(34,16.5)));
      const rumus1_37 = Math.exp((-2.65E-28)*(Math.pow(37,16.5)));
      const rumus2 = (0.37*paritas)+(-0.377*in_riwayat_kehamilan)+(0.304*metode_konsepsi)+(1.19*riwayat_hamil_pe)+(1.55*diabetes_militus)+(0.123*hipertensi_kronik)+(0.345*riwayat_ibu_kakak_pe)+(-0.0000126*usia);
      const rumus3 = (-0.0138*bmi)+(22.6*map_risk)+(2.57*utpi_risk)+(0.989*oph_risk)+(-1.59*plgf_risk);
      const rumus4 = Math.exp(rumus2+rumus3);

      const rumus5_34 = Math.pow(rumus1_34,rumus4);
      const rumus6_34 = 1-rumus5_34;
      const rumus7_34 = 1/rumus6_34;

      const rumus5_37 = Math.pow(rumus1_37,rumus4);
      const rumus6_37 = 1-rumus5_37;
      const rumus7_37 = 1/rumus6_37;

      $("#poh_pe_34").val("1 : "+ Math.round(rumus7_34));
      $("#poh_pe_37").val("1 : "+ Math.round(rumus7_37));
      if (rumus7_34<49) {
        $("#ket_poh_pe_34").text("(High risk)");
      } else {
        $("#ket_poh_pe_34").text("(Low risk)");
      }
      if (rumus7_37<13) {
        $("#ket_poh_pe_37").text("(High risk)");
      } else {
        $("#ket_poh_pe_37").text("(Low risk)");
      }
    // });
  }),
  $(document).ready(function () {
    $(".add-row").click(function () {
        markup  = "<tr>";
        markup += "<td>" + lineNo + "</td>";
        markup += "<td><input name='tanggal_lahir_riwayat[]' style='width:150px' type='date' placeholder='Tanggal Lahir' class='form-control form-control-sm datepicker'></td>";
        markup += "<td><input type='text' name='berat_lahir_riwayat[]' placeholder='Berat Lahir' class='form-control form-control-sm'></td>";
        markup += "<td><select name='jenis_kelamin_riwayat[]' class='form-control form-control-sm'><option value=''>-Pilih-</option><option value='Laki-laki'>Laki-laki</option><option value='Perempuan'>Perempuan</option></select></td>";
        markup += "<td><input type='text' name='usia_kehamilan_saat_lahir_riwayat[]' placeholder='Usia Kehamilan Saat Lahir' class='form-control form-control-sm'></td>";
        markup += "<td><select class='form-control form-control-sm' name='cara_persalinan_riwayat[]'><option value=''>-Pilih-</option><option value='Pervaginam'>Pervaginam</option><option value='SC'>SC</option><option value='Kuretase'>Kuretase</option><option value='Abortus medisinalis'>Abortus medisinalis</option></select></td>";
        markup += "<td><select class='form-control form-control-sm' name='kondisi_saat_lahir_riwayat[]'><option value=''>-Pilih-</option><option value='Live Birth'>Live Birth</option><option value='Neonatal Death'>Neonatal Death</option><option value='Abortus'>Abortus</option></select></td>";
        markup += "</tr>";
        tableBody = $("table #riwayat");
        tableBody.append(markup);
        lineNo++;
    });

  });
  </script>
<?php } ?>
