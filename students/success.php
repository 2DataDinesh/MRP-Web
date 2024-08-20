<?php
session_start();
 $uid=$_SESSION['id'];
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
  include('header.php');
  ?>
  <script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script>
      $(document).ready(function() {
         function disablePrev() { window.history.forward() }
         window.onload = disablePrev();
         window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
      });
   </script>
<?php
include "pagination.php";
?>
 <?php
include '../db_config.php';

$tbl = $_GET['per'];

$query1 = "SELECT COUNT(*) AS count_correct FROM $tbl WHERE result = 'correct'";
$result1 = mysqli_query($con, $query1);

$countCorrect = '0'; 

if ($result1) {
   
    if (mysqli_num_rows($result1) == 1) {
     
        $row = mysqli_fetch_assoc($result1);
      
        $countCorrect = $row['count_correct'] ;
    }
} else {
   
    $countCorrect = 'Error executing query: ' . mysqli_error($con);
}


?>


<body>


        <div class="container-xxl py-3 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s"></div>

                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle bg-white w-100 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="success.png" alt="">
                            </div>
                            <a class="d-block text-center h3 mt-3 mb-4 " href="">You are Successfully attend Your Exam </a>
                            <h1></h1>
                            <h4 class="d-block text-center mt-3 mb-4">
        <?php 
        if ($countCorrect == 0) {
            echo "No Correct Answers";
        } else {
            echo $countCorrect . " Questions answered correctly";
        }
        ?>
    
    </h4>
    <h4 class="d-block text-center mt-3 mb-4">You Got <?php echo number_format( $_GET['sr'], 2) ;?> %</h4>
                            <a href="rank.php" class="btn btn-primary" style="display: block; margin: 0 auto; text-align: center;">Go to Rank Page To View Your Ranks</a>

                          
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s"></div>
                </div>
            </div>
        </div>




       
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>