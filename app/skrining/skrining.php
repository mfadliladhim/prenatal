<?php $title ='Skrining'; ?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Skrining 11-13 Minggu</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Skrining</a></li>
              <li class="breadcrumb-item active" aria-current="page">Skrining 11-13 Minggu</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <!-- Table -->
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h3 class="mb-0">Data Skrining</h3>
            </div>
            <div class="col-6 text-right">
              <a href="../controller/export_excel.php" class="btn btn-sm btn-success btn-round btn-icon">
                <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                <span class="btn-inner--text">Export</span>
              </a>
              <a href="?p=add_skrining" class="btn btn-sm btn-primary btn-round btn-icon">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                <span class="btn-inner--text">Tambah</span>
              </a>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="example">
            <thead class="thead-light">
              <tr>
                <!-- <th>No</th> -->
                <th>#</th>
                <th>Nama</th>
                <th>No RM</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>No HP</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Usia Kehamilan</th>
                <th>Taksiran Persalinan</th>
                <th>Pemeriksa</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              $query = $connection->query("SELECT * FROM skrining"); ?>
              <?php foreach ($query as $key => $value): ?>
                <tr>
                  <td>
                    <!-- <div class="custom-control custom-checkbox">
                      <input value="1" name="checkbox_id" class="custom-control-input" id="customCheck<?php //echo $value['id']; ?>" type="checkbox">
                      <label class="custom-control-label" for="customCheck<?php //echo $value['id']; ?>"></label>
                    </div> -->
                    <?php echo $no++; ?>
                  </td>
                  <td><?php echo $value['nama']; ?></td>
                  <td><?php echo $value['no_rm']; ?></td>
                  <td><?php echo date_format(date_create($value['tanggal_lahir']),'d M Y'); ?></td>
                  <td><?php echo usia($value['tanggal_lahir']); ?></td>
                  <td><?php echo $value['no_hp']; ?></td>
                  <td><?php echo date_format(date_create($value['tanggal_pemeriksaan']),'d M Y H:i'); ?></td>
                  <td><?php echo $value['usia_kehamilan_out']; ?></td>
                  <?php
                  if ($value['usia_kehamilan_berdasarkan'] == 'CRL') {
                    $coba6 = $value['usia_kehamilan_in']/10;
                    $coba5 = 1.684969+(0.315646*$coba6)-(0.049306*(pow($coba6,2)))+(0.004057*(pow($coba6,3)))-(0.000120456*(pow($coba6,4)));
                    $coba4 = pow(2.71828183,$coba5);
                    $coba3 = round($coba4*7);
                    $coba2 = 280-$coba3;
                    $taksiran_persalinan = date('d M Y', strtotime('+'.$coba2.' days', strtotime($value['tanggal_pemeriksaan'])));
                  } elseif ($value['usia_kehamilan_berdasarkan'] == 'HPHT') {
                    $rumus = 263;
                    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($value['usia_kehamilan_in'])));
                  } elseif ($value['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 3') {
                    $rumus = 261;
                    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($value['usia_kehamilan_in'])));
                  } elseif ($value['usia_kehamilan_berdasarkan'] == 'Tanggal Transfer Embrio Hari Ke 5') {
                    $rumus = 280;
                    $taksiran_persalinan = date('d M Y', strtotime('+'.$rumus.' days', strtotime($value['usia_kehamilan_in'])));
                  } ?>
                  <td><?php echo $taksiran_persalinan; ?></td>
                  <td><?php echo $value['pemeriksa']; ?></td>
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
        <!-- <div style="bottom:0; margin-bottom:90px" class="px-4 d-flex flex-row align-items-center position-absolute">
          <div class="mr-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="selectAll" type="checkbox">
              <label class="custom-control-label" for="selectAll">Pilih Semua</label>
            </div>
          </div>
          <div>
            <button id="broadcast_message" class="btn btn-sm btn-info btn-round btn-icon" disabled>
              <span class="btn-inner--icon"><i class="fas fa-paper-plane"></i></span>
              <span class="btn-inner--text">Pesan Siaran</span>
            </button>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>

<?php function codeScripts(){ ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $("select.message_type").change(function(){
      var reason = $(this).children("option:selected").val();
      $('.message_type_add').val(reason);
    });
    $('#selectAll').click(function() {
      $('input[type="checkbox"]').prop('checked', this.checked);
      if($(this).prop("checked") == true){
          $('#broadcast_message').prop('disabled', false);
      }
      else if($(this).prop("checked") == false){
          $('#broadcast_message').prop('disabled', true);
      }
    });
    var $checkboxes = $('input[type="checkbox"]');
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes > 1){
          $('#broadcast_message').prop('disabled', false);
        } else {
          $('#broadcast_message').prop('disabled', true);
        }
        // console.log(countCheckedCheckboxes);
    });
    $('#broadcast_message').click(function() {
      var favorite = [];
      $.each($("input[name='checkbox_id']:checked"), function(){
          favorite.push($(this).val());
      });
      console.log(favorite);
      $('#modal-send-all').modal('show');
      // alert("My favourite sports are: " + favorite.join(", "));
    });

  });
  $(document).on('click','.print',function(e) {
		var url     = $(this).attr("data-url");
    var origin  = window.location.origin;
    window.open(origin+url,"_blank","toolbar,scrollbars,resizable,top=50,left=150,width=1000,height=600");
	});
  // $('#modal-print').on( "click", function(e) {
  //     var url     = $(this).attr("data-url");
  //     var origin  = window.location.origin;
  //     window.open(origin+url,"_blank","toolbar,scrollbars,resizable,top=50,left=250,width=800,height=600");
  // });
  </script>
<?php } ?>
