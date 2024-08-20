<?php
include "db_config.php";
$stid=$_GET['stid'];
$query=mysqli_query($con,"select * from student where stid='$stid'");
if($row=mysqli_fetch_array($query)){
    $id=$row['stid'];
    $name=$row['name'];
    $dob=$row['dob'];
    $phone=$row['phone'];
    $email=$row['email'];
    $class=$row['class'];
    $section=$row['section'];
}
?>
<?php
  include "header.php";
  include "navbar.php";
  ?>
   <!-- Form controls -->
    <div class="row container p-2">
            <div class="col-md-3">
                <?php
                include "siderbar.php";
                ?>
                </div>
     <div class="col-md-9 p-2">
    
                  <div class="card mb-4">
                    <h5 class="card-header">Form Controls</h5>
                    <div class="card-body">
                    <form action="upd_student.php" method="post" >
                      <div class="mb-3">
                     <input type="hidden" name="stid" value="<?php echo $id;?>">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input
                          type="text"
                          name="name"
                          class="form-control"
                          id="exampleFormControlInput1"
                          placeholder="name" value="<?php echo $name;?>"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Date Of Birth</label>
                        <input
                          class="form-control"
                          type="date"
                            name="dateofbirth"
                          id="exampleFormControlReadOnlyInput1"
                          placeholder="Date of Birth"value="<?php echo $dob;?>"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Phone Number</label>
                        <input
                          class="form-control"
                          type="text"
                            name="phone"
                          id="exampleFormControlReadOnlyInput1"
                          placeholder="Enter Your mobile number" value="<?php echo$phone;?>"
                          required
                        />
                      </div>
                      <div class="mb-3">
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
                    
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Class</label>
                        <select class="form-select" id="exampleFormControlSelect1"   name="class" aria-label="Default select example" required value="<?php echo$row['class'];?>">
                          <option selected>Open this select menu</option>
                          <option value="LKG">LKG</option>
                          <option value="UKG">UKG</option>
                          <option value="Istd">Istd</option>
                          <option value="IIstd">IIstd</option>
                          <option value="IIIstd">IIIstd</option>
                          <option value="IVstd">IVstd</option>
                          <option value="Vstd">Vstd</option>
                          <option value="VIstd">VIstd</option>
                          <option value="VIIstd">VIIstd</option>
                          <option value="VIIIstd">VIIIstd</option>
                          <option value="IXstd">IXstd</option>
                          <option value="Xstd">Xstd</option>
                         

                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Section</label>
                        <select class="form-select" id="exampleFormControlSelect1"   name="section" aria-label="Default select example"value="<?php echo$row['section'];?>" required>
                          <option selected>Open this select menu</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                        </select>
                        </div>
                        <div class="mb-3">
                       
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
                        </form>
              
                    </div>
                  </div>
                
</div>
                </div>
                  <?php
                  include "footer.php";
                  ?>
