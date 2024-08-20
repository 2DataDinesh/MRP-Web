<?php
include "db_config.php";
$id=$_GET['id'];
$query=mysqli_query($con,"select * from admin_details where id='$id'");
if($row=mysqli_fetch_array($query)){
    $id=$row['id'];
    $class=$row['class'];
    $section=$row['section'];
    $subject=$row['subject'];
}
?>
<?php
  include "header.php";
 

  ?>
   <!-- Form controls -->
   <div class="layout-wrapper layout-content-navbar">
   <div class="layout-container">
        
                <?php
                include "siderbar.php";
                ?>
           
           <div class="layout-page">
            <?php include "navbar.php"; ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

               

                    
                      
                        <div class="content-wrapper">
                            <div class="container-xxl flex-grow-1 container-p-y">

    
                  <div class="card ">
                    <h5 class="card-header">Form Controls</h5>
                    <div class="card-body">
                    <form action="upd_admin_details.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Class<span style="color:red;">*</span></label>
                                    <select class="form-select" id="classSelect" name="class" aria-label="Select Class" value="<?php echo $class; ?>" required>
                                        <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                                        <?php
                                        include "db_config.php";
                                        $query = "SELECT DISTINCT class FROM admin_details ORDER BY class desc";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['class'] . '">' . $row['class'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sectionSelect" class="form-label">Section<span style="color:red;">*</span></label>
                                    <select class="form-select" id="sectionSelect" name="section" aria-label="Select Section"  value="<?php echo $section; ?>"required>
                                        <option value="<?php echo $section;?>"><?php echo $section;?></option>
                                        <!-- Options will be dynamically populated based on selected class -->
                                    </select>
                   <div class="mb-3">
                     
                     <label for="exampleFormControlInput1" class="form-label">subject*</label>
                     <input
                       type="text"
                       name="subject"
                       class="form-control"
                       id="exampleFormControlInput1"
                       placeholder="Enter subject"
                        value="<?php echo $subject;?>"
                        required
                     />
                   </div>
                        <div class="mb-3">
                       
                        <input
                          type="submit"
                         class="btn btn-outline-primary"
                         id="inputGroupFileAddon03"
                          aria-describedby="inputGroupFileAddon03"
                          aria-label="Upload"
                          name="submit"
                          value="Update"
                        />
                        </div>
                      
                      

                      
                     
                      
</form>
</table>
                                    </div>
                                </div>
                                <!--/ Responsive Table -->
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

               </script>
</body>

</html>
                 
