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