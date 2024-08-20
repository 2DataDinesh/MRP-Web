<?php 
session_start();
include('vbs.php');
//===========================================select==============================================
function AlreadyRegisterCheck($table, $whereClause, $con) {
    $query = "SELECT * FROM $table WHERE $whereClause";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $single_user = mysqli_fetch_assoc($result);
        return array('exists' => true, 'user' => $single_user);
    } else {
         "Error fetching data: " . mysqli_error($con);
        return array('exists' => false, 'user' => null);
    }
}
//==========================================while values fetch====================================
function userdatails($table, $user, $con) {
    $data = array(); 
    $query = "SELECT * FROM $table WHERE $user";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
    return $data;
}
function userdetails1($table1, $user1, $con) {
    $datale = array(); 
    $queryle = "SELECT * FROM $table1 WHERE $user1";
    $resultle = mysqli_query($con, $queryle);
    if ($resultle) {
        while ($rowle = mysqli_fetch_assoc($resultle)) {
            $datale[] = $rowle;
        }
        mysqli_free_result($resultle);
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
    return $datale;
}
//=============================================register=============================================
function InsertAll($table,$values, $con){
    $date = date('d/m/Y');
    foreach($values as $results){
        $final_values[] = mysqli_real_escape_string($con, $results);
        }
        $query = "INSERT INTO $table VALUES (";
        $numValues = count($final_values);
        for ($i = 0; $i < $numValues; $i++) {
            $query .= "'" . $final_values[$i] . "'";
            if ($i < $numValues - 1) {
                $query .= ",";
            }
        }
        $query .= ")";
        $insert = mysqli_query($con, $query);
    if ($insert) {
      return true;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
//=================================================update=================================================
function UpdateAll($table, $values, $condition, $con) {
    $update_values = "";
    foreach ($values as $key => $value) {
        $update_values .= "$key='$value',";
    }
    $update_values = rtrim($update_values, ',');

    $update = mysqli_query($con, "UPDATE $table SET $update_values WHERE $condition");
    if ($update) {
        return true;
    } else {
         "Error: " . mysqli_error($con);
        return false;
    }
}
//===========================================fetch while values=========================================
function SingleuserFetch($table,$con){
    $data = array(); 
    $query = "SELECT * FROM $table";
    $result = mysqli_query($con, $query);
   if($result) {
    while($row = mysqli_fetch_assoc($result)) {
     $data[] = $row;
 }
  mysqli_free_result($result);
  } else {
 echo "Error fetching data: " . mysqli_error($con);
 }
  return $data;
 }
 //======================================delete==============================
function deleteDetails($table,$condition,$con){
    $del=mysqli_query($con,"DELETE FROM $table WHERE $condition");
    if($del){
        return true;
    }else{
        return false;
    }
}
function JoinsFtech($table1, $table2,$fetvalue, $user, $con) {
    $data = array(); 
    $query = "SELECT $fetvalue FROM $table1 INNER JOIN $table2 ON $table1.reg_id = $table2.ref_id WHERE $user";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
    return $data;
}
?>