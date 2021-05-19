<?php include("examfunctions.php");
session_start();
ob_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
$userid = $_SESSION['userid']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <?php include("_header.php"); ?>

    <div class="container mt-3">
        <h1 class="display-4">Result of Your Exams</h1>
        <h5><?php include("allfunction.php");
            echo getusername($_SESSION['userid']); ?>,This is the list of your exam that you already submited</h5>
        <table class="table mt-5 border">
            <thead>
                <tr>
                    <th scope="col">sno</th>
                    <th scope="col">Exam Topic</th>
                    <th scope="col">Score</th>
                    <th scope="col">Attempted</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function checkstatus($score)
                {
                    if ($score == "failed") {
                        return " text-danger";
                    } else if ($score == "pass") {
                        return " text-success";
                    }
                }
                $conn = dbconnect();
                if ($conn) {
                    $sql = "select *from result where userid='$userid'";
                    $result = mysqli_query($conn, $sql);
                    $no_of_records = mysqli_num_rows($result);
                    if ($no_of_records > 0) {
                        $tm = 1;
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {




                ?>
                            <tr>
                                <th scope="row"><?php echo $tm; ?></th>
                                <td><?php echo $row["topic"]; ?></td>
                                <td><?php echo $row["score"]; ?>/<?php echo $row["total"]; ?></td>
                                <td><?php echo $row["attend"]; ?></td>
                                <td class="<?php echo checkstatus($row["status"]); ?>"><?php echo $row["status"]; ?></td>
                            </tr><?php $tm++; ?>

                <?php

                        }
                    } else {
                        echo "<h5 class='text-center display-6'>0 results found </h5><p>Please kindly give any exam first </p>";
                    }
                }



                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>