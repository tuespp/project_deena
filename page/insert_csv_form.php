<?php
require_once('../dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sqlp = "SELECT * FROM user_role  ";
$resultp = mysqli_query($con, $sqlp);

/* ---------------------------------insert csv to database insurance------------------------------------------------------*/

use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


            $insurance     = "";
            if (isset($column[0])) {
                $insurance = mysqli_real_escape_string($conn, $column[0]);
            }
            $phone = "";
            if (isset($column[1])) {
                $phone = mysqli_real_escape_string($conn, $column[1]);
            }
            $type = "";
            if (isset($column[2])) {
                $type = mysqli_real_escape_string($conn, $column[2]);
            }
            $car_license = "";
            if (isset($column[3])) {
                $car_license = mysqli_real_escape_string($conn, $column[3]);
            }
            $exp = "";
            if (isset($column[4])) {
                $exp = mysqli_real_escape_string($conn, $column[4]);
            }
            $interest     = "";
            if (isset($column[5])) {
                $interest = mysqli_real_escape_string($conn, $column[5]);
            }
            $status = "";
            if (isset($column[6])) {
                $status = mysqli_real_escape_string($conn, $column[6]);
            }
            $date_send = "";
            if (isset($column[7])) {
                $date_send = mysqli_real_escape_string($conn, $column[7]);
            }
            $time_send = "";
            if (isset($column[8])) {
                $time_send = mysqli_real_escape_string($conn, $column[8]);
            }
            $status_sms = "";
            if (isset($column[9])) {
                $status_sms = mysqli_real_escape_string($conn, $column[9]);
            }
            $note = "";
            if (isset($column[10])) {
                $note = mysqli_real_escape_string($conn, $column[10]);
            }


            $sqlInsert = "INSERT into data_insurance (insurance,phone,type,car_license,exp,interest,status,date_send,time_send,status_sms,note)
                   values (?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssssssssss";
            $paramArray = array(

                $insurance,
                $phone,
                $type,
                $car_license,
                $exp,
                $interest,
                $status,
                $date_send,
                $time_send,
                $status_sms,
                $note
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);

            if (!empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
/* -------------------------------------------------------------------------------------------------- */

/* ---------------------------------insert csv to database payment------------------------------------------------------*/




$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import_payment"])) {

    $fileName = $_FILES["file_payment"]["tmp_name"];

    if ($_FILES["file_payment"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {


            $invoice_id     = "";
            if (isset($column[0])) {
                $invoice_id = mysqli_real_escape_string($conn, $column[0]);
            }
            $invoice_date = "";
            if (isset($column[1])) {
                $invoice_date = mysqli_real_escape_string($conn, $column[1]);
            }
            $insurance_id = "";
            if (isset($column[2])) {
                $insurance_id = mysqli_real_escape_string($conn, $column[2]);
            }
            $insurance = "";
            if (isset($column[3])) {
                $insurance = mysqli_real_escape_string($conn, $column[3]);
            }
            $name = "";
            if (isset($column[4])) {
                $name = mysqli_real_escape_string($conn, $column[4]);
            }
            $phone     = "";
            if (isset($column[5])) {
                $phone = mysqli_real_escape_string($conn, $column[5]);
            }
            $type = "";
            if (isset($column[6])) {
                $type = mysqli_real_escape_string($conn, $column[6]);
            }
            $car_license     = "";
            if (isset($column[7])) {
                $car_license     = mysqli_real_escape_string($conn, $column[7]);
            }
            $date_start = "";
            if (isset($column[8])) {
                $date_start = mysqli_real_escape_string($conn, $column[8]);
            }
            $premium = "";
            if (isset($column[9])) {
                $premium = mysqli_real_escape_string($conn, $column[9]);
            }
            $premium_total = "";
            if (isset($column[10])) {
                $premium_total = mysqli_real_escape_string($conn, $column[10]);
            }
            $agent = "";
            if (isset($column[11])) {
                $agent = mysqli_real_escape_string($conn, $column[11]);
            }
            $installment_no = "";
            if (isset($column[12])) {
                $installment_no = mysqli_real_escape_string($conn, $column[12]);
            }
            $date_end = "";
            if (isset($column[13])) {
                $date_end = mysqli_real_escape_string($conn, $column[13]);
            }
            $installment = "";
            if (isset($column[14])) {
                $installment = mysqli_real_escape_string($conn, $column[14]);
            }
            $date_send = "";
            if (isset($column[15])) {
                $date_send = mysqli_real_escape_string($conn, $column[15]);
            }
            $status = "";
            if (isset($column[16])) {
                $status = mysqli_real_escape_string($conn, $column[16]);
            }
            $time_send = "";
            if (isset($column[17])) {
                $time_send = mysqli_real_escape_string($conn, $column[17]);
            }
            $status_sms = "";
            if (isset($column[18])) {
                $status_sms = mysqli_real_escape_string($conn, $column[18]);
            }
            $note = "";
            if (isset($column[19])) {
                $note = mysqli_real_escape_string($conn, $column[19]);
            }


            $sqlInsert2 = "INSERT into payment (invoice_id,invoice_date,insurance_id,insurance,name,phone,type,car_license,date_start,premium,premium_total,agent,installment_no,date_end,installment,date_send,status,time_send,status_sms,note)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType2 = "ssssssssssssssssssss";
            $paramArray2 = array(

                $invoice_id,
                $invoice_date,
                $insurance_id,
                $insurance,
                $name,
                $phone,
                $type,
                $car_license,
                $date_start,
                $premium,
                $premium_total,
                $agent,
                $installment_no,
                $date_end,
                $installment,
                $date_send,
                $status,
                $time_send,
                $status_sms,
                $note,
            );
            $insertId2 = $db->insert($sqlInsert2, $paramType2, $paramArray2);

            if (!empty($insertId2)) {
                $type2 = "success";
                $message2 = "CSV Data Imported into the Database";
            } else {
                $type2 = "error";
                $message2 = "Problem in Importing CSV Data";
            }
        }
    }
}
/* -------------------------------------------------------------------------------------------------- */

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/switch_insurance.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>

<style>
    #response {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 2px;
        display: none;
    }

    .success {
        background: #c7efd9;
        border: #bbe2cd 1px solid;
    }

    .error {
        background: #fbcfcf;
        border: #f3c6c7 1px solid;
    }

    div#response.display-block {
        display: block;
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <!-- Message Start -->
                        <!-- Message End -->
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <span class="brand-text font-weight-light" style="margin-left: 20px; text-transform: uppercase;"><?php echo $row['level']; ?> Managment</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/<?php echo $row['img']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <h5 style="color:white; margin-left: 10px;"><?php echo $row['name']; ?></h5>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                        while ($rowp = mysqli_fetch_assoc($resultp)) {
                            $idp = $rowp['id'];
                            if ($_SESSION['level'] == 'admin') {
                                $role = explode(",", $rowp['role']); //array
                                $result_array = array_search("admin$idp", $role); //array
                                if ($result_array !== false) {
                                    echo " <li class='nav-item'><a href='$rowp[link]' class='nav-link '>
                <i class='$rowp[icon]'></i>
                <p>
                $rowp[page]
                </p>
                </a>
              </li> ";
                                }
                            }
                            if ($_SESSION['level'] == 'member') {
                                $role = explode(",", $rowp['role']); //array
                                $result_array = array_search("member$idp", $role); //array
                                if ($result_array !== false) {
                                    echo " <li class='nav-item'><a href='$rowp[link]' class='nav-link '>
                  <i class='$rowp[icon]'></i>
                  <p>
                  $rowp[page]
                  </p>
                  </a>
                </li> ";
                                }
                            }
                            if ($_SESSION['level'] == 'employee') {
                                $role = explode(",", $rowp['role']); //array
                                $result_array = array_search("employee$idp", $role); //array
                                if ($result_array !== false) {
                                    echo " <li class='nav-item'><a href='$rowp[link]' class='nav-link '>
                <i class='$rowp[icon]'></i>
                <p>
                $rowp[page]
                </p>
                </a>
              </li> ";
                                }
                            }
                        }

                        ?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Log out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- ------------------------------------------------------------ insurance -------------------------------------------------------- -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 style="text-transform: uppercase">insurance</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="order.php" style="text-transform: uppercase">insurance</a></li>
                                <li class="breadcrumb-item active" style="text-transform: uppercase">insurance</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <?php



            $sql = "SELECT * FROM data_insurance ";
            $result = mysqli_query($con, $sql);


            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                        <div class="input-row">
                                            <label class="col-md-4 control-label">Choose CSV File Insurance</label> <br>
                                            <input type="file" name="file" id="file" accept=".csv">
                                            <button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
                                    </form>

                                </div>


                                <div id="response" class="<?php if (!empty($type)) {
                                                                echo $type . " display-block";
                                                            } ?>">
                                    <?php if (!empty($message)) {
                                        echo $message;
                                    } ?>
                                </div>




                                <!-- /.card-header -->
                                <div class="card-body">


                                    <br>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำกับ</th>
                                                <th>ผู้เอาประกัน</th>
                                                <th>โทรศัพท์</th>
                                                <th>ประเภท</th>
                                                <th>ทะเบียนรถ</th>
                                                <th>วันหมดอายุ</th>
                                                <th>เบี้ยรวม</th>
                                                <th>แจ้งเตือน Line</th>
                                                <th>แจ้งเตือน SMS</th>
                                                <th>วันแจ้งเตือน</th>
                                                <th>หมายเเหตุ</th>



                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['insurance']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['type']; ?></td>
                                                    <td><?php echo $row['car_license']; ?></td>
                                                    <td><?php echo $row['exp']; ?></td>
                                                    <td><?php echo $row['interest']; ?></td>
                                                    <td>

                                                        <?php if ($row['status'] == '1') {

                                                            $status = 'checked';
                                                        } else {
                                                            $status = '';
                                                        } ?>

                                                        <label class="switch">
                                                            <input type="checkbox" name="id" class="change" <?php echo $status ?> id="<?php echo $row['id']; ?>" disabled="disabled">

                                                            <div class="slider round"> </div>

                                                        </label>

                                                    </td>

                                                    <td>

                                                        <?php if ($row['status_sms'] == '1') {

                                                            $status = 'checked';
                                                        } else {
                                                            $status = '';
                                                        } ?>

                                                        <label class="switch">
                                                            <input type="checkbox" name="id" class="change2" <?php echo $status ?> id="<?php echo $row['id']; ?>" disabled="disabled">

                                                            <div class="slider round"> </div>

                                                        </label>

                                                    </td>

                                                    <td><?php echo $row['date_send']; ?></td>
                                                    <td><?php echo $row['note']; ?></td>


                                                </tr>


                                            <?php  } ?>
                                        </tbody>

                                    </table>

                                </div>


                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.content-wrapper -->

                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                            <div class="p-3">
                                <h5>Title</h5>
                                <p>Sidebar content</p>
                            </div>
                        </aside>
                        <!-- /.control-sidebar -->

                        <!-- Main Footer -->
                    </div>
                    <!-- ./wrapper -->
                </div>
            </section>
        </div>

        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

        <!-- ------------------------------------------------------------ payment ---------------------------------------------------------------------------------- -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 style="text-transform: uppercase">Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="order.php" style="text-transform: uppercase">Payment</a></li>
                                <li class="breadcrumb-item active" style="text-transform: uppercase">Payment</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <?php



            $sql = "SELECT * FROM payment ";
            $result = mysqli_query($con, $sql);


            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                        <div class="input-row">
                                            <label class="col-md-4 control-label">Choose CSV File Payment</label> <br>
                                            <input type="file" name="file_payment" id="file_payment" accept=".csv">
                                            <button type="submit" id="submit" name="import_payment" class="btn btn-primary">Import</button>
                                    </form>

                                </div>


                                <div id="response" class="<?php if (!empty($type2)) {
                                                                echo $type2 . " display-block";
                                                            } ?>">
                                    <?php if (!empty($message2)) {
                                        echo $message2;
                                    } ?>
                                </div>




                                <!-- /.card-header -->
                                <div class="card-body">


                                    <br>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ใบรับแจ้ง</th>
                                                <th>วันรับแจ้ง</th>
                                                <th>กรมธรรม์เลขที่</th>
                                                <th>บ.ประกันภัย</th>
                                                <th>ผู้เอาประกันภัย</th>
                                                <th>โทรศัพท์</th>
                                                <th>ประเภท</th>
                                                <th>ทะเบียนรถ</th>
                                                <th>เริ่มคุ้มครอง</th>
                                                <th>เบี้ยสุทธิ</th>
                                                <th>เบี้ยรวม</th>
                                                <th>ตัวแทน</th>
                                                <th>งวดที่</th>
                                                <th>วันครบกำหนด</th>
                                                <th> งวดละ </th>
                                                <th>แจ้งเตือน Line</th>
                                                <th>แจ้งเตือน SMS</th>
                                                <th>หมายเเหตุ</th>

                                                <th> วันแจ้งเตือน </th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['invoice_id']; ?></td>
                                                    <td><?php echo $row['invoice_date']; ?></td>
                                                    <td><?php echo $row['insurance_id']; ?></td>
                                                    <td><?php echo $row['insurance']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['type']; ?></td>
                                                    <td><?php echo $row['car_license']; ?></td>
                                                    <td><?php echo $row['date_start']; ?></td>
                                                    <td><?php echo $row['premium']; ?></td>
                                                    <td><?php echo $row['premium_total']; ?></td>
                                                    <td><?php echo $row['agent']; ?></td>
                                                    <td><?php echo $row['installment_no']; ?></td>
                                                    <td><?php echo $row['date_end']; ?></td>
                                                    <td><?php echo $row['installment']; ?></td>

                                                    <td>

                                                        <?php if ($row['status'] == '1') {

                                                            $status = 'checked';
                                                        } else {
                                                            $status = '';
                                                        } ?>

                                                        <label class="switch">
                                                            <input type="checkbox" name="id" class="change" <?php echo $status ?> id="<?php echo $row['id']; ?>" disabled="disabled">

                                                            <div class="slider round"> </div>

                                                        </label>

                                                    </td>

                                                    <td>

                                                        <?php if ($row['status_sms'] == '1') {

                                                            $status = 'checked';
                                                        } else {
                                                            $status = '';
                                                        } ?>

                                                        <label class="switch">
                                                            <input type="checkbox" name="id" class="change2" <?php echo $status ?> id="<?php echo $row['id']; ?>" disabled="disabled">

                                                            <div class="slider round"> </div>

                                                        </label>

                                                    </td>

                                                    <td><?php echo $row['note']; ?></td>
                                                    <td><?php echo $row['date_send']; ?></td>



                                                </tr>
                                            <?php  } ?>
                                        </tbody>

                                    </table>

                                </div>


                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.content-wrapper -->
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                            <div class="p-3">
                                <h5>Title</h5>
                                <p>Sidebar content</p>
                            </div>
                        </aside>
                        <!-- /.control-sidebar -->

                        <!-- Main Footer -->
                    </div>
                    <!-- ./wrapper -->
                    <!-- REQUIRED SCRIPTS -->

                    <!-- jQuery -->
                    <script src="../js/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="../js/bootstrap.bundle.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="../js/adminlte.min.js"></script>

                    <script src="../js/jquery.dataTables.min.js"></script>
                    <script src="../js/dataTables.bootstrap4.min.js"></script>
                    <script src="../js/dataTables.responsive.min.js"></script>
                    <script src="../js/responsive.bootstrap4.min.js"></script>
                    <script src="../js/dataTables.buttons.min.js"></script>
                    <script src="../js/buttons.bootstrap4.min.js"></script>
                    <script src="../js/jszip/jszip.min.js"></script>
                    <script src="../js/pdfmake.min.js"></script>
                    <script src="../js/vfs_fonts.js"></script>
                    <script src="../js/buttons.html5.min.js"></script>
                    <script src="../js/buttons.print.min.js"></script>
                    <script src="../js/buttons.colVis.min.js"></script>

                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "responsive": true,
                                "lengthChange": false,
                                "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                            });
                        });
                    </script>

<script>
                        $(function() {
                            $("#example3").DataTable({
                                "responsive": true,
                                "lengthChange": false,
                                "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
                            $('#example4').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                            });
                        });
                    </script>
                    <!-- --------------------------- insert csv to database ------------------------------------------------------>
                    <script type="text/javascript">
                        $(document).ready(function() {

                            $("#frmCSVImport").on("submit", function() {

                                $("#response").attr("class", "");
                                $("#response").html("");
                                var fileType = ".csv";
                                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                                if (!regex.test($("#file").val().toLowerCase())) {
                                    $("#response").addClass("error");
                                    $("#response").addClass("display-block");
                                    $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                                    return false;
                                }
                                return true;
                            });
                        });
                    </script>
                      <!-- --------------------------- --------------------- ------------------------------------------------------>
</body>

</html>