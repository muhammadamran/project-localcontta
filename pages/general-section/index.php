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
            <div class="card_divider_title"></div>
        </div>
        <!-- Export Data -->
        <div class="title pb-20">
            <h2 class="h4 mb-0">Export Data</h2>
        </div>
        <div class="row">
            <div class="col-md-6 mb-30" style="padding-right: 0px;padding-left: 0px;">
                <div class="col-md-12">
                    <div class="card-apps" style="padding: 30px 20px 30px 20px;">
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
                        <hr>
                        <div class="browser-visits">
                            <?php
                            $get_top10CE = $db->query("SELECT rcd_cnee, COUNT(rcd_id) as no FROM tb_master_export GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                            $no = 0;
                            while ($rowtop10CE = $get_top10CE->fetch_assoc()) {
                                $no++;
                                if ($no == '1') {
                                    $iconTopEx = '🏆';
                                } else if ($no == '2') {
                                    $iconTopEx = '🥈';
                                } else if ($no == '3') {
                                    $iconTopEx = '🥉';
                                } else {
                                    $iconTopEx = '';
                                }
                            ?>
                                <div class="d-flex flex-wrap align-items-center" style="display: flex;justify-content: space-between;">
                                    <div class="browser-name" style="font-size: 75%;font-weight: 700;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;">
                                        <?= $no ?>. <?= $rowtop10CE['rcd_cnee']; ?> <?= $iconTopEx; ?>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-default"><?= $rowtop10CE['no']; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="exportArea"></div>
                </div>
            </div>
        </div>
        <!-- End Export Data -->

        <!-- Import Data -->
        <div class="title pb-20">
            <h2 class="h4 mb-0">Import Data</h2>
        </div>
        <div class="row">
            <div class="col-md-6 mb-30" style="padding-right: 0px;padding-left: 0px;">
                <div class="col-md-12">
                    <div class="card-apps" style="padding: 30px 20px 30px 20px;">
                        <div class="card-body p-3">
                            <div class="card-content">
                                <div style="display: grid;">
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_thismonth['total_import_thismonth'] ?> This Month</font>
                                    <div class="card_divider"></div>
                                    <font style="font-size: 10px;font-weight: 300;"><?= date('F Y'); ?></font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;">Import</font>
                                    <font style="font-size: 25px;font-weight: 600;"><?= $cont_import['total_import'] ?></font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;"><i class="icon-copy dw dw-ship"></i> SEA</font>
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_sea['total_import_sea'] ?> All Record</font>
                                </div>
                                <div style="display: grid;">
                                    <font style="font-size: 25px;font-weight: 600;"><i class="icon-copy dw dw-flight-1"></i> AIR</font>
                                    <font style="font-size: 16px;font-weight: 600;"><?= $cont_import_air['total_import_air'] ?> All Record</font>
                                </div>
                                <div class="icon-bg-na">
                                    <i class="icon-copy ti-download" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box pd-30 height-100-p">
                        <h4 class="mb-10 h6"><i class="icon-copy dw dw-sort"></i> Top 10 Record - By Consignee Name - Import</h4>
                        <hr>
                        <div class="browser-visits">
                            <?php
                            $get_top10CI = $db->query("SELECT rcd_cnee, COUNT(rcd_id) as no FROM tb_master_impor GROUP by rcd_cnee ORDER BY no DESC LIMIT 10");
                            $no = 0;
                            while ($rowtop10CI = $get_top10CI->fetch_assoc()) {
                                $no++;
                                if ($no == '1') {
                                    $iconTopIm = '🏆';
                                } else if ($no == '2') {
                                    $iconTopIm = '🥈';
                                } else if ($no == '3') {
                                    $iconTopIm = '🥉';
                                } else {
                                    $iconTopIm = '';
                                }
                            ?>
                                <div class="d-flex flex-wrap align-items-center" style="display: flex;justify-content: space-between;">
                                    <div class="browser-name" style="font-size: 75%;font-weight: 700;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;">
                                        <?= $no ?>. <?= $rowtop10CI['rcd_cnee']; ?> <?= $iconTopIm; ?>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-default"><?= $rowtop10CI['no']; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="importArea"></div>
                </div>
            </div>
        </div>
        <!-- End Import Data -->
        <!-- Pie Chart -->
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="pieExport"></div>
                </div>
            </div>

            <div class="col-lg-6 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div id="pieImport"></div>
                </div>
            </div>
        </div>
        <!-- End Pie Chart -->
    </div>
</div>
<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/highcharts-more.js"></script>
<script src="assets/highcharts/modules/exporting.js"></script>
<script src="assets/highcharts/modules/export-data.js"></script>
<script src="assets/highcharts/modules/accessibility.js"></script>
<script src="assets/highcharts/themes/high-contrast-light.js"></script>
<?php
include "chart/dahsboard.php";
?>