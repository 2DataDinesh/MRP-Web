<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
  include('header.php');
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
                                                <h5 class="card-title text-primary">Top Ranks List! 🎉</h5>
                                                <p class="mb-4">
                                                    This feature displays the overall top-ranking students, showcasing their achievements based on performance metrics.
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
                                </div>
                            </div>
                            <!-- start -->
                            <div class="col-md-12 col-lg-4 mb-4">
                                <a href="top_rank.php?std=total_school">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div class="d-flex flex-sm-column flex-row justify-content-between">
                                                    <div class="card-title">
                                                        <h6 class="text-nowrap mb-2 text-success"> School Top Rank
                                                            List<i class="bx bx-chevron-up"></i></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <img src="./images/img.png" style="width:100px; height:100px; ">
                                                <small class="d-block badge bg-label-warning rounded-pill">Click to
                                                    open</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--  -->
                            <div class="col-md-12 col-lg-4 mb-4">
                                <a href="your_rank.php?std=total_school">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div class="d-flex flex-sm-column flex-row justify-content-between">
                                                    <div class="card-title">
                                                        <h6 class="text-nowrap mb-2 text-success">Top Rank
                                                            List in  Your Class <i class="bx bx-chevron-up"></i></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <img src="./images/img.png" style="width:100px; height:100px; ">
                                                <small class="d-block badge bg-label-warning rounded-pill">Click to
                                                    open</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php 
                            
                            //  $find_classes = mysqli_query($con,"SELECT DISTINCT std FROM manage_quiz");
                            //  if(mysqli_num_rows($find_classes)>0){
                            //     while($row_value = mysqli_fetch_array($find_classes)){
                        
                              ?>
                            <!-- <div class="col-3 mb-4">
                                <a href="top_rank_class.php?std=<?=$row_value['std']; ?>">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div class="d-flex flex-sm-column flex-row justify-content-between">
                                                    <div class="card-title text-center">
                                                        <h6 class="text-nowrap mb-2 text-success">
                                                            <?=$row_value['std']; ?> Standard Top
                                                            Rank List<i class="bx bx-chevron-up"></i></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <img src="./images/img.png" style="width:100px; height:100px;">
                                                <small class="d-block badge bg-label-warning rounded-pill">Click to
                                                    open</small>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <?php // }
                           //  } ?>
                            <!-- end -->
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
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>