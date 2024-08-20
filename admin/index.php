<?php
session_start();
?>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
        <meta name="description" content="" />

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/favicon.ico" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>

    <script src="./assets/js/config.js"></script>
  </head>                                             

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="../index.php" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  <img src="../assets/img/123.png" alt class="w-px-50 h-auto rounded-" />
                  </span>
                  <br/><span class="app-brand-text demo text-body fw-bolder">MRP Quiz</span>
                </a>
              </div>
              <!-- /Logo -->
            
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Quiz</h4>
                        <p class="mb-4">Welcome to our school quiz admin portal</p>
              <!-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p> -->

              <form id="formAuthentication" class="mb-3" action="login_crud.php" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your email"
                    autofocus
                    
                    required
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                                    </div>
                  <div class="input-group input-group-merge">
                  <input
        type="password"
        id="password"
        class="form-control"
        name="password"
       
        aria-describedby="password"
     
       
        required
      />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> -->
                <div class="mb-3">
                  <input class="btn btn-primary d-grid w-100" type="submit" Value="Sign in">
                </div>
              </form>
              <div id="error-message" style="color: red; display: none;">Invalid User ID (or) password</div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
