<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
  include('header.php');
  $whereClause_find = 'tid='.$_SESSION['userID'];
  $teacher_results = AlreadyRegisterCheck('teacher', $whereClause_find, $con);
  if($teacher_results['exists']==true){
  $tclass = $teacher_results['user']['tclass'];
  $tsection = $teacher_results['user']['tsection'];
  }
  $get_total = mysqli_query($con, "SELECT SUM(exam_result.per) as total_percentage, exam_result.u_id as users_id FROM teacher INNER JOIN student ON teacher.tclass = student.class AND teacher.tsection = student.section INNER JOIN exam_result ON student.stid = exam_result.u_id WHERE teacher.tclass = '10' AND teacher.tsection = 'A' GROUP BY exam_result.u_id ORDER BY total_percentage DESC");

  if(mysqli_num_rows($get_total) > 0)  {
    while($row = mysqli_fetch_array($get_total)) {
        $array_find[] = $row['users_id'];
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
                                                <h5 class="card-title text-primary">Your class Students Top rank! 🎉
                                                </h5>
                                                <p class="mb-4">
                                                    This section displays the top-ranking students within the class
                                                    assigned to a specific teacher, highlighting academic excellence
                                                    across subjects.
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
                                            <div class="card-body text-center">
                                                <?php if(mysqli_num_rows($get_total) > 0)  { ?>
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
                                                <?php } ?>
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