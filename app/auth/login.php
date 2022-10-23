<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dibuat menggunakan bootstrap 4.">
  <meta name="author" content="Timku">
  <title>Prenatal | Login</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.min.css" type="text/css">
  <style media="screen">
    .bg-prenatal-orange {
      background-color: #ef9814;
    }
    .bg-prenatal-black {
      background-color: #313435;
    }
    .fill-prenatal-orange {
      fill: #ef9814;
    }
    .fill-prenatal-black {
      fill: #313435;
    }
    .btn-prenatal-orange {
      background-color: #ef9814;
      color: #fff;
      border-color: #ef9814;
      box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
    }
    .btn-prenatal-orange:hover {
      color: #ffffff;
    }
    .page-header-image {
    z-index: 1!important;
    }
    .page-header-image {
        /* position: absolute; */
        background-size: cover;
        background-position: 50%;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
    /* .login-logo {} */
    /* .page-header {
        min-height: 100vh;
        max-height: 999px;
        padding: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
    } */
  </style>
</head>

<!-- <body style="background-image: url('assets/img/theme/login-style.png');" class="bg-prenatal-black position-relative page-header-image"> -->
<body class="bg-prenatal-black position-relative page-header-image">
  <!-- <div class="page-header-image" ></div> -->
  <!-- Navbar -->
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <!-- <div class="header bg-prenatal-orange py-7 py-lg-8 pt-lg-9">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-prenatal-black" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div> -->
    <!-- Page content -->
    <div class="container pt-8">

      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="card-group">
            <div class="card">
              <!-- <img src="..." class="card-img-top" alt="..."> -->
              <div class="card-body pt-6 pb-5 px-5">
                <h1 class="card-title text-center">Login</h1>
                <form action="controller/AuthController.php?a=cek_user" method="post">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input name="username" class="form-control" placeholder="Username" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input name="password" class="form-control" placeholder="Password" type="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-prenatal-orange mt-4 mb-1">Sign in</button>
                  </div>
                </form>
              </div>
              <!-- <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div> -->
            </div>
            <div class="card shadow-none bg-prenatal-orange">
              <!-- <img src="..." class="card-img-top" alt="..."> -->
              <div class="card-body text-center pt-5">
                <img style="max-width:75%;height: auto;" src="assets/img/theme/prenatal-logo.png" alt="">
              </div>
              <!-- <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/js-cookie/js.cookie.js"></script> -->
  <!-- <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script> -->
  <!-- <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> -->
  <!-- Argon JS -->
  <!-- <script src="assets/js/argon.min23cd.js?v=1.2.1"></script> -->
  <!-- Demo JS - remove this in your project -->
  <!-- <script src="assets/js/demo.min.js"></script> -->
</body>
</html>
