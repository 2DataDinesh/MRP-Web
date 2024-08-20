<?php
  session_start();
  error_reporting(0);
include "db_config.php";
$tid=$_GET['tid'];
$query=mysqli_query($con,"select * from teacher where tid='$tid'");
if($row=mysqli_fetch_array($query)){
    $tid=$row['tid'];
    $name=$row['name'];
    $dob=$row['dob'];
    $phone=$row['phone'];
    $email=$row['email'];
    $tclass=$row['tclass'];
    $tsection=$row['tsection'];
}
?>
<?php include "header.php"; ?>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- sidebar and navbar -->
        <?php include('siderbar.php'); ?>
        <div class="layout-page">
            <?php include "navbar.php";?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                    <h5 class="card-header">Update Teacher</h5>
                    <div class="card-body">
                     
                    <form action="upd_teacher.php" method="post" >
                    <div class="row">
                      <div class="mb-3  col-md-6">
                     <input type="hidden" name="tid" value="<?php echo$tid;?>">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input
                          type="text"
                          name="name"
                          class="form-control"
                          id="exampleFormControlInput1"
                          placeholder="name" value="<?php echo$name;?>"
                          required
                        />
                      </div>
                      <div class="mb-3  col-md-6">
                                            <?php
                                                $date = new DateTime($dob);
                                                $dob1 = $date->format('Y-m-d');
                                           
                                            ?>
            <label for="exampleFormControlReadOnlyInput1" class="form-label">Date Of Birth<span style="color:red;">*</span></label>
            <input class="form-control" type="date" name="dob" id="exampleFormControlReadOnlyInput1" placeholder="Date of Birth" required   value="<?php echo $dob1; ?>" placeholder="Date of Birth" required />
      
        </div>
        <div class="mb-3 col-md-6">
                                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Phone
                                            Number<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="phone" id="phoneNumber" placeholder="Enter mobile number" minlength="10" maxlength="10" pattern="^[6789][0-9]{9}$" title="Please enter a 10-digit number starting with 6, 7, 8, or 9." required value="<?php echo $phone; ?>">
                                        <div class="invalid-feedback"><i class='bx bx-error-circle'></i>Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9.</div>
                                    
                      </div>
                      <div class="mb-3  col-md-6">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Email Address</label>
                        <input
                          class="form-control"
                          type="email"
                            name="email"
                          id="exampleFormControlReadOnlyInput1"
                          placeholder="Enter Your email"value="<?php echo$email;?>"
                          required
                        />
                      </div>
                    
                      <div class="mb-3  col-md-6">
                                    <label for="exampleFormControlSelect1" class="form-label">Class<span style="color:red;">*</span></label>
                                    <select class="form-select" id="classSelect" name="tclass" aria-label="Select Class" value="<?php echo $tclass;?>" required>
                                        <option value="<?php echo $tclass;?>"><?php echo $tclass;?></option>
                                        <?php
                                        include "db_config.php";
                                        $query = "SELECT DISTINCT class FROM admin_details ORDER BY class DESC";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['class'] . '">' . $row['class'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3  col-md-6">
                                    <label for="sectionSelect" class="form-label">Section<span style="color:red;">*</span></label>
                                    <select class="form-select" id="sectionSelect" name="tsection" aria-label="Select Section" value="<?php echo $tsection;?>" required>
                                        <option value="<?php echo $tsection;?>"><?php echo $tsection;?></option>
                                        <!-- Options will be dynamically populated based on selected class -->
                                    </select>
                                </div>
                        <div class="mb-3 text-end">
                       
                        <input
                          type="submit"
                         class="btn btn-outline-primary"
                         id="inputGroupFileAddon03"
                          aria-describedby="inputGroupFileAddon03"
                          aria-label="Upload"
                          name="submit"
                          value="submit"
                        />
                        </div>
                        </div>
                        </form>
                      
                    </div>
                  </div>
                
</div>
                </div>
                  <?php
                  include "footer.php";
                  ?>
                     <script>
                $(document).ready(function() {
                    // Function to populate sections based on selected class
                    $('#classSelect').change(function() {
                        var classSelected = $(this).val();
                        if (classSelected) {
                            $.ajax({
                                type: 'POST',
                                url: 'get_sections.php', // PHP script to fetch sections based on class
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
        if (isNaN(event.data)) {
            event.preventDefault();
            return false;
        }

        // Ensure the first digit is 6, 7, 8, or 9
        if (phoneNumber.length === 0 && !['6', '7', '8', '9'].includes(event.key)) {
            event.preventDefault();
            return false;
        }

        // Block input if phone number length exceeds 10
        if (phoneNumber.length >= 10) {
            event.preventDefault();
            return false;
        }

        return true;
    }
            </script>
            <script>
    document.addEventListener('DOMContentLoaded', function () {
        var nameInput = document.getElementById('exampleFormControlInput1');

        nameInput.addEventListener('input', function () {
            var inputValue = nameInput.value.trim();
            var isValid = /^[A-Za-z]+$/.test(inputValue);

            if (isValid || inputValue === '') {
                nameInput.setCustomValidity('');
                nameInput.classList.remove('is-invalid');
            } else {
                nameInput.setCustomValidity('Only alphabetic characters are allowed');
                nameInput.classList.add('is-invalid');
            }
        });
    });
    $(document).ready(function () {
    // Function to set max date to today for date input
    var today = new Date().toISOString().split('T')[0];
    $('#exampleFormControlReadOnlyInput1').attr('max', today);
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
<script src="assets/vendor/libs/jquery/jquery.js"></script>
            <script src="assets/vendor/libs/popper/popper.js"></script>
            <script src="assets/vendor/js/bootstrap.js"></script>
            <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="assets/vendor/js/menu.js"></script>
            <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="assets/js/dashboards-analytics.js"></script>
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <script>