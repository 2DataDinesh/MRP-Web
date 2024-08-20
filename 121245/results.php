<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <link href="../assets/vendor/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<?php
include "header.php";
$users_list = Single_userFetch('manage_quiz',$con);
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('siderbar.php'); ?>
            <div class="layout-page">
                <?php include "navbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">View Results! 🎉</h5>
                                                <p class="mb-4">
                                                    Explore detailed insights into student performance with our 'View
                                                    Results!' feature, designed to simplify tracking and analysis for
                                                    teachers. Effortlessly access and understand student progress
                                                    through intuitive data presentation.
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
                                            <div class="card-body">
                                                <div class="row mb-5">
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Subject</label>
                                                        <select class="form-select" onchange="SelectStandard()"
                                                            name="standard" id="Standard"
                                                            aria-label="Default select example" required>
                                                            <option value=''>Select the Subject</option>
                                                            <?= MK_CallSelect($con, 'subject','manage_quiz'); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Topic</label>
                                                        <select class="form-select" onchange="Select_tables()"
                                                            name="topics" id="topics"
                                                            aria-label="Default select example" required disabled>
                                                            <option value=''>Select the Topic</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="table-responsive text-center">
                                                    <p class="text-danger" id="mgs">Please Select subject & topics</p>
                                                    <div class="table-responsive d-none" id="tables">
                                                        <table class="table table-striped text-center table-bordered"
                                                            id="teachersTable">
                                                            <thead class='table-info'>
                                                                <tr>
                                                                    <th>Standard</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Topic</th>
                                                                    <th>No.of.Questions</th>
                                                                    <th>Total</th>
                                                                    <th>Timing</th>
                                                                    <th>Staff Name</th>
                                                                    <th class="w-20">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="table_response" class="table-border-bottom-0">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include footer -->
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
    // section start
    function SelectStandard(ids) {
        let selectedStandard = document.getElementById('Standard').value;
        let data = new FormData();
        data.append('subject', selectedStandard);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/results.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {
                    let sectionsDropdown = document.getElementById('topics');
                    sectionsDropdown.innerHTML = result.res;
                    sectionsDropdown.removeAttribute('disabled');
                } else {
                    alert('Error: Unable to retrieve sections.');
                    document.getElementById('topics').setAttribute('disabled',
                        'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
                document.getElementById('topics').setAttribute('disabled', 'disabled');
            }
        };
        xhr.onerror = function() {
            alert('Error: Network error occurred.');
            document.getElementById('topics').setAttribute('disabled', 'disabled');
        };
        xhr.send(data);
    }


    // subject start
    function Select_tables() {
        let selectedStandard = document.getElementById('Standard').value;
        let section_v = document.getElementById('topics').value;
        let tables = document.getElementById('tables');
        let mgs = document.getElementById('mgs');
        let data = new FormData();
        data.append('standard', selectedStandard);
        data.append('topic', section_v);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/results.php', true);
        xhr.onload = function() {
            let result = JSON.parse(xhr.responseText);
            if (result.status === true) {
                let sectionsDropdown = document.getElementById('table_response');
                sectionsDropdown.innerHTML = result.res;
                tables.classList.remove('d-none');
                mgs.classList.add('d-none');

                $('#teachersTable').DataTable().destroy();
                $('#teachersTable').DataTable({
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
            } else {
                alert('Error: Unable to retrieve sections.');
            }
        };
        xhr.send(data);
    }
    </script>
    <!-- Additional Scripts -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <!-- Your custom scripts -->
    <script src="assets/js/main.js"></script>
</body>

</html>