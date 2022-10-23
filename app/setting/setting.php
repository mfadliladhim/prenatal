<?php $title ='Data Pasien';
include '../config/connection.php'; ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-dark d-inline-block mb-0">Pengaturan</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-light">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Skrining</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Pengaturan Option</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Komplikasi Ibu Antepartum</h3>
            </div>
            <div class="col text-right">
              <a href="?p=add_identitas" class="btn btn-sm btn-warning">Add</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabelIdentitas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis komplikasi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM option_komplikasi_ibu_antepartum LIMIT 3"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_kia']; ?></td>
                    <td align='center'>
                      <a class="p-1 text-info" href="#"><i class="fas fa-pencil-alt fa-lg"></i></a>
                      <a class="p-1 text-danger" href="#"><i class="far fa-trash-alt fa-lg"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Komplikasi Ibu Intrapartum</h3>
            </div>
            <div class="col text-right">
              <a href="?p=add_identitas" class="btn btn-sm btn-warning">Add</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabelIdentitas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis komplikasi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM option_komplikasi_ibu_intrapartum LIMIT 3"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_kii']; ?></td>
                    <td align='center'>
                      <a class="p-1 text-info" href="#"><i class="fas fa-pencil-alt fa-lg"></i></a>
                      <a class="p-1 text-danger" href="#"><i class="far fa-trash-alt fa-lg"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Komplikasi Ibu Postpartum</h3>
            </div>
            <div class="col text-right">
              <a href="?p=add_identitas" class="btn btn-sm btn-warning">Add</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabelIdentitas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis komplikasi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM option_komplikasi_ibu_postpartum LIMIT 3"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_kip']; ?></td>
                    <td align='center'>
                      <a class="p-1 text-info" href="#"><i class="fas fa-pencil-alt fa-lg"></i></a>
                      <a class="p-1 text-danger" href="#"><i class="far fa-trash-alt fa-lg"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Komplikasi Janin Antepartum</h3>
            </div>
            <div class="col text-right">
              <a href="?p=add_identitas" class="btn btn-sm btn-warning">Add</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabelIdentitas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis komplikasi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM option_komplikasi_janin_antepartum LIMIT 3"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_kja']; ?></td>
                    <td align='center'>
                      <a class="p-1 text-info" href="#"><i class="fas fa-pencil-alt fa-lg"></i></a>
                      <a class="p-1 text-danger" href="#"><i class="far fa-trash-alt fa-lg"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Gejala Dirasakan</h3>
            </div>
            <div class="col text-right">
              <a href="?p=add_identitas" class="btn btn-sm btn-warning">Add</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabelIdentitas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis Gejala</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM option_gejala_dirasakan LIMIT 3"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_gd']; ?></td>
                    <td align='center'>
                      <a class="p-1 text-info" href="#"><i class="fas fa-pencil-alt fa-lg"></i></a>
                      <a class="p-1 text-danger" href="#"><i class="far fa-trash-alt fa-lg"></i></a>
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
</div>
<?php function codeScripts(){ ?>
<?php } ?>
