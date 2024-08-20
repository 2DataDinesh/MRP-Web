<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
include('header.php');
if (isset($_GET['id'])) {
    $where = 'id =' . $_GET['id'];
    $single_value = AlreadyRegisterCheck('manage_quiz', $where, $con);
    if ($single_value['exists'] == true) {
        $no_of_rooms = $single_value['user']['no_of_qustions'];
    }
}
function findCound($con, $req)
{
    $checkCount = "SELECT count(*) as no_of_qtn FROM  qtn_ans where manage_id = $req";
    $checkCount_connect = mysqli_query($con, $checkCount);
    $rows = mysqli_fetch_array($checkCount_connect);
    $no_qtn_list = $rows['no_of_qtn'];
    return $no_qtn_list;
}
$readonly = findCound($con, $_GET['id']) >= $no_of_rooms ? 'readonly' : '';
$disabled = findCound($con, $_GET['id']) >= $no_of_rooms ? 'disabled' : '';
$conting_val = $no_of_rooms - findCound($con, $_GET['id']);
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('siderbar.php'); ?>
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
                                                <h5 class="card-title text-primary">Upload Quiz! 🎉</h5>
                                                <p class="mb-4">
                                                    This module enables teachers to upload assigned quizzes, including
                                                    questions and answers. Teachers can choose to upload directly from
                                                    an Excel or CSV file, or manually enter quiz details for efficient
                                                    management
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
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <strong>Registered Questions:
                                                    <span id="no_count"><?= findCound($con, $_GET['id']); ?></span>/<span><?= $no_of_rooms; ?></span></strong>
                                                    

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Form controls -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="card-header">Total Number of Questions
                                                        <?= $no_of_rooms; ?> :</h5>
                                                </div>

                                                <div class="col-md-6">
                                                    <form action="csv.php" method="POST" enctype="multipart/form-data">
                                                    <p class="text-end p-2">Download the Model Template : <a href="model_template_question.csv"><i class="bx bx-download btn btn-primary btn-sm me-2"></i></a></p>
                                                        <div class="row mt-3">
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="manage_id"
                                                                    value="<?= $_GET['id']; ?>">
                                                                <input type="hidden" id="number_of_rooms"
                                                                    name="numOf_qts" value="<?= $conting_val; ?>">
                                                                <label class="form-label">Upload Csv file</label>
                                                                <input type="file" oninput="csv_check()" id="csv_file_check" <?= $readonly; ?> required='required' name="name" class="form-control" accept=".csv" <?= $disabled; ?>>

                                                                <p id="res" class="text-danger mt-1"></p>
                                                            </div>
                                                            <div class="col-md-4">
                                                            <button class="btn btn-info mt-4" type="submit" name="importSubmit" id="importSubmit" <?= $disabled; ?>>Submit</button>

                                                            </div>
                                                        </div>
                                                        
                                                        <p><a href="#" class="modal-link" data-toggle="modal" data-target="#csvTableModal">
                                    View Example of Uploading a CSV File</a>
                                </p>
                                                    </form>

                                                </div>
                                            </div>
                                            <hr>
                                            <form id="questions_form">
                                                <input type="hidden" name="manage_id" value="<?= $_GET['id']; ?>">
                                                <input type="hidden" name="no_of_questions_count"
                                                    value="<?= $no_of_rooms; ?>">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Enter Questions:</label>
                                                                <textarea name='questions' rows="4" cols="40"
                                                                    <?= $readonly; ?> class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="Enter Question"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlReadOnlyInput1"
                                                                        class="form-label">Option 1 (A):</label>
                                                                    <input type="text" name='option1' <?= $readonly; ?>
                                                                        class="form-control mb-2"
                                                                        id="defaultFormControlInput"
                                                                        placeholder="Enter Option 1 (A)"
                                                                        aria-describedby="defaultFormControlHelp"
                                                                        required />
                                                                    <label for="exampleFormControlReadOnlyInput1"
                                                                        class="form-label">Option 3 (C):</label>
                                                                    <input type="text" name='option3' <?= $readonly; ?>
                                                                        class="form-control"
                                                                        id="defaultFormControlInput"
                                                                        placeholder="Enter Option 3 (C)"
                                                                        aria-describedby="defaultFormControlHelp"
                                                                        required />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlReadOnlyInput1"
                                                                        class="form-label">Option 2 (B):</label>
                                                                    <input type="text" name='option2' <?= $readonly; ?>
                                                                        class="form-control mb-2"
                                                                        id="defaultFormControlInput"
                                                                        placeholder="Enter Option 2 (B)"
                                                                        aria-describedby="defaultFormControlHelp"
                                                                        required />
                                                                    <label for="exampleFormControlReadOnlyInput1"
                                                                        class="form-label">Option 4 (D):</label>
                                                                    <input type="text" name='option4' <?= $readonly; ?>
                                                                        class="form-control"
                                                                        id="defaultFormControlInput"
                                                                        placeholder="Enter Option 4 (D)"
                                                                        aria-describedby="defaultFormControlHelp"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-center mt-4">
                                                            <div class="col-md-3">
                                                                <label for="exampleFormControlReadOnlyInput1"
                                                                    class="form-label">Answer Key:</label>
                                                                <select name='ans_key' id="defaultFormControlInput"
                                                                    <?= $readonly; ?> class="form-select"
                                                                    aria-label="Default select example" required>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="C">C</option>
                                                                    <option value="D">D</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-end">
                                                            <button class="btn btn-success" type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include('footer.php'); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="modal fade " id="csvTableModal" tabindex="-1" role="dialog" aria-labelledby="csvTableModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="csvTableModalLabel">Example for uploading csv file</h5><br>
                        <span aria-hidden="true"> <img src="../admin/remove.png" class="close" data-dismiss="modal"
                                aria-label="Close"> </img></span>
                    </div>
                    <div class="modal-body">
                        <!-- Table content -->
                        <div class="table-responsive p-0">
                            <table class="table  table-hover table-striped table-bordered ">
                                <thead>
                                    <tr>

                                        <th scope="col">Questions</th>
                                        <th scope="col">Option1(A)</th>
                                        <th scope="col">Option2(B)</th>
                                        <th scope="col">Option3(C)</th>
                                        <th scope="col">Option4(D)</th>
                                        <th scope="col">Answer key</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>What is 2+2?</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>1</td>
                                        <td>B</td>
                                    </tr>
                                    <tr>

                                        <td>What is 1+2?</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>9</td>
                                        <td>A</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- start -->
        <script>
            function csv_check() {
                let csv_file_check = document.getElementById('csv_file_check');
                let importSubmit = document.getElementById('importSubmit');
                let res = document.getElementById('res');
                let fileName = csv_file_check.value;
                let fileExt = fileName.split('.').pop().toLowerCase();
                if (fileExt === 'csv') {
                    importSubmit.removeAttribute('disabled');
                    res.innerText = '';
                } else {
                    importSubmit.setAttribute('disabled', 'disabled');
                    res.innerText = '.csv files Only allowed';
                }
            }

            let form = document.getElementById('questions_form');
            let no_count = document.getElementById('no_count');
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                let data = new FormData(form);

                let xhr = new XMLHttpRequest();
                xhr.open('POST', 'ajax/login_crud.php', true);
                xhr.onload = function () {
                    var response = JSON.parse(xhr.responseText);
                    if (xhr.status >= 200 && xhr.status < 300) {
                        if (response.registered == 1) {
                            form.reset();
                            no_count.textContent = response.no_qts;
                            alert('Success: Quiz registered.');
                            document.getElementById('number_of_rooms').value = response.res_no;
                        } else if (response.registered == 2) {
                            no_count.textContent = response.no_qts;
                            alert('Server response: ' + xhr.responseText);
                        } else if (response.registered == 3) {
                            alert('Complete the Questions & Answers');
                            location.reload();
                        } else if (response.registered == 4) {
                            alert('This Question Already registered');
                        }
                    } else {
                        alert('Request failed. Please try again later.');
                    }
                };
                xhr.onerror = function () {
                    alert('Network error occurred. Please try again later.');
                };
                xhr.send(data);
            });
        </script>
        <!-- end -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"
        integrity="sha384-0V/Vd9U8NMX5ZDOLOyJpBMGA2wtmh1j6vCGdS8F9bLOz4XC0o4Bab3djBhQv8yH+"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
