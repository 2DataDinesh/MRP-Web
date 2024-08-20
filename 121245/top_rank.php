<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
  include('header.php');
  $get_value = $_GET['std'];
  $array_find =[];
  $array_per =[];
  $find_top = mysqli_query($con, "SELECT SUM(per) AS total_percentage, u_id
  FROM exam_result GROUP BY u_id HAVING total_percentage = (SELECT MAX(total_percentage) 
   FROM (SELECT SUM(per) AS total_percentage FROM exam_result GROUP BY u_id) AS max_totals)
  ORDER BY total_percentage DESC");

  if(mysqli_num_rows($find_top) > 0)  {
    while($row = mysqli_fetch_array($find_top)) {
        $array_find[] = $row['u_id'];
    }
  }

  ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php  include('siderbar.php'); ?>
            <div class="layout-page">
                <?php include('navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">School Top! 🎉</h5>
                                                <p class="mb-4">
                                                    This section displays details of the top-ranked student in the
                                                    school, highlighting their outstanding academic achievements
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
                                                <?php if(mysqli_num_rows($find_top) > 0)  { ?>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-hover text-center table-bordered">
                                                        <thead class='table-info'>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Name</th>
                                                                <th>Standard</th>
                                                                <th>Section</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">

                                                            <?php $z=1; foreach($array_find as $values){ 
                                                                $whereClause = 'stid ='.$values;
                                                              $results = AlreadyRegisterCheck('student', $whereClause, $con);
                                                              if($results['exists']==true){  ?>
                                                            <tr>
                                                                <td><?=$z; ?></td>
                                                                <td><strong><?=$results['user']['name']; ?></strong>
                                                                </td>
                                                                <td><?=$results['user']['class'].'<sup>th</sup>'; ?>
                                                                </td>
                                                                <td><?=$results['user']['section']; ?></td>
                                                            </tr>
                                                            <?php }$z++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php }else{ ?>
                                                <h4 class="text-center text-danger">Exam results are empty</h4>
                                                <img src="./images/empty.jpg" width='400vh' height="400vh">
                                                <?php  } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  include('footer.php'); ?>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>