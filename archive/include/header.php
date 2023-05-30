<?php
include "include/db.php";
$userid = $_SESSION['username'];
$role = $dbcon->query("SELECT * FROM tb_user WHERE user_name = '$userid' ");
$access = mysqli_fetch_array($role);

// user_role = 1.admin; 2.guest; 3.user;
// user_brances = 1.JKT; 2.CGK; 3.SUB;
// user_scope = 1.all; 2.import; 3.export;
// user_dept = 1.all; 2.sea; 3.air;
?>
<nav class="navbar navbar-default navbar-fixed-top navbar-background" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <div style="display: flex;justify-content: flex-start;align-items: center;">
                <div>
                    <!-- <img src="https://portal.int.kn/o/liferay-mykn-theme/images/favicon.ico"> -->
                </div>
                <div class="text-logo">
                    <font class="font-logo-first">Local</font>
                    <font class="font-logo-second">contta</font>
                </div>
            </div>
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <div style="margin-bottom: 19px;">
                <a href="" class="label label-sm label-default" style="background: #ffffff;color: #26c5e6;"><i class="fas fa-book"></i> Manual Book</a>
            </div>
        </li>
        <li>
            <div style="margin-bottom: 19px;">
                <a href="" class="label label-sm label-default" style="background: #ffffff;color: #26c5e6;"><i class="fas fa-clock"></i> Histroy Activity</a>
            </div>
        </li>
        <li>
            <div style="margin-bottom: 19px;">
                <a href="" class="label label-sm label-default" style="background: #ffffff;color: #26c5e6;"><i class="fas fa-ticket-alt"></i> Create ticket</a>
            </div>
        </li>
        <!-- <li> -->
        <!-- <span id="ct" class="clock-ct"></span> -->
        <!-- </li> -->
        <!-- <li> -->
        <!-- <span class="clock-ct">-</span> -->
        <!-- </li> -->
        <li>
            <span class="role-show">Role : <?= $access['user_role'] . " | Branch : " . $access['user_branches'] . " | Scope : " . $access['user_scope'] . " | Dept : " . $access['user_dept']; ?></span>
        </li>
        <li class="dropdown user" style="width: 40px;height: 40px;background: #ffffff;border-radius: 100%;margin: 5px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw" style="color: #26c5e6;padding: 2px;margin-left: -4px;margin-top: -4px;"></i>
                <font style="color: #fff;font-weight: 400;"></font>
                <!-- <i class="fa fa-caret-down icon-white"></i> -->
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- For Active Sidebar -->
    <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
    <!-- End For Active Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="section">
                    <div>
                        GENERAL SECTION
                    </div>
                </li>
                <li>
                    <a class="<?= $uriSegments[2] == 'index.php' ? 'active' : '' ?>" href="index.php"><i class="fas fa-house-user fa-fw"></i> Home</a>
                </li>
                <li>
                    <a class="<?= $uriSegments[2] == 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php"><i class="fa fa-chart-pie fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a class="<?= $uriSegments[2] == 'search.php' ? 'active' : '' ?>" href="search.php"><i class="fa fa-search fa-fw"></i> Search</a>
                </li>
                <?php include 'include/menu/section/application.php'; ?>
                <?php include 'include/menu/section/report.php'; ?>
                <?php include 'include/menu/section/administrator.php'; ?>
                <?php include 'include/menu/section/system.php'; ?>
                <?php include 'include/menu/section/knidcore.php'; ?>
            </ul>
        </div>
    </div>
</nav>