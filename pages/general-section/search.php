<title>Search <?= $nameTitle; ?></title>
<?php
// FUNCTION SEARCHING
$findInputREFTN = '';
$findInputTypeREFTN = '';
$resultreftn = 'none';
if (isset($_POST['findone'])) {
    $findInputREFTN = $_POST['findInputREFTN'];
    $findInputTypeREFTN = $_POST['findInputTypeREFTN'];
    $resultreftn = 'show';
}

$findInputAJU = '';
$findInputTypeAJU = '';
$resultaju = 'none';
if (isset($_POST['findtwo'])) {
    $findInputAJU = $_POST['findInputAJU'];
    $findInputTypeAJU = $_POST['findInputTypeAJU'];
    $resultaju = 'show';
}
?>
<?php
// include "include/pages/cssDataTables.php";
?>
<div class="main-container">
    <!-- Page Title -->
    <div class="up-page-title">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Search</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Search your data on this page.</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            January 2018
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="xs-pd-20-10 pd-ltr-20">
        <!-- UI -->
        <!-- Search -->
        <div class="row">
            <!-- REF/TN -->
            <div class="col-md-6 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <i class="icon-copy dw dw-filter1"></i> Filter Data - by
                        <select type="text" id="findby" style="background: transparent;border-color: transparent;">
                            <option value="opone">REF/TN</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" id="fformone" style="display: show;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>REF/TN </label>
                                        <?php if ($findInputREFTN == '') { ?>
                                            <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input REF/TN..." required>
                                        <?php } else { ?>
                                            <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input REF/TN..." value="<?= $findInputREFTN; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select type="text" name="findInputTypeREFTN" id="idfindInputTypeREFTN" class="form-control" required>
                                            <?php if ($findInputTypeREFTN == '') { ?>
                                                <option value="">-- Select Type --</option>
                                            <?php } else { ?>
                                                <option value="<?= $findInputTypeREFTN; ?>"><?= $findInputTypeREFTN; ?></option>
                                                <option value="">-- Select Type --</option>
                                            <?php } ?>
                                            <option value="export">Export</option>
                                            <option value="import">Import</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: right;">
                                    <a href="search.php" type="button" class="btn btn-info">
                                        <div class="icon-btn-y">
                                            <i class="icon-copy dw dw-delete"></i>
                                            &nbsp;Cancel
                                        </div>
                                    </a>
                                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="icon-copy dw dw-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End REF/TN -->
            <!-- No. Pengajuan (AJU) -->
            <div class="col-md-6 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        <i class="icon-copy dw dw-filter1"></i> Filter Data - by
                        <select type="text" id="findby" style="background: transparent;border-color: transparent;">
                            <option value="opone">No. Pengajuan</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" id="fformone" style="display: show;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Pengajuan </label>
                                        <?php if ($findInputAJU == '') { ?>
                                            <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input No. Pengajuan..." required>
                                        <?php } else { ?>
                                            <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input No. Pengajuan..." value="<?= $findInputAJU; ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select type="text" name="findInputTypeAJU" id="idfindInputTypeAJU" class="form-control" required>
                                            <?php if ($findInputTypeAJU == '') { ?>
                                                <option value="">-- Select Type --</option>
                                            <?php } else { ?>
                                                <option value="<?= $findInputTypeAJU; ?>"><?= $findInputTypeAJU; ?></option>
                                                <option value="">-- Select Type --</option>
                                            <?php } ?>
                                            <option value="export">Export</option>
                                            <option value="import">Import</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: right;">
                                    <a href="search.php" type="button" class="btn btn-info">
                                        <div class="icon-btn-y">
                                            <i class="icon-copy dw dw-delete"></i>
                                            &nbsp;Cancel
                                        </div>
                                    </a>
                                    <button type="submit" name="findtwo" id="idbtnfindtwo" class="btn btn-primary"><i class="icon-copy dw dw-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End No. Pengajuan (AJU) -->
        </div>
        <!-- END Search -->
        <!-- Result -->
        <div class="row" style="display: <?= $resultreftn ?>;margin-top: -20px;">
            <div class="col-lg-12">
                <?php
                $findInputTypeREFTN = $_POST['findInputTypeREFTN'];
                if ($findInputTypeREFTN == "import") { ?>
                    <div class="card-box mb-10">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Search Result! [Import List By REF/TN]</h4>
                            <hr>
                            <p style="margin-bottom: 0px;">REF/TN: <b><?= $findInputREFTN ?></b></p>
                            <p style="margin-bottom: 0px;">Type: <b><?= $findInputTypeREFTN ?></b></p>
                        </div>
                        <div class="pb-20">
                            <div class="table-responsive">
                                <table id="FINDreftnImport" class="table table-bordered table-td-valign-middle">
                                    <tbody>
                                        <?php
                                        if (isset($_POST['findone'])) {
                                            $findInputREFTN = $_POST['findInputREFTN'];
                                            $findInputTypeREFTN = $_POST['findInputTypeREFTN'];
                                            $result = $db->query("SELECT * FROM tb_master_impor INNER JOIN 
                                                                tb_imp_pre ON tb_master_impor.rcd_id=tb_imp_pre.rcd_id  
                                                                INNER JOIN
                                                                tb_imp_clear ON tb_master_impor.rcd_id=tb_imp_clear.rcd_id
                                                                INNER JOIN
                                                                tb_imp_post ON tb_master_impor.rcd_id=tb_imp_post.rcd_id
                                                                INNER JOIN                        
                                                                tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id
                                                                WHERE tb_master_impor.rcd_ref='$findInputREFTN' AND tb_master_impor.rcd_type='$findInputTypeREFTN'");
                                        }
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_id'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">ID</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="display: flex;justify-content: space-between;align-items: center;margin-top: 10px;">
                                                                <div>
                                                                    <div>
                                                                        <font style="font-size: 12px;font-weight:900"><?= $row['rcd_ref'] ?></font>
                                                                    </div>
                                                                    <div style="margin-top: -7px;">
                                                                        <font style="font-size: 8px;font-weight:500;color:#9e9e9e">REF/TN</font>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <font style="font-size: 12px;font-weight:900"><?= $row['rcd_aju'] ?></font>
                                                                    </div>
                                                                    <div style="margin-top: -7px;">
                                                                        <font style="font-size: 8px;font-weight:500;color:#9e9e9e">No. Pengajuan</font>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_inv_no'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Invoice</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="margin-top: 10px;">
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_hbl'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">HBL</font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_shipper'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Shipper</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="margin-top: 10px;">
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_cnee'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Consignee</font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_eta'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">ETA</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="margin-top: 10px;">
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_ata'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">ATA</font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_mot'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">MOT</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="margin-top: 10px;">
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_coo'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">COO</font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <!-- TOP -->
                                                            <div>
                                                                <div>
                                                                    <font style="font-size: 12px;font-weight:900"><?= $row['rcd_create_by'] ?></font>
                                                                </div>
                                                                <div style="margin-top: -7px;">
                                                                    <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Created By</font>
                                                                </div>
                                                            </div>
                                                            <!-- Buttom -->
                                                            <div style="display: flex;justify-content: space-between;align-items: center;margin-top: 10px;">
                                                                <!-- CUT DATETIME -->
                                                                <?php
                                                                $A       = $row['rcd_create_date'];
                                                                $CD_Date = substr($A, 0, 10);
                                                                $CD_Time = substr($A, 11, 8);
                                                                ?>
                                                                <div>
                                                                    <div>
                                                                        <font style="font-size: 12px;font-weight:900"><?= $CD_Date ?></font>
                                                                    </div>
                                                                    <div style="margin-top: -7px;">
                                                                        <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Created Date</font>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <font style="font-size: 12px;font-weight:900"><?= $CD_Time ?></font>
                                                                    </div>
                                                                    <div style="margin-top: -7px;">
                                                                        <font style="font-size: 8px;font-weight:500;color:#9e9e9e">Created Time</font>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td>
                                                    <div class="tb-no-data">
                                                        <img src="assets/app/svg/no-data.svg" alt="No Data" width="20%">
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pd-20 mb-30 card-box">
                        <h5 class="h4 text-blue mb-20">Details Data</h5>
                        <hr>
                        <div class="tab">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <ul class="nav flex-column vtabs nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#PackageDetails-REF-TN" role="tab" aria-selected="true"><i class="icon-copy dw dw-box"></i> Package Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#PIBDetails-REF-TN" role="tab" aria-selected="false"><i class="icon-copy dw dw-file-37"></i> PIB Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#CustomsDetails-REF-TN" role="tab" aria-selected="false"><i class="icon-copy dw dw-file-40"></i> Customs Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#TruckingDetails-REF-TN" role="tab" aria-selected="false"><i class="icon-copy dw dw-delivery-truck-2"></i> Trucking Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#DeliveryDetails-REF-TN" role="tab" aria-selected="false"><i class="icon-copy dw dw-target"></i> Delivery Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#EFileDetails-REF-TN" role="tab" aria-selected="false"><i class="icon-copy dw dw-file-46"></i> E-File Details</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="PackageDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                <!-- Package Details -->
                                                <div class="table-responsive">
                                                    <table id="FINDreftnImport" class="table table-bordered table-td-valign-middle">
                                                        <tbody>
                                                            <?php
                                                            $resultPD = $db->query("SELECT * FROM tb_master_impor 
                                                                                INNER JOIN tb_imp_pre ON tb_master_impor.rcd_id = tb_imp_pre.rcd_id  
                                                                                INNER JOIN tb_imp_clear ON tb_master_impor.rcd_id = tb_imp_clear.rcd_id 
                                                                                INNER JOIN tb_imp_post ON tb_master_impor.rcd_id = tb_imp_post.rcd_id           
                                                                                WHERE tb_master_impor.rcd_ref = '$findInputREFTN'");
                                                            if (mysqli_num_rows($resultPD) > 0) {
                                                                $no = 0;
                                                                while ($rowPD = $resultPD->fetch_assoc()) {
                                                                    $no++;
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_20_type'] != NULL && $rowPD['rcd_20_type'] != '.' && $rowPD['rcd_20_type'] != '-' ? $rowPD['rcd_20_type'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">20 TEU</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_40_type'] != NULL && $rowPD['rcd_40_type'] != '.' ? $rowPD['rcd_40_type'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">40 TEU</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_party'] != NULL ? $rowPD['rcd_party'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Party</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_weight'] != NULL ? number_format($rowPD['rcd_weight'], 0, ',', ',') : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Weight</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_package'] ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Package</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPD['rcd_cbm'] ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">CBM</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="tb-no-data">
                                                                            <img src="assets/app/svg/no-data.svg" alt="No Data" width="20%">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Package Details -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="PIBDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                <!-- PIB Details -->
                                                <div class="table-responsive">
                                                    <table id="FINDreftnImport" class="table table-bordered table-td-valign-middle">
                                                        <tbody>
                                                            <?php
                                                            $resultPIB = $db->query("SELECT * FROM tb_master_impor 
                                                                                INNER JOIN tb_imp_pre ON tb_master_impor.rcd_id = tb_imp_pre.rcd_id  
                                                                                INNER JOIN tb_imp_clear ON tb_master_impor.rcd_id = tb_imp_clear.rcd_id 
                                                                                INNER JOIN tb_imp_post ON tb_master_impor.rcd_id = tb_imp_post.rcd_id           
                                                                                WHERE tb_master_impor.rcd_ref = '$findInputREFTN'");
                                                            if (mysqli_num_rows($resultPIB) > 0) {
                                                                $no = 0;
                                                                while ($rowPIB = $resultPIB->fetch_assoc()) {
                                                                    $no++;
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['pre_send_pib_draft'] != NULL ? $rowPIB['pre_send_pib_draft'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Send PIB Draft</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['pre_rcvd_pib_rev'] != NULL ? $rowPIB['pre_rcvd_pib_rev'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Recieve PIB Revision</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['pre_send_pib'] != NULL ? $rowPIB['pre_send_pib'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Send PIB Revision</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['pre_rcvd_complete'] != NULL ? $rowPIB['pre_rcvd_complete'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">Recieve Document Completed</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['pre_create_pib'] != NULL ? $rowPIB['pre_create_pib'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">PIB Confirmation</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowPIB['cle_trf_pib'] != NULL ? $rowPIB['cle_trf_pib'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">PIB Transmit</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="tb-no-data">
                                                                            <img src="assets/app/svg/no-data.svg" alt="No Data" width="20%">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End PIB Details -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="CustomsDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                <!-- Customs Details -->
                                                <div class="table-responsive">
                                                    <table id="FINDreftnImport" class="table table-bordered table-td-valign-middle">
                                                        <tbody>
                                                            <?php
                                                            $resultCustoms = $db->query("SELECT * FROM tb_master_impor 
                                                                                INNER JOIN tb_imp_pre ON tb_master_impor.rcd_id = tb_imp_pre.rcd_id  
                                                                                INNER JOIN tb_imp_clear ON tb_master_impor.rcd_id = tb_imp_clear.rcd_id 
                                                                                INNER JOIN tb_imp_post ON tb_master_impor.rcd_id = tb_imp_post.rcd_id           
                                                                                WHERE tb_master_impor.rcd_ref = '$findInputREFTN'");
                                                            if (mysqli_num_rows($resultCustoms) > 0) {
                                                                $no = 0;
                                                                while ($rowCustoms = $resultCustoms->fetch_assoc()) {
                                                                    $no++;
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['cle_paid_duty_tax'] != NULL ? $rowCustoms['cle_paid_duty_tax'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">PAID DUTY TAX</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="display: flex;justify-content: space-between;align-items: center;margin-top: 10px;">
                                                                                    <div>
                                                                                        <div>
                                                                                            <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['cle_spjk'] != NULL ? $rowCustoms['cle_spjk'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                        </div>
                                                                                        <div style="margin-top: -7px;">
                                                                                            <font style="font-size: 10px;font-weight:500;color:#9e9e9e">SPJK</font>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div>
                                                                                            <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['cle_spjm'] != NULL ? $rowCustoms['cle_spjm'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                        </div>
                                                                                        <div style="margin-top: -7px;">
                                                                                            <font style="font-size: 10px;font-weight:500;color:#9e9e9e">SPJM</font>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <!-- TOP -->
                                                                                <div>
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['cle_sppb'] != NULL ? $rowCustoms['cle_sppb'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">SPPB</font>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Buttom -->
                                                                                <div style="display: flex;justify-content: space-between;align-items: center;margin-top: 10px;">
                                                                                    <div>
                                                                                        <div>
                                                                                            <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['cle_submit_coo'] != NULL ? $rowCustoms['cle_submit_coo'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                        </div>
                                                                                        <div style="margin-top: -7px;">
                                                                                            <font style="font-size: 10px;font-weight:500;color:#9e9e9e">SUBMIT COO</font>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div>
                                                                                            <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['rcd_rcvd_do'] != NULL ? $rowCustoms['rcd_rcvd_do'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                        </div>
                                                                                        <div style="margin-top: -7px;">
                                                                                            <font style="font-size: 10px;font-weight:500;color:#9e9e9e">RCVD DO</font>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div style="margin-top: 10px;">
                                                                                    <div>
                                                                                        <font style="font-size: 16px;font-weight:900"><?= $rowCustoms['rcd_do_validation'] != NULL ? $rowCustoms['rcd_do_validation'] : '<font style="color:red">No Data</font>' ?></font>
                                                                                    </div>
                                                                                    <div style="margin-top: -7px;">
                                                                                        <font style="font-size: 10px;font-weight:500;color:#9e9e9e">DO VALIDATION</font>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="tb-no-data">
                                                                            <img src="assets/app/svg/no-data.svg" alt="No Data" width="20%">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- End Customs Details -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="TruckingDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="DeliveryDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="EFileDetails-REF-TN" role="tabpanel">
                                            <div class="pd-20">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if ($findInputTypeREFTN == "export") { ?>
                    <!-- IF REF EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <font style="font-size: 16px;font-weight: 600;">Search Result! [Export List By REF/TN]</font>
                                    </div>
                                    <hr>
                                    <p style="margin-bottom: 0px;">REF/TN: <b><?= $findInputREFTN ?></b></p>
                                    <p style="margin-bottom: 0px;">Type: <b><?= $findInputTypeREFTN ?></b></p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="display hover" id="FINDreftnExport">
                                    <thead>
                                        <tr>
                                            <th class="no-sort">#</th>
                                            <th>RcdID</th>
                                            <th>RcdDate</th>
                                            <th>RcdBy</th>
                                            <th>ShipPlan</th>
                                            <th>Shipper</th>
                                            <th>Cnee</th>
                                            <th>PO_No.</th>
                                            <th>SIPL</th>
                                            <th>Ship. Arrangement</th>
                                            <th>Ship. Custom</th>
                                            <th>Ship. Execution</th>
                                            <th>Ship. Monitoring</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['findone'])) {
                                            $findInputREFTN = $_POST['findInputREFTN'];
                                            $findInputTypeREFTN = $_POST['findInputTypeREFTN'];
                                            $result = $db->query("SELECT * FROM tb_master_impor INNER JOIN 
                                                            tb_imp_pre ON tb_master_impor.rcd_id=tb_imp_pre.rcd_id  
                                                            INNER JOIN
                                                            tb_imp_clear ON tb_master_impor.rcd_id=tb_imp_clear.rcd_id
                                                            INNER JOIN
                                                            tb_imp_post ON tb_master_impor.rcd_id=tb_imp_post.rcd_id
                                                            INNER JOIN                        
                                                            tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id
                                                            WHERE tb_master_impor.rcd_ref='$findInputREFTN' AND tb_master_impor.rcd_type='$findInputTypeREFTN'");
                                        }
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?= $no; ?>.</td>
                                                    <td><?= $row['rcd_id']; ?></td>
                                                    <td><?= $row['rcd_create_date']; ?></td>
                                                    <td><?= $row['rcd_create_by']; ?></td>
                                                    <td><?= $row['rcd_ship_plan']; ?></td>
                                                    <td><?= $row['rcd_shipper']; ?></td>
                                                    <td><?= $row['rcd_cnee']; ?></td>
                                                    <td><?= $row['rcd_po_no']; ?></td>
                                                    <td align="">
                                                        <a href="<?= $row['sipl_file']; ?>" target="_BLANK"><span class="label label-primary">SIPL</span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#arr<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_arr']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#custom<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_custom']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#exe<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_execution']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#mon<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_monitor']; ?></span></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="6" align="center"><b><i>No Available Record</i></b></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END IF REF EXPORT -->
                <?php } ?>
            </div>
        </div>
        <!-- END BY REF/TN -->

        <!-- BY AJU -->
        <div class="row" style="display: <?= $resultaju ?>;margin-top: -20px;">
            <div class="col-lg-12">
                <?php
                $findInputTypeAJU = $_POST['findInputTypeAJU'];
                if ($findInputTypeAJU == "import") {
                ?>
                    <!-- IF AJU IMPORT -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <font style="font-size: 16px;font-weight: 600;">Search Result! [Import List By No. Pengajuan]</font>
                                    </div>
                                    <hr>
                                    <p style="margin-bottom: 0px;">AJU: <b><?= $findInputAJU ?></b></p>
                                    <p style="margin-bottom: 0px;">Type: <b><?= $findInputTypeAJU ?></b></p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="display hover" id="FINDreftnImport">
                                    <thead>
                                        <tr>
                                            <th class="no-sort">#</th>
                                            <th class="no-sort" style="text-align: center;">Number</th>
                                            <th class="no-sort" style="text-align: center;">Shipper & Consignee</th>
                                            <th class="no-sort" style="text-align: center;">Details</th>
                                            <th class="no-sort" style="text-align: center;">Record</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['findtwo'])) {
                                            $findInputAJU = $_POST['findInputAJU'];
                                            $findInputTypeAJU = $_POST['findInputTypeAJU'];
                                            $result = $db->query("SELECT * FROM tb_master_impor INNER JOIN 
                                                            tb_imp_pre ON tb_master_impor.rcd_id=tb_imp_pre.rcd_id  
                                                            INNER JOIN
                                                            tb_imp_clear ON tb_master_impor.rcd_id=tb_imp_clear.rcd_id
                                                            INNER JOIN
                                                            tb_imp_post ON tb_master_impor.rcd_id=tb_imp_post.rcd_id
                                                            INNER JOIN                        
                                                            tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id
                                                            WHERE tb_master_impor.rcd_aju='$findInputAJU' AND tb_master_impor.rcd_type='$findInputTypeAJU'");
                                        }
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?= $no; ?>.</td>
                                                    <td>
                                                        <font><b>ID: </b><?= $row['rcd_id']; ?></font>
                                                        <br>
                                                        <font><b>REF/TN: </b><?= $row['rcd_ref']; ?></font>
                                                        <br>
                                                        <font><b>AJU: </b><?= $row['rcd_aju']; ?></font>
                                                        <br>
                                                        <font><b>INV: </b><?= $row['rcd_inv_no']; ?></font>
                                                        <br>
                                                        <font><b>HBL: </b><?= $row['rcd_hbl']; ?></font>
                                                    </td>
                                                    <td>
                                                        <font><b>Shipper: </b><?= $row['rcd_shipper']; ?></font>
                                                        <br>
                                                        <font><b>Consignee: </b><?= $row['rcd_cnee']; ?></font>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <font><b>ETA: </b><?= $row['rcd_eta']; ?></font>
                                                        <font><b>ATA: </b><?= $row['rcd_ata']; ?></font>
                                                        <hr>
                                                        <font><b>MOT: </b><?= $row['rcd_mot']; ?></font>
                                                        <br>
                                                        <font><b>COO: </b><?= $row['rcd_coo']; ?></font>
                                                    </td>
                                                    <td>
                                                        <font><b>Created Date:</b><?= $row['rcd_create_date']; ?></font>
                                                        <br>
                                                        <font><b>Created By: </b><?= $row['rcd_create_by']; ?></font>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="6" align="center"><b><i>No Available Record</i></b></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END IF AJU IMPORT -->
                <?php } else if ($findInputTypeAJU == "export") { ?>
                    <!-- IF AJU EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <font style="font-size: 16px;font-weight: 600;">Search Result! [Export List By No. Pengajuan]</font>
                                    </div>
                                    <hr>
                                    <p style="margin-bottom: 0px;">AJU: <b><?= $findInputAJU ?></b></p>
                                    <p style="margin-bottom: 0px;">Type: <b><?= $findInputTypeAJU ?></b></p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="display hover" id="FINDreftnExport">
                                    <thead>
                                        <tr>
                                            <th class="no-sort">#</th>
                                            <th>RcdID</th>
                                            <th>RcdDate</th>
                                            <th>RcdBy</th>
                                            <th>ShipPlan</th>
                                            <th>Shipper</th>
                                            <th>Cnee</th>
                                            <th>PO_No.</th>
                                            <th>SIPL</th>
                                            <th>Ship. Arrangement</th>
                                            <th>Ship. Custom</th>
                                            <th>Ship. Execution</th>
                                            <th>Ship. Monitoring</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['findtwo'])) {
                                            $findInputAJU = $_POST['findInputAJU'];
                                            $findInputTypeAJU = $_POST['findInputTypeAJU'];
                                            $result = $db->query("SELECT * FROM tb_master_impor INNER JOIN 
                                                            tb_imp_pre ON tb_master_impor.rcd_id=tb_imp_pre.rcd_id  
                                                            INNER JOIN
                                                            tb_imp_clear ON tb_master_impor.rcd_id=tb_imp_clear.rcd_id
                                                            INNER JOIN
                                                            tb_imp_post ON tb_master_impor.rcd_id=tb_imp_post.rcd_id
                                                            INNER JOIN                        
                                                            tb_record_miles_import ON tb_master_impor.rcd_id=tb_record_miles_import.rcd_id
                                                            WHERE tb_master_impor.rcd_aju='$findInputAJU' AND tb_master_impor.rcd_type='$findInputTypeAJU'");
                                        }
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?= $no; ?>.</td>
                                                    <td><?= $row['rcd_id']; ?></td>
                                                    <td><?= $row['rcd_create_date']; ?></td>
                                                    <td><?= $row['rcd_create_by']; ?></td>
                                                    <td><?= $row['rcd_ship_plan']; ?></td>
                                                    <td><?= $row['rcd_shipper']; ?></td>
                                                    <td><?= $row['rcd_cnee']; ?></td>
                                                    <td><?= $row['rcd_po_no']; ?></td>
                                                    <td align="">
                                                        <a href="<?= $row['sipl_file']; ?>" target="_BLANK"><span class="label label-primary">SIPL</span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#arr<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_arr']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#custom<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_custom']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#exe<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_execution']; ?></span></a>
                                                    </td>
                                                    <td align="">
                                                        <a href="#" data-toggle="modal" data-target="#mon<?= $row['rcd_id']; ?>"><span class="label label-primary"><?= $row['miles_monitor']; ?></span></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="6" align="center"><b><i>No Available Record</i></b></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END IF AJU EXPORT -->
                <?php } ?>
            </div>
        </div>
        <!-- END BY AJU -->
        <!-- End Result -->
        <!-- UI -->
    </div>
</div>
<?php
// include "include/pages/jsDataTables.php";
?>
<!-- Consignee -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('CaddSuccess') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data saved successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CaddFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to save, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CaddReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('CUpdateSuccessCC') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data updated successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CUpdateFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to updated, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CUpdateReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data delete successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data failed to delete, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Delete

    // REF IMPORT
    function openDetails(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // END REF IMPORT
</script>