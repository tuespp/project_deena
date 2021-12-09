<?php
require_once('dbconnect.php');

$id = $_SESSION['id'];
if (empty($id)) {
    header('Location:login.php');
}
$sql = "SELECT * FROM users_info WHERE id= $id ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$sqlc = "SELECT * FROM user_control WHERE id= '1' ";
$resultc = mysqli_query($con, $sqlc);
$rowc = mysqli_fetch_assoc($resultc);

$profile_arr = array("admin", "employee", "member");
$control_arr = array("admin", "employee", "member");
$order_arr = array("admin", "employee", "member");
$purchase_arr = array("admin", "employee", "member");
$shopinfo_arr = array("admin", "employee", "member");

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
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/buttons.bootstrap4.min.css">
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
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light" style="margin-left: 20px; text-transform: uppercase;"><?php echo $row['level']; ?> Managment</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/<?php echo $row['img']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <h5 style="color:white; margin-left: 10px;"><?php echo $row['username']; ?></h5>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            $profile = explode(",", $rowc['profile']); //array
                            $result_array = array_search("admin", $profile); //array
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='profile.php' class='nav-link '>
                <i class='nav-icon far fa-id-card'></i>
                <p>
                  Profile
                </p>
                </a>
              </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'member') {
                            $profile = explode(",", $rowc['profile']); //array
                            $result_array = array_search("member", $profile); //array
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='profile.php' class='nav-link '>
                  <i class='nav-icon far fa-id-card'></i>
                  <p>
                    Profile
                  </p>
                  </a>
                </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $profile = explode(",", $rowc['profile']); //array
                            $result_array = array_search("employee", $profile); //array
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='profile.php' class='nav-link '>
                <i class='nav-icon far fa-id-card'></i>
                <p>
                  Profile
                </p>
                </a>
              </li> ";
                            }
                        }

                        ?>

                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            $control = explode(",", $rowc['control']); //array
                            $result_array = array_search("admin", $control);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='control.php' class='nav-link '>
                  <i class='nav-icon fas fa-cogs'></i>
                  <p>
                    Control Setting
                  </p>
                </a>
              </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'member') {
                            $control = explode(",", $rowc['control']); //array
                            $result_array = array_search("member", $control);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='control.php' class='nav-link '>
                    <i class='nav-icon fas fa-cogs'></i>
                    <p>
                      Control Setting
                    </p>
                  </a>
                </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $control = explode(",", $rowc['control']); //array
                            $result_array = array_search("employee", $control);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='control.php' class='nav-link  '>
                      <i class='nav-icon fas fa-cogs'></i>
                      <p>
                        Control Setting
                      </p>
                    </a>
                  </li> ";
                            }
                        }

                        ?>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            $shopinfo = explode(",", $rowc['shopinfo']); //array
                            $result_array = array_search("admin", $shopinfo);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='shopinfo.php' class='nav-link  active'>
                <i class='nav-icon fas fa-store'></i>
                  <p>
                   Shop Info
                  </p>
                </a>
              </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'member') {
                            $shopinfo = explode(",", $rowc['shopinfo']); //array
                            $result_array = array_search("member", $shopinfo);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='shopinfo.php' class='nav-link  active'>
                  <i class='nav-icon fas fa-store'></i>
                    <p>
                     Shop Info
                    </p>
                  </a>
                </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $shopinfo = explode(",", $rowc['shopinfo']); //array
                            $result_array = array_search("employee", $shopinfo);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='shopinfo.php' class='nav-link  active'>
                    <i class='nav-icon fas fa-store'></i>
                      <p>
                       Shop Info
                      </p>
                    </a>
                  </li> ";
                            }
                        }
                        ?>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            $order = explode(",", $rowc['order']); //array
                            $result_array = array_search("admin", $order);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='order.php' class='nav-link'>
                  <i class='nav-icon fas fa-shopping-basket'></i>
                  <p>
                   Orders
                  </p>
                </a>
              </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'member') {
                            $order = explode(",", $rowc['order']); //array
                            $result_array = array_search("member", $order);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='order.php' class='nav-link '>
                    <i class='nav-icon fas fa-shopping-basket'></i>
                    <p>
                     Orders
                    </p>
                  </a>
                </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $order = explode(",", $rowc['order']); //array
                            $result_array = array_search("employee", $order);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='order.php' class='nav-link '>
                      <i class='nav-icon fas fa-shopping-basket'></i>
                      <p>
                       Orders
                      </p>
                    </a>
                  </li> ";
                            }
                        }

                        ?>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            $purchase = explode(",", $rowc['purchase']); //array
                            $result_array = array_search("admin", $purchase);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='purchase.php' class='nav-link '>
                  <i class='nav-icon fas fa-cash-register'></i>
                  <p>
                  Purchasing
                  </p>
                </a>
              </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'member') {
                            $purchase = explode(",", $rowc['purchase']); //array
                            $result_array = array_search("member", $purchase);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='purchase.php' class='nav-link '>
                    <i class='nav-icon fas fa-cash-register'></i>
                    <p>
                    Purchasing
                    </p>
                  </a>
                </li> ";
                            }
                        }
                        if ($_SESSION['level'] == 'employee') {
                            $purchase = explode(",", $rowc['purchase']); //array
                            $result_array = array_search("employee", $purchase);
                            if ($result_array !== false) {
                                echo " <li class='nav-item'><a href='purchase.php' class='nav-link '>
                      <i class='nav-icon fas fa-cash-register'></i>
                      <p>
                      Purchasing
                      </p>
                    </a>
                  </li> ";
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
                            <h1 style="text-transform: uppercase">Shop Info</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="control.php" style="text-transform: uppercase">Shop Info</a></li>
                                <li class="breadcrumb-item active" style="text-transform: uppercase">Shop Info</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="offset-1 col-10">
                            <form action="savecontrol.php" method="post">
                                <div class="card card-dark">
                                    <div class=" card-header">
                                        <h3 class="card-title ">Shop Info</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit labore corrupti, corporis cumque enim, nesciunt perspiciatis aperiam sapiente ullam dignissimos harum cupiditate delectus esse, reprehenderit debitis? Architecto quas cupiditate doloribus dolore numquam soluta nam fugit eius quisquam placeat asperiores nobis sapiente enim perspiciatis fuga, dignissimos exercitationem in veniam tenetur. Reiciendis quam beatae in quia quas quae impedit repellat, voluptate voluptatum qui. Distinctio labore eius reiciendis ab facilis, velit eligendi iste, quasi officiis ipsam, totam dignissimos. Temporibus repellendus quod dolores! Quo repellendus ut aspernatur dolorum voluptate quia rerum aperiam enim eaque perspiciatis! Vel minus at aspernatur velit, assumenda cupiditate eligendi nemo.</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <!-- /.content -->
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
                    <script src="js/jquery.min.js"></script>
                    <!-- Bootstrap 4 -->
                    <script src="js/bootstrap.bundle.min.js"></script>
                    <!-- AdminLTE App -->
                    <script src="js/adminlte.min.js"></script>

                    <script src="js/jquery.dataTables.min.js"></script>
                    <script src="js/dataTables.bootstrap4.min.js"></script>
                    <script src="js/dataTables.responsive.min.js"></script>
                    <script src="js/responsive.bootstrap4.min.js"></script>
                    <script src="js/dataTables.buttons.min.js"></script>
                    <script src="js/buttons.bootstrap4.min.js"></script>
                    <script src="js/jszip/jszip.min.js"></script>
                    <script src="js/pdfmake.min.js"></script>
                    <script src="js/vfs_fonts.js"></script>
                    <script src="js/buttons.html5.min.js"></script>
                    <script src="js/buttons.print.min.js"></script>
                    <script src="js/buttons.colVis.min.js"></script>

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
</body>

</html>