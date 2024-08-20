<?php  
session_start();
error_reporting(0);
include('../../db_config.php');
include('./reuse.php');  

function check_questions($value){
    $specific_word = "";
 $words = explode(" ", $value);
 for( $i = 0; $i < count($words); $i++ ){
 $specific_word .= $words[$i];
 }
 $final_output = strtoupper($specific_word);
 return $final_output;
 }
 
if(isset($_POST['std'])){
    $checking = mysqli_query($con,"SELECT * FROM manage_quiz where std = '{$_POST['std']}' AND section = '{$_POST['section']}' AND subject = '{$_POST['subject']}'");
     $update_connect ;
    if (mysqli_num_rows($checking) > 0) {
       while ($get_the_value = mysqli_fetch_array($checking)) {
           if ($get_the_value['id'] == $_POST['ids']) {
               continue;
           }
           
           if (check_questions($get_the_value['topic']) == check_questions($_POST['topic'])) {
               $update_connect = 4; 
               break; 
           }
       }
   }

   if(!isset($update_connect)) {
    $update = "UPDATE manage_quiz set std = '{$_POST['std']}', section= '{$_POST['section']}',subject='{$_POST['subject']}', topic = '{$_POST['topic']}', no_of_qustions = '{$_POST['no_of_qustions']}',total='{$_POST['total']}',time='{$_POST['time']}', description='{$_POST['description']}'  where id='{$_POST['ids']}'";
    $update_connect = mysqli_query($con,$update) ? 1 : 2;
   }
 
    echo json_encode(['sts'=>$update_connect]);
 }


?>