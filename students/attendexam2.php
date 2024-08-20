<?php
  session_start();
  error_reporting(0);
  $uname=$_SESSION['name'];
  $uid=$_SESSION['id'];
  ?>
  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['no'])){
      header("Location:attendexam.php");
    }
    if(isset($_POST['yes'])){
      include "../db_config.php";
      $vsid=$_POST['studid'];
      $veid=$_POST['examid'];
           
      $vquery=mysqli_query($con,"select count(*) as total from exam_result where u_id=$vsid and e_id=$veid");
      $data=mysqli_fetch_assoc($vquery);

      if($data['total']>=1){
        echo "<script>alert('You are Exceed your Exam Attempt'); window.location.href='attendexam.php'</script>";
      }else
      {
        
        date_default_timezone_set('Asia/Kolkata'); // Set the timezone to Indian Standard Time (IST)
        $c_time = time();
        echo "<script>window.location.href='stud_examination.php?s=$vsid&e=$veid&ctime=$c_time'</script>";
       
      
      }

    }

  }
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
                    <?php
$eid=$_GET['e'];
$sid=$_GET['s'];
?>

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <div class="col-lg-4 col-md-6">

                                                    <div class="mt-3">
                                                        <button type="button" class="btn btn-primary"
                                                            id="launchModalButton" data-bs-toggle="modal"
                                                            data-bs-target="#modalToggle" style="display: none;">
                                                            Launch modal
                                                        </button>

                                                        <!-- Modal 1-->
                                                        <div class="modal fade" id="modalToggle"
                                                            aria-labelledby="modalToggleLabel" tabindex="-1"
                                                            style="display: none" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">


                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3> Are you sure you want to Start Exam</h>
                                                                            <form method="POST">
                                                                                <input type="hidden"
                                                                                    class="form-control" name="studid"
                                                                                    value="<?php echo $sid; ?>">
                                                                                <input type="hidden"
                                                                                    class="form-control" name="examid"
                                                                                    value="<?php echo $eid; ?>">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-lg"
                                                                                name="no">NO</button>
                                                                        

                                                                            <button type="submit"
                                                                                class="btn btn-success btn-lg"
                                                                                name="yes">YES</button>
                                                                       
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal 2-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- / Content -->
                    <script>
                    // Ensure the DOM is fully loaded before running the script
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get the button that opens the first modal
                        var launchModalButton = document.getElementById('launchModalButton');
                        // Simulate a click on that button to open the modal
                        launchModalButton.click();
                    });
                    </script>
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
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>