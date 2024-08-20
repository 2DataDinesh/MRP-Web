<?php
session_start();
include "../db_config.php";

$qid = $_POST['qid'];
$qname = $_POST['qname'];
$ans = $_POST['ans'];
$nq = $_POST['nq'];
$mrk = $_POST['mrk'];
$eid = $_POST['eid'];
$sid = $_POST['sid'];

$d = date('d/m/y');
$choice = [];

$tblname = "tbl_" . $sid . $eid;

$cq = "CREATE TABLE $tblname (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, sid INT, eid INT, qid INT, ques TEXT, ans TEXT, cans TEXT, mark INT(10), result TEXT, cdate TEXT)";
$cres = mysqli_query($con, $cq);

for ($i = 1; $i <= $nq; $i++) {
    $choice[] = isset($_POST["ch$i"]) ? $_POST["ch$i"] : 'null';
}

$tres = [];
$cans = [];

for ($j = 0; $j < $nq; $j++) {
    if ($choice[$j] == 'null') {
        $tres[] = "Not answered";
        $cans[] = $choice[$j];
    } elseif ($ans[$j] == $choice[$j]) {
        $tres[] = "Correct";
        $cans[] = $choice[$j];
    } else {
        $tres[] = "Wrong";
        $cans[] = $choice[$j];
    }
}

for ($k = 0; $k < $nq; $k++) {
    $exequery = mysqli_query($con, "INSERT INTO $tblname VALUES (NULL, $sid, $eid, $qid[$k], '$qname[$k]', '$ans[$k]', '$cans[$k]', $mrk, '$tres[$k]', '$d')");
}

$single_mark = (int)$mrk / (int)$nq;
$sum = 0;

for ($s = 0; $s < $nq; $s++) {
    if ($ans[$s] == $cans[$s]) {
        $sum += $single_mark;
    }
}

$tt = $sum;
$pc = ($tt / (int)$mrk) * 100;
$pc1 = $pc <= 35 ? '35' : $pc;

$exequery = mysqli_query($con, "INSERT INTO exam_result VALUES (NULL, $sid, $eid, '$tblname', '$d', '$tt', '$pc1')");

echo '<script>window.location.href = "success.php?per=' . $tblname . '&sr=' . $pc1 . ' ";</script>';
?>
