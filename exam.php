<?php
session_start();
ob_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
include("examfunctions.php");
$topic = $_GET['topic'];
// echo $topic;
if ($topic == "cc") {
    $topic = "c++";
}
// $topic = "c++";
$userid = $_SESSION['userid'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination</title>
    <style>
        #timer {
            font-size: 20px;
        }

        .border {
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
            border-radius: 20px;
            padding-top: 3vh;
            padding-bottom: 3vh;

        }

        .header {
            height: 30vh;
            padding-top: 6vh;
            background-color: #E8E8E8;
        }

        .quz {
            margin-left: 2vw;
        }

        .quz1 {
            margin-left: 3vw;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron jumbotron-fluid  header">
        <div class="container ">
            <h1 class="display-4">Examination of <?php echo $topic; ?></h1>
            <p class="lead"> <b>Rules:</b> is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>

    <div class="container mt-3"><kbd style="margin-right:5px">Time left: </kbd> <span id="timer"></span></div>
    <h1 class="text-center">MCQ TEST</h1>
    <P class="text-center lead">You have only 20 min to complete the exam,(There is no negetive marking.) </P>
    <form class="container" method="post" action="examvaildar.php">
        <?php
        $conn = dbconnect();
        $temp = 1;
        $total = 0;
        $sql = "select *from question where topic='$topic'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $question = $row['question'];
            $quesid = $row['quesid'];
            $op1 = $row['op1'];
            $op2 = $row['op2'];
            $op3 = $row['op3'];
            $op4 = $row['op4'];
            $correctop = $row['correctop'];
        ?>

            <div class="form-group container border mt-3 ">
                <h4 class="mt-1 quz"><?php echo $temp; ?>. <?php echo $question; ?> ?</h4>
                <h5 class="quz">Ans:-</h5>
                <br>
                <div class="row mb-2 ">
                    <div class="col quz1"><input type="radio" name="Quizcheck[<?php echo $temp; ?>]" value="<?php echo $op1; ?>"> <?php echo $op1; ?></div>
                    <div class="col quz1"> <input type="radio" name="Quizcheck[<?php echo $temp; ?>]" value="<?php echo $op2; ?>"> <?php echo $op2; ?></div>
                    <div class="w-100"></div><br>
                    <div class="col quz1"><input type="radio" name="Quizcheck[<?php echo $temp; ?>]" value="<?php echo $op3; ?>"> <?php echo $op3; ?></div>
                    <div class="col quz1"> <input type="radio" name="Quizcheck[<?php echo $temp; ?>]" value="<?php echo $op4; ?>"> <?php echo $op4; ?></div>




                </div>

            </div>
            <input type="name" name="Ansquiz[<?php echo $temp ?>]" value="<?php echo encriptval($correctop); ?>" style="display: none;">
        <?php
            $temp = $temp + 1;
            $total = $total + 1;
        } ?>
        <input type="name" value="<?php echo $temp; ?>" name="total" style="display:none">
        <input type="name" value="<?php echo $total; ?>" name="quesno" style="display:none">
        <input type="name" value="<?php echo $topic; ?>" name="topic" style="display:none">
        <input type="name" value="<?php echo $userid; ?>" name="userid" style="display:none">



        <div class="text-center mb-3 mt-1">
            <a class="btn btn-primary mt-3" href="startexam.php">back</a>
            <button type="reset" class="btn btn-primary mt-3">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>

        </div>

    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


    <script>
        //simple timer
        document.getElementById('timer').innerHTML =
            20 + ":" + 01;
        startTimer();

        function startTimer() {
            var presentTime = document.getElementById('timer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if (s == 59) {
                m = m - 1
            }
            if (m < 0) {
                alert('timer completed');
                window.location.href = "test.php";
            }

            document.getElementById('timer').innerHTML =
                m + ":" + s;
            // console.log(m)
            setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec
            }; // add zero in front of numbers < 10
            if (sec < 0) {
                sec = "59"
            };
            return sec;
        }
    </script>
</body>

</html>