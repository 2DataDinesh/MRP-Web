<?php
  session_start();
  error_reporting(0);
  $uname=$_SESSION['name'];
  $uid=$_SESSION['id'];
  include "../db_config.php";

//$id=$_SESSION['user_id'];
$name=$_SESSION['uname'];
$email=$_SESSION['lmail'];
//$role=$_SESSION['user_role'];

$sql="select * from student where stid='$uid'";
$res=mysqli_query($con,$sql);


if($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
{
    $stud_name=$row['name'];
    $stud_dob=$row['dob'];
    $stud_ph=$row['phone'];
    $stud_email=$row['email'];
    $stud_class=$row['class'];
    $stud_sec=$row['section'];
}
?>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
include('header.php');
?>

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
                    <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center justify-content-center gap-4">
    <img
        src="stud.png"
        alt="user-avatar"
        class="d-block rounded"
        height="100"
        width="100"
        id="uploadedAvatar"
    />
                       
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstName"
                              readonly
                              value="<?php echo $stud_name; ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Date-of-Birth</label>
                            
                            <input type="text" class="form-control" id="address" name="address"  readonly value="<?php echo $stud_dob; ?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Mobile number</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $stud_ph; ?>"  readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $stud_email; ?>"
                              readonly
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Class</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="organization"
                              value="<?php echo $stud_class; ?>" readonly
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Section</label>
                            <div class="input-group input-group-merge">
                                                          <input
                                type="text"
                                id="phoneNumber"
                                name="phoneNumber"
                                class="form-control"
                                value="<?php echo $stud_sec; ?>"
                               readonly
                              />
                            </div>
                          </div>
                     
                        </div>
                        <!-- <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div> -->
                      </form>
                    </div>
                    <!-- /Account -->
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
</body>

</html>