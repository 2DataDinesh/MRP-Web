<?php
session_start();
error_reporting(0);
include('../../db_config.php');
include('./reuse.php');  


if(isset($_POST['standard']) ) {
    $check = "SELECT * FROM manage_quiz WHERE subject = '{$_POST['standard']}' AND topic = '{$_POST['topic']}' order by id desc";
    $output = "";
    $fetch_connect = mysqli_query($con, $check);
    while($row = mysqli_fetch_array($fetch_connect)){ 
        $whereClause ='tid ='.$row['staff_id'];
    $find_teacher = AlreadyRegisterCheck('teacher', $whereClause, $con);
    $output .= "<tr>
<td>".$row['std']."</td>
<td>".$row['section']."</td>
<td>".$row['subject']."</td>
<td>".$row['topic']."</td>
<td>".$row['no_of_qustions']."</td>
<td>".$row['total']."</td>
<td>".$row['time']."</td>
<td>".$find_teacher['user']['name']."</td>
<td> <a class='btn btn-warning' href='student_results.php?id=$row[id]'>Result</a> </td>
</tr>";
}
if ( $output !== '') {
    echo json_encode(["status" => true, "res" => $output]);
}else{
    echo json_encode(["status" => false, "res" =>'no data available']);
}
}

// 
if (isset($_POST['standard_s'])) {
    $standard = trim($_POST['standard_s']);
    $section = trim($_POST['section_s']);
    $subject = trim($_POST['subject_s']);
    $topic = trim($_POST['topic_s']);


    $check = "SELECT * FROM manage_quiz WHERE std='$standard' AND section='$section' AND subject='$subject' AND topic='$topic' ORDER BY id DESC";
    $fetch_connect = mysqli_query($con, $check);
    $output = "";
    if ($row = mysqli_fetch_array($fetch_connect)) {
        $user_exe = 'e_id =' . $row['id'] ;
        $find_exam = User_details('exam_result', $user_exe, $con);
        foreach($find_exam as  $exe_details) {
            $whereClause = 'stid=' . $exe_details['u_id'];
            $students = AlreadyRegisterCheck('student', $whereClause, $con);
                $output .= "<tr>
                    <td>" . $students['user']['name'] . "</td>
                    <td>" . $row['std'] . "</td>
                    <td>" . $row['section'] . "</td>
                    <td>" . $row['subject'] . "</td>
                    <td>" . $row['topic'] . "</td>
                    <td>" . $row['no_of_qustions'] . "</td>
                    <td>" . $row['total'] . "</td>
                    <td>" . $row['time'] . "</td>
                </tr>";
            
        }
    }
    if ($output !== '') {
        echo json_encode(["status" => true, "res" => $output]);
    } else {
        echo json_encode(["status" => false, "res" => 'No data available']);
    }
}




if (isset($_POST['subject'])) {
$selectedsection = 'subject ="'.$_POST['subject'].'"';
$results = MK_CallSelect_drop($con,'topic', $selectedsection,'manage_quiz');
if ($results !== '') {
echo json_encode(["status" => true, "res" => $results]);
} else {
echo json_encode(["status" => false]);
}
}

?>