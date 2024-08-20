<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <link href="../assets/vendor/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<?php
include "header.php";
$user = "e_id =".$_GET['id'];
$users_list = User_details('exam_result', $user, $con);
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('siderbar.php'); ?>
            <div class="layout-page">
                <?php include "navbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Results! 🎉</h5>
                                                <p class="mb-4">
                                                    View detailed subject test results for comprehensive student
                                                    performance analysis. Gain insights into individual strengths and
                                                    areas for improvement with our user-friendly 'Results!' feature.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4 mb-3">
                                                <img src="./images/nrt.png" style="width:25vh; height:25vh"
                                                    alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Form controls -->
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="table-responsive ">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center table-bordered"
                                                            id="teachersTable">
                                                            <thead class='table-info'>
                                                                <tr>
                                                                    <th>S.no</th>
                                                                    <th>Student Name</th>
                                                                    <th>Standard</th>
                                                                    <th>Section</th>
                                                                    <th class="w-20">Percentage</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                <?php $i=1; foreach($users_list as $gets){
                                                                    $userid='stid ='.$gets['u_id'];
                                                                   $users_get = AlreadyRegisterCheck('student', $userid, $con); 
                                                                   
                                                                   ?>
                                                                <tr>
                                                                    <td><?=$i ;?></td>
                                                                    <td><?=$users_get['user']['name']; ?></td>
                                                                    <td><?=$users_get['user']['section']; ?></td>
                                                                    <td><?=$users_get['user']['class']; ?></td>
                                                                    <td class="w-20"><?=$gets['per']; ?></td>
                                                                </tr>
                                                                <?php $i++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Bootstrap JavaScript -->
  
    <script>
    $(document).ready(function() {
        $('#teachersTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "pageLength": 10,
            "order": [],
            "language": {
                "search": "Filter records:"
            }

        });
    });
    </script>
    <!-- Additional Scripts -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <!-- Your custom scripts -->
    <script src="assets/js/main.js"></script>
</body>

</html>