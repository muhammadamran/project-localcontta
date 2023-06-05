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
        <div class="row" style="display: <?= $resultreftn ?>;">
            <div class="col-lg-12">
                <?php
                $findInputTypeREFTN = $_POST['findInputTypeREFTN'];
                if ($findInputTypeREFTN == "import") { ?>
                    <!-- IF REF IMPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> Import List By REF/TN
                        </div>
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <h3 style="margin-top: 0px;"><i class="fa fa-search"></i> Search Result!</h3>
                                    </div>
                                    <hr>
                                    <p style="margin-bottom: 0px;">REF/TN: <b><?= $findInputREFTN ?></b></p>
                                    <p style="margin-bottom: 0px;">Type: <b><?= $findInputTypeREFTN ?></b></p>
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
                                                    <td><?= $no ?>.</td>
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
                                                    <td style='text-align: center;'>
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
                            <!-- IF REF IMPORT TAB -->
                            <div class="ref-tab">
                                <font style="font-size: 18px;font-weight: 700;"><i class="fas fa-file-invoice"></i> Details Data</font>
                            </div>
                            <div class="tab">
                                <button class="tablinks" onclick="openDetails(event, 'PackageDetails')"><i class="fas fa-info-circle"></i> Package Details</button>
                                <button class="tablinks" onclick="openDetails(event, 'PIBDetails')"><i class="fas fa-info-circle"></i> PIB Details</button>
                                <button class="tablinks" onclick="openDetails(event, 'CustomsDetails')"><i class="fas fa-info-circle"></i> Customs Details</button>
                                <button class="tablinks" onclick="openDetails(event, 'TruckingDetails')"><i class="fas fa-info-circle"></i> Trucking Details</button>
                                <button class="tablinks" onclick="openDetails(event, 'DeliveryDetails')"><i class="fas fa-info-circle"></i> Delivery Details</button>
                                <button class="tablinks" onclick="openDetails(event, 'EFileDetails')"><i class="fas fa-info-circle"></i> E-File Details</button>
                            </div>
                            <!-- 1 -->
                            <div id="PackageDetails" class="tabcontent">
                                <h3>Package Details</h3>
                                <?php
                                $getsearch = $db->query("SELECT * FROM tb_master_impor 
                                                INNER JOIN tb_imp_pre ON tb_master_impor.rcd_id = tb_imp_pre.rcd_id  
                                                INNER JOIN tb_imp_clear ON tb_master_impor.rcd_id = tb_imp_clear.rcd_id 
                                                INNER JOIN tb_imp_post ON tb_master_impor.rcd_id = tb_imp_post.rcd_id           
                                                WHERE tb_master_impor.rcd_ref = '$findInputREFTN'");
                                $getsql = mysql_fetch_array($getsearch);
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>20'</th>
                                                <th>40'</th>
                                                <th>Party</th>
                                                <th>Weight</th>
                                                <th>Package</th>
                                                <th>CBM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $getsql['rcd_20_type']; ?></td>
                                                <td><?= $getsql['rcd_40_type']; ?></td>
                                                <td><?= $getsql['rcd_party']; ?></td>
                                                <td><?= $getsql['rcd_weight']; ?></td>
                                                <td><?= $getsql['rcd_package']; ?></td>
                                                <td><?= $getsql['rcd_cbm']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End 1 -->
                            <!-- 2 -->
                            <div id="PIBDetails" class="tabcontent">
                                <h3>PIB Details</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SEND PIB DRAFT</th>
                                                <th>RECEIVE PIB REVISION</th>
                                                <th>SEND PIB REVISION</th>
                                                <th>RECEIVE DOC COMPLETED</th>
                                                <th>PIB CONFIRMATION</th>
                                                <th>PIB TRANSMIT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $getsql['pre_send_pib_draft']; ?></td>
                                                <td><?= $getsql['pre_rcvd_pib_rev']; ?></td>
                                                <td><?= $getsql['pre_send_pib']; ?></td>
                                                <td><?= $getsql['pre_rcvd_complete']; ?></td>
                                                <td><?= $getsql['pre_create_pib']; ?></td>
                                                <td><?= $getsql['cle_trf_pib']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End 2 -->
                            <!-- 3 -->
                            <div id="CustomsDetails" class="tabcontent">
                                <h3>Customs Details</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>PAID DUTY TAX</th>
                                                <th>SPJK</th>
                                                <th>SPJM</th>
                                                <th>SPPB</th>
                                                <th>SUBMIT COO</th>
                                                <th>RCVD DO</th>
                                                <th>DO VALIDATION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $getsql['cle_paid_duty_tax']; ?></td>
                                                <td><?= $getsql['cle_spjk']; ?></td>
                                                <td><?= $getsql['cle_spjm']; ?></td>
                                                <td><?= $getsql['cle_sppb']; ?></td>
                                                <td><?= $getsql['cle_submit_coo']; ?></td>
                                                <td><?= $getsql['rcd_rcvd_do']; ?></td>
                                                <td><?= $getsql['rcd_do_validation']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End 3 -->
                            <!-- 4 -->
                            <div id="TruckingDetails" class="tabcontent">
                                <h3>Trucking Details</h3>
                                <div class="table-responsive">
                                    <?php
                                    $getsearch2 = $db->query("SELECT * FROM tb_master_impor 
                                                    INNER JOIN tb_truck_assign ON tb_master_impor.rcd_id = tb_truck_assign.rcd_id                
                                                    INNER JOIN tb_truck_job_details ON tb_master_impor.rcd_id = tb_truck_job_details.rcd_id  
                                                    WHERE tb_master_impor.rcd_ref = '$findInputREFTN'");
                                    $getsql2 = mysql_fetch_array($getsearch2);
                                    ?>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>VENDOR NAME</th>
                                                        <th>ORDER SENT</th>
                                                        <th>RCVD ORDER FROM KN</th>
                                                        <th>RCVD BY</th>
                                                        <th>DRIVER NAME</th>
                                                        <th>DRIVER PHONE</th>
                                                        <th>VEHICLE NO</th>
                                                        <th>CONTAINER NO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $getsql2['assign_vendor']; ?></td>
                                                        <td><?= $getsql2['order_rcvd_date']; ?></td>
                                                        <td><?= $getsql2['tract_order_rcvd']; ?></td>
                                                        <td><?= $getsql2['tract_order_rcvd_by']; ?></td>
                                                        <td><?= $getsql2['tract_driver_name']; ?></td>
                                                        <td><?= $getsql2['tract_driver_phone']; ?></td>
                                                        <td><?= $getsql2['tract_vehicle_no']; ?></td>
                                                        <td><?= $getsql2['tract_cont_no']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End 4 -->
                                    <!-- 5 -->
                                    <div id="DeliveryDetails" class="tabcontent">
                                        <h3>Delivery Details</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Truck GO</th>
                                                        <th>Arrive in warehouse</th>
                                                        <th>Start stuff</th>
                                                        <th>Complete stuff</th>
                                                        <th>Leave the warehouse</th>
                                                        <th>Arrive in dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $getsql2['rcd_cus_peb_date']; ?></td>
                                                        <td><?= $getsql2['rcd_cus_peb_transmit']; ?></td>
                                                        <td><?= $getsql2['rcd_cus_no_aju']; ?></td>
                                                        <td><?= $getsql2['rcd_cus_peb_nopen']; ?></td>
                                                        <td><?= $getsql2['rcd_cus_npe_date']; ?></td>
                                                        <td><?= $getsql2['rcd_ar_ck2_app']; ?></td>
                                                        <td><?= $getsql2['rcd_ar_sac_no']; ?></td>
                                                        <td><?= $getsql2['rcd_ar_sac']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End 5 -->
                                    <!-- 6 -->
                                    <div id="EFileDetails" class="tabcontent">
                                        <h3>E-File Details</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>PIB</th>
                                                        <th>SPPB</th>
                                                        <th>SIPL</th>
                                                        <th>COO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        if ($getsql['pib_file'] == "") {
                                                            echo "<td>" . "file not found" . "</td>";
                                                        } else {
                                                            echo "<td>" . "<a href='$getsql[pib_file]' title='File' target='_BLANK'><span class='label label-primary'>View</span></a>" . "</td>";
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($getsql['sppb'] == "") {
                                                            echo "<td>" . "file not found" . "</td>";
                                                        } else {
                                                            echo "<td>" . "<a href='$getsql[sppb]' title='File' target='_BLANK'><span class='label label-primary'>View</span></a>" . "</td>";
                                                        }
                                                        ?>

                                                        <?php
                                                        if ($getsql['cipl_file'] == "") {
                                                            echo "<td>" . "file not found" . "</td>";
                                                        } else {
                                                            echo "<td>" . "<a href='$getsql[cipl_file]' title='File' target='_BLANK'><span class='label label-primary'>View</span></a>" . "</td>";
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($getsql['coo'] == "") {
                                                            echo "<td>" . "file not found" . "</td>";
                                                        } else {
                                                            echo "<td>" . "<a href='$getsql[coo]' title='File' target='_BLANK'><span class='label label-primary'>View</span></a>" . "</td>";
                                                        }
                                                        ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End 6 -->
                                    <!-- END IF REF IMPORT TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END IF REF IMPORT -->
                <?php } else if ($findInputTypeREFTN == "export") { ?>
                    <!-- IF REF EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> Export List By Ref/TN
                        </div>
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <h3 style="margin-top: 0px;"><i class="fa fa-search"></i> Search Result!</h3>
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
        <div class="row" style="display: <?= $resultaju ?>;">
            <div class="col-lg-12">
                <?php
                $findInputTypeAJU = $_POST['findInputTypeAJU'];
                if ($findInputTypeAJU == "import") {
                ?>
                    <!-- IF AJU IMPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> Import List By AJU
                        </div>
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <h3 style="margin-top: 0px;"><i class="fa fa-search"></i> Search Result!</h3>
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
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> Export List By AJU
                        </div>
                        <div class="panel-body">
                            <div class="p-b-20" style="margin-bottom: 15px;">
                                <div class="alert-modify">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    <div>
                                        <h3 style="margin-top: 0px;"><i class="fa fa-search"></i> Search Result!</h3>
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