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
    <link rel="stylesheet" href="../css/switch_insurance.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php require('admin_nav.php') ?>

    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item"><a href="purchase.php" style="text-transform: uppercase">Payment</a></li>
                            <li class="breadcrumb-item active" style="text-transform: uppercase">Payment</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->
                        <?php



                        $sql = "SELECT * FROM payment ";
                        $result = mysqli_query($con, $sql);


                        ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="payment_insert_form.php" class="btn btn-warning ">ADD &nbsp; <i class="fas fa-user"></i></a>
                                <a href="../backend/reset_status.php" class="btn btn-danger " onclick="return confirm('Are you sure to reset ?')">RESET STATUS &nbsp; <i class="fas fa-redo-alt"></i></a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>???????????????</th>
                                            <th>???????????????????????????</th>
                                            <th>??????????????????????????????</th>
                                            <th>??????????????????????????????????????????</th>
                                            <th>???.???????????????????????????</th>
                                            <th>?????????????????????????????????????????????</th>
                                            <th>????????????????????????</th>
                                            <th>??????????????????</th>
                                            <th>???????????????????????????</th>
                                            <th>???????????????????????????????????????</th>
                                            <th>??????????????????????????????</th>
                                            <th>????????????????????????</th>
                                            <th>??????????????????</th>
                                            <th>??????????????????</th>
                                            <th>?????????????????????????????????</th>
                                            <th> ??????????????? </th>
                                            <th>??????????????????????????? Line</th>
                                            <th>??????????????????????????? SMS</th>
                                            <th>???????????????????????????</th>

                                            <th> ???????????????????????????????????? </th>

                                            <th>Action</th>

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
                                                        <input type="checkbox" name="id" class="change" <?php echo $status ?> id="<?php echo $row['id']; ?>">

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
                                                        <input type="checkbox" name="id" class="change2" <?php echo $status ?> id="<?php echo $row['id']; ?>">

                                                        <div class="slider round"> </div>

                                                    </label>

                                                </td>


                                                <td><?php echo $row['date_send']; ?></td>
                                                <td><?php echo $row['note']; ?></td>

                                                <td><a href="payment_edit_form.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></a></i>&nbsp;&nbsp;&nbsp;<a href="../backend/payment_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete ?')"><i class="far fa-trash-alt"></i></a></td>

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



                    $(document).on('click', '.change', function() {
                        var status_id = $(this).attr("id");
                        if (status_id != '') {
                            $.ajax({
                                url: "../backend/update_status.php",
                                method: "POST",
                                data: {
                                    status_id: status_id
                                },
                                success: function(data) {

                                    console.log(data);
                                }
                            });
                        }
                    });



                    $(document).on('click', '.change2', function() {
                        var status_id = $(this).attr("id");
                        if (status_id != '') {
                            $.ajax({
                                url: "../backend/update_status_sms.php",
                                method: "POST",
                                data: {
                                    status_id: status_id
                                },
                                success: function(data) {

                                    console.log(data);
                                }
                            });
                        }
                    });
                </script>
</body>

</html>