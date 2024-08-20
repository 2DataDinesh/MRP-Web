<?php
session_start();
error_reporting(0);
$uname = $_SESSION['name'];
$uid = $_SESSION['id'];


$serverTime = time();
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        function disablePrev() {
            window.history.forward();
        }
        window.onload = disablePrev();
        window.onpageshow = function (evt) {
            if (evt.persisted) disableBack();
        };

        var serverTime = <?php echo $serverTime; ?>;
    });
</script>
<?php
include ('header.php');
?>


<style>
    body {
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);


    }

    .container-xxl {
        padding-left: 300px;
        margin-top: 80px;
        padding-right: 200px
    }

    .quiz-table {
        background-color: #f0f3f5;
        border-radius: 5px;
        padding: 20px;
        width: 100%;
    }

    .question-card {
        background: rgba(255, 255, 255, 0.4);
        border: 1px solid #eee;
        margin-bottom: 15px;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        width: 100%;
        box-sizing: border-box;
    }

    .question-card h5 {
        padding: 20px;
        background: #4c93ba;
        color: #fff;
        font-size: 24px;
        border-radius: 10px;
        text-align: center
    }

    .question-options label {
        display: block;
        margin-bottom: 10px;
    }

    .question-options input {
        margin-right: 10px;
    }

    .table-primary th {
        background-color: #007bff;
        color: white;
    }

    .text-dark {
        color: #333;
        text-align: center;
    }

    .question-textarea {
        margin-top: 10px;
    }

    .question-textarea textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        resize: vertical;
    }

    .hidden {
        display: none;
    }

    .option-button {
        display: inline-block;
        margin: 5px;
        padding: 10px 20px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        color: #333;
    }

    .option-label.selected {
        background-color: #d7edda;
        color: #000;
        border: 1px solid greenyellow;
    }

    .option-button:focus {
        outline: none;
    }

    .question-slider {
        position: relative;
        padding: 20px;
        display: block;
        text-align: left;
        padding: 0;
        margin: 0;
    }

    .navigation-buttons-container {
        position: absolute;
        bottom: 10px;
        right: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .prev-button,
    .next-button,
    .submit-button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
        text-align: center;
    }

    .prev-button:hover,
    .next-button:hover,
    .submit-button:hover {
        background-color: #0056b3;
        color: white;
    }

    .question-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }

    .option-label {
        display: grid;
        grid-template-columns: auto;
        grid-gap: 10px;
        margin-bottom: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        box-sizing: border-box;
    }



    .option-label input[type='radio'] {
        margin-right: 10px;
        margin-left: 0;
        display: none;
    }

    .option-button.selected {
        background-color: green;
        color: white;
    }

    .option-text {
        flex-grow: 1;
        text-align: left;
    }


    @media (max-width: 768px) {
        .container-xxl {
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 40px;
        }

        .question-card {
            padding: 10px;
            margin-bottom: 15px;

            .navigation-buttons-container {
                position: absolute;
                bottom: 30px;
                right: 15px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .prev-button,
            .next-button,
            .submit-button {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 5px 20px;
                border-radius: 5px;
                cursor: pointer;
                margin: 5px;
                text-align: center;
            }

            .question-slider {
                padding: 15px;
            }
        }
    }

    @media (max-width: 480px) {
        .container-xxl {
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 40px;
        }

        .question-card {
            padding: 8px;
            margin-bottom: 15px;
        }

        .navigation-buttons-container {
            position: absolute;
            bottom: 25px;
            right: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .prev-button,
        .next-button,
        .submit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            text-align: center;
        }

        .question-slider {
            padding: 5px;
        }
    }

    @media (max-width: 350px) {
        .container-xxl {
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 70px;
        }

        .question-card {
            padding: 5px;
            margin-bottom: 15px;
        }

        .navigation-buttons-container {
            position: absolute;
            bottom: 25px;
            right: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .prev-button,
        .next-button,
        .submit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            text-align: center;
        }

        .question-slider {
            padding: 3px;
        }

        .option-label {
            font-size: 0.9rem;
        }

        .option-button {
            padding: 8px 16px;
        }
    }
</style>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-10 mb-4 order-0">
            <form method="POST" action="result.php" id="myform">
                <div class="question-slider">
                    <?php
                    include "../db_config.php";
                    $sid = $_GET['s'];
                    $eid = $_GET['e'];
                    $ctime = $_GET['ctime'];
                    $ques = mysqli_query($con, "SELECT * FROM qtn_ans WHERE manage_id=$eid ORDER BY id ASC");

                    if (mysqli_num_rows($ques) > 0) {
                        $i = 1;
                        $totalQuestions = mysqli_num_rows($ques);
                        while ($qrow = mysqli_fetch_array($ques)) {
                            $qid = $qrow['id'];
                            $qu = $qrow['qstn'];
                            $ans = $qrow['ans'];


                            $ques2 = mysqli_query($con, "SELECT * FROM manage_quiz WHERE id=$eid");
                            $qrow2 = mysqli_fetch_array($ques2);
                            $topic = $qrow2['topic'];
                            $tim = $qrow2['time'];
                            $mrk = $qrow2['total'];
                            $numque = $qrow2['no_of_qustions'];


                            echo "<input type='hidden' name='qid[]' value='" . $qid . "' />";
                            echo "<input type='hidden' name='eid' value='" . $eid . "' />";
                            echo "<input type='hidden' name='sid' value='" . $sid . "' />";
                            echo "<input type='hidden' name='qname[]' value='" . $qu . "' />";
                            echo "<input type='hidden' name='ans[]' value='" . $ans . "' />";
                            echo "<input type='hidden' name='mrk' value='" . $mrk . "' />";
                            echo "<input type='hidden' name='nq' value='" . $numque . "'>";
                            ?>
                            <div class="question-card p-5 question-slide <?php if ($i > 1)
                                echo 'hidden'; ?>" data-question="<?php echo $i; ?>">
                                <h5 style="color: #ffffff;"><?php echo $i . ") " . $qrow['qstn'] . " ?"; ?></h5>
                                <div class="question-options">
                                    <?php
                                    $options = [
                                        ['value' => 'A', 'text' => $qrow['options1']],
                                        ['value' => 'B', 'text' => $qrow['options2']],
                                        ['value' => 'C', 'text' => $qrow['options3']],
                                        ['value' => 'D', 'text' => $qrow['options4']]
                                    ];
                                    foreach ($options as $option) {
                                        $id = "option_$i" . "_" . $option['value']; // Unique ID for each radio input
                            
                                        echo "<label class='option-label ' >";
                                        echo "<input type='radio' name='ch$i' value='" . $option['value'] . "'>";
                                        echo "<span class='option-text'>" . $option['text'] . "</span>";
                                        echo "</label>";

                                    }
                                    ?>

                                </div>
                                <div class="question-textarea">
                                    <textarea name="comments<?php echo $i; ?>" rows="3"
                                        placeholder="Enter the answer"></textarea>
                                </div><br>
                                <div class="navigation-buttons-container">
                                    <?php if ($i > 1) { ?>
                                        <button type="button" class="prev-button"
                                            onclick="showPrevQuestion(<?php echo $i; ?>)">Previous</button>
                                    <?php } ?>
                                    <?php if ($i < $totalQuestions) { ?>
                                        <button type="button" class="next-button"
                                            onclick="showNextQuestion(<?php echo $i; ?>)">Next</button>
                                    <?php } else { ?>
                                        <button type="button" class="submit-button"
                                            onclick="showSubmitQuestion(<?php echo $i; ?>)">Submit</button>

                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <div id="timer"
        style="position: fixed; top: 10px; right: 10px; font-size: 20px; background: #f8d7da; padding: 10px; border-radius: 5px;">
        Time Remaining: <span id="time"></span>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const currentTimestamp = <?php echo time(); ?> * 1000; 
    var timeInSeconds = <?php echo $tim; ?> * 60; 
    var startTime = <?php echo $ctime; ?> * 1000; 
    var endTime = startTime + (timeInSeconds * 1000);
    var startTimeDate = new Date(startTime);
    var endTimeDate = new Date(endTime);
    var x = setInterval(function() {
        var now = Date.now(); 
        var remainingTime = endTime - now;
        if (remainingTime <= 0) {
            clearInterval(x);
            document.getElementById("time").innerHTML = "EXPIRED";
            document.getElementById('myform').submit();
        } else {
            var hours = Math.floor(remainingTime / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
            var displayHours = ('0' + hours).slice(-2);
            var displayMinutes = ('0' + minutes).slice(-2);
            var displaySeconds = ('0' + seconds).slice(-2);
            var timeElement = document.getElementById("time");
            if (timeElement) {
                if (hours > 0) {
                    timeElement.innerHTML = displayHours + "h " + displayMinutes + "m " + displaySeconds + "s";
                } else {
                    timeElement.innerHTML = displayMinutes + "m " + displaySeconds + "s";
                }
            } else {
                console.error("Element with id 'time' not found.");
            }
        }
    }, 1000); // Update every second
});
        function showNextQuestion(currentIndex) {
            var currentQuestion = $('.question-slide[data-question="' + currentIndex + '"]');
            var nextQuestion = $('.question-slide[data-question="' + (currentIndex + 1) + '"]');

            var selectedInput = currentQuestion.find('input[type="radio"]:checked');
            var selectedOptionValue = selectedInput.val();
            var textareaAnswer = currentQuestion.find('textarea').val().trim();

            if (!selectedOptionValue) {
                alert("Please select an answer before moving to the next question.");
                return;
            }

            if (!textareaAnswer) {
                alert("Please enter your answer in the text area before moving to the next question.");
                return;
            }

            var selectedOptionText = currentQuestion.find('input[type="radio"][value="' + selectedOptionValue + '"]').next('span.option-text').text();

            if (selectedOptionText === textareaAnswer) {
                if (nextQuestion.length > 0) {
                    currentQuestion.addClass('hidden');
                    nextQuestion.removeClass('hidden');
                }
            } else {
                alert("The selected option and the text area answer do not match. Please correct it before proceeding.");
            }
        }


        function showSubmitQuestion(currentIndex) {
            var currentQuestion = $('.question-slide[data-question="' + currentIndex + '"]');
            var selectedInput = currentQuestion.find('input[type="radio"]:checked');
            var selectedOptionValue = selectedInput.val();
            var textareaAnswer = currentQuestion.find('textarea').val().trim();

            if (!selectedOptionValue) {
                alert("Please select an answer before Submit.");
                return;
            }

            if (!textareaAnswer) {
                alert("Please enter your answer in the text area before Submit.");
                return;
            }

            var selectedOptionText = currentQuestion.find('input[type="radio"][value="' + selectedOptionValue + '"]').next('span.option-text').text();
            if (selectedOptionText !== textareaAnswer) {
                alert("The selected option and the text area answer do not match. Please correct it before Submitting.");
                return;
            }
            $('#myform').submit();
        }

        function showPrevQuestion(currentIndex) {
            var currentQuestion = $('.question-slide[data-question="' + currentIndex + '"]');
            var prevQuestion = $('.question-slide[data-question="' + (currentIndex - 1) + '"]');
            if (prevQuestion.length > 0) {
                currentQuestion.addClass('hidden');
                prevQuestion.removeClass('hidden');
            }
        }

        $(document).ready(function () {
            $('.option-label').on('click', function () {
                console.log("selected");
                $(this).siblings().removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
            });
        });
    </script>
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="./assets/vendor/js/menu.js"></script>
    <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>