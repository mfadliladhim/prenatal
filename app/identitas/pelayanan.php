<?php $title ='Pelayanan';
include '../config/connection.php'; ?>
<style media="screen">
.btn {
  border-radius: 25px
}

.new {
  font-size: 12px
}

.card {
  padding: 20px;
  border: none
}

.active {
  background: #f6f7fb !important;
  border-color: #f6f7fb !important;
  color: #000 !important;
  font-size: 12px
}

.inputs {
  position: relative
}

.form-control {
  text-indent: 15px;
  border: none;
  height: 45px;
  border-radius: 0px;
  border-bottom: 1px solid #eee
}

.form-control:focus {
  color: #495057;
  background-color: #fff;
  border-color: #eee;
  outline: 0;
  box-shadow: none;
  border-bottom: 1px solid blue
}

.form-control:focus {
  color: blue
}

.inputs i {
  position: absolute;
  top: 14px;
  left: 4px;
  color: #b8b9bc
}

.star {
  height: 40px;
  width: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #eee;
  margin-right: 10px;
  border-radius: 5px
}

.time-text {
  font-size: 12px;
  color: #989898
}

.dots {
  height: 7px;
  width: 7px;
  background-color: #eee;
  display: flex;
  border-radius: 50%;
  margin-left: 7px;
  margin-right: 7px
}

.yellow {
  color: #ffab2e
}

.content-text-1 {
  height: 40px;
  width: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #ffe7cc;
  color: #ffa03a;
  font-weight: 700
}

.blue {
  color: #6ecce6
}

.content-text-2 {
  height: 40px;
  width: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #e2f5fa;
  color: #6ecce6;
  font-weight: 700
}

.dark-blue {
  color: #572ce8
}

.content-text-3 {
  height: 40px;
  width: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #572ce86b;
  color: #572ce8;
  font-weight: 700
}
</style>
<!-- Header -->
<div class="container-fluid mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-7">
      <div class="card mt-5">
        <div class="card-body p-0">
          <div class="d-flex justify-content-between align-items-center"> <span class="font-weight-bold">Cari Pasien</span>
              <div class="d-flex flex-row">
                <!-- <button class="btn btn-primary mr-2 active">Active</button>  -->
                <a href="?p=add_identitas" class="btn btn-prenatal-orange new"><i class="fa fa-plus"></i> Baru</a>
              </div>
          </div>
          <!-- <form class="" action="index.html" method="post"> -->
            <div class="mt-3 inputs"> <i class="fa fa-search"></i> <input id="search" type="text" class="form-control " placeholder="Cari menggunakan no rm..."> </div>
          <!-- </form> -->
          <div class="" id="tampil">

          </div>
          <!-- <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-square blue"></i></span>
                      <div class="d-flex flex-column"> <span>Developing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Developing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 25 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-2">05</span>
              </div>
          </div> -->
          <!-- <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-moon-o dark-blue"></i></span>
                      <div class="d-flex flex-column"> <span>Developing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Developing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 25 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-3">05</span>
              </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>
</div>
<?php function codeScripts(){ ?>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#search').on('keyup', function() {
          $.ajax({
              type: 'POST',
              url: 'identitas/search_layanan.php',
              data: {
                  search: $(this).val()
              },
              cache: false,
              success: function(data) {
                  $('#tampil').html(data);
              }
          });
      });
  });
  </script>
<?php } ?>
