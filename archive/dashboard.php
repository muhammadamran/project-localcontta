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
include 'include/datatables.php';
?>
<!-- Main Page -->
<div id="wrapper">
    <?php include 'include/header.php'; ?>
    <div id="page-wrapper">
        <!-- Page Title -->
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h1 class="page-header"><i class="fa fa-chart-pie icon-title"></i> Dashboard</h1>
                </div>
            </div>
        </div>
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
                height: 2px;
                margin: 0px 21px;
                box-sizing: border-box;
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

            .bacaan-import {
                background: linear-gradient(45deg, #428bca, #428bca);
                color: #fff;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
                font-size: 15px;
                font-weight: 600;
            }

            @media (max-width: 613.5px) {
                .card-content {
                    display: block;
                    justify-content: space-between;
                    align-items: center;
                }

                .icon-bg-na {
                    display: inline-table;
                    margin-top: 10px;
                }
            }

            .list-group-item {
                position: relative;
                display: block;
                padding: 10px 15px;
                margin-bottom: -1px;
                background-color: #fff;
                border: 1px solid #c6e4f5;
            }
        </style>
        <!-- <div class="row position-oke"> -->
        <div class="row">
            <!-- <div class="col-md-12" style="margin-bottom: 16px;">
                <font class="bacaan-import">Import</font>
            </div> -->
            <!-- Import -->
            <?php
            $con = mysqli_connect("localhost", "root", "", "contta");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result_import = mysqli_query($con, "SELECT COUNT(*) AS total_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot!=''");
            $cont_import = mysqli_fetch_array($result_import);

            $current_month = date('m');
            $current_year = date('Y');
            $result_import_thismonth = mysqli_query($con, "SELECT COUNT(*) AS total_import_thismonth FROM tb_master_impor WHERE rcd_type='import' AND rcd_create_month = '$current_month' AND rcd_create_year = '$current_year'");
            $cont_import_thismonth = mysqli_fetch_array($result_import_thismonth);

            $result_import_sea = mysqli_query($con, "SELECT COUNT(*) AS total_import_sea FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' OR rcd_mot='FCL'");
            $cont_import_sea = mysqli_fetch_array($result_import_sea);

            $result_import_air = mysqli_query($con, "SELECT COUNT(*) AS total_import_air FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR'");
            $cont_import_air = mysqli_fetch_array($result_import_air);
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="card-content">
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">Import</font>
                                <font style="font-size: 25px;font-weight: 600;"><?= $cont_import['total_import'] ?></font>
                                <font style="font-size: 16px;font-weight: 600;">All Records</font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_thismonth['total_import_thismonth'] ?> This Month</font>
                                <div class="card_divider"></div>
                                <font style="font-size: 10px;font-weight: 300;"><?= date('F Y'); ?></font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">SEA</font>
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_sea['total_import_sea'] ?> All Record</font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">AIR</font>
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_air['total_import_air'] ?> All Record</font>
                            </div>
                            <div class="icon-bg-na">
                                <i class="fa fa-dolly-flatbed fa-fw detail-na" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="pieImport"></div>
            </div>
            <div class="col-md-8">
                <div id="importArea"></div>
            </div>
            <!-- End Import -->
            <!-- Export -->
            <?php
            $con = mysqli_connect("localhost", "root", "", "contta");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result_export = mysqli_query($con, "SELECT COUNT(*) AS total_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot!=''");
            $cont_export = mysqli_fetch_array($result_export);

            $current_month = date('m');
            $current_year = date('Y');
            $result_export_thismonth = mysqli_query($con, "SELECT COUNT(*) AS total_export_thismonth FROM tb_master_export WHERE rcd_type='export' AND rcd_create_month = '$current_month' AND rcd_create_year = '$current_year'");
            $cont_export_thismonth = mysqli_fetch_array($result_export_thismonth);

            $result_export_sea = mysqli_query($con, "SELECT COUNT(*) AS total_export_sea FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' OR rcd_mot='FCL'");
            $cont_export_sea = mysqli_fetch_array($result_export_sea);

            $result_export_air = mysqli_query($con, "SELECT COUNT(*) AS total_export_air FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR'");
            $cont_export_air = mysqli_fetch_array($result_export_air);
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="card-content">
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">Export</font>
                                <font style="font-size: 25px;font-weight: 600;"><?= $cont_export['total_export'] ?></font>
                                <font style="font-size: 16px;font-weight: 600;">All Records</font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_thismonth['total_export_thismonth'] ?> This Month</font>
                                <div class="card_divider"></div>
                                <font style="font-size: 10px;font-weight: 300;"><?= date('F Y'); ?></font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">SEA</font>
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_sea['total_export_sea'] ?> All Record</font>
                            </div>
                            <div style="display: grid;">
                                <font style="font-size: 25px;font-weight: 600;">AIR</font>
                                <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_air['total_export_air'] ?> All Record</font>
                            </div>
                            <div class="icon-bg-na">
                                <i class="fa fa-box fa-fw detail-na" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="pieExport"></div>
            </div>
            <div class="col-md-8">
                <div id="exportArea"></div>
            </div>
            <!-- End Export -->
            <!-- <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <?php
                            mysql_connect('localhost', 'root', '');
                            mysql_select_db('contta');
                            $current_month = date('m');
                            $current_year = date('Y');

                            $role_import = mysql_query("SELECT * FROM tb_master_impor WHERE rcd_create_month = '$current_month' AND rcd_create_year = '$current_year' ");
                            $import = mysql_num_rows($role_import);
                            ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $import; ?></div>
                                <div>Record of This Month</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Import Records</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <?php
                            $role_export = mysql_query("SELECT * FROM tb_master_export WHERE rcd_create_month = '$current_month' AND rcd_create_year = '$current_year' ");
                            $export = mysql_num_rows($role_export);
                            ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $export; ?></div>
                                <div>Record of This Month</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Export Records</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <?php
                            $role_all_import = mysql_query("SELECT * FROM tb_master_impor");
                            $all_im = mysql_num_rows($role_all_import);
                            ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $all_im; ?></div>
                                <div>All Records</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Import Records</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                                <?php
                                $role_all_export = mysql_query("SELECT * FROM tb_master_export");
                                $all_ex = mysql_num_rows($role_all_export);
                                ?>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $all_ex; ?></div>
                                <div>All Records</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fas fa-building"></i> Top 10 Record - By Consignee Name - Import
                    </div>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "contta");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $get_top10 = mysqli_query($con, "SELECT rcd_cnee, count(rcd_id) as no FROM tb_master_impor GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                    if (mysqli_num_rows($get_top10) > 0) {
                        $no = 0;
                        while ($rowtop10 = mysqli_fetch_array($get_top10)) {
                            $no++; ?>
                            <a href="#" class="list-group-item">
                                <font><?= $no ?>.</font>
                                <?= $rowtop10['rcd_cnee']; ?>
                                <span class="pull-right text-muted small">
                                    <em><?= $rowtop10['no']; ?></em>
                                </span>
                            </a>
                    <?php }
                    }
                    mysqli_close($con); ?>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fas fa-building"></i> Top 10 Record - By Consignee Name - Export
                    </div>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "contta");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $get_top10 = mysqli_query($con, "SELECT rcd_cnee, count(rcd_id) as no FROM tb_master_export GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                    if (mysqli_num_rows($get_top10) > 0) {
                        $no = 0;
                        while ($rowtop10 = mysqli_fetch_array($get_top10)) {
                            $no++; ?>
                            <a href="#" class="list-group-item">
                                <font><?= $no ?>.</font>
                                <?= $rowtop10['rcd_cnee']; ?>
                                <span class="pull-right text-muted small">
                                    <em><?= $rowtop10['no']; ?></em>
                                </span>
                            </a>
                    <?php
                        }
                    }
                    mysqli_close($con);
                    ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display: flex;justify-content: space-between;">
                            <div class="col-md-8">
                                <div class="blink_me" style="color: red;">
                                    <i class="fas fa-bell"></i> Record - On Process Status
                                </div>
                            </div>
                            <div class="col-md-4" style="text-align: end;">
                                <a href="#" style="font-weight: 400;">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="display hover" id="dahsboardOne">
                                <thead>
                                    <tr>
                                        <th class="no-sort">#</th>
                                        <th class="no-sort" style="align-items: center;">Number</th>
                                        <!-- <th>AJU No.</th> -->
                                        <!-- <th>HBL</th> -->
                                        <!-- <th style="align-items: center;">Consignee</th> -->
                                        <th class="no-sort" style="align-items: center;">Date</th>
                                        <!-- <th>ATA</th> -->
                                        <!-- <th>PreClear.</th> -->
                                        <!-- <th>Clear.</th> -->
                                        <!-- <th>PostClear.</th> -->
                                        <th>By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $usernow = "raka.vemiarno";
                                    $con = mysqli_connect("localhost", "root", "", "contta");
                                    if (mysqli_connect_errno()) {
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }
                                    // $result = mysqli_query($con,"SELECT * FROM tb_master_impor INNER JOIN tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id  WHERE tb_master_impor.rcd_type = 'import' AND tb_master_impor.rcd_create_by='$usernow' AND tb_record_miles_import.action_by_3 = 0 ORDER BY tb_master_impor.rcd_id DESC LIMIT 5");
                                    $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id  WHERE tb_master_impor.rcd_type = 'import' AND tb_record_miles_import.action_by_3 = 0 ORDER BY tb_master_impor.rcd_id DESC LIMIT 5");
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $no++;
                                            echo "<tr>";
                                            echo "<td>" . $no . ".</td>";
                                            echo "<td>
                                                     <div style='width:200px'>
                                                         <font style='font-weight: 900;';>Consignee:<br>" . $row['rcd_cnee'] . "</font>
                                                         <hr>
                                                         <font style='font-weight: 600;';>RcdID: </font>" . $row['rcd_id'] . "
                                                         <br>
                                                         <font style='font-weight: 600;';>AJU: </font>" . $row['rcd_aju'] . "
                                                         <br>
                                                         <font style='font-weight: 600;';>HBL: </font>" . $row['rcd_hbl'] . "
                                                     </div>
                                                 </td>";
                                            // echo "<td>" . $row['rcd_aju'] . "</td>"; 
                                            // echo "<td>" . $row['rcd_hbl'] . "</td>";                                        
                                            // echo "<td>
                                            //          <div style='width:150px'>
                                            //          " . $row['rcd_cnee'] . "
                                            //          </div>
                                            //      </td>";
                                            // echo "<td>" . $row['rcd_eta'] . "</td>";
                                            // echo "<td>" . $row['rcd_ata'] . "</td>";
                                            // echo "<td>" . $row['pre'] . "</td>";
                                            // echo "<td>" . $row['clear'] . "</td>";
                                            // echo "<td>" . $row['post'] . "</td>";
                                            echo "<td>
                                                     <div style='width:250px'>
                                                         <font style='font-weight: 500;'>ETA: </font><font style='font-weight: 700'>" . $row['rcd_eta'] . "</font>
                                                         <font style='font-weight: 500;'>ATA: </font><font style='font-weight: 700'>" . $row['rcd_ata'] . "</font>
                                                         <hr>
                                                         <font style='font-weight: 500;'>Pre Clearance: </font><font style='font-weight: 700'>" . $row['pre'] . "</font>
                                                         <br>
                                                         <font style='font-weight: 500;'>Clear: </font><font style='font-weight: 700'>" . $row['clear'] . "</font>
                                                         <br>
                                                         <font style='font-weight: 500;'>Post Clear: </font><font style='font-weight: 700'>" . $row['post'] . "</font>
                                                     </div>
                                                 </td>";
                                            echo "<td>" . $row['rcd_create_by'] . "</td>";
                                            echo "</tr>";
                                    ?>
                                    <?php
                                        }
                                    }
                                    mysqli_close($con);
                                    ?>
                                </tbody>
                            </table>
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
    <!-- MAIN -->
    <script src="assets/highcharts/highcharts.js"></script>
    <script src="assets/highcharts/highcharts-more.js"></script>
    <script src="assets/highcharts/modules/exporting.js"></script>
    <script src="assets/highcharts/modules/export-data.js"></script>
    <script src="assets/highcharts/modules/accessibility.js"></script>
    <script src="assets/highcharts/themes/high-contrast-light.js"></script>
    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
    <!-- QUERY IMPORT -->
    <?php
    $con = mysqli_connect("localhost", "root", "", "contta");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // YEARS
    $result_g_import_year = mysqli_query($con, "SELECT COUNT(*) AS total, rcd_create_year AS year FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_import_year as $dataYearImport) {
        $dYearImport = $dataYearImport['year'];
        $arrYearImport[] = array(
            $dYearImport
        );
    }
    $YearImport = json_encode($arrYearImport, JSON_ERROR_NONE);
    $result_YearImport = preg_replace("/[^0-9,.]/", "", $YearImport);

    // FCL
    $result_g_import_FCL = mysqli_query($con, "SELECT COUNT(*) AS total_FCL FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='FCL' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_import_FCL as $dataFCLImport) {
        $dFCLImport = $dataFCLImport['total_FCL'];
        $arrFCLImport[] = array(
            $dFCLImport
        );
    }
    $FCLImport = json_encode($arrFCLImport, JSON_ERROR_NONE);
    $result_FCLImport = preg_replace("/[^0-9,.]/", "", $FCLImport);
    // LCL
    $result_g_import_LCL = mysqli_query($con, "SELECT COUNT(*) AS total_LCL FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_import_LCL as $dataLCLImport) {
        $dLCLImport = $dataLCLImport['total_LCL'];
        $arrLCLImport[] = array(
            $dLCLImport
        );
    }
    $LCLImport = json_encode($arrLCLImport, JSON_ERROR_NONE);
    $result_LCLImport = preg_replace("/[^0-9,.]/", "", $LCLImport);
    // AIR
    $result_g_import_AIR = mysqli_query($con, "SELECT COUNT(*) AS total_AIR FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_import_AIR as $dataAIRImport) {
        $dAIRImport = $dataAIRImport['total_AIR'];
        $arrAIRImport[] = array(
            $dAIRImport
        );
    }
    $AIRImport = json_encode($arrAIRImport, JSON_ERROR_NONE);
    $result_AIRImport = preg_replace("/[^0-9,.]/", "", $AIRImport);

    $Gcurrent_monthImport = date('m');
    $Gcurrent_yearImport = date('Y');
    // FCL
    $Gresult_importFCL = mysqli_query($con, "SELECT COUNT(*) AS GFCL_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='FCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
    $Gcont_import_FCL = mysqli_fetch_array($Gresult_importFCL);
    // LCL
    $Gresult_import_LCL = mysqli_query($con, "SELECT COUNT(*) AS GLCL_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
    $Gcont_import_LCL = mysqli_fetch_array($Gresult_import_LCL);
    // AIR
    $Gresult_import_AIR = mysqli_query($con, "SELECT COUNT(*) AS GAIR_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
    $Gcont_import_AIR = mysqli_fetch_array($Gresult_import_AIR);
    ?>
    <!-- END QUERY IMPORT -->
    <!-- QUERY EXPORT -->
    <?php
    $con = mysqli_connect("localhost", "root", "", "contta");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // YEARS
    $result_g_export_year = mysqli_query($con, "SELECT COUNT(*) AS total, rcd_create_year AS year FROM tb_master_export WHERE rcd_type='export' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_export_year as $dataYearExport) {
        $dYearExport = $dataYearExport['year'];
        $arrYearExport[] = array(
            $dYearExport
        );
    }
    $YearExport = json_encode($arrYearExport, JSON_ERROR_NONE);
    $result_YearExport = preg_replace("/[^0-9,.]/", "", $YearExport);

    // FCL
    $result_g_export_FCL = mysqli_query($con, "SELECT COUNT(*) AS total_FCL FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='FCL' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_export_FCL as $dataFCLExport) {
        $dFCLExport = $dataFCLExport['total_FCL'];
        $arrFCLExport[] = array(
            $dFCLExport
        );
    }
    $FCLExport = json_encode($arrFCLExport, JSON_ERROR_NONE);
    $result_FCLExport = preg_replace("/[^0-9,.]/", "", $FCLExport);
    // LCL
    $result_g_export_LCL = mysqli_query($con, "SELECT COUNT(*) AS total_LCL FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_export_LCL as $dataLCLExport) {
        $dLCLExport = $dataLCLExport['total_LCL'];
        $arrLCLExport[] = array(
            $dLCLExport
        );
    }
    $LCLExport = json_encode($arrLCLExport, JSON_ERROR_NONE);
    $result_LCLExport = preg_replace("/[^0-9,.]/", "", $LCLExport);
    // AIR
    $result_g_export_AIR = mysqli_query($con, "SELECT COUNT(*) AS total_AIR FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR' AND rcd_mot!='' GROUP BY rcd_create_year");
    foreach ($result_g_export_AIR as $dataAIRExport) {
        $dAIRExport = $dataAIRExport['total_AIR'];
        $arrAIRExport[] = array(
            $dAIRExport
        );
    }
    $AIRExport = json_encode($arrAIRExport, JSON_ERROR_NONE);
    $result_AIRExport = preg_replace("/[^0-9,.]/", "", $AIRExport);

    $Gcurrent_monthExport = date('m');
    $Gcurrent_yearExport = date('Y');
    // FCL
    $Gresult_exportFCL = mysqli_query($con, "SELECT COUNT(*) AS GFCL_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='FCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
    $Gcont_export_FCL = mysqli_fetch_array($Gresult_exportFCL);
    // LCL
    $Gresult_export_LCL = mysqli_query($con, "SELECT COUNT(*) AS GLCL_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
    $Gcont_export_LCL = mysqli_fetch_array($Gresult_export_LCL);
    // AIR
    $Gresult_export_AIR = mysqli_query($con, "SELECT COUNT(*) AS GAIR_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
    $Gcont_export_AIR = mysqli_fetch_array($Gresult_export_AIR);
    ?>
    <!-- END QUERY EXPORT -->
    <script type="text/javascript">
        var colors = Highcharts.getOptions().colors;

        // IMPORT
        Highcharts.chart('pieImport', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Import FCL, LCL & AIR  - <?= date('F') ?>, <?= date('Y') ?>'
            },
            subtitle: {
                text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
            },
            tooltip: {
                headerFormat: 'Semester {point.x}<br>',
                pointFormat: '{point.y} IPS',
                shared: true
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: Total {point.y}'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'MOT',
                colorByPoint: true,
                data: [{
                    name: 'FCL',
                    y: <?= $Gcont_import_FCL['GFCL_import']; ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'LCL',
                    y: <?= $Gcont_import_LCL['GLCL_import']; ?>,
                }, {
                    name: 'AIR',
                    y: <?= $Gcont_import_AIR['GAIR_import']; ?>,
                }]
            }]
        });

        Highcharts.chart('importArea', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Import - FCL, LCL & AIR Per Years'
            },
            subtitle: {
                text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
            },
            xAxis: {
                allowDecimals: true,
                categories: [<?= $result_YearImport ?>],
                tickmarkPlacement: 'on',
                title: {
                    text: '<font style="color: #fff">Years</font><br><font style="color: #000">Years</font>'
                }
            },
            yAxis: {
                title: {
                    text: '<font style="color: #000">Total</font>'
                },
                labels: {
                    overflow: 'left'
                }
            },
            tooltip: {
                valueSuffix: ' Total'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: "FCL",
                data: [<?= $result_FCLImport ?>],
                website: 'https://support.microsoft.com/en-us/help/22798/windows-10-complete-guide-to-narrator',
                color: colors[10]
            }, {
                name: "LCL",
                data: [<?= $result_LCLImport ?>],
                website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
                color: colors[1]
            }, {
                name: "AIR",
                data: [<?= $result_AIRImport ?>],
                website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
                color: colors[2]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 400
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

        // EXPORT
        Highcharts.chart('pieExport', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Export FCL, LCL & AIR  - <?= date('F') ?>, <?= date('Y') ?>'
            },
            subtitle: {
                text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
            },
            tooltip: {
                headerFormat: 'Semester {point.x}<br>',
                pointFormat: '{point.y} IPS',
                shared: true
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y} Total'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'MOT',
                colorByPoint: true,
                data: [{
                    name: 'FCL',
                    y: <?= $Gcont_export_FCL['GFCL_export']; ?>,
                }, {
                    name: 'LCL',
                    y: <?= $Gcont_export_LCL['GLCL_export']; ?>,
                }, {
                    name: 'AIR',
                    y: <?= $Gcont_export_AIR['GAIR_export']; ?>,
                }]
            }]
        });

        Highcharts.chart('exportArea', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Export - FCL, LCL & AIR Per Years'
            },
            subtitle: {
                text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
            },
            xAxis: {
                allowDecimals: true,
                categories: [<?= $result_YearExport ?>],
                tickmarkPlacement: 'on',
                title: {
                    text: '<font style="color: #fff">Years</font><br><font style="color: #000">Years</font>'
                }
            },
            yAxis: {
                title: {
                    text: '<font style="color: #000">Total</font>'
                },
                labels: {
                    overflow: 'left'
                }
            },
            tooltip: {
                valueSuffix: ' Total'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: "FCL",
                data: [<?= $result_FCLExport ?>],
                website: 'https://support.microsoft.com/en-us/help/22798/windows-10-complete-guide-to-narrator',
                color: colors[10]
            }, {
                name: "LCL",
                data: [<?= $result_LCLExport ?>],
                website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
                color: colors[1]
            }, {
                name: "AIR",
                data: [<?= $result_AIRExport ?>],
                website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
                color: colors[2]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 400
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
    <!-- <p><?= $result_YearImport ?></p> -->
    <!-- <p><?= $result_YearExport ?></p> -->