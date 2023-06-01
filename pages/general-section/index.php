<title>Dashboard <?= $nameTitle; ?></title>
<!-- Query Export -->
<?php
$result_export = $db->query("SELECT COUNT(*) AS total_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot!=''");
$cont_export = mysqli_fetch_array($result_export);

$current_month = date('m');
$current_year = date('Y');
$result_export_thismonth = $db->query("SELECT COUNT(*) AS total_export_thismonth FROM tb_master_export WHERE rcd_type='export' AND rcd_create_month = '$current_month' AND rcd_create_year = '$current_year'");
$cont_export_thismonth = mysqli_fetch_array($result_export_thismonth);

$result_export_sea = $db->query("SELECT COUNT(*) AS total_export_sea FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' OR rcd_mot='FCL'");
$cont_export_sea = mysqli_fetch_array($result_export_sea);

$result_export_air = $db->query("SELECT COUNT(*) AS total_export_air FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR'");
$cont_export_air = mysqli_fetch_array($result_export_air);
?>
<!-- Query Import -->
<?php
$result_import = $db->query("SELECT COUNT(*) AS total_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot!=''");
$cont_import   = mysqli_fetch_array($result_import);

$current_month = date('m');
$current_year  = date('Y');
$result_import_thismonth = $db->query("SELECT COUNT(*) AS total_import_thismonth FROM tb_master_impor WHERE rcd_type='import' AND rcd_create_month = '$current_month' AND rcd_create_year = '$current_year'");
$cont_import_thismonth   = mysqli_fetch_array($result_import_thismonth);

$result_import_sea = $db->query("SELECT COUNT(*) AS total_import_sea FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' OR rcd_mot='FCL'");
$cont_import_sea = mysqli_fetch_array($result_import_sea);

$result_import_air = $db->query("SELECT COUNT(*) AS total_import_air FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR'");
$cont_import_air = mysqli_fetch_array($result_import_air);
?>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard Overview</h2>
        </div>
        <div class="row pb-10">
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">75</div>
                            <div class="font-14 text-secondary weight-500">Appointment</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">124,551</div>
                            <div class="font-14 text-secondary weight-500">Total Patient</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-heart"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">400+</div>
                            <div class="font-14 text-secondary weight-500">Total Doctor</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">$50,000</div>
                            <div class="font-14 text-secondary weight-500">Earning</div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blue Data -->
        <div class="row">
            <div class="col-md-6 mb-30" style="padding-right: 0px;padding-left: 0px;">
                <div class="col-md-12">
                    <div class="card" style="padding: 30px 20px 30px 20px;">
                        <div class="card-body p-3">
                            <div class="card-content">
                                <div style="display: grid;">
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_thismonth['total_export_thismonth'] ?> This Month</font>
                                    <div class="card_divider"></div>
                                    <font style="font-size: 10px;font-weight: 300;"><?= date('F Y'); ?></font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;"><?= $cont_export['total_export'] ?></font>
                                    <font style="font-size: 16px;font-weight: 600;">Record Export</font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;"><i class="icon-copy dw dw-ship"></i> SEA</font>
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_sea['total_export_sea'] ?> All Record</font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;"><i class="icon-copy dw dw-flight-1"></i> AIR</font>
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_export_air['total_export_air'] ?> All Record</font>
                                </div>
                                <div class="icon-bg-na">
                                    <i class="icon-copy ti-upload" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box pd-30 height-100-p">
                        <h4 class="mb-10 h6"><i class="icon-copy dw dw-sort"></i> Top 10 Record - By Consignee Name - Export</h4>
                        <div class="panel panel-default">
                            <?php
                            $get_top10CE = $db->query("SELECT rcd_cnee, COUNT(rcd_id) as no FROM tb_master_export GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                            $no = 0;
                            while ($rowtop10CE = $get_top10CE->fetch_assoc()) {
                                $no++; ?>
                                <a href="#" class="list-group-item">
                                    <font><?= $no ?>.</font>
                                    <?= $rowtop10CE['rcd_cnee']; ?>
                                    <span class="pull-right text-muted small">
                                        <em><?= $rowtop10CE['no']; ?></em>
                                    </span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="pieExport"></div>
                </div>
            </div>
            <div class="col-lg-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="exportArea"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="card" style="padding: 30px 20px 30px 20px;">
                        <div class="card-body p-3">
                            <div class="card-content">
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;">Import</font>
                                    <font style="font-size: 25px;font-weight: 600;"><?= $cont_import['total_import'] ?></font>
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
                                    <i class="icon-copy ti-download" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blue Data -->

        <!-- Graph -->
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <h4 class="mb-30 h4">Graph Import</h4>
                    <div id="pieImport"></div>
                    <div id="importArea"></div>
                </div>
            </div>
        </div>
        <!-- End Graph -->

        <div class="row">
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fas fa-building"></i> Top 10 Record - By Consignee Name - Import
                    </div>
                    <?php
                    $get_top10CI = $db->query("SELECT rcd_cnee, COUNT(rcd_id) as no FROM tb_master_impor GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                    $no = 0;
                    while ($rowtop10CI = $get_top10CI->fetch_assoc()) {
                        $no++; ?>
                        <a href="#" class="list-group-item">
                            <font><?= $no ?>.</font>
                            <?= $rowtop10CI['rcd_cnee']; ?>
                            <span class="pull-right text-muted small">
                                <em><?= $rowtop10CI['no']; ?></em>
                            </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MAIN -->
<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/highcharts-more.js"></script>
<script src="assets/highcharts/modules/exporting.js"></script>
<script src="assets/highcharts/modules/export-data.js"></script>
<script src="assets/highcharts/modules/accessibility.js"></script>
<script src="assets/highcharts/themes/high-contrast-light.js"></script>
<?php
include "chart/dahsboard.php";
?>