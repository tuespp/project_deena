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
</head>

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
                        <h5 style="color:white; margin-left: 10px;"><?php echo $row['username']; ?></h5>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 style="text-transform: uppercase">เพื่มข้อมูล</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="insurance_insert_form.php" style="text-transform: uppercase">เพื่มข้อมูล</a></li>
                                <li class="breadcrumb-item active" style="text-transform: uppercase">เพื่มข้อมูล</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


       

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="offset-3 col-md-6">
                            <!-- general form elements -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">เพื่มข้อมูลผู้ใช้</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form action="../backend/insurance_insert.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">ผู้เอาประกันภัย</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="insurance" value="" placeholder="ชื่อ - นามสกุล" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">โทรศัพท์</label>
                                            <input type="phone" class="form-control" id="exampleInputPassword1" name="phone" value="" placeholder="0XX-XXXXXXX" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">ประเภท</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="type" value="" placeholder="ประเภท" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">ทะเบียนรถ</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="car_license" value="" placeholder="ทะเบียนรถ" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">วันหมดอายุ</label>
                                            <input type="date" class="form-control" id="exampleInputPassword1" name="exp" value="" placeholder="Expiration Date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">เบี้ยรวม</label>
                                            <input type="text" class="form-control" id="interest" name="interest" value="" placeholder="เบี้ยรวม" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">วันแจ้งเตือน</label>
                                            <input type="date" class="form-control" id="date_send" name="date_send" value="" placeholder="date_send" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary d-block m-auto">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->


                            </form>
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

                        function updateTextView(_obj) {
                            var num = getNumber(_obj.val());
                            if (num == 0) {
                                _obj.val('');
                            } else {
                                _obj.val(num.toLocaleString());
                            }
                        }

                        function getNumber(_str) {
                            var arr = _str.split('');
                            var out = new Array();
                            for (var cnt = 0; cnt < arr.length; cnt++) {
                                if (isNaN(arr[cnt]) == false) {
                                    out.push(arr[cnt]);
                                }
                            }
                            return Number(out.join(''));
                        }
                        $(document).ready(function() {
                            $('#interest').on('keyup', function() {
                                updateTextView($(this));
                            });
                        });
                    </script>
</body>

</html>