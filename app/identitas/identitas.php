<?php $title ='Data Pasien';
include '../config/connection.php'; ?>

<!-- Header -->
<div class="header">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-dark d-inline-block mb-0">Identitas Pasien</h6>
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
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Data Identitas</h3>
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
                  <th>No RM</th>
                  <th>Nama Lengkap</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $query = $connection->query("SELECT * FROM identitas"); ?>
                <?php foreach ($query as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['no_rm']; ?></td>
                    <td><a href="?p=detail_identitas&id=<?= $value['identitas_id']; ?>"><?= $value['nama_ibu']; ?></a></td>
                    <td><?= $value['telepon_ibu']; ?></td>
                    <td><?= $value['alamat']; ?></td>
                  </tr>
                <?php endforeach; ?>
                <!-- <tr>
                  <td>11</td>
                  <td> <a href="?p=detail_identitas">M Fadlil Adhim</a> </td>
                  <td>11</td>
                  <td>11</td> -->
                  <!-- <td width="10%">
                    <button data-url="/kosambi-admin/app/skrining/print_skrining.php?id=<?php //echo $value['id']; ?>" id="modal-print" class="btn btn-transparent btn-sm print m-0"><i class="fas fa-print text-primary fa-lg"></i></button>
                    <a class="btn btn-transparent btn-sm mr-0" href="?p=edit_skrining&id=<?php //echo $value['id']; ?>"><i class="fas fa-pencil-alt text-success fa-lg"></i></a>
                    <a class="btn btn-transparent btn-sm mr-0" href="#" data-toggle="modal" data-target="#modal-delete" data-url="../controller/SkriningController.php?a=delete_skrining&id=<?php //echo $value['id']; ?>" data-message="Hapus data skrining <?php //echo $value['nama']; ?>"><i class="fas fa-trash-alt text-danger fa-lg"></i></a>
                  </td> -->
                <!-- </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php function codeScripts(){ ?>
  <script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tabelIdentitas').DataTable( {
      // keys: !0,
      // select: {
      //   style: "multi"
      // },
      language: {
        paginate: {
          previous: "<i class='fas fa-angle-left'>",
          next: "<i class='fas fa-angle-right'>"
        }
      }
    })
  });
  </script>
<?php } ?>
