<?php
session_start();
ob_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .border {

            padding-top: 3vh;
            padding-bottom: 3vh;

        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php include "_header.php"; ?>
    <div class="jumbotron jumbotron-fluid ">
        <div class="container">
            <h1 class="display-4">Exam Instruction</h1>
            <h4>Instructions to Users:</h4>

            <ul class="lead mt-3">

                <li>Fill up your personal details carefully.</li>
                <li> All questions are not compulsory.</li>
                <li>Try to submit the paper in 10-15 minutes.</li>
                <li>You are allowed to submit only once, make sure that you have correctly attempted all the questions before submission.</li>
                <li> Make sure you clicked on submit button to successfully complete the test.</li>
            </ul>


        </div>
    </div>

    <div class="container border mt-5">
        <h1 class="text-center mt-2 display-6"> Exam Information</h1><br>
        <div class="row container ">
            <div class="col "><b>Student name:- </b>
                <a style="font-size:20px"><?php include("allfunction.php");
                                            echo getusername($_SESSION['userid']); ?></a>
            </div>
            <div class="col "><b>Exam time:- </b> 20min</div>

            <!-- <div class="w-100"></div>
            <div class="col"></div>
            <div class="col"></div> --><br>
            <h3 class=" mt-2 mb-3 "> List of Subject Available For Examination Now.</h3><br>

            <?php
            $topics = ["", "cc", "java"];
            function chechcc($cc)
            {
                if ($cc == "cc") {
                    $cc = "c++";
                    return $cc;
                }
                return $cc;
            }
            for ($r = 1; $r < count($topics); $r++) {

                $i = 1;
                echo '<a  href="exam.php?topic=' . $topics[$r] . '" class="list-group-item active text-center mt-2">' . $r . '. Exam of ' . chechcc($topics[$r]) . '</a>';
            }
            ?>
        </div>

    </div>
    <div class="container mt-5">
        <h3 class=" mt-2 mb-3 display-6"> Your previous Results are here. </h3>
        <a href="testres.php" class="btn btn-primary mb-5 ">Result</a>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>