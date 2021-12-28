<?php

require('../dbconnect.php');

$sql = "UPDATE payment
SET status = 'Unsend'";

$result = mysqli_query($con, $sql) or die;

if($result){

    echo '<script> window.location.href = "../page/payment_data.php";
    </script>';
}

$sql = "UPDATE payment
SET status_sms = 'Unsend'";

$result = mysqli_query($con, $sql) or die;

if($result){

    echo '<script> window.location.href = "../page/payment_data.php";
    </script>';
}


?>