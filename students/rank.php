<?php
session_start();
error_reporting(0);
 $uid=$_SESSION['id'];
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
  include('header.php');
  ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php
  include('siderbar.php');
  ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php
  include('navbar.php');
  ?>


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-9">
                                            <div class="card-body">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table  table-responsive table-bordered  p-1" id="teachersTable">
                                           
                                                        <thead class='table-light text-center  '>
                                                            <tr >
                                                                <th class="text-primary">S.No</th>
                                                                <th class="text-primary">Subject</th>
                                                                <th class="text-primary">Topic</th>
                                                                <th class="text-primary">Description</th>
                                                                <th class="text-primary">Date</th>
                                                                <th class="text-primary">Percentage</th>
                                                                <th class="text-primary">Answer Key</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        include "../db_config.php";
$sql1 = "SELECT exam_result. *,manage_quiz.*,student.* FROM exam_result 
        INNER JOIN manage_quiz ON exam_result.e_id = manage_quiz.id 
        INNER JOIN student ON exam_result.u_id = student.stid where exam_result.u_id= '$uid' ";
$res1 = mysqli_query($con, $sql1);

$z = 1; // Initialize the counter variable

while ($row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
    $row1['id'];
    ?>

<tbody class="table-border-bottom-0 text-center">
    <tr>
        <td><?= $z; ?></td>
        <td><?= $row1['subject']; ?></td>
        <td><?= $row1['topic']; ?></td>
        <td><?= $row1['description']; ?></td>
        <td><?= $row1['date']; ?></td>
        <td><?= number_format($row1["per"], 2) ; ?></td>
        <td><a href="dn.php?eid=<?=$row1['e_id']; ?>" ><i class="bx bx-download me-2"></i></a></td>
    </tr>
</tbody>

<?php 
    $z++; // Increment the counter variable
} 
?>

                                                    </table>
                                                   </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php
         include('footer.php');
         ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#teachersTable').DataTable({
                            responsive: true
                        });
                    });
                </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>