<?php
session_start();
if ($_SESSION['status'] == '') {
  header('location:../');
} else {
include '../config/connection.php';
include '../config/function.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dibuat menggunakan bootstrap 4.">
  <meta name="author" content="Timku">

  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> -->
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="../assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.dataTables.min.css"> -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.min.css" type="text/css">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> -->
  <style>
  /* Ensure that the demo table scrolls */
  /* th, td { white-space: nowrap; } */
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

  body {
    /* background-color: #eee; */
    font-family: "Poppins", sans-serif;
    font-weight: 300
  }
  .text-prenatal-y {
    color: #fb6340!important;
  }
  .bg-prenatal-g {
    background-color: #172b4d!important;
  }
  .form-none-border {
    padding-top: calc(.625rem + 1px);
    padding-bottom: calc(.625rem + 1px);
  }
  div.DTFC_RightWrapper table.dataTable.no-footer {
      margin-bottom: 0 !important;
  }
  div.DTFC_RightWrapper div.DTFC_RightBodyLiner table.dataTable.no-footer {
      margin-top: 1px !important;
      background-color: white;
  }
  .form-map {
    width: 70%;
  }
  .table-map {
    width:350px;
    font-size: 14px;
  }
  .table-map td {
    padding: 4px;
  }
  .riwayat {
    width: 100%;
  }
  .riwayat th {
    padding: 2px 5px;
    font-size: 12.5px;
  }
  .riwayat td {
    padding-top: 5px;
    padding-bottom: 5px;
  }
  .bootstrap-datetimepicker-widget {
    z-index: 9999 !important;

  }
  /* .table-no-wrap {
    border-collapse: collapse; */
    /* width: 100%; */
  /* } */
  .table-no-wrap th, .table-no-wrap td {
    /* width: auto;
    min-width: 0; */
    /* max-width: 200px; */
    /* display: inline-block; */
    /* overflow: hidden; */
    /* text-overflow: ellipsis; */
    border: 1px solid #ddd;
    text-align: center;
    font-size: 14px;
    padding: 5px 7px;
    white-space: nowrap;
  }
  .form-check {
    /* font-size: 13px; */
  }
  .no-border {
      border: 0;
      box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
  }
  .dataTables_info, .dataTables_length, .dt-buttons {
    padding-left: 0;
  }
  .dataTables_filter {
    /* display: inline-block;
    float: right; */
    padding-right: 0;
  }
  .list-group > a.active {
    /* background-color: #313435;
    border: 1px solid #313435; */
    background-color: #ef9814;
    border: none;
    /* color: #ffffff; */
  }
  .list-group > a.active h5 {
    color: #ffffff;
  }
  .list-group-item {
      border-top: 1px solid #e9ecef;
      border-bottom: 1px solid #e9ecef;
      border-left: none;
      border-right: none;
  }
  .bg-prenatal-orange {
    background-color: #ef9814;
  }
  .bg-prenatal-black {
    background-color: #313435;
  }
  .text-prenatal-orange {
    color: #ef9814;
  }
  .btn-prenatal-orange {
    background-color: #ef9814;
    color: #fff;
    border-color: #ef9814;
    box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
  }
  .btn-prenatal-grey {
    background-color: #dfdfdf;
    color: #525f7f;
    border-color: #dfdfdf;
    box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
  }
  .btn-prenatal-grey:hover {
    color: #525f7f;
  }
  .btn-prenatal-orange:hover {
    color: #ffffff;
  }
  .btn-outline-prenatal-orange {
    color: #ef9814;
    border-color: #ef9814;
    background-color: transparent;
    background-image: none;
  }
  .btn-outline-prenatal-orange:hover {
    color: #fff;
    border-color: #ef9814;
    background-color: #ef9814;
  }
  .list-group-item:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .select2-container .select2-selection--single {
      height: 43px;
  }
  .form-control-none {
    /* font-size: .875rem; */
    font-weight: 400;
    font-size: .875rem;
    transition: all .15s ease-in-out;
    /* line-height: 1.5; */
    display: block;
    width: 100%;
    /* height: calc(1.5em + 1.25rem + 2px);
    padding: 0.625rem 0.75rem; */
    /* transition: all .15s cubic-bezier(.68,-.55,.265,1.55); */
    color: #8898aa;
    border: 1px solid #dee2e6;
    /* border-bottom: 1px solid #e9ecef!important; */
    /* border-radius: 0.25rem; */
    background-color: #fff;
    background-clip: padding-box;
    /* box-shadow: 0 3px 2px rgba(233,236,239,.05); */
  }
  /* .form-control-sm {
    font-size: .875rem;
  } */
  .form-control-plaintext {
    border-radius: 0;
  }
  .form-control-plaintext:focus {
    outline: none;
    border-bottom-color: #5e72e4 !important;
  }
  .table-custom td, .table-custom th {
    padding: 0.5rem !important;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
  }
  .focused .form-control {
    border-color: #ef9814;
  }
  </style>
</head>

<body>
  <!-- Sidenav -->
  <?php include 'partials/sidenav.php'; ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include 'partials/topnav.php'; ?>

    <!-- Page content -->
      <?php
      if (empty($_GET['p'])) {
       include 'dashboard.php';
      } else {
       switch ($_GET['p']) {
         case 'dashboard':
           include 'dashboard.php';
           break;
         //
         // case 'setting':
         //   include 'setting.php';
         //   break;

         case 'pelayanan':
           include 'identitas/pelayanan.php';
           break;

         case 'riset':
           include 'identitas/riset.php';
           break;

         case 'skrining':
           include 'skrining/skrining.php';
           break;

         case 'export_excel':
           include 'controller/export_ecxel.php';
           break;

         case 'identitas':
           include 'identitas/identitas.php';
           break;

         case 'add_identitas':
           include 'identitas/add_identitas.php';
           break;

         case 'detail_identitas':
           include 'identitas/detail_identitas.php';
           break;

         case 'add_skrining':
           include 'skrining/add_skrining.php';
           break;

         case 'detail_skrining':
           include 'skrining/detail_skrining.php';
           break;

         case 'edit_skrining':
          include 'skrining/edit_skrining.php';
           break;

         case 'delivery_outcome':
           include 'delivery/delivery_outcome.php';
           break;

         case 'add_delivery':
           include 'delivery/add_delivery_outcome.php';
           break;

         case 'trimester':
           include 'trimester/trimester.php';
           break;

         case 'add_trimester':
           include 'trimester/add_trimester.php';
           break;

         case 'setting':
           include 'setting/setting.php';
           break;

         case 'nyoba':
           include 'skrining/nyoba.php';
           break;

         default:
           // code...
           break;
       }
      }
      ?>
      <title>Prenatal - <?php echo $title; ?></title>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="message-text"></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body py-0">
          <small class="mb-0">Anda yakin ingin menghapus data ini!</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
          <a id="urlDelete" href="" class="btn btn-primary btn-sm">Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal delete -->
  <div class="modal fade" id="ConfirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body py-0">
          <p class="my-0">Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a id="add_url_delete" href="" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>

  <script src="../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../assets/vendor/moment.min.js"></script>
  <script src="../assets/vendor/bootstrap-datetimepicker.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js" charset="utf-8"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js" charset="utf-8"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

  <!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js" charset="utf-8"></script> -->
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script> -->
  <!-- <script src="../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script> -->
  <!-- Argon JS -->
  <script src="../assets/js/argon.min.js"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="../assets/js/demo.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../assets/js/notifikasi.js" charset="utf-8"></script>
  <?php codeScripts(); ?>

  <script type="text/javascript">
  $(document).ready( function () {
    $('.select-basic-single').select2();
    $('#ConfirmDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var url = button.data('url')
      var modal = $(this)
      modal.find('#add_url_delete').attr("href", url);
    });
    $('#tanggal_lahir').on('change', function() {
        var dateBaru = new Date(this.value);
        var today = new Date();
        var age = Math.floor((today-dateBaru) / (365.25 * 24 * 60 * 60 * 1000));
        $('#usia').val(age);
        console.log(age);
    });
    $('#modal-delete').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget)
      var url     = button.data('url')
      var message = button.data('message')
      var modal   = $(this)
      modal.find('#urlDelete').attr("href", url)
      modal.find('#message-text').text(message)
    }),

    $("#mom_plgf").keyup(function() {
      var mom_plgf       = parseFloat($("#mom_plgf").val());
      var final_mom_plgf = mom_plgf/49.82;

      $("#final_mom_plgf").text('('+final_mom_plgf.toFixed(3)+' MoM)');
    }),
    $("#uterina_kiri, #uterina_kanan").keyup(function() {
      const uterina_kiri          = parseFloat($("#uterina_kiri").val());
      const uterina_kanan         = parseFloat($("#uterina_kanan").val());
      const mean_utpi             = ((uterina_kanan+uterina_kiri)/2);
      const mom_mean_utpi         = mean_utpi/1.76;

      // if (mean_utpi % 1 != 0 && mom_mean_utpi % 1 != 0) {
        $("#mean_utpi").val(mean_utpi.toFixed(3));
        // $("#mom_mean_utpi").text('('+mom_mean_utpi.toFixed(3)+' MoM)');
      // } else {
        // $("#mean_utpi").val(mean_utpi);
        $("#mom_mean_utpi").text('('+mom_mean_utpi.toFixed(3)+' MoM)');
      // }
    }),
    $("#psv1, #psv2").keyup(function() {
      var psv1  = parseFloat($("#psv1").val());
      var psv2  = parseFloat($("#psv2").val());
      var pr_ophtalmica     = psv2/psv1;
      var mom_pr_ophtalmica = pr_ophtalmica/0.56;

      // if (pr_ophtalmica % 1 != 0 && mom_pr_ophtalmica % 1 != 0) {
        $("#pr_ophtalmica").val(pr_ophtalmica.toFixed(3));
        // $("#mom_pr_ophtalmica").text('('+mom_pr_ophtalmica.toFixed(3)+' MoM)');
      // } else {
        // $("#pr_ophtalmica").val(pr_ophtalmica);
        $("#mom_pr_ophtalmica").text('('+mom_pr_ophtalmica.toFixed(3)+' MoM)');
      // }
    }),
    $('.dropdown-menu.dropdown-map').on('click', function (e) {
      e.stopPropagation();
    }),
    // $("#usia_kehamilan_berdasarkan, #hpht").on("change",
    //   (e) => {
    //     e.preventDefault();
    //
    // }),
    $("#usia_kehamilan_berdasarkan").on("change",
      (e) => {
      e.preventDefault();
      const usia_kehamilan_berdasarkan   = parseFloat($("#usia_kehamilan_berdasarkan").val()); // belum
      if (usia_kehamilan_berdasarkan == 1) {
        $("#crlForm").show();
        $("#crlForm2, #crlForm3").show();
        $("#hphtForm, #hariKe3Form, #hariKe5Form").hide();
        $('#crl, #hari_ke_3, #hari_ke_5').val('');
        $('#crl').attr("name", "usia_kehamilan_in");
        $('#hpht, #hari_ke_3, #hari_ke_5').removeAttr("name");
      } else if (usia_kehamilan_berdasarkan == 2) {
        $("#hphtForm").show();
        $("#crlForm, #crlForm2, #crlForm3, #hariKe3Form, #hariKe5Form").hide();
        $("#crl, #hari_ke_3, #hari_ke_5").val('');
        $("#hpht").attr("name", "usia_kehamilan_in");
        $("#crl, #hari_ke_3, #hari_ke_5").removeAttr("name");
        hitung_hpht();
      } else if (usia_kehamilan_berdasarkan == 3) {
        $("#hariKe3Form").show();
        $("#hphtForm, #crlForm, #crlForm2, #crlForm3, #hariKe5Form").hide();
        $("#crl, #hari_ke_3, #hari_ke_5").val('');
        $("#hari_ke_3").attr("name", "usia_kehamilan_in");
        $("#crl, #hpht, #hari_ke_5").removeAttr("name");
      } else if (usia_kehamilan_berdasarkan == 4) {
        $("#hariKe5Form").show();
        $("#hphtForm, #crlForm, #crlForm2, #crlForm3, #hariKe3Form").hide();
        $("#crl, #hari_ke_3, #hari_ke_5").val('');
        $("#hari_ke_5").attr("name", "usia_kehamilan_in");
        $("#crl, #hpht, #hari_ke_3").removeAttr("name");
      }
      function hitung_hpht() {
        const str = $("#tanggal_pemeriksaan").val();
        const tanggal_Hpht = $("#hpht").val();
        // console.log(tanggal_Hpht);
        const tanggal_p = str.substring(0,10);
        const date2  = new Date(tanggal_p);
        const date1  = new Date(tanggal_Hpht);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        const rumus_1 = (Difference_In_Days);
        const rumus_2 = rumus_1/7;
        const usia_kehamilanT       = rumus_2.toString();
        const minggu_kehamilanHPHT    =  usia_kehamilanT.split(".");
        // console.log(str);
        const UsiaKehamilan_hari = (rumus_2-minggu_kehamilanHPHT[0])*7;
        const hasil = minggu_kehamilanHPHT[0]+" Minggu "+Math.round(UsiaKehamilan_hari)+" Hari";
        // console.log(hasil);
        $("#showDate").val(hasil);
        // $("#wee").val(hasil);
        // console.log(minggu_kehamilanHPHT[0]+" Minggu "+Math.round(UsiaKehamilan_hari)+" Hari");
      }
    }),
    $("#hari_ke_3").on("change",
      (e) => {
        e.preventDefault();
        const str = $("#tanggal_pemeriksaan").val();
        const tanggal_E_3 = $("#hari_ke_3").val();
        const tanggal_p = str.substring(0,10);
        const date2  = new Date(tanggal_p);
        const date1  = new Date(tanggal_E_3);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        const nilai_17 = 17;
        const rumus_1 = (Difference_In_Days)+nilai_17;
        const rumus_2 = rumus_1/7;
        const usia_kehamilanT       = rumus_2.toString();
        const minggu_kehamilanE3    =  usia_kehamilanT.split(".");
        // console.log(str);
        const UsiaKehamilan_hari = (rumus_2-minggu_kehamilanE3[0])*7;
        $("#showDate").val(minggu_kehamilanE3[0]+" Minggu "+Math.round(UsiaKehamilan_hari)+" Hari");
    }),
    $("#hari_ke_5").on("change",
      (e) => {
        e.preventDefault();
        const str = $("#tanggal_pemeriksaan").val();
        const tanggal_E_5 = $("#hari_ke_5").val();
        const tanggal_p = str.substring(0,10);
        const date2  = new Date(tanggal_p);
        const date1  = new Date(tanggal_E_5);
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        const nilai_19 = 19;
        const rumus_1 = (Difference_In_Days)+nilai_19;
        const rumus_2 = rumus_1/7;
        const usia_kehamilanT       = rumus_2.toString();
        const minggu_kehamilanE5    =  usia_kehamilanT.split(".");
        // console.log(str);
        const UsiaKehamilan_hari = (rumus_2-minggu_kehamilanE5[0])*7;
        $("#showDate").val(minggu_kehamilanE5[0]+" Minggu "+Math.round(UsiaKehamilan_hari)+" Hari");
    });

    <?php
    switch ($_GET['p']) {

      case 'edit_skrining': ?>
        $(function() {
          // $('#datetimepicker1').datetimepicker('viewDate', moment('11/21/2018', 'MM/DD/YYYY HH:MM'));
          $('#datetimepicker1').datetimepicker({
            date: '<?php echo $value1['tanggal_pemeriksaan']; ?>',
            // locale: 'ru',
            // format: 'MM/DD/YYYY HH:MM',
            icons: {
              time: "fa fa-clock",
              date: "fa fa-calendar-day",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
            }
          });
        });
        <?php break;

      case 'add_skrining':
      case 'detail_skrining': ?>
        $("#paritas").on("input",
          (e) => {
            e.preventDefault();
            const paritas = $("#paritas").val();
            if (paritas > 0) {
              $("#riwayat_hamil_peForm, #riwayat_pjtForm, #riwayat_preterm_birthForm").show();
            } else {
              $("#riwayat_hamil_peForm, #riwayat_pjtForm, #riwayat_preterm_birthForm").hide();
              $("#riwayat_hamil_pe").val('0');
              $("#riwayat_pjt").val('0');
              $("#riwayat_preterm_birth").val('0');
            }
        }),
        $(function() {
          // $('#datetimepicker1').datetimepicker('viewDate', moment('11/21/2018', 'MM/DD/YYYY HH:MM'));
          $('#datetimepicker1').datetimepicker({
            // date: '<?php// echo $hasil['tanggal_pemeriksaan']; ?>',
            // locale: 'id',
            // format: 'MM/DD/YYYY HH:MM',
            icons: {
              time: "fa fa-clock",
              date: "fa fa-calendar-day",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
            }
          });
          // $('#ui-datepicker-div').css("z-index", 9999); //this is once time work
          // $(this).datetimepicker("destroy");//this is solved my problem
        });
        <?php break;

      default:
        // code...
        break;
    }
    ?>
  });
  // $(document).ready(function() {
  //   var table = $('#example').DataTable( {
  //     scrollY:        "400px",
  //     scrollX:        true,
  //     scrollCollapse: true,
  //     fixedColumns:   {
  //         rightColumns: 1,
  //         leftColumns: 0
  //     },
  //     keys: !0,
  //     select: {
  //       style: "multi"
  //     },
  //     language: {
  //       paginate: {
  //         previous: "<i class='fas fa-angle-left'>",
  //         next: "<i class='fas fa-angle-right'>"
  //       }
  //     }
  //   });
      // $("button").click(function(){
    // $("div.row .col-sm-12 .DTFC_ScrollWrapper").after('<div class="px-4 py-4 mb-3 border-bottom"></div>'); asli
      // $("div.row .col-sm-12 .DTFC_ScrollWrapper").after("<div class='custom-control custom-checkbox'><input class='custom-control-input' id='selectAll' type='checkbox'><label class='custom-control-label' for=selectAll">Pilih Semua</label></div>");
      // });
  // });
  </script>
</body>
</html>
<?php } ?>
