<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<?php
include "header.php";
$users_list = Single_userFetch('manage_quiz',$con);
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
                                                <h5 class="card-title text-primary">View Quiz! 🎉</h5>
                                                <p class="mb-4">
                                                    This module allows registered teachers to view and edit quiz
                                                    details, facilitating seamless management of quizzes for different
                                                    classes and sections
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
                                                        <table class="table table-striped table-bordered"
                                                            id="teachersTable">
                                                            <thead class='table-info'>
                                                                <tr>
                                                                    <th>Standard</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Topic</th>
                                                                    <th>No.of.Questions</th>
                                                                    <th>Total Marks</th>
                                                                    <th>Timing</th>
                                                                    <th>Staff Name</th>
                                                                    <th class="w-20">Action</th>
                                                                    <th>Upload Questions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                <?php foreach($users_list as $values){
                                                                $whereClause ='tid ='.$values['staff_id'];
                                                              $find_teacher = AlreadyRegisterCheck('teacher', $whereClause, $con);
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <strong><?=$values['std'] .'<sup>th</sup>'; ?></strong>
                                                                    </td>
                                                                    <td><?=$values['section']; ?></td>
                                                                    <td><?=$values['subject']; ?></td>
                                                                    <td><?=$values['topic']; ?></td>
                                                                    <td><?=$values['no_of_qustions']; ?></td>
                                                                    <td><?=$values['total']; ?></td>
                                                                    <td><?=$values['time']; ?></td>
                                                                    <td><?=$find_teacher['user']['name']; ?></td>
                                                                    <td>
                                                                        <button type="button"
                                                                            onclick="UpdatedValues(<?=$values['id']; ?>)"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"
                                                                            class="btn btn-success mt-2"
                                                                            data-bs-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-bs-placement="top" title="Edit"><i
                                                                                class="bx bx-edit-alt me-1"></i></button>

                                                                        <button class="btn btn-warning mt-2"
                                                                            onclick="DeleteValues(<?=$values['id']; ?>)"
                                                                            title="Delete"><i
                                                                                class="bx bx-trash me-1"></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href="Upload_questions.php?id=<?=$values['id']; ?>"
                                                                            class="btn btn-primary mt-2"
                                                                            title="Upload Qts & Ans "><i
                                                                                class="fa-solid fa-upload"></i></a>
                                                                        <a href="view_questions.php?id=<?=$values['id']; ?>"
                                                                            class="btn btn-info mt-2"
                                                                            title="View Qts & Ans"><i
                                                                                class="fa-regular fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
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
           
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Details</h5>
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
        function check_words() {
    let textareaValue = document.getElementById('text_area').value;
    let wordCount = textareaValue.trim().split(/\s+/).length;

    if (wordCount > 300) {
        alert('Maximum 300 words only allowed.');
        let wordsArray = textareaValue.trim().split(/\s+/);
        let truncatedText = wordsArray.slice(0, 300).join(' ');
        document.getElementById('text_area').value = truncatedText;
    }
}
    // section start
    function SelectStandard(ids) {
        let selectedStandard = document.getElementById('exampleFormControlSelectStandard' + ids).value;
        let data = new FormData();
        data.append('Standard', selectedStandard);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {
                    let sectionsDropdown = document.getElementById('exampleFormControlSection' + ids);
                    sectionsDropdown.innerHTML = result.res;

                    sectionsDropdown.removeAttribute('disabled');
                    document.getElementById('exampleFormControlSubject' + ids).setAttribute('disabled',
                        'disabled');
                } else {
                    alert('Error: Unable to retrieve sections.');
                    document.getElementById('exampleFormControlSection' + ids).setAttribute('disabled',
                        'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
                document.getElementById('exampleFormControlSection' + ids).setAttribute('disabled', 'disabled');
            }
        };
        xhr.onerror = function() {
            alert('Error: Network error occurred.');
            document.getElementById('exampleFormControlSection' + ids).setAttribute('disabled', 'disabled');
        };
        xhr.send(data);
    }

    // subject start
    function SelectSection(idds) {
        let selectedStandard = document.getElementById('exampleFormControlSection' + idds).value;
        let section_v = document.getElementById('section_v' + idds);
        section_v.value = selectedStandard;
        let data = new FormData();
        data.append('section', selectedStandard);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let result = JSON.parse(xhr.responseText);
                if (result.status === true) {
                    let sectionsDropdown = document.getElementById('exampleFormControlSubject' + idds);
                    sectionsDropdown.innerHTML = result.res;
                    sectionsDropdown.removeAttribute('disabled');
                } else {
                    alert('Error: Unable to retrieve sections.');
                    document.getElementById('exampleFormControlSubject' + idds).setAttribute('disabled',
                        'disabled');
                }
            } else {
                alert('Error: HTTP request failed.');
                document.getElementById('exampleFormControlSubject' + idds).setAttribute('disabled',
                    'disabled');
            }
        };
        xhr.onerror = function() {
            alert('Error: Network error occurred.');
            document.getElementById('exampleFormControlSubject' + idds).setAttribute('disabled', 'disabled');
        };
        xhr.send(data);
    }

    function get_subject(id) {
        let selectedStandard = document.getElementById('exampleFormControlSubject' + id).value;
        let subject_v = document.getElementById('subject_v' + id);
        subject_v.value = selectedStandard;
    }

    function MaxNumber_length() {
        let values = document.getElementById('defaultFormControlInput_minutes');
        if (values.value.charAt(0) === '0') {
            values.value = '';
        }
        if (values.value > 180) {
            alert(
                'Maximum duration allowed is 3 hours (180 minutes) and minimum duration allowed is (10 minutes). 1 hour = 60 minutes..'
            );
            values.value = 180;
        } else if (values.value < 10) {
            alert('Minimum  duration allowed 10 minutes.');
            values.value = 10;
        }
        let value = values.value;
        let newValue = '';
        for (let i = 0; i < value.length; i++) {
            if (value.charAt(i) !== '-') {
                newValue += value.charAt(i);
            }
        }
        values.value = newValue;
        values.value = values.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");
    }

    function MinimumZero() {

        let values = document.getElementById('defaultFormControlInputs1');
        if (values.value.charAt(0) === '0') {
            values.value = '';
        }
        values.value = values.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");
        if (Number(values.value) > 300) {
            alert('Maximum of 300 questions allowed.');
            values.value = 300;
        }
    }

    function MaxNumber(id) {
        let values = document.getElementById('defaultFormControlInputs' + id);
        var data = new FormData();
        data.append('id', id);
        data.append('result', values.value);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (this.responseText.trim() === 'true') {
                document.getElementById('buttons' + id).setAttribute('disabled', 'disabled');
            } else {
                document.getElementById('buttons' + id).removeAttribute('disabled');
            }
        };
        xhr.send(data);

        if (values.value.charAt(0) === '0') {
            values.value = '';
        }
        if (values.value > 150) {
            alert('Maximum of 150 questions allowed.');
            values.value = 150;
        }
        let value = values.value;
        let newValue = '';
        for (let i = 0; i < value.length; i++) {
            if (value.charAt(i) !== '-') {
                newValue += value.charAt(i);
            }
        }
        values.value = newValue;
    }
    // remove
    function DeleteValues(id) {
        if (confirm("Are you sure, you want to delete this exam?")) {
            let data = new FormData();
            data.append('id', id);
            data.append('remove', '');
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
            const response = await fetch('ajax/view_quiz.php', {
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
        let forms = document.getElementById('assign_quiz');
        forms.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData(forms);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/topics.php', true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    let stss = JSON.parse(xhr.responseText);
                    if (stss.sts == 1) {
                        forms.reset();
                        alert('Updated success');
                        location.reload();
                    } else if (stss.sts == 4) {
                        alert('This Topic is Already Registered');
                    } else {
                        forms.reset();
                        alert('Updated success');
                        location.reload();
                        alert('Server response: ' + stss);
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
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <!-- Your custom scripts -->
    <script src="assets/js/main.js"></script>
  
    </script>
   
</body>

</html>
