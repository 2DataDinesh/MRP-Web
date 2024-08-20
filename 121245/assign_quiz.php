<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<?php
      include('header.php');
      function check_questions($value){
        $specific_word = "";
     $words = explode(" ", $value);
     for( $i = 0; $i < count($words); $i++ ){
     $specific_word .= $words[$i];
     }
     $final_output = strtoupper($specific_word);
     return $final_output;
     }

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
                                                <h5 class="card-title text-primary">Assign Quiz! 🎉</h5>
                                                <p class="mb-4">
                                                    Enable teachers to create and assign quizzes with customized
                                                    questions and answers for specific classes and sections, ensuring
                                                    clear communication and effective student participation.
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
                                                <form id="assign_quiz">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Standard</label>
                                                                <select class="form-select" onchange="SelectStandard()"
                                                                    name="standard"
                                                                    id="exampleFormControlSelectStandard"
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
                                                                    aria-label="Default select example" required
                                                                    disabled>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">subject</label>
                                                                <select class="form-select"
                                                                    id="exampleFormControlSubject" name='subject'
                                                                    aria-label="Default select example" required
                                                                    disabled>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">topic</label>
                                                                <input type="text" name='topic' class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="Enter Topic"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlReadOnlyInput1"
                                                                    class="form-label">No.of Questions</label>
                                                                <input type="number" name='no_of_questions'
                                                                    class="form-control" max="150" min="1"
                                                                    onkeyup="MaxNumber()" id="defaultFormControlInputs"
                                                                    placeholder="No.of.Questions"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Total Marks</label>
                                                                <input type="text" name='total_marks'
                                                                    onkeyup="MinimumZero()"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                                    class="form-control" id="defaultFormControlInputs1"
                                                                    placeholder="Enter Total Marks"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlReadOnlyInput1"
                                                                    class="form-label">Time Duration (in
                                                                    minutes)</label>
                                                                <input type="text" name='no_hours' value="30"
                                                                    class="form-control" onmouseout="MaxNumber_length()"
                                                                    id="defaultFormControlInput_minutes" placeholder="Time Duration (in
                                                                    minutes)" aria-describedby="defaultFormControlHelp"
                                                                    required />
                                                                <small class="text-dark">Maximum duration allowed is 3
                                                                    hours (180 minutes) and minimum duration allowed is
                                                                    (10 minutes). 1 hour = 60 minutes.</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlReadOnlyInput1"
                                                                    class="form-label">description</label>
                                                                    <textarea name="description" id="text_area" onkeypress="check_words()" class="form-control" placeholder="Type here.." required></textarea>

                                                                <small class="text-dark float-end">Maximum 300 words
                                                                    only.</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-end">
                                                            <button type='submit' name='Register'
                                                                class='btn btn-danger'>Register</button>
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
                </div>
                <?php  include('footer.php'); ?>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
  
  
    <!-- start -->
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


    function MaxNumber_length() {
        let values = document.getElementById('defaultFormControlInput_minutes');
        if (values.value.charAt(0) === '0') {
            values.value = '';
        }
        if (values.value > 180) {
            alert(
                'Maximum duration allowed is 3 hours (180 minutes) and minimum duration allowed is 10 (minutes). 1 hour = 60 minutes.'
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
        if (Number(values.value) > 300) {
            alert('Maximum of 300 marks allowed.');
            values.value = 300;
        }
      
    }

    function MaxNumber() {
        let values = document.getElementById('defaultFormControlInputs');
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
    // 
    let form = document.getElementById('assign_quiz');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData(form);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/login_crud.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                if (xhr.responseText == 1) {
                    form.reset();
                    alert('Success: Quiz registered.');
                } else if (xhr.responseText == 3) {
                    alert('This Topic is Already registered.');
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
</body>

</html>