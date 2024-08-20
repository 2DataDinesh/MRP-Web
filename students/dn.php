<?php
// Start output buffering and error reporting
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require('../db_config.php');
require('tcpdf/tcpdf.php');

if (isset($_GET['eid'])) {
    $frm_data = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

    // Validate the input
    if (empty($frm_data['eid'])) {
        header('Location: dashboard.php');
        exit;
    }

    $eid = $frm_data['eid'];

    // Use prepared statements for security
    $query = "SELECT * FROM qtn_ans INNER JOIN manage_quiz ON qtn_ans.manage_id = manage_quiz.id WHERE manage_quiz.id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $res = $stmt->get_result();

    $total_rows = $res->num_rows;

    if ($total_rows == 0) {
        header('Location: dashboard.php');
        exit;
    } else {
        // Fetch all results into an array
        $results = $res->fetch_all(MYSQLI_ASSOC);

        // Create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Quiz Results');
        $pdf->SetSubject('Quiz Results');
        $pdf->SetKeywords('TCPDF, PDF, quiz, results');

        // Set default header data
        $pdf->SetHeaderData('', 0, 'MRP Matriculation School');

        // Set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set font
        $pdf->SetFont('dejavusans', '', 10);

        // Add a page
        $pdf->AddPage();

        // Content for PDF
        $html = '<h1 style="text-align:center;">Answer Key</h1>';
        if (!empty($results)) {
            $title = $results[0]['topic'];
        }
        $html .= '<h3 style="text-align:center;">' . htmlspecialchars($title) . '</h3>';

        // Initialize question number counter
        $questionNumber = 1;

        // Loop through each question and answer
        foreach ($results as $data) {
            $question = $data['qstn'];
            $ans = $data['ans'];
            $answer = '';

            if ($ans == 'A') {
                $answer = $data['options1'];
            } elseif ($ans == 'B') {
                $answer = $data['options2'];
            } elseif ($ans == 'C') {
                $answer = $data['options3'];
            } else {
                $answer = $data['options4'];
            }

            // Add question number and content to HTML
            $html .= '<p><b>Question ' . $questionNumber . ':</b> ' . htmlspecialchars($question) . '</p>';
            $html .= '<p><b>Answer:</b> ' . htmlspecialchars($answer) . '</p>';

            // Increment question number
            $questionNumber++;
        }

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // Close and output PDF document
        ob_end_clean(); // Clean the output buffer to prevent any unexpected output
        $pdf->Output('quiz_results.pdf', 'I');
    }
} else {
    header('Location: dashboard.php');
    exit;
}

?>
