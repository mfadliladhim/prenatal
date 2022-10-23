<?php $title ='Identitas Pasien';
include '../config/connection.php';
$query1 = $connection->query("SELECT * FROM delivery WHERE identitas_id = '".$_GET['id']."'");
$value1 = $query1->fetch_assoc();
$row1 = $query1->num_rows; ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 d-inline-block mb-0">Delivery Outcame</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-light">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Skrining</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Delivery Outcame Pasien</li>
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
       <?php if (empty($_GET['id-s'])): ?>
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
               <form class="" action="../controller/DeliveryController.php?a=add_skrining_data&id=<?php echo $_GET['id']; ?>" method="post">
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
       <?php else: ?>
         <?php $query2 = $connection->query("SELECT * FROM skrining WHERE skrining_id = '".$_GET['id-s']."'");
         $value2 = $query2->fetch_assoc(); ?>
         <form class="" action="../controller/DeliveryController.php?a=add_delivery_outcome" method="post">
           <div class="row">
             <div class="col-md-12">
               <div class="card">
                 <div class="card-header">
                   <div class="row align-items-center">
                     <div class="col">
                       <h3 class="mb-0">DATA PERSALINAN</h3>
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
                     <div class="col-sm-3 d-flex align-items-center">
                       <input value="<?= $_GET['id']; ?>" type="text" name="identitas_id" class="form-control form-control-sm" hidden>
                       <input value="<?= $value2['jumlah_janin']; ?>" type="text" name="jumlah_janin" class="form-control form-control-sm" hidden>
                       <input value="<?php echo $_GET['id-s']; ?>" type="text" name="id-s" class="form-control form-control-sm" hidden>
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
                     <label class="col-sm-4 col-form-label form-control-label">Usia Kehamilan Saat Lahir</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <input type="text" name="usia_kehamilan_saat_l" class="form-control form-control-sm">
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Cara Persalinan</label>
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <label class="col-sm-4 col-form-label form-control-label">Indikasi Induksi Persalinan</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <input type="text" name="indikasi_induksi_persalinan" class="form-control form-control-sm">
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Indikasi Vakum/Forsep/SC</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <input type="text" name="indikasi_vakum_forsep_sc" class="form-control form-control-sm">
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Butuh Transfusi Darah</label>
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-4 d-flex align-items-center">
                       <!-- <input type="text" name="jumlah_pendarahan" class="form-control form-control-sm"> -->
                       <div class="input-group input-group-sm input-group-merge">
                         <input id="jumlah_pendarahan" name="jumlah_pendarahan" class="form-control" type="text">
                         <div class="input-group-append">
                           <button class="btn btn-outline-prenatal-orange" type="button">cc</button>
                         </div>
                       </div>
                     </div>
                   </div>
                   <?php if ($value2['jumlah_janin'] > '1'): ?>
                     <div class="form-group row mt-2 mb-3">
                       <label class="col-sm-4 col-form-label form-control-label"></label>
                       <div class="col-sm-8">
                         <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#delivery_persalinan">
                           <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                         </button>
                       </div>
                     </div>
                   <?php else: ?>
                     <div class="form-group row mb-0">
                       <label class="col-sm-4 col-form-label form-control-label">Berat Lahir Bayi</label>
                       <div class="col-md-4 d-flex align-items-center">
                         <div class="input-group input-group-sm input-group-merge">
                           <input name="berat_lahir_b" class="form-control" type="text">
                           <div class="input-group-append">
                             <button class="btn btn-outline-prenatal-orange" type="button">kg</button>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row mb-0">
                       <label class="col-sm-4 col-form-label form-control-label">Panjang Lahir Bayi</label>
                       <div class="col-sm-4 d-flex align-items-center">
                         <!-- <input type="text" name="panjang_lahir_b" class="form-control form-control-sm"> -->
                         <div class="input-group input-group-sm input-group-merge">
                           <input name="panjang_lahir_b" class="form-control" type="text">
                           <div class="input-group-append">
                             <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row mb-0">
                       <label class="col-sm-4 col-form-label form-control-label">Lingkar Kepala Bayi</label>
                       <div class="col-sm-4 d-flex align-items-center">
                         <!-- <input type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm"> -->
                         <div class="input-group input-group-sm input-group-merge">
                           <input name="lingkar_kepala_bayi" class="form-control" type="text">
                           <div class="input-group-append">
                             <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row mb-0">
                       <label class="col-sm-4 col-form-label form-control-label">Jenis Kelamin</label>
                       <div class="col-sm-4 d-flex align-items-center">
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
                   <?php endif; ?>
                   <div id="tableShowPersalinan" class="form-group row mb-0 d-none">
                     <div class="col-sm-12">
                       <div class="table-responsive">
                         <table class="table table-bordered">
                           <thead>
                             <tr>
                               <th>#</th>
                               <th>No</th>
                               <th>Berat Lahir Bayi</th>
                               <th>Panjang Lahir Bayi</th>
                               <th>Lingkar Kepala Bayi</th>
                               <th>Jenis Kelamin</th>
                             </tr>
                           </thead>
                           <tbody id="td_persalinan">
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
                       <h3 class="mb-0">NEONATAL OUTCOME</h3>
                     </div>
                     <div class="col text-right">
                       <!-- <button data-toggle="modal" data-target="#editMenstruasi" class="btn btn-sm btn-primary">Edit</button> -->
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                 <?php if ($value2['jumlah_janin'] > '1'): ?>
                   <div class="form-group row mb-3">
                     <!-- <label class="col-sm-4 col-form-label form-control-label"></label> -->
                     <div class="col-sm-12">
                       <button type="button" class="btn btn-prenatal-orange btn-sm" data-toggle="modal" data-target="#delivery_neonatal">
                         <i class="fas fa-plus mr-1"></i>Data USG Janin Kembar
                       </button>
                     </div>
                   </div>
                 <?php else: ?>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">AS 1</label>
                     <div class="col-sm-3 d-flex align-items-center">
                       <input type="text" name="as_1" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">AS 5</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <input type="text" name="as_5" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Butuh CPAP/Mixsafe</label>
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-4 d-flex align-items-center">
                       <!-- <input type="text" name="kelainan_bawaan" class="form-control form-control-sm" > -->
                       <select name="kelainan_bawaan" class="form-control form-control-sm">
                         <option value="">- Pilih -</option>
                         <option value="Ada">Ada</option>
                         <option value="Tidak Ada">Tidak Ada</option>
                         <option value="Tidak dinilai">Tidak dinilai</option>
                       </select>
                     </div>
                   </div>
                   <div class="form-group row mb-2 mt-2">
                     <label class="col-sm-4 col-form-label form-control-label">Jenis Kelainan Bawaan</label>
                     <div class="col-sm-8 d-flex align-items-center">
                       <!-- <input type="text" name="jenis_kelainan_bawaan" class="form-control form-control-sm" > -->
                       <textarea class="form-control form-control-sm" name="jenis_kelainan_bawaan" rows="3"></textarea>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Kondisi Bayi Saat Lahir</label>
                     <div class="col-sm-4 d-flex align-items-center">
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
                     <div class="col-sm-8 d-flex align-items-center">
                       <div class="form-row mb-0">
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
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="kja_lainnya">
                             <label class="form-check-label text-sm" for="kja_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-kja" class="d-none mb-2">
                             <textarea class="form-control" rows="2"></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Lama Rawat NICU (hari)</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <input type="text" name="lama_rawat_nicu" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">NICU admission</label>
                     <div class="col-sm-4 d-flex align-items-center">
                       <!-- <input type="text" name="nicu_admission" class="form-control form-control-sm" > -->
                       <select name="nicu_admission" class="form-control form-control-sm">
                         <option value="">- Pilih -</option>
                         <option value="Ya">Ya</option>
                         <option value="Tidak">Tidak</option>
                         <option value="Tidak tahu">Tidak tahu</option>
                       </select>
                     </div>
                   </div>
                 <?php endif; ?>
                   <div id="tableShowNeonatal" class="form-group row mb-0 d-none">
                     <div class="col-sm-12">
                       <div class="table-responsive">
                         <table class="table table-bordered">
                           <thead>
                             <tr>
                               <th>#</th>
                               <th>No</th>
                               <th>AS 1</th>
                               <th>AS 5</th>
                               <th>Butuh CPAP/Mixsafe</th>
                               <th>Asfiksia</th>
                               <th>RDS</th>
                               <th>Sepsis</th>
                               <th>Kelainan Bawaan</th>
                               <th>Jenis Kelainan Bawaan</th>
                               <th>Kondisi Bayi Saat Lahir</th>
                               <th>Komplikasi Janin Antepartum</th>
                               <th>Lama Rawat NICU (hari)</th>
                               <th>NICU admission</th>
                             </tr>
                           </thead>
                           <tbody id="td_neonatal">
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
                       <h3 class="mb-0">MATERNAL OUTCOME</h3>
                     </div>
                     <div class="col text-right">
                       <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Antepartum</label>
                     <div class="col-sm-8 align-items-center">
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
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="kia_lainnya">
                             <label class="form-check-label text-sm" for="kia_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-kia" class="mt-2 d-none">
                             <textarea class="form-control" rows="2"></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <hr class="mt-0 mb-3">
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Intrapartum</label>
                     <div class="col-sm-8 align-items-center">
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
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="kii_lainnya">
                             <label class="form-check-label text-sm" for="kii_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-kii" class="mt-2 d-none">
                             <textarea class="form-control" rows="2"></textarea>
                           </div>
                         </div>
                       </div>
                       <!-- <input type="text" name="komplikasi_ibu_intrapartum" class="form-control form-control-sm" > -->
                     </div>
                   </div>
                   <hr class="mt-0 mb-3">
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Komplikasi Ibu Postpartum</label>
                     <div class="col-sm-8 align-items-center">
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
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="kip_lainnya">
                             <label class="form-check-label text-sm" for="kip_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-kip" class="mt-2 d-none">
                             <textarea class="form-control" rows="2"></textarea>
                           </div>
                         </div>
                       </div>
                       <!-- <input type="text" name="komplikasi_ibu_postpartum" class="form-control form-control-sm" > -->
                     </div>
                   </div>
                   <div class="form-group row mb-3">
                     <label class="col-sm-4 col-form-label form-control-label">Catatan Persalinan</label>
                     <div class="col-sm-8 align-items-center">
                       <!-- <input type="text" name="catatan_persalinan" class="form-control form-control-sm" > -->
                       <textarea class="form-control form-control-sm" name="catatan_persalinan" rows="3"></textarea>
                     </div>
                   </div>
                   <div class="form-group row mb-3">
                     <label class="col-sm-4 col-form-label form-control-label">Data Klinis/Lab Pendukung</label>
                     <div class="col-sm-8 align-items-center">
                       <!-- <input type="text" name="data_klinis" class="form-control form-control-sm" > -->
                       <textarea class="form-control form-control-sm" name="data_klinis" rows="3"></textarea>
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
                       <h3 class="mb-0">COVID-19 RECORD</h3>
                     </div>
                     <div class="col text-right">
                       <!-- <button data-toggle="modal" data-target="#editPenyakit" class="btn btn-sm btn-primary">Edit</button> -->
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Jenis Test COVID</label>
                     <div class="col-sm-4 align-items-center">
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
                     <div class="col-sm-5 align-items-center">
                       <input type="text" name="usia_kehamilan_saat_t" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Tanggal Test</label>
                     <div class="col-sm-5 align-items-center">
                       <input type="date" name="tanggal_t" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Hasil Test</label>
                     <div class="col-sm-5 align-items-center">
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
                     <div class="col-sm-5 align-items-center">
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
                     <div class="col-sm-8 align-items-center">
                       <!-- <input type="text" name="sebutkan_komorbid" class="form-control form-control-sm" > -->
                       <textarea class="form-control form-control-sm" name="sebutkan_komorbid" rows="3"></textarea>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Gejala Yang Diirasakan</label>
                     <div class="col-sm-8 align-items-center">
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
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="gd_lainnya">
                             <label class="form-check-label text-sm" for="gd_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-gd" class="mt-2 d-none">
                             <textarea class="form-control" rows="2"></textarea>
                           </div>
                         </div>
                       </div>
                       <!-- <input type="text" name="gejala_dirasakan" class="form-control form-control-sm" > -->
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Alat Bantu Napas</label>
                     <div class="col-sm-5 align-items-center">
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
                     <div class="col-sm-5 align-items-center">
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
                     <div class="col-sm-8 align-items-center">
                       <!-- <input type="text" name="obat_didapat" class="form-control form-control-sm" > -->
                       <textarea class="form-control form-control-sm" name="obat_didapat" rows="3"></textarea>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Vaksinasi COVID</label>
                     <div class="col-sm-4 align-items-center">
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
                     <div class="col-sm-4 align-items-center">
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
                     <div class="col-sm-4 align-items-center">
                       <input type="date" name="tanggal_v" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Catatan Vaksin / Test</label>
                     <div class="col-sm-8 align-items-center">
                       <!-- <input type="text" name="catatan_v" class="form-control form-control-sm" > -->
                       <textarea name="catatan_v" rows="3" class="form-control"></textarea>
                     </div>
                   </div>
                   <!-- <div class="form-group">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                   </div> -->
                 </div>
                 <div class="modal-footer">
                   <button type="reset" class="btn btn-prenatal-grey" data-dismiss="modal">Batal</button>
                   <button type="submit" class="btn btn-prenatal-orange add-td">Simpan</button>
                 </div>
               </div>
             </div>

           </div>
         </form>
       <?php endif; ?>

       <!-- Modal kembar 1 -->
       <div class="modal fade" id="delivery_persalinan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <form id="formShowPersalinan" action="index.html" method="post">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <div class="form-group row mb-0">
                   <label class="col-sm-5 col-form-label form-control-label">Berat Lahir Bayi</label>
                   <div class="col-md-5 d-flex align-items-center">
                     <div class="input-group input-group-sm input-group-merge">
                       <input id="berat_lahir_b" name="berat_lahir_b" class="form-control" type="text">
                       <div class="input-group-append">
                         <button class="btn btn-outline-prenatal-orange" type="button">cm</button>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="form-group row mb-0">
                   <label class="col-sm-5 col-form-label form-control-label">Panjang Lahir Bayi</label>
                   <div class="col-sm-7">
                     <input id="panjang_lahir_b" type="text" name="panjang_lahir_b" class="form-control form-control-sm">
                   </div>
                 </div>
                 <div class="form-group row mb-0">
                   <label class="col-sm-5 col-form-label form-control-label">Lingkar Kepala Bayi</label>
                   <div class="col-sm-7">
                     <input id="lingkar_kepala_bayi" type="text" name="lingkar_kepala_bayi" class="form-control form-control-sm">
                   </div>
                 </div>
                 <div class="form-group row mb-0">
                   <label class="col-sm-5 col-form-label form-control-label">Jenis Kelamin</label>
                   <div class="col-sm-5">
                     <!-- <input type="text" name="jenis_kelamin" class="form-control form-control-sm"> -->
                     <select id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin">
                       <option value="">- Pilih -</option>
                       <option value="Laki-laki">Laki-laki</option>
                       <option value="Perempuan">Perempuan</option>
                       <option value="Belum Tampak">Belum Tampak</option>
                       <option value="Belum Dinilai">Belum Dinilai</option>
                     </select>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-prenatal-grey" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-prenatal-orange add-persalinan">Simpan</button>
               </div>
             </form>
           </div>
         </div>
       </div>
       <!-- Modal kembar 2 -->
       <div class="modal fade" id="delivery_neonatal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header border-bottom">
               <h5 class="modal-title" id="exampleModalLabel">Data USG Janin Kembar</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <form id="formShowNeonatal" class="" action="index.html" method="post">
               <div class="modal-body">
                 <div class="">
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">AS 1</label>
                     <div class="col-sm-6">
                       <input id="as_1" type="text" name="as_1" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">AS 5</label>
                     <div class="col-sm-8">
                       <input id="as_5" type="text" name="as_5" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Butuh CPAP/Mixsafe</label>
                     <div class="col-sm-8">
                       <!-- <input type="text" name="butuh_cpap_mixsafe" class="form-control form-control-sm" > -->
                       <select id="butuh_cpap_mixsafe" name="butuh_cpap_mixsafe" class="form-control form-control-sm">
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
                       <select id="asfiksia" name="asfiksia" class="form-control form-control-sm">
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
                       <select id="rds" name="rds" class="form-control form-control-sm">
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
                       <select id="sepsis" name="sepsis" class="form-control form-control-sm">
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
                       <select id="kelainan_bawaan" name="kelainan_bawaan" class="form-control form-control-sm">
                         <option value="">- Pilih -</option>
                         <option value="Ada">Ada</option>
                         <option value="Tidak Ada">Tidak Ada</option>
                         <option value="Tidak dinilai">Tidak dinilai</option>
                       </select>
                     </div>
                   </div>
                   <div class="form-group row mb-3">
                     <label class="col-sm-4 col-form-label form-control-label">Jenis Kelainan Bawaan</label>
                     <div class="col-sm-8 d-flex align-items-center">
                       <!-- <input type="text" name="jenis_kelainan_bawaan" class="form-control form-control-sm" > -->
                       <textarea id="jenis_kelainan_bawaan" class="form-control form-control-sm" name="jenis_kelainan_bawaan" rows="3"></textarea>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Kondisi Bayi Saat Lahir</label>
                     <div class="col-sm-8">
                       <!-- <input type="text" name="kondisi_bayi_lahir" class="form-control form-control-sm" > -->
                       <select id="kondisi_bayi_lahir" class="form-control form-control-sm" name="kondisi_bayi_lahir">
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
                               <input id="komplikasi_janin_antepartum" name="komplikasi_janin_antepartum[]" class="form-check-input" type="checkbox" value="<?php echo $value_kja['nama_kja']; ?>" id="kja_<?php echo $value_kja['kja_id']; ?>">
                               <label class="form-check-label text-sm" for="kja_<?php echo $value_kja['kja_id']; ?>">
                                 <?php echo $value_kja['nama_kja']; ?>
                               </label>
                             </div>
                           </div>
                         <?php endforeach; ?>
                         <div class="col-sm-6">
                           <div class="form-check">
                             <input name="komplikasi_janin_antepartum[]" class="form-check-input" type="checkbox" value="kja_lainnya" id="kja_lainnya">
                             <label class="form-check-label text-sm" for="kja_lainnya">
                               Lainnya
                             </label>
                           </div>
                         </div>
                         <div class="col-sm-12">
                           <div id="add-kja" class="mt-2 d-none">
                             <textarea class="form-control" rows="1"></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">Lama Rawat NICU (hari)</label>
                     <div class="col-sm-8">
                       <input id="lama_rawat_nicu" type="text" name="lama_rawat_nicu" class="form-control form-control-sm" >
                     </div>
                   </div>
                   <div class="form-group row mb-0">
                     <label class="col-sm-4 col-form-label form-control-label">NICU admission</label>
                     <div class="col-sm-8">
                       <!-- <input type="text" name="nicu_admission" class="form-control form-control-sm" > -->
                       <select id="nicu_admission" name="nicu_admission" class="form-control form-control-sm">
                         <option value="">- Pilih -</option>
                         <option value="Ya">Ya</option>
                         <option value="Tidak">Tidak</option>
                         <option value="Tidak tahu">Tidak tahu</option>
                       </select>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="modal-footer border-top">
                 <button type="reset" class="btn btn-prenatal-grey">Batal</button>
                 <button type="button" class="btn btn-prenatal-orange add-neonatal">Simpan</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
  </div>
