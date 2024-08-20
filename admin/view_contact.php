<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<?php include ('header.php'); ?>
<style>
    /* Ensure the table width remains fixed at 100% */
    .table-responsive {
        overflow-x: auto;
    }
    
    #contactsTable {
        width: 100%;
        table-layout: fixed; /* Ensures table width is fixed based on its initial layout */
    }
    
    /* Optional: Ensure table cells wrap content instead of truncating */
    #contactsTable td, #contactsTable th {
        white-space: normal;
    }
</style>

<body>
    <!-- Include header -->


    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Include sidebar -->
            <?php include ('siderbar.php'); ?>

            <div class="layout-page">
                <!-- Include navbar -->
                <?php include ('navbar.php'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <h5 class="card-header">Contact List</h5>
                            <div class="card-body">
                            <p style="justify-content:center">This page allows admin to view and manage enquiries from users who contact us. </p>
                                <div class="table-responsive text-nowrap">
                                    <table id="contactsTable" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:5px;">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th style="width:10%;">Message</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "db_config.php";
                                            $query = "SELECT * FROM contact order by id desc";
                                            $result = mysqli_query($con, $query);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $i++;
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $email = $row['email'];
                                                $mobile = $row['phone'];
                                                $message = $row['message'];
                                                $date = date('d-m-Y', strtotime($row['date'])); 
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $mobile; ?></td>
                                                    <td><?php echo $message; ?></td>
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
                    </div>
                </div>

                <!-- Include footer -->
                <?php include ('footer.php'); ?>
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
            $('#contactsTable').DataTable({
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