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
  .page-header {
    min-height: 100vh;
    max-height: 999px;
    padding: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
  }
  .page-header, header {
    position: relative;
  }
  .page-header, .section-hero {
    overflow: visible!important;
  }
  </style>
</head>

<body class="register-page">

  <div class="wrapper">
    <div class="page-header bg-default">
      <div class="page-header-image" style="background-image: url('../assets/img/ill/register_bg.png');"></div>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <form action="javascript:;">
            <h2>Create Account</h2>
            <div class="social-container">
              <button type="button" class="btn btn-facebook btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
              </button>
              <button type="button" class="btn-instagram btn btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
              </button>
              <button type="button" class="btn btn-twitter btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
              </button>
            </div>
            <span class="text-default mb-4">or use your email for registration</span>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                </div>
                <input class="form-control" placeholder="Name" type="text">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" type="email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password">
              </div>
            </div>
            <button class="btn btn-primary">Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in-container">
          <form action="#" role="form">
            <h2>Sign in</h2>
            <div class="social-container">
              <button type="button" class="btn btn-facebook btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
              </button>
              <button type="button" class="btn-instagram btn btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-instagram"></i></span>
              </button>
              <button type="button" class="btn btn-twitter btn-sm">
                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
              </button>
            </div>
            <span class="text-default mb-4">or use your account</span>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" type="email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Password" type="password">
              </div>
            </div>
            <a href="javascript:;">Forgot your password?</a>
            <button class="btn btn-primary mt-3">Sign In</button>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1 class="text-white">Welcome Back!</h1>
              <p>
                To keep connected with us please login with your personal info
              </p>
              <button class="btn btn-neutral btn-sm" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1 class="text-white">Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="btn btn-neutral btn-sm" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      // The SignUp/SignIn form

      const signUpButton = document.getElementById('signUp');
      const signInButton = document.getElementById('signIn');
      const container = document.getElementById('container');

      signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
      });

      signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
      });
    </script>
    <footer class="footer">
      <div class="container">
        <div class="row row-grid align-items-center mb-5">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
            <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
          </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <button target="_blank" href="https://twitter.com/creativetim" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
            </button>
            <button target="_blank" href="https://www.facebook.com/CreativeTim/" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
              <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
            </button>
            <button target="_blank" href="https://dribbble.com/creativetim" rel="nofollow" class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
            </button>
            <button target="_blank" href="https://github.com/creativetimofficial" rel="nofollow" class="btn btn-icon-only btn-github rounded-circle" data-toggle="tooltip" data-original-title="Star on Github">
              <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
            </button>
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2020 <a href="" target="_blank">Creative Tim</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
