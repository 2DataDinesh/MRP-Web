<?php
session_start();
error_reporting(0); 
if($_SESSION['isLOGIN'] == true ){ echo"<script>window.location.href='dashboard.php';</script>"; }
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>MRP MATRICULATION SCHOOL</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="./images/favicon-16x16.png" />
    <link rel="icon" type="image/x-icon" href="./images/favicon-32x32.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body id="main_body">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="../index.php" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="./images/mrp.png" style="width:15vh; height:15vh;">
                                </span>
                            </a>
                        </div>

                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome 👋</h4>
                        <p class="mb-4">Please sign-in to your MRP Matriculation school account </p>

                        <form id="login_form" class="mb-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter Your Email </label>
                                <input type="text" class="form-control" name="email" placeholder="Enter your email "
                                    autofocus required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="dob" class="form-control" name="password"
                                        placeholder="DD-MM-YYYY"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    let form = document.getElementById('login_form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData();
        data.append('email', form.elements['email'].value);
        data.append('dob', form.elements['dob'].value);
        data.append('submit', '');

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/login_crud.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                if (xhr.responseText == 1) {
                    form.reset();
                    alert('login successfully');window.location.href = 'dashboard.php';
                } else if (xhr.responseText == 2) {
                    alert('Invalid Password');
                } else {
                    alert('Invalid Email or username');
                }
            } else {
                alert('Request failed. Please try again later.');
            }
        };
        xhr.onerror = function() {
            alert('Network error occurred. Please try again later.');
        };
        xhr.send(data);
    });
    </script>
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>