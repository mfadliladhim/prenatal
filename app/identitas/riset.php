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
  /* background: #f6f7fb !important; */
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
    <div class="col-md-10">
      <div class="card mt-5">
        <div class="card-body p-0">
          <div class="d-flex justify-content-between align-items-center"> <span class="font-weight-bold">Export Data Pasien</span>
              <div class="d-flex flex-row">
                <!-- <button class="btn btn-primary mr-2 active">Active</button>  -->

                <!-- <a href="?p=add_identitas" class="btn btn-primary new"><i class="fa fa-plus"></i> Baru</a> -->
              </div>
          </div>
          <form class="" action="../controller/export_excel.php" method="post">
            <div class="mt-3 inputs">
              <div class="row">
                <div class="col-md-5">
                  <select class="form-control" name="">
                    <option value="">Nama Form</option>
                    <option value="all">Semua Form</option>
                    <option value="skrining">Skrining</option>
                    <option value="delivery_outcome">Delivery Outcome</option>
                    <option value="usg_trimester">USG TRimester</option>
                    <!-- <option value="skrining">Skrining</option> -->
                  </select>
                </div>
                <div class="col-md-5">
                  <select class="form-control" name="">
                    <option value="all">Nama Field</option>
                    <option value="all">Semua Field</option>
                    <option value="skrining">Skrining</option>
                    <option value="delivery_outcome">Delivery Outcome</option>
                    <option value="usg_trimester">USG TRimester</option>
                    <!-- <option value="skrining">Skrining</option> -->
                  </select>
                </div>
                <div class="col-md-2">
                  <a href="../controller/export_excel.php" class="btn btn-success btn-block">Export</a>
                </div>
              </div>

              <!-- <i class="fa fa-search"></i> -->
              <!-- <input type="text" class="form-control " placeholder="Cari menggunakan no rm..."> -->
            </div>
          </form>
          <!-- <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-star yellow"></i></span>
                      <div class="d-flex flex-column"> <span>Marketing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Marketing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 15 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-1">BA</span>
              </div>
          </div>
          <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-square blue"></i></span>
                      <div class="d-flex flex-column"> <span>Developing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Developing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 25 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-2">05</span>
              </div>
          </div>
          <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-moon-o dark-blue"></i></span>
                      <div class="d-flex flex-column"> <span>Developing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Developing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 25 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-3">05</span>
              </div>
          </div>
          <div class="mt-3">
              <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex flex-row align-items-center"> <span class="star"><i class="fa fa-star yellow"></i></span>
                      <div class="d-flex flex-column"> <span>Marketing</span>
                          <div class="d-flex flex-row align-items-center time-text"> <small>Marketing</small> <span class="dots"></span> <small>viewed Just now</small> <span class="dots"></span> <small>Edited 15 minutes ago</small> </div>
                      </div>
                  </div> <span class="content-text-1">BA</span>
              </div>
          </div> -->

        </div>
      </div>
    </div>
  </div>
</div>
<?php function codeScripts(){ ?>
<?php } ?>
