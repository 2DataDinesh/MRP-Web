<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
      include('header.php');
      
    $assignet_teacher_ = AlreadyRegisterCheck('teacher', $whereClause_find, $con);
      $get_value = isset($_GET['std']) ? intval($_GET['std']) : 0;
      $total_sections = [];
      $students_query = "SELECT DISTINCT section FROM student WHERE class = $get_value";
      $students_result = mysqli_query($con, $students_query);
      
      if(mysqli_num_rows($students_result) > 0) {
          while($user = mysqli_fetch_assoc($students_result)) {
              $total_sections[] = $user['section'];
          }
      }
      function findAllUsers($section_value, $con) {
        $get_value = isset($_GET['std']) ? intval($_GET['std']) : 0;
        
      $user_find_query = "SELECT student.stid, student.name, student.class, student.section
         FROM exam_result INNER JOIN student ON exam_result.u_id = student.stid WHERE student.class = $get_value AND student.section = '$section_value'
         GROUP BY student.stid, student.name, student.class, student.section HAVING SUM(exam_result.per) = (
         SELECT MAX(total_percentage) FROM (SELECT SUM(per) AS total_percentage FROM exam_result
         GROUP BY u_id) AS max_totals)ORDER BY SUM(exam_result.per) DESC";

        $user_find_result = mysqli_query($con, $user_find_query);
      
        if(mysqli_num_rows($user_find_result) > 0) {
      ?>
<div class="col-md-12">
    <div class="card-body mt-2 mb-3">
        <div class="mb-5">
            <h5 class="text-success"><?=$get_value ."<sup>th </sup> Standard ".$section_value . " Section " ?></h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover text-center table-bordered">
                <thead class="table-info">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Standard</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                     $z = 1;
                     while($user = mysqli_fetch_assoc($user_find_result)) {
                         $whereClause = 'stid =' . $user['stid'];
                         $results = AlreadyRegisterCheck('student', $whereClause, $con);
                     ?>
                    <tr>
                        <td><?= $z; ?></td>
                        <td><strong><?= $results['user']['name']; ?></strong></td>
                        <td><?= $results['user']['class'] . '<sup>th</sup>'; ?></td>
                        <td><?= $results['user']['section']; ?></td>
                    </tr>
                    <?php
                     
                     $z++;
                     }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
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

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                    foreach($total_sections as $section){
                                      FindAllUsers($section, $con);
                                    }
                                    ?>
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