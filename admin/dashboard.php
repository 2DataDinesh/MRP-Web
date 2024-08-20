<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <!-- Meta tags and other head content -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<?php include "header.php"; ?>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu and Sidebar -->
           
            <?php include('siderbar.php'); ?>
            <!-- / Menu and Sidebar -->

            <!-- Layout page -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include('navbar.php'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Cards Section -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                            <div class="col-lg-12  order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Admin Dashboard 🎉</h5>
                                                <p class="mb-2">
                                                Welcome Chief! Here, you can efficiently manage student, teacher, and subject details. Easily add new entries and view all existing records. Additionally, stay informed by accessing contact and subscriber's details.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4 mb-3">
                                                <img src="../121245/images/nrt.png" style="width:25vh; height:25vh"
                                                    alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row g-4">
                            <!-- Card 1: Total Students -->
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary text-center">Total Students</h4>
                                        <div class="text-center pt-2">
                                            <?php
                                            include "db_config.php";
                                            $query = "SELECT COUNT(stid) AS total_students FROM student";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_students = $row['total_students'];
                                            } else {
                                                $total_students = 0; 
                                            }
                                            ?>
                                            <h3><?php echo $total_students; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: Total Teachers -->
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary text-center">Total Teachers</h4>
                                        <div class="text-center pt-2">
                                            <?php
                                            $query = "SELECT COUNT(tid) AS total_teachers FROM teacher";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_teachers = $row['total_teachers'];
                                            } else {
                                                $total_teachers = 0; 
                                            }
                                            ?>
                                            <h3><?php echo $total_teachers; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Total Classes -->
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary text-center">Total Classes</h4>
                                        <div class="text-center pt-2">
                                            <?php
                                            $query = "SELECT COUNT(DISTINCT class) AS total_class FROM admin_details";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_class = $row['total_class'];
                                            } else {
                                                $total_class = 0; 
                                            }
                                            ?>
                                            <h3><?php echo $total_class; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4: Total Quiz -->
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary text-center">Total Quiz</h4>
                                        <div class="text-center pt-2">
                                            <?php
                                            $query = "SELECT COUNT(id) AS total_quiz FROM manage_quiz";
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $total_quiz = $row['total_quiz'];
                                            } else {
                                                $total_quiz = 0; 
                                            }
                                            ?>
                                            <h3><?php echo $total_quiz; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Cards Section -->

                    <!-- Teachers List Section -->
                    <div class="row p-2 mt-2 ">
                        <div class="card ">
                            <h3 class="card-header text-primary ">Teachers List</h3>
                            <div class="table-responsive p-2">
                                <table id="teachersTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM teacher";
                                        $result = mysqli_query($con, $query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>{$i}</td>";
                                            echo "<td>{$row['name']}</td>";
                                            echo "<td>{$row['dob']}</td>";
                                            echo "<td>{$row['phone']}</td>";
                                            echo "<td>{$row['email']}</td>";
                                            echo "<td>{$row['tclass']}</td>";
                                            echo "<td>{$row['tsection']}</td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Teachers List Section -->
                </div>
                <!-- Content wrapper -->
                <?php include('footer.php'); ?>
            </div>
            <!-- / Layout page -->
         
        </div>
       
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- / Layout wrapper -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
                <script src="assets/vendor/js/bootstrap.js"></script>
                <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="assets/vendor/js/menu.js"></script>
                <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
                <script src="assets/js/main.js"></script>
                <script src="assets/js/dashboards-analytics.js"></script>
                <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Core JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables Initialization -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#teachersTable').DataTable({
                "lengthMenu": [10, 25, 50, 75, 100],
                "pageLength": 10, // Initial page length (optional)
                "searching": true, // Enable search field
                "ordering": true, // Enable ordering (sorting)
                "info": true, // Show table information (records display)
                "paging": true, // Enable pagination
                "autoWidth": true, // Automatically adjust column widths
                "responsive": true // Make table responsive
            });
        });
    </script>
 
   
 
           <!--footer start-->
          
     <!-- Additional Scripts -->
 
              
                <!-- /Additional Scripts -->
</body>

</html>

