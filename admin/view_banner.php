<?php
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    include "db_config.php";
    $fname = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $fsize = $_FILES['image']['size'];
    $fdir = "../uploads/";
    $fstore = $fdir . $fname;

    if (move_uploaded_file($temp, $fstore)) {
        $img_upd = "INSERT INTO banner (image) VALUES ('$fstore')";
        $img_res = mysqli_query($con, $img_upd);
    }
}

if (isset($_POST['delete'])) {
    include "db_config.php";
    $image_id = $_POST['image_id'];
    $img_query = "SELECT image FROM banner WHERE id='$image_id'";
    $img_result = mysqli_query($con, $img_query);
    $img_row = mysqli_fetch_assoc($img_result);
    $image_path = $img_row['image'];
    
    if (unlink($image_path)) {
        $del_query = "DELETE FROM banner WHERE id='$image_id'";
        mysqli_query($con, $del_query);
    }
}

// Fetch images from the database
$images = [];
include "db_config.php";
$img_query = "SELECT * FROM banner";
$img_result = mysqli_query($con, $img_query);

if (mysqli_num_rows($img_result) > 0) {
    while ($row = mysqli_fetch_assoc($img_result)) {
        $images[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include('header.php'); ?>
<style>
    /* Ensure the table width remains fixed at 100% */
    .table-responsive {
        overflow-x: auto;
    }

    #contactsTable {
        width: 100%;
        table-layout: fixed;
        /* Ensures table width is fixed based on its initial layout */
    }

    /* Optional: Ensure table cells wrap content instead of truncating */
    #contactsTable td,
    #contactsTable th {
        white-space: normal;
    }

    /* Style for image card and delete button */
    .image-card {
        position: relative;
        width: 100%;
        max-width: 300px;
        margin: auto;
    }

    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        z-index: 10;
    }

    .delete-btn:hover {
        background-color: rgba(255, 2, 0, 0.9);
    }
</style>

<body>
    <!-- Include header -->


    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Include sidebar -->
            <?php include('siderbar.php'); ?>

            <div class="layout-page">
                <!-- Include navbar -->
                <?php include('navbar.php'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="card-title m-0">Images</h5>
                                    <button type="button" class="btn btn-primary shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                        <i class='bx bxs-plus-square'></i> Add Carousel
                                    </button>
                                </div>
                                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="carousel_s_form" action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Image</h5>
                                                    <br>

                                                </div>

                                                <div class="modal-body">
                                                <p>The uploaded picture should have a 3:1 ( Width=3000px, Height=1000px ) ratio.</p>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Picture</label>
                                                        <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg"   class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                                    <button type="submit" name="submit" class="btn btn-danger shadow-none">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php foreach ($images as $image): ?>
                                        <div class="col-md-3">
                                            <div class="card mb-4 shadow-sm image-card">
                                                <img src="<?php echo $image['image']; ?>" class="card-img-top" alt="Image" width="200px" height="150px">
                                                <form method="post" action="" onsubmit="return confirmDelete()">
                                                    <input type="hidden" name="image_id" value="<?php echo $image['id']; ?>">
                                                    <button type="submit" name="delete" class="delete-btn"><i class='bx bxs-trash'></i> delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Include footer -->
                    <?php include('footer.php'); ?>
                </div>
            </div>
        </div>

        <!-- Include jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="assets/vendor/js/bootstrap.js"></script>
        <!-- Your custom scripts -->
        <script src="assets/js/main.js"></script>
        <script>
            
            $(document).ready(function() {
                $('#contactsTable').DataTable({
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "pageLength": 10,
                    "order": [],
                    "language": {
                        "search": "Filter records:"
                    }
                });
            });

            function confirmDelete() {
                return confirm("Are you sure you want to delete this image?");
            }
        </script>
        <!-- Additional Scripts -->
        <script src="assets/vendor/libs/popper/popper.js"></script>
        <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="assets/vendor/js/menu.js"></script>
        <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="assets/js/dashboards-analytics.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </div>
</body>

</html>
