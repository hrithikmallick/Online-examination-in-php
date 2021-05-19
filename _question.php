<?php

include("examfunctions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="jumbotron jumbotron-fluid ">
        <div class="container">
            <h1 class="display-4">Here you have to add question</h1>
            <h4>Instructions to the admin teachers:</h4>

            <ul class="lead mt-3">

                <li>Firslt you have to add question topic,topic stand for that subject you want to add for examination</li>
                <li>Then you have to give 4 options for students</li>
                <li>Finaly you have to give the right option for generating result</li>

            </ul>


        </div>
    </div>
    <form class="container mt-5" method="post">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Question topic</label>
            <input type="name" class="form-control" name="subject" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Question?</label>
            <input type="name" class="form-control" name="questionmain" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">option 1</label>
            <input type="name" class="form-control" name="option1" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">option 2</label>
            <input type="name" class="form-control" name="option2" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">option 3</label>
            <input type="name" class="form-control" name="option3" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">option 4</label>
            <input type="name" class="form-control" name="option4" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Right option</label>
            <input type="name" class="form-control" name="rightoption" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>


    </form>

    <?php
    if (isset($_POST["submit"])) {
        $topic = $_POST['subject'];
        $question = $_POST['questionmain'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $rightop = $_POST['rightoption'];
        putQuestion($topic, $question, $option1, $option2, $option3, $option4, $rightop);
        // echo $question;
        // echo $topic;
        echo '<div class="alert alert-success alert-dismissible fade show container" role="alert">
        <strong>Succesfully !</strong> Upload your question,try to add another question
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

    ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>