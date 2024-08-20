<?php session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <?php include('header.php'); ?>
<body>
    <!-- Include header -->
  

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Include sidebar -->
            <?php include('siderbar.php'); ?>

            <div class="layout-page">
                <!-- Include navbar -->
                <?php include('navbar.php'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <h5 class="card-header">Newsletter List</h5>
                            <div class="card-body">
                            <p style="justify-content:center">This module allows admin to view user's subscription list. </p>
                                <div class="table-responsive text-nowrap">
                                    <table id="newsletterTable" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:10px;">#</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "db_config.php";
                                            $query = "SELECT * FROM newsletter order by id desc";
                                            $result = mysqli_query($con, $query);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $i++;
                                                $id = $row['id'];
                                                $email = $row['email'];
                                                $date = date('d-m-Y', strtotime($row['date'])); 
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $date; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Responsive Table -->
                    </div>
                </div>
                <!-- Include footer -->
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
    <script src="assets/vendor/js/bootstrap.js"></script>
    <!-- Your custom scripts -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#newsletterTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
</body>

</html>
