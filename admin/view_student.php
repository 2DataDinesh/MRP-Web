<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">


<?php
include "header.php";
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Include sidebar -->
            <?php include('siderbar.php'); ?>

            <!-- Layout page -->
            <div class="layout-page">
                <!-- Include navbar -->
                <?php include "navbar.php"; ?>

                <!-- Content Section -->
           
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <h5 class="card-header">Students List</h5>
                           
                            <div class="card-body">
                            <p style="justify-content:center">This module allows admin to view student details and enable them to edit/delete the students details.</p>
                                <div class="table-responsive text-nowrap">
                                    <table id="teachersTable"
                                        class="table table-hover table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Name</th>
                                                <th>Date Of Birth</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>House</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Include database configuration file
                                            include "db_config.php";

                                            // Fetch data from database
                                            $query = "SELECT * FROM student order by stid desc";
                                            $result = mysqli_query($con, $query);
                                            $i=0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $i++;
                                                $stid = $row['stid'];
                                                $name = $row['name'];
                                                $dob = $row['dob'];
                                                $phone = $row['phone'];
                                                $email = $row['email'];
                                                $class = $row['class'];
                                                $section = $row['section'];
                                                $house = $row['house'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td><?php echo $dob; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $class; ?></td>
                                                    <td><?php echo $section; ?></td>
                                                    <td><?php echo $house; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="view_student1.php?stid=<?php echo $stid; ?>"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                                class='bx bxs-edit-alt'></i></a>
                                                        <a class="btn btn-danger btn-sm" href="del_student.php?stid=<?php echo $stid; ?>"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                                class='bx bxs-trash'></i></a>
                                                    </td>
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
            // Initialize DataTable
            $('#teachersTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,
                "order": [],
                "language": {
                    "search": "Filter records:"
                }
            });

            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
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
