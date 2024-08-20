<?php
session_start();
error_reporting(0);
include "db_config.php"; // Include database configuration once

// Fetch student details based on stid from GET parameter
$stid = isset($_GET['stid']) ? mysqli_real_escape_string($con, $_GET['stid']) : '';
$query = mysqli_query($con, "SELECT * FROM student WHERE stid='$stid'");
if ($row = mysqli_fetch_array($query)) {
    $stid = $row['stid'];
    $names = $row['name'];
    $dob = $row['dob'];
    $phone = $row['phone'];
    $email = $row['email'];
    $class = $row['class'];
    $section = $row['section'];
    $house = $row['house'];
}
?>
<?php include "header.php"; ?>

<!-- Form controls -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php include('siderbar.php'); ?>
        
        <div class="layout-page">
            <?php include "navbar.php"; ?>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <h5 class="card-header">Update Student Information</h5>
                        <div class="card-body">
                            <form action="upd_student.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($stid); ?>">
                                
                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">Student Name<span style="color:red;">*</span></label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Student Name"  pattern="[A-Za-z. ]+" value="<?php echo htmlspecialchars($names); ?>" required />
                                    <div class="invalid-feedback">Please enter a valid name containing only alphabetic characters.</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                <?php
                                                $date = new DateTime($dob);
                                                $dob1 = $date->format('Y-m-d');
                                           
                                            ?>
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Date Of Birth<span style="color:red;">*</span></label>
                                    <input class="form-control" type="date" name="dob" id="exampleFormControlReadOnlyInput1" value="<?php echo htmlspecialchars($dob1);?>" placeholder="Date of Birth" required />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="phoneInput" class="form-label">Mobile Number<span style="color:red;">*</span></label>
                                    <input type="tel" class="form-control" placeholder="Enter Your mobile number"  pattern="^[7896][0-9]{9}$" minlength="10" maxlength="10" title="Phone number must start with 9, 8, 7, or 6 followed by 9 digits" oninput="phoneNumberValidation(event)" pattern="^[7896][0-9]{9}$" required name="phone" value="<?php echo htmlspecialchars($phone); ?>" />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Email
                                            Address<span style="color:red;">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email_tag" value="<?php echo $email; ?>"
                                            placeholder="Enter Your email" required>
                                       
                                    </div>

                                <div class="mb-3 col-md-6">
                                    <label for="exampleFormControlSelect1" class="form-label">Class<span style="color:red;">*</span></label>
                                    <select class="form-select" id="classSelect" name="class" aria-label="Select Class" required>
                                        <option value="<?php echo htmlspecialchars($class); ?>"><?php echo htmlspecialchars($class); ?></option>
                                        <?php
                                        $query = "SELECT DISTINCT class FROM admin_details ORDER BY class DESC";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . htmlspecialchars($row['class']) . '">' . htmlspecialchars($row['class']) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="sectionSelect" class="form-label">Section<span style="color:red;">*</span></label>
                                    <select class="form-select" id="sectionSelect" name="section" aria-label="Select Section" required>
                                        <option value="<?php echo htmlspecialchars($section); ?>"><?php echo htmlspecialchars($section); ?></option>
                                        <!-- Options will be dynamically populated based on selected class -->
                                    </select>
                                </div>

                                        <!-- Add the House dropdown field here -->
        <div class="mb-3 col-md-6">
            <label for="houseSelect" class="form-label">House<span style="color:red;">*</span></label>
            <select class="form-select" id="houseSelect" name="house" aria-label="Select House" required>
                <option value="">Select House</option>
                <option value="Red" <?php echo ($house == 'Red') ? 'selected' : ''; ?>>Red</option>
                <option value="Blue" <?php echo ($house == 'Blue') ? 'selected' : ''; ?>>Blue</option>
                <option value="Green" <?php echo ($house == 'Green') ? 'selected' : ''; ?>>Green</option>
                <option value="Yellow" <?php echo ($house == 'Yellow') ? 'selected' : ''; ?>>Yellow</option>
            </select>
            <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please select a house.</div>
        </div>
        

                                <div class="mb-3 text-end">
                                    <input type="submit" class="btn btn-outline-primary" name="submit" value="Submit" />
                                </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
            <script src="assets/vendor/libs/jquery/jquery.js"></script>
            <script src="assets/vendor/libs/popper/popper.js"></script>
            <script src="assets/vendor/js/bootstrap.js"></script>
            <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="assets/vendor/js/menu.js"></script>
            <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
            <script src="assets/js/main.js"></script>
            <script>
                $(document).ready(function() {
                    // Function to populate sections based on selected class
                    $('#classSelect').change(function() {
                        var classSelected = $(this).val();
                        if (classSelected) {
                            $.ajax({
                                type: 'POST',
                                url: 'get_sections.php',
                                data: { class: classSelected },
                                success: function(response) {
                                    $('#sectionSelect').html(response);
                                }
                            });
                        } else {
                            $('#sectionSelect').html('<option value="">Select Section</option>');
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
                $(document).ready(function () {
    // Function to set max date to today for date input
    var today = new Date().toISOString().split('T')[0];
    $('#exampleFormControlReadOnlyInput1').attr('max', today);
});
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var nameInput = document.getElementById('exampleFormControlInput1');

                    nameInput.addEventListener('input', function() {
                        var inputValue = nameInput.value.trim();
                        var isValid = /^[A-Za-z.]+$/.test(inputValue);

                        if (isValid || inputValue === '') {
                            nameInput.setCustomValidity('');
                            nameInput.classList.remove('is-invalid');
                        } else {
                            nameInput.setCustomValidity('Only alphabetic characters are allowed');
                            nameInput.classList.add('is-invalid');
                        }
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
</script>
        </div>
    </div>
</div>
