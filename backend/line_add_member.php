<?php
        require('../dbconnect.php');

        $name = $_POST["name"];
        $userid = $_POST["user"];
        $email = $_POST["email"];
        $accessToken = $_POST["accessToken"];
        $phone = $_POST["phone"];

        


        $x = "";

        $sql2 = "SELECT * FROM users_info";
        $result2 = mysqli_query($con, $sql2);

        while ($row = mysqli_fetch_array($result2)) {

            if ($phone == $row['tel']) {

                $sql3 = "UPDATE users_info SET user_id = '$userid', access_token='$accessToken'WHERE tel = '$phone' ";
                $result3 = mysqli_query($con, $sql3);
                if ($result3) {

                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["tel"] = $row["tel"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["level"] = $row["level"];
                    $_SESSION["user_id"] = $row["user_id"];

                    echo "<script> window.location.href='../page/index.php'</script>";
                    $x = 1;
                }
            } else {
            }
        }


        if ($x != 1) {

            $sql6 = "SELECT * FROM users_info WHERE tel='" . $phone . "'";
            $result6 = mysqli_query($con, $sql6)or die(mysqli_error($con));
            $Num_Rows = mysqli_num_rows($result6);

            if ($Num_Rows == 0) {

                $sql = "INSERT INTO users_info (tel,level,name,user_id,access_token,email) 
                        VALUES ('$phone','member','$name','$userid','$accessToken','$email')";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    
                    $sql = "SELECT * FROM users_info WHERE user_id='". $userid ."'";
                    $result= mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["tel"] = $row["tel"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["level"] = $row["level"];
                    $_SESSION["user_id"] = $row["user_id"];

                    echo "<script> window.location.href='../page/index.php'</script>";
                } else {
                    echo mysqli_error($con);
                }
            } else {
                echo "<script> window.location.href='../page/index.php'</script>";
            }
        }
        
    