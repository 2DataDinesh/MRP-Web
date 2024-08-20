<?php
session_start();
error_reporting(0);
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
include ('header.php');
?>

<body style="z-index:0.8;">

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php
            include ('siderbar.php');
            ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
                include ('navbar.php');
                ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-2 mb-2">Dashboard
                        </h4>
                        <div class="row">
                            <?php
                            include '../db_config.php';
                            $le1 = mysqli_query($con, "SELECT * FROM student WHERE stid='$uid'");

                            if ($le1) {
                                if ($leers = mysqli_fetch_array($le1)) {
                                    $sec = $leers['section'];
                                    $clas = $leers['class'];

                                    $query1 = "SELECT s.stid, s.name, subquery.avg_per, subquery.rank
                                        FROM (
                                            SELECT er.u_id, SUM(er.per) / COUNT(er.per) AS avg_per,
                                                   @rank1 := @rank1 + 1 AS rank
                                            FROM exam_result er
                                            INNER JOIN student s ON s.stid = er.u_id
                                            CROSS JOIN (SELECT @rank1 := 0) r
                                            WHERE s.class='$clas' AND s.section='$sec'
                                            GROUP BY er.u_id
                                            ORDER BY avg_per DESC
                                        ) AS subquery
                                        INNER JOIN student s ON s.stid = subquery.u_id";


                                    $result1 = mysqli_query($con, $query1);


                                    $query2 = "SELECT s.stid, s.name, subquery.avg_per, subquery.rank
                                        FROM (
                                            SELECT er.u_id, SUM(er.per) / COUNT(er.per) AS avg_per,
                                                   @rank2 := @rank2 + 1 AS rank
                                            FROM exam_result er
                                            INNER JOIN student s ON s.stid = er.u_id
                                            CROSS JOIN (SELECT @rank2 := 0) r
                                            WHERE s.class='$clas' 
                                            GROUP BY er.u_id
                                            ORDER BY avg_per DESC
                                        ) AS subquery
                                        INNER JOIN student s ON s.stid = subquery.u_id";


                                    $result2 = mysqli_query($con, $query2);



                                 $query3 = "SELECT 
                                     manage_quiz.*, 
                                     COUNT(manage_quiz.id) AS Exam_count,
                                     COUNT(qtn_ans.manage_id) AS question_count 
                                FROM 
                                     manage_quiz 
                                LEFT JOIN 
                                     qtn_ans ON manage_quiz.id = qtn_ans.manage_id 
                             
                                WHERE 
                                     manage_quiz.std = '$clas' 
                                     AND manage_quiz.section = '$sec' 
                                GROUP BY 
                                     manage_quiz.id 
                                HAVING 
                                     COUNT(qtn_ans.manage_id) = manage_quiz.no_of_qustions";

                                    $result3 = mysqli_query($con, $query3);






                                $queryy = "select *,count('id') as total_exam from manage_quiz where std='$clas' and section='$sec'";
                                    $resultt = mysqli_query($con, $queryy);

                                    $query4 = "SELECT 
                                     COUNT(u_id) AS complete_count
                                FROM 
                                     exam_result 
                                WHERE 
                                     u_id = '$uid'";





                                    $result4 = mysqli_query($con, $query4);

                                    if ($result4) {
                                        if (mysqli_num_rows($result4) > 0) {
                                            $row = mysqli_fetch_assoc($result4);
                                            $att = $row['complete_count'];
                                        } else {
                                            $att = "No exams completed";
                                        }
                                    } else {
                                        $att = "Query execution failed: " . mysqli_error($con);
                                    }





                                    ?>
                                    <style>
                                        .card-profile {
                                            display: flex;
                                            align-items: center;
                                            gap: 10px;
                                        }

                                        .card-profile img {
                                            border-radius: 50%;
                                            width: 50px;
                                            height: 50px;
                                        }

                                        .card-profile .profile-info {
                                            display: flex;
                                            flex-direction: column;
                                        }

                                        .card-statistics,
                                        .card-suggestions {
                                            display: flex;
                                            flex-direction: column;
                                            align-items: center;
                                            justify-content: center;
                                            text-align: center;
                                        }

                                        .card-suggestions img {
                                            width: 50px;
                                            height: 50px;
                                        }

                                        .card-segment {
                                            padding: 15px;
                                            border-right: 1px solid #e0e0e0;
                                        }

                                        .card-segment:last-child {
                                            border-right: none;
                                        }
                                    </style>
                                    <div class="container-xxl flex-grow-1 container-p-y">
                                        <div class="row">
                                            <div class="col-lg-8 mb-4 order-0">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-primary">Congratulations
                                                                    <?php echo $uname; ?>! 🎉
                                                                </h5>
                                                                <?php
                                                                if ($result1) {
                                                                    if (mysqli_num_rows($result1) > 0) {
                                                                        // Output data for Query 1
                                                                        while ($row = mysqli_fetch_assoc($result1)) {
                                                                            if ($row['stid'] == $uid) {
                                                                                echo '<p class="mb-4">
         You have scored <span class="fw-bold">' . number_format($row["avg_per"], 2) . '%</span> and got <span class="fw-bold">' . $row["rank"] . ' Rank</span> in section ' . htmlspecialchars($leers['section']) . '. 
      </p>
          <a href="rank.php" class="btn btn-sm btn-outline-primary">View Score</a>';

                                                                            }
                                                                        }
                                                                    } else {
                                                                        echo ' <p class="mb-4">
                                                         Atten Exam to get scores
                                                        </p>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 text-center text-sm-left">
                                                            <div class="card-body pb-0 px-0 px-md-4">
                                                                <img src="assets/img/img.png" height="140" alt="View Badge User"
                                                                    class="mb-2"
                                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 order-1">
                                                <div class="row">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                                <div
                                                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                                    <div class="card-title">
                                                                        <h5 class="text-nowrap mb-2">Over All Rank</h5>
                                                                        <span class="badge bg-label-warning rounded-pill">Year
                                                                            <?php echo date('Y'); ?></span>
                                                                    </div>
                                                                    <div class="mt-sm-auto">
                                                                        <?php
                                                                        if ($result2) {
                                                                            if (mysqli_num_rows($result2) > 0) {
                                                                                // Output data for Query 2
                                                                                while ($row = mysqli_fetch_assoc($result2)) {
                                                                                    if ($row['stid'] == $uid) {
                                                                                        echo '
                                                                    <small class="mt-3 mb-3 text-success text-nowrap fw-semibold">Standard ' . htmlspecialchars($leers['class']) . '</small>
                                                                    <h4 class="mb-0 ">' . htmlspecialchars(number_format($row["avg_per"], 2)) . '%</h4>
                                                                    </div>
                                                                    </div>
                                                                    <div>
                                                                     <span class="d-block mb-3 text-center">Rank</span>
                                                                        <h2 class="text-danger text-center">' . htmlspecialchars($row["rank"]) . ' </h2>
                                                                       
                                                                    </div>';
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                echo '
                                                            <h4 class="mb-0 me-2">No scores</h4>
                                                            </div>
                                                            </div>
                                                            <div>
                                                                <h2></h2>
                                                            </div>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Bootstrap modals -->

                                    </div>
                                    <div class="container-xxl flex-grow-1 container-p-y">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card shadow-none bg-white border border-info rounded ">
                                                    <div class="card-body">
                                                        <div class="row g-0">
                                                            <div class="col-10">

                                                                <div class="card-body">
                                                                    <h6 class="text-center "><?php echo $uname; ?></h6>
                                                                    <h6 class="card-text ">
                                                                      <span>  Class : <?php echo $clas; ?></span><br>
                                                                      <span> Section: <?php echo $sec; ?></span>
                                                                    </h6>

                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <i class='bx bxs-user large-icon'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                           
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card shadow-none bg-white border border-info ">
                                                    <div class="card-body">
                                                        <div class="row g-0">
                                                            <div class="col-10">
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-center"> Exams </h5>
                                                                    <?php
                                                                    if ($result3) {
                                                                        if (mysqli_num_rows($result3) > 0) {
                                                                            if ($row = mysqli_fetch_array($result3)) {
                                                                                $count_exam = mysqli_num_rows($result3);
                                                                                $exm_tot = $row['Exam_count'];
                                                                                echo '
                                                               

                                                                    <h5 class="card-text text-center">' .$count_exam . '</h5>';
                                                                            } else {
                                                                                echo '
                                                                    <h5 class="card-title">Quiz Not Assigned</h5>';
                                                                            }
                                                                        }
                                                                    }


                                                                    ?>


                                                                </div>
                                                            </div>
                                                            <style>
                                                                .large-icon {
                                                                    font-size: 40px;
                                                                    /* Adjust the size as needed */
                                                                }
                                                            </style>
                                                            <div class="col-2">
                                                                <i class='bx bxs-notepad large-icon'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card shadow-none bg-white border border-info ">
                                                    <div class="card-body">
                                                        <div class="row g-0">
                                                            <div class="col-10">
                                                                <div class="card-body">
                                                                    <h6 class="card-title   text-center">Completed</h>
                                                                        <h4 class="card-text text-center">
                                                                            <?php echo $att; ?>
                                                                        </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <i class='bx bxs-pencil large-icon'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card shadow-none bg-white border border-info ">
                                                    <div class="card-body">
                                                        <div class="row g-0">
                                                            <div class="col-10">
                                                                <div class="card-body">
                                                                    <h6 class="card-title  text-center">On going</h6>
                                                                    <?php
                                                                    if ($att === 'p' && is_null($row['exam_count'])) {
                                                                        echo "<p>Quiz not assigned</p>";
                                                                    } else {

                                                                        //$exm_tot = $row['total_exam'];
                                                                        $result = $count_exam - $att;
                                                                        echo '<h4 class="card-text text-center">' . $result . '</h4>';

                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <i class='bx bxs-time-five large-icon'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                }
                            }
                            // Close the connection
                            mysqli_close($con);
                            ?>
                            </div>

                            <div class="container-xxl flex-grow-1 container-p-y ">
                                <div class="row  ">
                                    <style>
                                        .bordered-box {
                                            border: 1px solid #03c3ec;
                                            /* Light gray border */
                                            background-color: #F5F5F9;
                                            /* Ash color background */
                                                                                   
                                            padding-left: 10px; 
                                            /* Optional: Add some padding for better appearance */
                                            /* Optional: Add some border radius for rounded corners */
                                        }
                                    </style>
                                    <?php
                                    include ('../db_config.php');

                                    $stquery = "SELECT * FROM student WHERE stid='$uid'";
                                    $stres = mysqli_query($con, $stquery);

                                    while ($str = mysqli_fetch_array($stres)) {
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
                                  COUNT(qtn_ans.manage_id) = manage_quiz.no_of_qustions;
                              ");


                                        if (mysqli_num_rows($qq) > 0) {
                                            while ($rq = mysqli_fetch_array($qq)) {
                                                $eid = $rq['id'];
                                                ?>

                                                <div class="  col-lg-3 col-md-6 bordered-box bg-white py-2 rounded">



                                                    <div class="row g-0 ">

                                                        <h6 class="card-title text-Info text-center ">
                                                            <?php echo strtoupper($rq['subject']); ?>
                                                        </h6>
                                                        <div class="col-8">
                                                            <h6 class="card-title ">Topic :
                                                                <?php echo $rq['topic']; ?>
                                                            </h6>
                                                            <p class="card-text ">
                                                                <?php echo "No.of Questions : " . $rq['no_of_qustions']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-2">
                                                            <i class='bx bxs-trophy large-icon'></i>
                                                        </div>
                                                    </div>

                                                    <?php





                                                    $query7 = "SELECT * FROM exam_result WHERE u_id = '$uid' AND e_id = '$eid'";
                                                    $result7 = mysqli_query($con, $query7);

                                                    if ($result7) {
                                                        if (mysqli_num_rows($result7) == 0) {
                                                            // No exam result found, show "Attend Exam" link
                                                            echo '
                                            <div class="d-flex justify-content-center mt-2 mb-2">
                                                <a href="attendexam2.php?s=' . $str['stid'] . '&e=' . $eid . '" class="btn rounded-pill btn-xs btn-info">ATTEND EXAM</a>
                                            </div>';
                                                        } else {
                                                            // Exam result found, show "Completed" message
                                                            echo '
                                            <div class="d-flex justify-content-center mt-2 mb-2">
                                                <a href="#" class="btn rounded-pill btn-xs btn-success">Completed</a>
                                            </div>';
                                                        }
                                                    } else {
                                                        // Error in executing query
                                                        echo "Error: " . mysqli_error($con);
                                                    }
                                                    ?>
                                                </div>


                                                <?php
                                            }
                                        } else {
                                            echo "
                               
                                <p class='mt-2' >Exams currently unavailable </p>
                              ";

                                        }
                                    }
                                    ?>
                                    <!--/ Bootstrap modals -->
                                </div>
                            </div>
                            <!--/ Bootstrap modals -->

                            <!-- / Content -->
                            <!-- Footer -->
                            <?php
                            include ('footer.php');
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
</body>

</html>