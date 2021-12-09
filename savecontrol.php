<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

//รับค่าที่ส่งมาจากฟอร์มลงในตัวแปร
 $profile=implode(",",$_POST["profile"]); //array => string
 $control=implode(",",$_POST["control"]); //array => string
 $order=implode(",",$_POST["order"]); //array => string
 $purchase=implode(",",$_POST["purchase"]); //array => string
 $shopinfo=implode(",",$_POST["shopinfo"]); //array => string


//บันทึกข้อมูล
$sql = "UPDATE `user_control` SET `profile`='$profile',`control`='$control',`order`='$order',`purchase`='$purchase',`shopinfo`='$shopinfo' WHERE 1" ;

$result= mysqli_query($con,$sql);

if($result){
    header("Location:control.php");
    exit(0);
}
else{
 echo mysqli_error($con);
}

?>