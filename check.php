<?php
include("examfunctions.php");
// $userid = "100";
// $topic = "c++";
// $res = courseupdate($topic, $userid);
// echo $res;

// $var = "ob";
// $devar = encriptval($var);
// echo $devar;
// if ($var == decriptval($devar)) {
//     echo "same";
// }
$percentage = "";
$total_marks = 1;
$scored = 1;

$percentage = (int)($scored / $total_marks * 100.0);
if ($percentage >= 70) {
    $status = "pass";
    // echo $status;
} else {
    $status = "failed";
}

echo ("Percentage " . $status);
