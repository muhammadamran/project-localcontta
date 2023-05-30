<title>Home - Localcontta | Kuehne + Nagel Indonesia</title>
<style type="text/css">
    i.btn.btn-primary.btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }
</style>
<script src="assets/js/jquery.min.js"></script>
<?php
include 'include/restrict.php';
include 'include/head.php';
include "include/datatables.php";
?>
<!-- Main Page -->
<div id="wrapper">
    <?php include 'include/header.php'; ?>
    <div id="page-wrapper">
        <!-- Page Title -->
        <div class="row" style="display: flex;justify-content: space-between;align-items: center;">
            <div class="col-lg-8">
                <div style="display: flex;justify-content: flex-start;align-items: center;">
                    <div>
                        <h1 class="page-header"><i class="fas fa-house-user icon-title"></i></h1>
                    </div>
                    <div style="margin-left: 10px;">
                        <div style="margin-top: -30px;">
                            <h1>Home</h1>
                        </div>
                        <div style="margin-top: -10px;">
                            <font>General Section</font>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="display: flex;justify-content: flex-end;">
                <span id="ct" class="clock-ct btn btn-primary" style="font-size: 12px;"></span>
            </div>
        </div>
        <div class="oke__divider_page"></div>
        <!-- End Page Title -->
        <style type="text/css">
            @media (min-width: 991.5px) {
                .position-oke {
                    display: flex;
                    align-items: center;
                }
            }

            .logo-dashboard-oke {
                background: transparent;
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 10px;
            }

            .title-oke {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .title-oke-two {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 10px;
            }

            .oke__divider {
                background: rgb(0 39 102);
                height: 5px;
                margin: 0px 329px;
                box-sizing: border-box;
                width: calc(100% - 654px);
                margin-bottom: 10px;
            }

            .kn-oke {
                font-size: 14px;
                font-weight: 600;
                color: #002766;
                text-transform: uppercase;
            }

            .kn-oke:hover {
                font-size: 14px;
                font-weight: 600;
                color: #26c5e6;
                text-transform: uppercase;
            }

            .oke-lah {
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fas fa-clock"></i> Activity Data: <font style="font-weight: 300;"><?= $access['user_name'] ?></font>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-light d-flex flex-fill" style="padding: 10px;">
                    <div class="card-header text-muted border-bottom-0" style="color:#ffff">
                        <i class="fas fa-id-card-alt"></i> User ID: <?= $access['user_id'] ?>
                    </div>
                    <div class="oke__divider_page_white"></div>
                    <div class="card-body pt-0">
                        <div class="row" style="margin: -40px;margin-bottom: 10px;">
                            <div class="col-7">
                                <h2 class="lead"><b><?= $access['user_name'] ?></b></h2>
                                <div style="margin-top: -20px;margin-bottom: 25px;">
                                    <font><?= $access['user_mail'] ?></font>
                                </div>
                            </div>
                            <div class="col-5 text-center">
                                <img src="assets/app/user/user-default.png" alt="user-avatar" class="img-circle img-fluid" style="width: 140px;">
                            </div>
                        </div>
                    </div>
                    <div class="oke__divider_page_white"></div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user-tag"></i> Role: <?= $access['user_role'] ?>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-user-tag"></i> Scope: <?= $access['user_scope'] ?>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-address-card"></i> Dept.: <?= $access['user_dept'] ?>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-building"></i> Branch: <?= $access['user_branches'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'include/jquery.php';
    include 'include/alert.php';
    ?>
    <!-- End Main Page -->