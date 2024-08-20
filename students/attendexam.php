<?php
session_start();
error_reporting(0);
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">
<?php
include('header.php');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    function disablePrev() {
        window.history.forward()
    }
    window.onload = disablePrev();
    window.onpageshow = function(evt) {
        if (evt.persisted) disableBack()
    }
});
</script>

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
                        <h4 class="fw-bold py-3 mb-4"> Exams </h4>

                        <!-- Style variation -->

                        <div class="row">
                            <?php
include('../db_config.php');

$stquery = "SELECT * FROM student WHERE stid='$uid'";
$stres = mysqli_query($con, $stquery);

if ($str = mysqli_fetch_array($stres)) {
    $sid = $str['stid'];
    $class = $str['class'];
    $section = $str['section'];

    $qq = mysqli_query($con, "SELECT 
    manage_quiz.*, 
    COUNT(qtn_ans.manage_id) AS question_count 
FROM 
    manage_quiz 
INNER JOIN 
    qtn_ans 
ON 
    manage_quiz.id = qtn_ans.manage_id 
WHERE 
    std = '$class' 
    AND section = '$section' 
GROUP BY 
    qtn_ans.manage_id 
HAVING 
    COUNT(qtn_ans.manage_id) = manage_quiz.no_of_qustions;");
    
    // Check if there are any quizzes available
    if (mysqli_num_rows($qq) > 0) {
        while ($rq = mysqli_fetch_array($qq)) {
            $eid = $rq['id'];

            // Check if the student has completed this exam
            $exam_completed = false;
            $check_query = "SELECT * FROM exam_result WHERE u_id = '$uid' AND e_id = '$eid'";
            $check_result = mysqli_query($con, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                $exam_completed = true;
            }
?>
          <div class="col-md-6 col-xl-4">
    <div class="card  mb-3" style="border: 1px solid #696cff;">
        <a href="attendexam2.php?s=<?php echo $str['stid']; ?>&e=<?php echo $eid; ?>" class="exam-link">
            <div class="card-body">
                <h3 class="card-title">Subject : <?php echo strtoupper($rq['subject']); ?></h3>
                <h5 class="card-title">Topic : <?php echo strtoupper($rq['topic']); ?></h5>
                <p class="card-text"><?php echo "No.of Questions : " . $rq['no_of_qustions']; ?><br>
           <?php echo "Total Time: &nbsp;" . $rq['time']. "&nbsp; Minutes"; ?></p>
                <?php if ($exam_completed) { ?>
                    <span class="badge bg-success p-2">Completed</span>
                <?php } else { ?>
                    <span class="badge bg-primary p-2">Start Quiz</span>
                <?php } ?>
            </div>
        </a>
    </div>
</div>
            <?php
        }
    } else {
        echo "
        <div class='card bg-white  text-center mb-3'>
        <p class='mt-2' >Exams currently unavailable </p>
        </div> ";
    }
} else {
    echo "Student record not found"; // or handle no student found case
}
?>
        </div>
        <!--/ Card layout -->
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/masonry/masonry.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
    $(document).ready(function() {
        $('.exam-link').click(function(event) {
            // Check if the exam is completed
            var isCompleted = $(this).find('.bg-success').length > 0;

            // Prevent default action (navigation) if exam is completed
            if (isCompleted) {
                event.preventDefault();
            }
        });
    });
</script>

</body>

</html>
