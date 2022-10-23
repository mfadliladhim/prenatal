<?php $title ='Dashboard'; ?>
<!-- Header -->
<div style="min-height:500px;" class="container-fluid mt-5">
  <!-- Table -->
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card bg-transparent shadow-none">
        <div class="card-body text-center">
          <!-- <img style="width: 20%" src="../assets/img/brand/logo-polisi.png" alt=""> -->
          <h1 class="mt-1 mb-1">Selamat Datang <?php echo $_SESSION['fullname']; ?></h1>

        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h3 class="text-center">Pelayanan</h3>
          <p class="card-text text-center">Fitur untuk menambahkan pasien baru.</p>
          <a href="?p=pelayanan" class="stretched-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h3 class="text-center">Riset</h3>
          <p class="card-text text-center">Fitur untuk mendapatkan data yang sesuai dengan kebutuhan penelitian.</p>
          <a href="?p=riset" class="stretched-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center">
          <h3 class="text-center">Pengaturan</h3>
          <p class="card-text text-center">Fitur khusus admin.</p>
          <a href="?p=identitas" class="stretched-link"></a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
<?php } ?>
