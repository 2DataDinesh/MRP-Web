<?php
include "header.php";
?>

<!-- Form controls -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include "siderbar.php"; ?>
        <div class="layout-page">
            <?php include "navbar.php"; ?>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <h5 class="card-header">Admin Details</h5>
                        <div class="card-body">
                            <form action="add_admin_details.php" method="post" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="classSelect" class="form-label">Class<span
                                                style="color:red;">*</span></label>
                                        <select class="form-select" id="classSelect" name="class"
                                            aria-label="Default select example" required>
                                            <option value="" selected disabled>Open this select menu</option>
                                            <option value="LKG">LKG</option>
                                            <option value="UKG">UKG</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a class.</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="sectionSelect" class="form-label">Section<span
                                                style="color:red;">*</span></label>
                                        <select class="form-select" id="sectionSelect" name="section"
                                            aria-label="Default select example" required>
                                            <option value="" selected disabled>Open this select menu</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a section.</div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="subjectInput" class="form-label">Subject<span
                                                style="color:red;">*</span></label>
                                        <input type="text" name="subject" class="form-control" id="subjectInput"
                                            placeholder="Enter subject" required>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please enter a subject.</div>
                                    </div>
                                    <div class="mb-3 text-end col-md-12">
                                        <input type="submit" class="btn btn-outline-primary" id="submitBtn"
                                            name="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/vendor/js/menu.js"></script>
<script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    $(document).ready(function () {
        // Form validation on submit
        $('form').submit(function (event) {
            var form = this;
            var isValid = true;

            // Validate each input field
            $(this).find(':input[required]').each(function () {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    $(this).next('.invalid-feedback').show();
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).next('.invalid-feedback').hide();
                }
            });

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if not valid
            }
        });
    });
</script>

