<?php
session_start();
error_reporting(0);
require('../db_config.php');

// Function to validate answer key format
function isValidAnswerKey($key) {
    $valid_keys = array('A', 'B', 'C', 'D');
    return in_array($key, $valid_keys);
}

$errors = []; // Array to store errors
$insertedCount = 0;
$skippedCount = 0;
$skippedRows = [];
$duplicateRows = [];
$rowNumber = 1; // Starting from 1 to correctly track header and data rows
$errorMessages = [];

if (isset($_POST['importSubmit'])) {
    $manage = $_POST['manage_id'];
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel');

    if (empty($_FILES['name']['name']) || !in_array($_FILES['name']['type'], $csvMimes)) {
        $errors[] = 'Please select a valid CSV file.';
    }

    if (count($errors) === 0) {
        if (is_uploaded_file($_FILES['name']['tmp_name'])) {
            $csvFile = fopen($_FILES['name']['tmp_name'], 'r');
            fgetcsv($csvFile); // Skip header row

            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $line_arr = array_map('trim', array_filter($line));
                $rowNumber++; // Increment row number counter

                // Skip empty rows
                if (empty($line_arr)) {
                    $errorMessages[] = "Empty values encountered in row $rowNumber of CSV file. Skipping record.";
                    $skippedCount++;
                    $skippedRows[] = $rowNumber;
                    continue; // Skip this row
                }

                // Validate all fields are present
                if (count($line_arr) < 6) {
                    $errorMessages[] = "Incomplete data in row $rowNumber of CSV file. Skipping record.";
                    $skippedCount++;
                    $skippedRows[] = $rowNumber;
                    continue; // Skip this row
                }

                // Extract values from CSV row
                $questions = mysqli_real_escape_string($con, $line_arr[0]);
                $option1 = mysqli_real_escape_string($con, $line_arr[1]);
                $option2 = mysqli_real_escape_string($con, $line_arr[2]);
                $option3 = mysqli_real_escape_string($con, $line_arr[3]);
                $option4 = mysqli_real_escape_string($con, $line_arr[4]);
                $ans_key = mysqli_real_escape_string($con, $line_arr[5]);

                // Validate answer key
                if (!isValidAnswerKey($ans_key)) {
                    $errorMessages[] = "Invalid Answer Key encountered in row $rowNumber of CSV file. Allowed values are A, B, C, D. Skipping record.";
                    $skippedCount++;
                    $skippedRows[] = $rowNumber;
                    continue; // Skip this row
                }

                // Check for duplicates based on question text
                $checkDuplicate = "SELECT * FROM qtn_ans WHERE manage_id = '$manage' AND qstn = '$questions'";
                $result = mysqli_query($con, $checkDuplicate);
                if (mysqli_num_rows($result) > 0) {
                  
                    $skippedCount++;
                    $skippedRows[]= $rowNumber;
                    continue; // Skip this row
                }

                // Insert the question into database
                $qtnInsert = "INSERT INTO qtn_ans (manage_id, qstn, options1, options2, options3, options4, ans) VALUES ('$manage', '$questions', '$option1', '$option2', '$option3', '$option4', '$ans_key')";
                $qtnInsert_connect = mysqli_query($con, $qtnInsert);
                if (!$qtnInsert_connect) {
                    die('Error: ' . mysqli_error($con));
                }
                $insertedCount++;

                // If specified number of questions inserted, break the loop
                if ($insertedCount >= $_POST['numOf_qts']) {
                    break;
                }
            }

            fclose($csvFile);

            // Display error messages if any
            echo "<script>";
            foreach ($errorMessages as $errorMessage) {
                echo "alert('$errorMessage');";
            }
            echo "</script>";

            // Display final message and redirect
            $insertedMessage = "Inserted: $insertedCount question(s).";
            $skippedMessage = ($skippedCount > 0) ? " Skipped: $skippedCount invalid record(s)." : "";
            $duplicateMessage = ($skippedCount > 0) ? " Skipped duplicates: " . implode(', ',  $skippedRows) : "";
            echo "<script>alert('$insertedMessage $skippedMessage $duplicateMessage'); window.location.href='Upload_questions.php?id=$manage';</script>";
            exit();
        } else {
            $errors[] = 'Something went wrong, please try again.';
        }
    }
}

// Display errors before form submission
if (!empty($errors)) {
    echo '<script>alert("' . implode('\n', $errors) . '"); window.location.href="Upload_questions.php?id=' . $manage . '";</script>';
    exit();
}
?>
