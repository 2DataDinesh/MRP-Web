<?php
session_start();
error_reporting(0);
include('../../db_config.php');
include('./reuse.php');  

// update
if(isset($_POST['update'])){
    $check = "SELECT * FROM manage_quiz WHERE id = {$_POST['id']} order by id desc";
    $fetch_connect = mysqli_query($con, $check);
    if($row = mysqli_fetch_array($fetch_connect)){

echo '
<form id="assign_quiz">
   <div class="row">
      <div class="col-md-6">
         <div class="mb-3">
         <input type="hidden" name="ids" value="'.$row['id'].'">
            <label for="exampleFormControlInput1" class="form-label">Standard</label>
            <select class="form-select" name="std" onchange="SelectStandard('.$row['id'].')" id="exampleFormControlSelectStandard'.$row['id'].'" aria-label="Default select example" required>
             <option value="'.$row['std'].'">'. $row['std'].'</option>
             "'.CallSelect($con,'class').'"
      </select>
         </div>
      </div>
      <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlReadOnlyInput1"
               class="form-label">Section</label>
            <select class="form-select" id="exampleFormControlSection'.$row['id'].'"
               name="sections" onchange="SelectSection('.$row['id'].')" aria-label="Default select example" required disabled>
               <option value="'.$row['section'].'">'.$row['section'].'</option>
            </select>
            <input type="hidden" name="section" id="section_v'.$row['id'].'" value="'.$row['section'].'">
         </div>
      </div>
       <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">subject</label>
                <select class="form-select" onchange="get_subject('.$row['id'].')" id="exampleFormControlSubject'.$row['id'].'" name="subjects"
                   aria-label="Default select example" required disabled>
                   <option value='.$row['subject'].'>'.$row['subject'].'</option>
                 </select>
                 <input type="hidden" name="subject" id="subject_v'.$row['id'].'" value="'.$row['subject'].'">
         </div>
      </div>
      <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Topic</label>
            <input type="text" value="'.$row['topic'].'" name="topic" class="form-control"
               id="defaultFormControlInput" placeholder="Enter  Topics"
               aria-describedby="defaultFormControlHelp" required />
         </div>
      </div>
      <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlReadOnlyInput1"
               class="form-label">No.of Questions</label>
            <input type="number" 
              onkeyup="MaxNumber('.$row['id'].')" 
              value="'.$row['no_of_qustions'].'" 
              name="no_of_qustions" 
              class="form-control" 
              min="1" max="150" 
              onclick ="MaxNumber('.$row['id'].')"
              id="defaultFormControlInputs'.$row['id'].'" 
              placeholder="No.of.Questions" 
              aria-describedby="defaultFormControlHelp" 
              required />
         </div>
      </div>
      <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Total
            Marks</label>
            <input type="text" onkeyup="MinimumZero()" value="'.$row['total'].'" name="total" class="form-control"
            id="defaultFormControlInputs1" placeholder="Enter Total Marks"
               aria-describedby="defaultFormControlHelp" required />
         </div>
      </div>
      <div class="col-md-6">
         <div class="mb-3">
            <label for="exampleFormControlReadOnlyInput1"
               class="form-label">Time Duration (in minutes)</label>
            <input type="text"  onmouseout="MaxNumber_length()" value="'.$row['time'].'" name="time" class="form-control"
             id="defaultFormControlInput_minutes" placeholder="Time Duration (in minutes)"
               aria-describedby="defaultFormControlHelp" required />
            <small class="text-dark">Maximum duration allowed is 3 hours (180 minutes) and minimum duration allowed is (10 minutes). 1 hour = 60 minutes.</small>
         </div>
      </div>
      <div class="col-md-6">
       <div class="mb-3">
        <label for="exampleFormControlReadOnlyInput1" class="form-label">description</label>
         <textarea name="description" id="text_area" onkeypress="check_words()" class="form-control" placeholder="Type here.." required>
         '.$row['description'].'
         </textarea>
          <small class="text-dark float-end">Maximum 300 words only.</small>
         </div>
      </div>
      <div class="col-md-12 text-end">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" onclick="upd_submit()"  id="buttons'.$row['id'].'" 
          class="btn btn-danger">Update</button>
      </div>
   </div>
</form>
';
} else{
    echo"empty";
}
}
// updated


  if (isset($_POST['result'])) {
   // $id = $_POST['id'];
   $result = $_POST['result'];
   $checkCount = "SELECT COUNT(id) AS no_of_qtn FROM qtn_ans WHERE manage_id ={$_POST['id']} order by id";
   $checkCount_connect = mysqli_query($con, $checkCount);
   $rows = mysqli_fetch_array($checkCount_connect);
   $no_qtn_list = $rows['no_of_qtn'];

   if ($no_qtn_list > $result) {
       echo 'true';
   } else {
       echo 'false';
   }
}
// 

if (isset($_POST['Standard'])) {
   $selectedStandard = 'class ="'.$_POST['Standard'].'"';
   $results = CallSelect_drop($con,'section', $selectedStandard);
   if ($results !== '') {
       echo json_encode(["status" => true, "res" => $results]);
   } else {
       echo json_encode(["status" => false]);
   }
} 

if (isset($_POST['section'])) {
   $selectedsection = 'section ="'.$_POST['section'].'"';
   $results = CallSelect_drop($con,'subject', $selectedsection);
   if ($results !== '') {
       echo json_encode(["status" => true, "res" => $results]);
   } else {
       echo json_encode(["status" => false]);
   }
}

if(isset($_POST['standard_s']) && isset($_POST['section_s']) && isset($_POST['subject_s'])){
   $find = 'std ="'.$_POST['standard_s'].'" AND section ="'.$_POST['section_s'].'" AND subject ="'.$_POST['subject_s'].'"';
   $results = MK_CallSelect_drop($con, 'topic',$find,'manage_quiz');
   if ($results !== '') {
       echo json_encode(["status" => true, "res" => $results]);
   } else {
       echo json_encode(["status" => false]);
   }

}


?>