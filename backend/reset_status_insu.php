<?php

require('../dbconnect.php');

$sql = "UPDATE data_insurance
SET status = 'Unsend'";

$result = mysqli_query($con, $sql) or die;

if($result){

    echo '<script> window.location.href = "../page/insurance_data.php";
    </script>';
}

?>