<?php 
session_start();
error_reporting(0);
include('../../db_config.php');
function check_DOB($dob){
    $formats = ['d/m/Y', 'd-m-Y', 'd.m.Y']; 
    
    foreach ($formats as $format) {
        $date = DateTime::createFromFormat($format, $dob);
        if ($date !== false) {
            return $date->format('d/m/Y');
        }
    }
}

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $check_query = "SELECT * FROM teacher WHERE email = '$email'";
    $connect = mysqli_query($con, $check_query);

    if(mysqli_num_rows($connect) > 0){
        $row = mysqli_fetch_array($connect);
        $db_dob = $row['dob'];
        $user_dob = mysqli_real_escape_string($con, $_POST['dob']); 
        if(check_DOB($db_dob) === check_DOB($user_dob)){
            $_SESSION['isLOGIN'] = true;
            $_SESSION['userID'] = $row['tid']; 
            echo 1;
        } else {
            echo 2; 
        }
    } else {
        echo 0;
    }
}
// manage quiz

if(isset($_POST['standard'])){
    $staff_id = $_SESSION['userID'];
    $topics = trim($_POST['topic']);

    $checking = mysqli_query($con,"SELECT * FROM manage_quiz where std = '{$_POST['standard']}' AND section = '{$_POST['sections']}' AND subject = '{$_POST['subject']}' AND topic = '{$topics}'");

    if(mysqli_num_rows($checking) > 0){ 
        $insert_connect = 3;
    }else{

    $insert = "INSERT INTO manage_quiz VALUES (null,'{$_POST['standard']}','{$_POST['sections']}','{$_POST['subject']}','{$_POST['topic']}','{$_POST['no_of_questions']}','{$_POST['total_marks']}','{$_POST['no_hours']}','{$staff_id}','{$_POST['description']}')";
    $insert_connect = mysqli_query($con,$insert) ? 1 : 2;
    }
    
    echo $insert_connect ;
}
// remove

if(isset($_POST['remove'])){
    $delete = "DELETE FROM manage_quiz where id = {$_POST['id']}";
    $del_connect = mysqli_query($con,$delete) ? true : false;
    echo $del_connect;
}
//

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
    function findCount($con, $req) {
        $checkCount = "SELECT count(*) as no_of_qtn FROM qtn_ans WHERE manage_id = $req";
        $checkCount_connect = mysqli_query($con, $checkCount);
        $rows = mysqli_fetch_array($checkCount_connect);
        $no_qtn_list = $rows['no_of_qtn'];
        return $no_qtn_list;
    }
    


    if (findCount($con, $_POST['manage_id']) < $_POST['no_of_questions_count']) {
        $get_fined = mysqli_query($con, "SELECT * FROM qtn_ans WHERE manage_id = '{$_POST['manage_id']}'");
        if (mysqli_num_rows($get_fined) > 0) {
            while ($get_the_value = mysqli_fetch_array($get_fined)) {
                if (check_questions($get_the_value['qstn']) == check_questions($_POST['questions'])) {
                    $qtnInsert_connect = 4;
                    break; 
                }
            }
        }

        if (!isset($qtnInsert_connect)) {
            $qtnInsert = "INSERT INTO qtn_ans VALUES (null,'{$_POST['manage_id']}','{$_POST['questions']}','{$_POST['option1']}','{$_POST['option2']}','{$_POST['option3']}','{$_POST['option4']}','{$_POST['ans_key']}')";
            $qtnInsert_connect = mysqli_query($con, $qtnInsert) ? 1 : 2; 
        }
    }
    
    $final = $qtnInsert_connect ?? 3;
     $result = findCount($con, $_POST['manage_id']);
     $res_no = $_POST['no_of_questions_count'] - $result;

     echo json_encode(["no_qts" => $result, "registered" => $final, "res_no" => $res_no]);

}

// remove
if(isset($_POST['delete'])){
    $delete = "DELETE FROM qtn_ans where id = {$_POST['id']}";
    $del_connect = mysqli_query($con,$delete) ? true : false;
    echo $del_connect;
}

?>