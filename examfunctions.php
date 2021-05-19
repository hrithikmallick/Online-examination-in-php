<?php
function dbconnect()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "major";

    $conn = mysqli_connect($servername, $username, $pass, $dbname);

    return $conn;
}
function putQuestion($topic, $ques, $op1, $op2, $op3, $op4, $correctop)
{
    $conn = dbconnect();
    $sql = "insert into question (topic,question,op1,op2,op3,op4,correctop) values('$topic','$ques','$op1','$op2','$op3','$op4','$correctop')";
    if (mysqli_query($conn, $sql)) {
        $response = 1;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $response = 0;
    }
    return $response;
}
function getQuestion($topic)
{
    $conn = dbconnect();

    $sql = "select *from question where topic='$topic'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $question = $row['question'];
        echo $question;
    }
}
function putres($score, $attend, $status, $userid, $topic, $total)
{
    $conn = dbconnect();
    $sql = "insert into result (score,attend,status,userid,topic,total) values('$score','$attend','$status','$userid','$topic','$total')";
    if (mysqli_query($conn, $sql)) {
        $response = 1;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $response = 0;
    }
    return $response;
}
function getresult($userid)
{
    $conn = dbconnect();
    if ($conn) {
        $sql = "select *from result where userid='$userid'";
        $result = mysqli_query($conn, $sql);
        $no_of_records = mysqli_num_rows($result);
        if ($no_of_records > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo  "Result: " . $row["status"] . " Attempted: " . $row["attend"] . " Number: " . $row["score"] . "Topic:-" . $row["topic"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}
function courseupdate($coursename, $userid)
{
    $conn = dbconnect();
    if ($conn) {
        $sql = "select *from result where topic = '" . $coursename . "' and userid ='" . $userid . "'";
        $result = mysqli_query($conn, $sql);
        $no_of_records = mysqli_num_rows($result);
        if ($no_of_records > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                if ($coursename == $row["topic"] && $userid == $row["userid"]) {
                    return 1;
                } else {
                    return 0;
                }
            }
        } else {
            echo "0 results";
        }
    }
}
function coursechange($count, $coursename, $status, $coursenumber, $userid, $total)
{
    $conn = dbconnect();

    $response = 0;
    if ($conn) {
        echo "Connection Successfully";

        $sql = "update result set attend ='" . $count . "',status = '" . $status . "', score ='" . $coursenumber . "',total='" . $total . "' where topic = '" . $coursename . "' and userid ='" . $userid . "'";

        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    } else {
        echo "Connection Failed";
        $response = 0;
    }
    return $response;
}
function stresult($userid)
{
    $conn = dbconnect();
    if ($conn) {
        $sql = "select *from result where userid ='" . $userid . "' ";
        $result = mysqli_query($conn, $sql);
        $no_of_records = mysqli_num_rows($result);
        if ($no_of_records > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Course: " . $row["topic"] . " - Status: " . $row["status"] . " Attempted: " . $row["attend"] . " Number: " . $row["score"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}
//for encription 


function encriptval($simple_string)
{

    // Store a string into the variable which
    // need to be Encrypted


    // Display the original string
    // echo "Original String: " . $simple_string;

    // Store the cipher method
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';

    // Store the encryption key
    $encryption_key = "examreuslt";

    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt(
        $simple_string,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    // Display the encrypted string
    // echo "Encrypted String: " . $encryption . "\n";
    return $encryption;
}
function decriptval($encryption)
{

    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';

    // Store the decryption key
    $decryption_key = "examreuslt";
    $ciphering = "AES-128-CTR";
    $options = 0;

    // Use openssl_decrypt() function to decrypt the data
    $decryption = openssl_decrypt(
        $encryption,
        $ciphering,
        $decryption_key,
        $options,
        $decryption_iv
    );

    // Display the decrypted string
    // echo "Decrypted String: " . $decryption;
    return $decryption;
}
