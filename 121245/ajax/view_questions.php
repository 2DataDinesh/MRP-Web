<?php
session_start();
error_reporting(0);
include('../../db_config.php');
include('./reuse.php');  

// update
if(isset($_POST['update'])){

    $check = "SELECT * FROM qtn_ans WHERE id = {$_POST['id']}";
    $fetch_connect = mysqli_query($con, $check);
    if($row = mysqli_fetch_array($fetch_connect)){

echo '
<form id="assign_quiz">
<input type="hidden" name="qts_id" value="'.$_POST['id'].'">
<input type="hidden" name="manage_id" value="'.$row['manage_id'].'">
   <div class="card-body">
      <div class="row">
         <div class="col-md-12">
            <div class="mb-3">
               <label for="exampleFormControlInput1"
                  class="form-label">Enter Questions:</label>
               <textarea name="questions" rows="4" cols="40"
                   class="form-control"
                  id="defaultFormControlInput"
                  placeholder="Enter Question"
                  aria-describedby="defaultFormControlHelp"
                  required>'.$row['qstn'].'</textarea>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6">
                  <label for="exampleFormControlReadOnlyInput1" class="form-label">Option 1 (A):</label>
                  <input type="text" name="option1" value="'.$row['options1'].'"  class="form-control mb-2" id="defaultFormControlInput"
                     placeholder="Enter Option 1 (A)" aria-describedby="defaultFormControlHelp" required />
                  <label for="exampleFormControlReadOnlyInput1" class="form-label">Option 3 (C):</label>
                  <input type="text" name="option3" value="'.$row['options2'].'"  class="form-control" id="defaultFormControlInput"
                     placeholder="Enter Option 3 (C)" aria-describedby="defaultFormControlHelp" required />
               </div>
               <div class="col-md-6">
                  <label for="exampleFormControlReadOnlyInput1" class="form-label">Option 2 (B):</label>
                  <input type="text" name="option2" value="'.$row['options3'].'"  class="form-control mb-2" id="defaultFormControlInput"
                     placeholder="Enter Option 2 (B)" aria-describedby="defaultFormControlHelp" required />
                  <label for="exampleFormControlReadOnlyInput1" class="form-label">Option 4 (D):</label>
                  <input type="text" name="option4" value="'.$row['options4'].'" class="form-control" id="defaultFormControlInput"
                     placeholder="Enter Option 4 (D)" aria-describedby="defaultFormControlHelp" required />
               </div>
            </div>
         </div>
         <div class="col-md-12 d-flex justify-content-center mt-4">
            <div class="col-md-8">
               <label for="exampleFormControlReadOnlyInput1" class="form-label">Answer Key:</label>
                 <select name="ans_key" id="defaultFormControlInput"
                   class="form-select" aria-label="Default select example" required>
                   <option value='.$row['ans'].'>'.$row['ans'].'</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                  </select>
            </div>
         </div>
         <div class="col-md-12 mt-3 text-end">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" onclick="upd_submit()" class="btn btn-danger">Update</button>
         </div>
      </div>
   </div>
</form>
';
} else{
echo"empty";
}
}
// updated

function check_questions($value){
   $specific_word = "";
$words = explode(" ", $value);
for( $i = 0; $i < count($words); $i++ ){
$specific_word .= $words[$i];
}
$final_output = strtoupper($specific_word);
return $final_output;
}

if(isset($_POST['questions'])){
   $ans_key = strtoupper($_POST['ans_key']);
   $get_fined = mysqli_query($con, "SELECT * FROM qtn_ans WHERE manage_id = '{$_POST['manage_id']}'");
   $update_connect = null;
   
   if (mysqli_num_rows($get_fined) > 0) {
       while ($get_the_value = mysqli_fetch_array($get_fined)) {
           if ($get_the_value['id'] == $_POST['qts_id']) {
               continue;
           }
           
           if (check_questions($get_the_value['qstn']) == check_questions($_POST['questions'])) {
               $update_connect = 4; 
               break; 
           }
       }
   }
   
   if (!isset($update_connect)) {
       $update = "UPDATE qtn_ans SET qstn = '{$_POST['questions']}',options1 = '{$_POST['option1']}',
                options2 = '{$_POST['option2']}', options3 = '{$_POST['option3']}',
                options4 = '{$_POST['option4']}', ans = '{$ans_key}' 
               WHERE id = {$_POST['qts_id']}";
       $update_connect = mysqli_query($con, $update) ? 1 : 2; 
   }
   
   echo $update_connect;  
}


// 

?>