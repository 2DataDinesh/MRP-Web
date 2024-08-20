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
                                                <h5 class="card-title text-primary">All Students Results! 🎉</h5>
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Standard</label>
                                                            <select class="form-select" onchange="SelectStandard()"
                                                                name="standard" id="exampleFormControlSelectStandard"
                                                                aria-label="Default select example" required>
                                                                <option value=''>Select any one option</option>
                                                                <?= CallSelect($con, 'class'); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlReadOnlyInput1"
                                                                class="form-label">Section</label>
                                                            <select class="form-select" onchange="SelectSection()"
                                                                id="exampleFormControlSection" name='sections'
                                                                aria-label="Default select example" required disabled>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">subject</label>
                                                            <select class="form-select" onchange="SelectTopic()"
                                                                id="exampleFormControlSubject" name='subject'
                                                                aria-label="Default select example" required disabled>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">topic</label>
                                                            <select class="form-select" onchange="Select_topic_s()"
                                                                name='topic' class="form-control" id="selectedTopic"
                                                                required disabled>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="row">
                                                    <div class="col-12 text-end">
                                                        <button class="btn btn-danger mb-3 d-none"
                                                            id="downloadCsvBtn">download Csv</button>
                                                    </div>
                                                </div>
                                                <div class="table-responsive text-center">
                                                    <p class="text-danger" id="mgs">Please Select subject & topics</p>
                                                    <div class="table-responsive d-none" id="tables">
                                                        <table class="table table-striped text-center table-bordered"
                                                            id="teachersTable">
                                                            <thead class='table-info'>
                                                                <tr>
                                                                    <th>Student Name</th>
                                                                    <th>Standard</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Topic</th>
                                                                    <th>No.of.Questions</th>
                                                                    <th>Total</th>
                                                                    <th>Timing</th>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
    $(document).ready(function() {
        $('#downloadCsvBtn').click(function() {
            var table = $('#teachersTable');
            var csv = [];
            var headerRow = [];
            table.find('thead th').each(function() {
                headerRow.push($(this).text().trim());
            });
            csv.push(headerRow.join(','));
            table.find('tbody tr').each(function() {
                var dataRow = [];
                $(this).find('td').each(function() {
                    dataRow.push($(this).text().trim());
                });
                csv.push(dataRow.join(','));
            });
            downloadCSV(csv.join('\n'), 'table_data.csv');
        });

        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;
            csvFile = new Blob([csv], {
                type: 'text/csv'
            });
            downloadLink = document.createElement('a');
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
        }
    });
    </script>


    <script>
    function SelectTopic() {
        let selectedStandard = document.getElementById('exampleFormControlSelectStandard').value;
        let section = document.getElementById('exampleFormControlSection').value;
        let subject = document.getElementById('exampleFormControlSubject').value;
        let sectionsDropdown = document.getElementById('selectedTopic');

        let data = new FormData();
        data.append('standard_s', selectedStandard);
        data.append('section_s', section);
        data.append('subject_s', subject);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {

                    sectionsDropdown.innerHTML = result.res;
                    sectionsDropdown.removeAttribute('disabled');
                } else {
                    sectionsDropdown.setAttribute('disabled', 'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
            }
        };
        xhr.send(data);
    }


    // section start
    function SelectStandard() {
        let selectedStandard = document.getElementById('exampleFormControlSelectStandard').value;
        let data = new FormData();
        data.append('Standard', selectedStandard);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {
                    let sectionsDropdown = document.getElementById('exampleFormControlSection');
                    sectionsDropdown.innerHTML = result.res;
                    sectionsDropdown.removeAttribute('disabled');
                    document.getElementById('exampleFormControlSubject').setAttribute('disabled', 'disabled');
                    document.getElementById('selectedTopic').setAttribute('disabled', 'disabled');
                } else {
                    alert('Error: Unable to retrieve sections.');
                    document.getElementById('exampleFormControlSection').setAttribute('disabled', 'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
                document.getElementById('exampleFormControlSection').setAttribute('disabled', 'disabled');
            }
        };
        xhr.onerror = function() {
            alert('Error: Network error occurred.');
            document.getElementById('exampleFormControlSection').setAttribute('disabled', 'disabled');
        };
        xhr.send(data);
    }

    // subject start
    function SelectSection() {
        let selectedStandard = document.getElementById('exampleFormControlSection').value;
        let data = new FormData();
        data.append('section', selectedStandard);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {
                    let sectionsDropdown = document.getElementById('exampleFormControlSubject');
                    sectionsDropdown.innerHTML = result.res;
                    sectionsDropdown.removeAttribute('disabled');
                } else {
                    alert('Error: Unable to retrieve sections.');
                    document.getElementById('exampleFormControlSubject').setAttribute('disabled', 'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
                document.getElementById('exampleFormControlSubject').setAttribute('disabled', 'disabled');
            }
        };
        xhr.onerror = function() {
            alert('Error: Network error occurred.');
            document.getElementById('exampleFormControlSubject').setAttribute('disabled', 'disabled');
        };
        xhr.send(data);
    }
    // subject end

    // subject start
    function Select_topic_s() {
    let selectedStandard = document.getElementById('exampleFormControlSelectStandard').value;
    let section = document.getElementById('exampleFormControlSection').value;
    let subject = document.getElementById('exampleFormControlSubject').value;
    let sectionsDropdown = document.getElementById('selectedTopic').value;
    let downloadCsvBtn = document.getElementById('downloadCsvBtn');

    let tables = document.getElementById('tables');
    let mgs = document.getElementById('mgs');
    let data = new FormData();
    data.append('standard_s', selectedStandard);
    data.append('section_s', section);
    data.append('subject_s', subject);
    data.append('topic_s', sectionsDropdown);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/results.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            if (result.status === true) {
                let tableResponse = document.getElementById('table_response');
                tableResponse.innerHTML = result.res; 
                if ($.fn.DataTable.isDataTable('#teachersTable')) {
                    $('#teachersTable').DataTable().remove();
                }
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

                tables.classList.remove('d-none');
                mgs.classList.add('d-none');
                downloadCsvBtn.classList.remove('d-none');
            } else {
                downloadCsvBtn.classList.add('d-none');
                $('#teachersTable').DataTable().clear().destroy();
            }
        } else {
            console.error('Error: Failed to fetch data.');
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