</div>

<!-- Modal Identitas -->
<div class="modal fade" id="editIdentitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Identitas</h5>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Menstruasi</h5>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Penyakit</h5>
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

<?php function codeScripts(){ ?>
  <script src="../assets/js/add_delivery_outcome.js" charset="utf-8"></script>
  <script type="text/javascript">
  let lineNo = 1;
  $(".add-persalinan").click(function () {
      $("#tableShowPersalinan").removeClass("d-none");
      const berat_lahir_b       = $("#berat_lahir_b").val();
      const panjang_lahir_b     = $("#panjang_lahir_b").val();
      const lingkar_kepala_bayi = $("#lingkar_kepala_bayi").val();
      const jenis_kelamin       = $("#jenis_kelamin").val();

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+berat_lahir_b+"' name='berat_lahir_b[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+panjang_lahir_b+"' name='panjang_lahir_b[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+lingkar_kepala_bayi+"' name='lingkar_kepala_bayi[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+jenis_kelamin+"' name='jenis_kelamin[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_persalinan").append(td_add);
      $("#delivery_persalinan").modal('hide');
      $("#formShowPersalinan")[0].reset();
      lineNo++;
  });
  $(".add-neonatal").click(function () {
    var kjaArray = [];
    $.each($("#komplikasi_janin_antepartum:checked"), function(){
        kjaArray.push($(this).val());
        // kjaArray.join(";");
        // console.log(kjaArray);
    });
      $("#tableShowNeonatal").removeClass("d-none");
      const as_1                        = $("#as_1").val();
      const as_5                        = $("#as_5").val();
      const butuh_cpap_mixsafe          = $("#butuh_cpap_mixsafe").val();
      const asfiksia                    = $("#asfiksia").val();
      const rds                         = $("#rds").val();
      const sepsis                      = $("#sepsis").val();
      const kelainan_bawaan             = $("#kelainan_bawaan").val();
      const jenis_kelainan_bawaan       = $("#jenis_kelainan_bawaan").val();
      const kondisi_bayi_lahir          = $("#kondisi_bayi_lahir").val();
      // const komplikasi_janin_antepartum = $("#komplikasi_janin_antepartum").val();
      const lama_rawat_nicu             = $("#lama_rawat_nicu").val();
      const nicu_admission              = $("#nicu_admission").val();

      td_add  = "<tr>";
      td_add += "<td><a href='javascript:void(0);' class='remCF'><i class='fas fa-trash text-danger'></i></a></td>";
      td_add += "<td>" + lineNo + "</td>";
      td_add += "<td><input value='"+as_1+"' name='as_1[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+as_5+"' name='as_5[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+butuh_cpap_mixsafe+"' name='butuh_cpap_mixsafe[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+asfiksia+"' name='asfiksia[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+rds+"' name='rds[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+sepsis+"' name='sepsis[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+kelainan_bawaan+"' name='kelainan_bawaan[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+jenis_kelainan_bawaan+"' name='jenis_kelainan_bawaan[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+kondisi_bayi_lahir+"' name='kondisi_bayi_lahir[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+kjaArray+"' name='komplikasi_janin_antepartum[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+lama_rawat_nicu+"' name='lama_rawat_nicu[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "<td><input value='"+nicu_admission+"' name='nicu_admission[]' type='text' class='form-control-plaintext form-control-sm'></td>";
      td_add += "</tr>";

      $("table #td_neonatal").append(td_add);
      $("#delivery_neonatal").modal('hide');
      $("#formShowNeonatal")[0].reset();
      lineNo++;
  });
  $("#tableShowPersalinan, #tableShowNeonatal").on('click','.remCF',function(){
    $(this).parent().parent().remove();
  });
  </script>
<?php } ?>
