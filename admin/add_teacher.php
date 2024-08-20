<?php
  session_start();
include "db_config.php";

// Function to validate email format
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function isValidClass($tclass) {
    // Define allowed classes
    $allowedClasses = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 'LKG', 'UKG');
    
    // Check if the class is in the allowed list
    return in_array($tclass, $allowedClasses);
}

function isValidSection($tsection) { 
    // Define allowed classes
    $allowedSection = array('A','B','C');
    
    // Check if the class is in the allowed list
    return in_array($tsection, $allowedSection);
}
// Function to validate and format date from CSV
function formatCSVDate($date) {
    // Define possible date separators
    $separators = array('/', '-', '.');

    // Iterate through separators to find the correct one
    foreach ($separators as $separator) {
        $dateParts = explode($separator, $date);
        if (count($dateParts) == 3) {
            // Check if the exploded parts are valid date parts
            $day = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $year = (int)$dateParts[2];

            if (checkdate($month, $day, $year)) {
                // Format date as 'YYYY-MM-DD' for MySQL
                $formattedDate = sprintf('%02d-%02d-%04d', $day, $month, $year);
                return $formattedDate;
            }
        }
    }

    return null; // Handle invalid date format
}

// Function to check if any field is empty
function isEmptyField($fields) {
    foreach ($fields as $field) {
        if (empty($field)) {
            return true;
        }
    }
    return false;
}
function isValidName($name) {
    // Allow only alphabets and full stop (.)
    return preg_match("/^[a-zA-Z.]+$/", $name);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateofbirth'];
    $phone = $_POST['phone'];
    $email =strtolower($_POST['email']);
    $tclass = $_POST['tclass'];
    $tsection = $_POST['tsection'];

    // Check if any required field is empty
    $requiredFields = [$name, $dateOfBirth, $phone, $email, $tclass, $tsection];
    if (isEmptyField($requiredFields)) {
        echo "<script>alert('All fields are required.'); window.location.href='teacher_form.php';</script>";
        exit();
    }

    // Validate phone number format
    if (!preg_match("/^[7896][0-9]{9}$/", $phone)) {
        echo "<script>alert('Invalid phone number format. Please enter a valid 10-digit phone number starting with 9, 8, 7, or 6.'); window.location.href='teacher_form.php';</script>";
        exit();
    }

    // Validate email format
    if (!isValidEmail($email)) {
        echo "<script>alert('Invalid email format. Please enter a valid email address.'); window.location.href='teacher_form.php';</script>";
        exit();
    }

    // Check if email already exists
    $checkQuery = "SELECT * FROM teacher WHERE email = '$email' OR phone='$phone' ";
    $checkResult = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('The email address or phone number you have entered is already in use.'); window.location.href='teacher_form.php';</script>";
        exit();
    }
    $dateOfBirth = date("d-m-Y", strtotime($dateOfBirth));
    $dateOfBirth = $con->real_escape_string($dateOfBirth);
    // Insert new teacher record
    $sql = "INSERT INTO teacher (name, dob, phone, email, tclass, tsection) 
            VALUES ('$name', '$dateOfBirth', '$phone', '$email', '$tclass', '$tsection')";

    if ($con->query($sql) === true) {
        echo "<script>alert('All records have been successfully saved.'); window.location.href='view_teacher.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}

// Handle CSV file upload
if (isset($_POST['upload']) && isset($_FILES['file'])) {
    $uploadOk = 1;
    $file = $_FILES['file'];

    // Check if file is a CSV
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if ($fileType != "csv") {
        echo "<script>alert('Only CSV files are allowed.'); window.location.href='teacher_form.php';</script>";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($file['size'] > 5000) { // Adjust as necessary
        echo "<script>alert('File is too large.'); window.location.href='teacher_form.php';</script>";
        $uploadOk = 0;
    }

    // Initialize row counter
    $rowNumber = 0; // Starting from 0 to correctly track header and data rows
    $errorMessages = []; // Array to store error messages
    $insertedCount = 0; // Counter for successfully inserted records
    $skippedCount = 0; // Counter for skipped records
    $skippedRows = []; // Array to store skipped row numbers

    // Process CSV file if upload is valid
    if ($uploadOk == 1) {
        $fname = $file['name'];
        $temp = $file['tmp_name'];
        $fstore = $fname; // You may want to adjust this to store in a specific directory

        if (move_uploaded_file($temp, $fstore)) {
            // Process CSV file
            if (($handle = fopen($fstore, "r")) !== FALSE) {
                while (($row = fgetcsv($handle)) !== FALSE) {
                    $rowNumber++; // Increment row number counter

                    // Skip header row
                    if ($rowNumber === 1) {
                        continue;
                    }

                    // Check if any field is empty
                    if (isEmptyField($row)) {
                        $errorMessages[] = "Empty file in  row: $rowNumber -Records not inserted. Please verify and retry. ";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }

                    $name = mysqli_real_escape_string($con, $row[0]);
                    $dob = formatCSVDate($row[1]); // Format date for MySQL from CSV
                    $phone = mysqli_real_escape_string($con, $row[2]);
                    $email = strtolower(mysqli_real_escape_string($con, $row[3]));
                    $tclass = mysqli_real_escape_string($con, $row[4]);
                    $tsection = mysqli_real_escape_string($con, $row[5]);

                    $name = mysqli_real_escape_string($con, $row[0]);
                    if (!isValidName($name)) {
                        $errorMessages[] = "Invalid name format encountered in row $rowNumber of CSV file. Only alphabets and full stop (.) are allowed. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }

                    // Validate phone number format
                    if (!preg_match("/^[7896][0-9]{9}$/", $phone)) {
                        $errorMessages[] = "Invalid phone number format encountered in row $rowNumber of CSV file. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }

                    // Validate email format
                    if (!isValidEmail($email)) {
                        $errorMessages[] = "Invalid email format encountered in row $rowNumber of CSV file. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }
                    $tclass = trim($row[4]); // Assuming class is at index 4
                    if (!isValidClass($tclass)) {
                        $errorMessages[] = "Invalid class format encountered in row $rowNumber of CSV file. Allowed values are 1 to 12, LKG, UKG. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }
                    $tsection = trim($row[5]); // Assuming class is at index 4
                    if (!isValidSection($tsection)) {
                        $errorMessages[] = "Invalid section format encountered in row $rowNumber of CSV file. Allowed values are A,B,C. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }
                    $dob = trim($row[1]); // Assuming class is at index 4
                    if (!formatCSVDate($dob)) {
                        $errorMessages[] = "Invalid date format encountered in row $rowNumber of CSV file. ";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }
                    // Check if email or phone number already exists in database
                    $checkQuery = "SELECT * FROM teacher WHERE email = '$email' OR phone = '$phone'";
                    $checkResult = mysqli_query($con, $checkQuery);
                    if (mysqli_num_rows($checkResult) > 0) {
                        // $errorMessages[] = "Duplicate email address or phone number found in row $rowNumber of CSV file. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue; // Skip inserting this record
                    }

                    // Insert teacher record from CSV
                    $sql = "INSERT INTO teacher (name, dob, phone, email, tclass, tsection) 
                            VALUES ('$name', '$dob', '$phone', '$email', '$tclass', '$tsection')";
                    if ($con->query($sql) === TRUE) {
                        $insertedCount++;
                    } else {
                        $errorMessages[] = "Error inserting record in row $rowNumber of CSV file: " . $con->error;
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                    }
                }

                fclose($handle);

                // Display accumulated error messages sequentially
                echo "<script>";
                foreach ($errorMessages as $errorMessage) {
                    echo "alert('$errorMessage');";
                }
                if ($skippedCount > 0) {
                    echo "alert('$insertedCount records inserted successfully. $skippedCount records skipped due to errors. Skipped rows are( " . implode(', ', $skippedRows) . ")');";
                } else {
                    echo "alert('$insertedCount records inserted successfully . No records were skipped due to errors.');";
                }
                echo "window.location.href='view_teacher.php';";
                echo "</script>";
            } else {
                echo "<script>alert('Error opening file.'); window.location.href='teacher_form.php';</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.'); window.location.href='teacher_form.php';</script>";
        }
    }
}
?>
