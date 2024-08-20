<?php
  session_start();
include "db_config.php";

// Function to validate email format
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function isValidClass($class) {
    // Define allowed classes
    $allowedClasses = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', 'LKG', 'UKG');
    
    // Check if the class is in the allowed list
    return in_array($class, $allowedClasses);
}

function isValidSection($section) { 
    // Define allowed classes
    $allowedSection = array('A','B','C');
    
    // Check if the class is in the allowed list
    return in_array($section, $allowedSection);
}
// Function to validate and format date from CSV
function formatCSVDate($date) {
    // Define possible date separators
    $separators = array('/', '-', '.');

    // Iterate through separators to find the correct one
    foreach ($separators as $separator) {
        $dateParts = explode($separator, $date);
        if (count($dateParts) == 3) {
            // Extract day, month, and year from parts
            $day = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $year = (int)$dateParts[2];

            // Normalize the year to 4 digits if necessary
            if ($year < 100) {
                $year += ($year < 50) ? 2000 : 1900;
            }

            // Check if month is within valid range (1-12) and day is valid for that month
            if ($month >= 1 && $month <= 12 && checkdate($month, $day, $year)) {
                // Format date as 'dd-mm-yyyy'
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
// function isValidName($name) {
//     // Allow only alphabets and full stop (.)
//     return preg_match("/^[a-zA-Z.]+$/", $name);
// }
function isValidName($name) {
    // Allow only alphabets, spaces, and full stops (.)
    return preg_match("/^[a-zA-Z. ]+$/", $name);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateofbirth'];
    $phone = $_POST['phone'];
    $email = strtolower($_POST['email']);
    $class = $_POST['class'];
    $section = $_POST['section'];
    $house = $_POST['house']; // Add this line

    // Check if any required field is empty
    $requiredFields = [$name, $dateOfBirth, $phone, $email, $class, $section];
    if (isEmptyField($requiredFields)) {
        echo "<script>alert('All fields are required.'); window.location.href='student_form.php';</script>";
        exit();
    }

    // Validate phone number format
    if (!preg_match("/^[7896][0-9]{9}$/", $phone)) {
        echo "<script>alert('Invalid phone number format. Please enter a valid 10-digit phone number starting with 9, 8, 7, or 6.'); window.location.href='student_form.php';</script>";
        exit();
    }

    // Validate email format
    if (!isValidEmail($email)) {
        echo "<script>alert('Invalid email format. Please enter a valid email address.'); window.location.href='student_form.php';</script>";
        exit();
    }

    if (!isValidClass($class)) {
        echo "<script>alert('Invalid class format. Allowed values are 1 to 12, LKG, UKG.'); window.location.href='student_form.php';</script>";
        exit();
    }
   
    // Check if email already exists
    $checkQuery = "SELECT * FROM student WHERE email = '$email' ";
    $checkResult = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('The email address or phone number you have entered is already in use.'); window.location.href='student_form.php';</script>";
        exit();
    }
    $dateOfBirth = date("d-m-Y", strtotime($dateOfBirth));
    $dateOfBirth = $con->real_escape_string($dateOfBirth);
    // Insert new student record
    $sql = "INSERT INTO student (name, dob, phone, email, class, section, house) 
            VALUES ('$name', '$dateOfBirth', '$phone', '$email', '$class', '$section', '$house')";

    if ($con->query($sql) === true) {
        echo "<script>alert('Student inserted successfully'); window.location.href='view_student.php';</script>";
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
        echo "<script>alert('Only CSV files are allowed.'); window.location.href='student_form.php';</script>";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($file['size'] > 500000) { // Adjust as necessary
        echo "<script>alert('File is too large.'); window.location.href='student_form.php';</script>";
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
                        $errorMessages[] = "There is an empty field in row $rowNumber of CSV file. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }

                    $name = mysqli_real_escape_string($con, $row[0]);
                    $dob = formatCSVDate($row[1]); // Format date for MySQL from CSV
                    $phone = mysqli_real_escape_string($con, $row[2]);
                    $email = strtolower(mysqli_real_escape_string($con, $row[3]));
                    $class = mysqli_real_escape_string($con, $row[4]);
                    $section = mysqli_real_escape_string($con, $row[5]);
                    $house = mysqli_real_escape_string($con, $row[6]);

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

                    $class = trim($row[4]); // Assuming class is at index 4
                    if (!isValidClass($class)) {
                        $errorMessages[] = "Invalid class format encountered in row $rowNumber of CSV file. Allowed values are 1 to 12, LKG, UKG. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }
                    $section = trim($row[5]); // Assuming class is at index 4
                    if (!isValidSection($section)) {
                        $errorMessages[] = "Invalid section format encountered in row $rowNumber of CSV file. Allowed values are A,B,C. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue;
                    }

                                        // Check if date formatting is correct
                                        if (!$dob) {
                                            $errorMessages[] = "Invalid date format encountered in row $rowNumber of CSV file.";
                                            $skippedCount++;
                                            $skippedRows[] = $rowNumber;
                                            continue;
                                        }

                    // $dob = trim($row[1]); // Assuming class is at index 4
                    // if (!formatCSVDate($dob)) {
                    //     $errorMessages[] = "Invalid date format encountered in row $rowNumber of CSV file. ";
                    //     $skippedCount++;
                    //     $skippedRows[] = $rowNumber;
                    //     continue;
                    // }

                   
                
                    // Check if email or phone number already exists in database
                    $checkQuery = "SELECT * FROM student WHERE email = '$email'";
                    $checkResult = mysqli_query($con, $checkQuery);
                    if (mysqli_num_rows($checkResult) > 0) {
                        // $errorMessages[] = "Duplicate email address or phone number found in row $rowNumber of CSV file. Skipping record.";
                        $skippedCount++;
                        $skippedRows[] = $rowNumber;
                        continue; // Skip inserting this record
                    }
                  
                    // Insert student record from CSV
                    $sql = "INSERT INTO student (name, dob, phone, email, class, section, house) 
                            VALUES ('$name', '$dob', '$phone', '$email', '$class', '$section', '$house')";
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
                    echo "alert('$insertedCount records inserted successfully from CSV. $skippedCount records skipped due to errors. Skipped rows are( " . implode(', ', $skippedRows) . ")');";
                } else {
                    echo "alert('$insertedCount records inserted successfully from CSV. No records were skipped due to errors.');";
                }
                echo "window.location.href='view_student.php';";
                echo "</script>";
            } else {
                echo "<script>alert('Error opening file.'); window.location.href='student_form.php';</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.'); window.location.href='student_form.php';</script>";
        }
    }
}
?>
