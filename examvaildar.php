<?php

session_start();
ob_start();

include("examfunctions.php");
$userid = $_POST['userid'];
$topic = $_POST["topic"];

if (isset($_POST["submit"])) {






    if (!empty($_POST["Quizcheck"])) {
        $count = count($_POST["Quizcheck"]);
        echo "you attented " . $count . " question <br>";
        echo $_POST["topic"];

        $total = $_POST["total"];
        $quesno = $_POST["quesno"];
        $selected = $_POST["Quizcheck"];
        $ans = $_POST["Ansquiz"];

        echo "<br>";
        $res = 0;
        for ($i = 1; $i < $total; $i++) {

            if ($selected[$i] == decriptval($ans[$i])) {
                $res++;
            }
        }
        echo "<br>";
        echo "yourb scrore is";
        echo $res;

        $status = "failed";

        $percentage = (int)($res / $quesno * 100.0);
        if ($percentage >= 70) {
            $status = "pass";
            // echo $status;
        } else {
            $status = "failed";
        }


        $updation = courseupdate($topic, $userid);
        if ($updation == 0) {
            putres($res, $count, $status, $userid, $topic, $quesno);
            header('location:testres.php');
        } else {
            coursechange($count, $topic, $status, $res, $userid, $quesno);
            header('location:testres.php');
        }
    } else {

        header('location:testres.php');
    }
}
