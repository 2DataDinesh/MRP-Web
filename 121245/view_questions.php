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
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $user_con = 'manage_id ='.$id;
    $Standards = User_details('qtn_ans', $user_con, $con);
  }
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
                                                <h5 class="card-title text-primary">View Uploaded Quiz! 🎉</h5>
                                                <p class="mb-4">
                                                    This module allows teachers to view uploaded quizzes, including
                                                    questions and answers. Teachers can also edit quiz details,
                                                    including questions and options, for seamless customization and
                                                    management.
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
                                                <div class="table-responsive ">
                                                    <div class="table-responsive">
                                                        <div class="table-responsive text-nowrap text-center">
                                                            <?php if(!empty($Standards)){ ?>
                                                            <table class="table table-hover text-center table-bordered"
                                                                id="teachersTable">
                                                                <thead class='table-info'>
                                                                    <tr>
                                                                        <th>Qtn.No</th>
                                                                        <th width="30%">Questions</th>
                                                                        <th>(A)</th>
                                                                        <th>(B)</th>
                                                                        <th>(C)</th>
                                                                        <th>(D)</th>
                                                                        <th>Answer Key</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-border-bottom-0">
                                                                    <?php $i=1; foreach($Standards as $values){ ?>
                                                                    <tr>
                                                                        <td><?=$i; ?></td>
                                                                        <td><?=$values['qstn']; ?></td>
                                                                        <td style="text-align:justify;">
                                                                            <?=$values['options1']; ?></td>
                                                                        <td><?=$values['options2']; ?></td>
                                                                        <td><?=$values['options3']; ?></td>
                                                                        <td><?=$values['options4']; ?></td>
                                                                        <td><?=$values['ans']; ?></td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="UpdatedValues(<?=$values['id']; ?>)"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#staticBackdrop"
                                                                                class="btn btn-success mt-2"
                                                                                title="Edit"><i
                                                                                    class="bx bx-edit-alt me-1"></i></button>
                                                                            <button class="btn btn-warning mt-2"
                                                                                onclick="DeleteValues(<?=$values['id']; ?>)"
                                                                                title="Delete"><i
                                                                                    class="bx bx-trash me-1"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $i++; } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php }else{  ?>
                                                            <h4 class="text-danger">Please Upload Questions and answers
                                                                first
                                                            </h4>
                                                            <?php }?>
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
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-large">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Question & answer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="response_part"></div>
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

    <script>
    $(document).ready(function() {
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
    });
    </script>
    <script>
    // remove
    function DeleteValues(id) {
        if (confirm("Are you sure, you want to delete this room?")) {
            let data = new FormData();
            data.append('id', id);
            data.append('delete', '');
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/login_crud.php', true);

            xhr.onload = function() {
                if (xhr.responseText == true) {
                    alert('remove successfully');
                    location.reload();
                } else {
                    alert('server down');
                }
            };
            xhr.send(data);
        }
    };
    // update 

    async function UpdatedValues(id) {
        let data = new FormData();
        data.append('id', id);
        data.append('update', '');

        try {
            const response = await fetch('ajax/view_questions.php', {
                method: 'POST',
                body: data
            });

            if (response.ok) {
                const html = await response.text();
                document.getElementById('response_part').innerHTML = html;
            } else {
                throw new Error('Request failed. Please try again later.');
            }
        } catch (error) {
            alert(error.message);
        }
    }
    // 
    function upd_submit() {
        let form = document.getElementById('assign_quiz');
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData(form);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/view_questions.php', true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    if (xhr.responseText == 1) {
                        form.reset();
                        alert('Updated success');
                        location.reload();
                    } else if (xhr.responseText == 4) {
                        alert('This Question Is already Registered');
                    } else {
                        alert('Server response: ' + xhr.responseText);
                    }
                } else {
                    alert('Request failed. Please try again later.');
                }
            };
            xhr.onerror = function() {
                alert('Network error occurred. Please try again later.');
            };
            xhr.send(data);
        });
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