<?php
include "header.php";
session_start();
?>

<!-- Form controls -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- sidebar and navbar -->
        <?php include('siderbar.php'); ?>

        <div class="layout-page">
            <?php include "navbar.php"; ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <h5 class="card-header">Upload CSV File
                        <p class=" text-end">Download the Model Template : <a href="model_template_student.csv"><i class="bx bx-download btn btn-primary btn-sm me-2"></i></a></p></h5>
                        <div class="card-body">
                            <form action="add_student.php" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile02" accept=".csv" required />
                                    <!-- Add 'accept=".csv"' to only accept CSV files -->
                                    <input type="submit" class="btn btn-outline-primary" id="inputGroupFileAddon03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="upload" value="Upload" />
                                    <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please upload a CSV file.</div>
                                </div>
                            </form>

                            <p><a href="#" class="modal-link" data-toggle="modal" data-target="#csvTableModal">
                                    View Example of Uploading a CSV File
                                </a></p>
                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p">
                    <div class="card">
                       
                            <h5 class="card-header">Students Registration</h5>
                      
                       
                        <div class="card-body">
                        <div class="col-sm">
                        <p class="text-right " style="justify-content:center;">
                            This module enables admin to upload (.csv)  or manually enter students details for efficient
                            management. </p>
                            </div>
                        <p class="text-right  " style="justify-content:center;">
                        </p>
                                
                            <form action="add_student.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlInput1" class="form-label">Student Name<span style="color:red;">*</span></label>
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Student Name" pattern="[A-Za-z. ]+" title="Only letters and full stops are allowed" required />
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i> Please enter a
                                            valid name (only letters and full stops).</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Date Of Birth<span style="color:red;">*</span></label>
                                        <input class="form-control" type="date" name="dateofbirth" id="exampleFormControlReadOnlyInput1" placeholder="Date of Birth" required />
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please enter a
                                            valid date of birth.</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="phoneInput" class="form-label">Mobile Number<span style="color:red;">*</span></label>
                                        <input type="tel" class="form-control" placeholder="Enter Your mobile number" minlength="10" maxlength="10" title="Phone number must start with 9, 8, 7, or 6 followed by 9 digits" oninput="phoneNumberValidation(event)" pattern="^[7896][0-9]{9}$" required name="phone" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Email
                                            Address<span style="color:red;">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email_tag" placeholder="Enter Your email" required>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please enter a
                                            valid email address.</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlSelect1" class="form-label">Class<span style="color:red;">*</span></label>
                                        <select class="form-select" id="classSelect" name="class" aria-label="Select Class" required>
                                            <option value="">Select Class</option>
                                            <?php
                                            include "db_config.php";
                                            $query = "SELECT DISTINCT class FROM admin_details ORDER BY class DESC";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $row['class'] . '">' . $row['class'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a
                                            class.</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="sectionSelect" class="form-label">Section<span style="color:red;">*</span></label>
                                        <select class="form-select" id="sectionSelect" name="section" aria-label="Select Section" required>
                                            <option value="">Select Section</option>
                                            <!-- Options will be dynamically populated based on selected class -->
                                        </select>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a
                                            section.</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="houseSelect" class="form-label">House<span style="color:red;">*</span></label>
                                        <select class="form-select" id="houseSelect" name="house" aria-label="Select House" required>
                                            <option value="">Select House</option>
                                            <option value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Green">Green</option>
                                            <option value="Yellow">Yellow</option>
                                        </select>
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a house.</div>
                                    </div>

                                    <div class="mb-3 text-end col-md-12">
                                        <input type="submit" class="btn btn-outline-primary" id="inputGroupFileAddon03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="submit" value="Submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/ Responsive Table -->
                </div>
            </div>


            <div class="modal fade" id="csvTableModal" tabindex="-1" role="dialog" aria-labelledby="csvTableModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="csvTableModalLabel">Example for uploading csv file</h5>

                            <span aria-hidden="true"> <img src="remove.png" class="close" data-dismiss="modal" aria-label="Close"> </img></span>
                        </div>
                        <div class="modal-body">
                            <!-- Table content -->
                            <div class="table-responsive">
                                <table class="table  table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th scope="col">Name</th>
                                            <th scope="col">Date Of Birth</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Email Address</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">House</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>abi</td>
                                            <td>21-06-2024</td>
                                            <td>9090909090</td>
                                            <td>example1@gmail.com</td>
                                            <td>1</td>
                                            <td>A</td>
                                            <td>Red</td>
                                        </tr>
                                        <tr>

                                            <td>leela</td>
                                            <td>06-04-2005</td>
                                            <td>9878987890</td>
                                            <td>example2@gmail.com</td>
                                            <td>2</td>
                                            <td>B</td>
                                            <td>Blue</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!--footer start-->
            <?php include('footer.php'); ?>
            <!--footer End-->
            <script src="assets/vendor/libs/jquery/jquery.js"></script>
            <script src="assets/vendor/libs/popper/popper.js"></script>
            <script src="assets/vendor/js/bootstrap.js"></script>
            <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="assets/vendor/js/menu.js"></script>
            <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/dashboards-analytics.js"></script>
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-0V/Vd9U8NMX5ZDOLOyJpBMGA2wtmh1j6vCGdS8F9bLOz4XC0o4Bab3djBhQv8yH+" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Function to populate sections based on selected class
                    $('#classSelect').change(function() {
                        var classSelected = $(this).val();
                        if (classSelected) {
                            $.ajax({
                                type: 'POST',
                                url: 'get_sections.php', // PHP script to fetch sections based on class
                                data: {
                                    class: classSelected
                                },
                                success: function(response) {
                                    $('#sectionSelect').html(response);
                                }
                            });
                        } else {
                            $('#sectionSelect').html('<option value="">Select Section</option>');
                        }
                    });
                    $(document).ready(function() {
                        $('.datepicker').datepicker({
                            format: 'dd/mm/yyyy', // Set your desired date format here
                            autoclose: true,
                            orientation: 'bottom'
                        }).on('changeDate', function(e) {
                            $(this).datepicker('hide'); // Hide the datepicker after a date is selected
                        }).keydown(false); // Disable keyboard input
                    });
                    // Form validation on submit
                    $('form').submit(function(event) {
                        var form = this;
                        var isValid = true;

                        // Convert email to lowercase
                        var emailInput = $('#email_tag').val().toLowerCase();
                        $('#email_tag').val(emailInput);

                        // Validate each input field
                        $(this).find(':input[required]').each(function() {
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

                function phoneNumberValidation(event) {
                    var phoneNumber = event.target.value;

                    // Allow only numerical input
                    if (isNaN(phoneNumber)) {
                        event.target.value = phoneNumber.slice(0, -1); // Remove non-numeric character
                        return;
                    }

                    // Block first digit if it's '0'
                    if (phoneNumber.length === 1 && phoneNumber[0] === '0') {
                        event.target.value = ''; // Clear input if it starts with '0'
                        return;
                    }

                    // Limit input to 10 digits
                    if (phoneNumber.length > 10) {
                        event.target.value = phoneNumber.slice(0, 10); // Trim input to 10 characters
                    }
                }
                document.addEventListener('DOMContentLoaded', function() {
                    var dateOfBirthInput = document.getElementById('exampleFormControlReadOnlyInput1');

                    dateOfBirthInput.addEventListener('focus', function() {
                        this.type = 'date';
                        this.focus();
                    });

                    dateOfBirthInput.addEventListener('blur', function() {
                        this.type = 'text';
                    });
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var dateField = document.getElementById('exampleFormControlReadOnlyInput1');

                    dateField.addEventListener('keydown', function(e) {
                        e.preventDefault(); // Prevent any keyboard input
                    });

                    dateField.addEventListener('paste', function(e) {
                        e.preventDefault(); // Prevent pasting into the input field
                    });

                    dateField.addEventListener('cut', function(e) {
                        e.preventDefault(); // Prevent cutting text from the input field
                    });
                });
                $(document).ready(function() {
                    // Function to set max date to today for date input
                    var today = new Date().toISOString().split('T')[0];
                    $('#exampleFormControlReadOnlyInput1').attr('max', today);
                });
            </script>


        </div>
    </div>
</div>
</body>

</html>