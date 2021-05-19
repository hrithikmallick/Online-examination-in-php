<?php
include "forumfunctions.php";
include "allfunction.php";

$forum_id = "4";
$conn = dbConnect();


if ($conn) {
    // echo "Connection Successfully";
    $sql = "select *from comment where forum_id=$forum_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}


echo count($row);
