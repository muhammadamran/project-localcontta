<?php 
$userid = $_SESSION['username'];
mysql_connect('localhost', 'root','');
mysql_select_db('contta'); 
$role = mysql_query("SELECT * FROM tb_user WHERE user_name = '$userid' ");
$access = mysql_fetch_array($role);

// var_dump($access);exit;

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
            <div class="text-logo">
                <font class="font-logo-first">Local</font><font class="font-logo-second">contta</font>
            </div>
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span id="ct" class="clock-ct"></span>
        </li>
        <li>
            <span class="clock-ct">-</span>
        </li>
        <li>
            <span class="role-show">Role : <?= $access['user_role'] . " | Branch : " . $access['user_branches'] . " | Scope : " . $access['user_scope'] . " | Dept : " . $access['user_dept'];?></span>
        </li>
        <li class="dropdown user">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw icon-white"></i>
                <font style="color: #fff;font-weight: 400;"><?= $_SESSION['username'];?></font>  
                <i class="fa fa-caret-down icon-white"></i>
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
                <?php
                /* START SHOW MENU LIST OPTION */
                // IT Departement
                if ($access['user_role'] == 'admin' && $access['user_scope'] == 'all' && $access['user_dept'] == 'all') 
                { 
                    include 'menu/admin/sidebar.php';
                } 
                /*General Manager*/
                else if ($access['user_role'] == 'gm' && $access['user_scope'] == 'all' && $access['user_dept'] == 'all') 
                { 
                    include 'menu/gm/sidebar.php';
                } 
                /*Manager SEA*/
                else if ($access['user_role'] == 'manager' && $access['user_scope'] == 'all' && $access['user_dept'] == 'sea') 
                { 
                    include 'menu/manager/sea/sidebar.php';
                }
                /*Manager AIR*/
                else if ($access['user_role'] == 'manager' && $access['user_scope'] == 'all' && $access['user_dept'] == 'air') 
                { 
                    include 'menu/manager/air/sidebar.php';
                } 
                /*User Import and Export SEA*/
                else if ($access['user_role'] == 'user' && $access['user_dept'] == 'sea') 
                { 
                    include 'menu/user/sea/sidebar.php';
                } 
                /*User Import and Export AIR*/
                else if ($access['user_role'] == 'user' && $access['user_dept'] == 'air') 
                { 
                    include 'menu/user/sea/sidebar.php';
                } 
                // Guest
                /*User*/
                else if ($access['user_role'] == 'guest') 
                { 
                    include 'menu/guest/sidebar.php';
                } 
                /* END SHOW MENU LIST OPTION */
                else {
                echo "</ul></div></div></nav>";
                } ?>