<style>
  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #aaaaaa;
    background-color: #55b8f2;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: #fff;
    font-weight: 500;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #1a3f7a;
    color: #fff;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #002765;
    color: #fff;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }

  .ref-tab {
    padding: 20px;
    margin-left: -15px;
    background: #002765;
    color: #fff;
    margin-top: 10px;
    margin-bottom: 10px;
  }
</style>
<script src="assets/js/jquery.min.js"></script>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// FUNCTION SEARCHING
$findInputREFTN = '';
$findInputTypeREFTN = '';
$resultreftn = 'none';
if (isset($_GET['findone'])) {
  $findInputREFTN = $_GET['findInputREFTN'];
  $findInputTypeREFTN = $_GET['findInputTypeREFTN'];
  $resultreftn = 'show';
}

$findInputAJU = '';
$findInputTypeAJU = '';
$resultaju = 'none';
if (isset($_GET['findtwo'])) {
  $findInputAJU = $_GET['findInputAJU'];
  $findInputTypeAJU = $_GET['findInputTypeAJU'];
  $resultaju = 'show';
}
?>
<?php include 'include/head.php'; ?>
<div id="wrapper">
  <?php include 'include/header.php'; ?>
  <div id="page-wrapper">
    <!-- Page -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          <i class="fa fa-search icon-title"></i> Search
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <!-- Search -->
    <div class="row">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fas fa-filter"></i> Filter Data - by
            <select type="text" id="findby" style="background: transparent;border-color: transparent;">
              <option value="opone">REF/TN</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="search.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ref / Tn </label>
                      <?php if ($findInputREFTN == '') { ?>
                        <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input Ref / Tn..." required>
                      <?php } else { ?>
                        <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input Ref / Tn..." value="<?= $findInputREFTN; ?>">
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
                        <option value="import">Import</option>
                        <option value="export">Export</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="search.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fas fa-filter"></i> Filter Data - by
            <select type="text" id="findby" style="background: transparent;border-color: transparent;">
              <option value="opone">Aju</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="search.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Aju </label>
                      <?php if ($findInputAJU == '') { ?>
                        <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input Aju..." required>
                      <?php } else { ?>
                        <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input Aju..." value="<?= $findInputAJU; ?>">
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
                        <option value="import">Import</option>
                        <option value="export">Export</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="search.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findtwo" id="idbtnfindtwo" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Search -->
    <!-- BY REF / TN -->
    <div class="row" style="display: <?= $resultreftn ?>;">
      <div class="col-lg-12">
        <?php
        $findInputTypeREFTN = $_GET['findInputTypeREFTN'];
        if ($findInputTypeREFTN == 'import') { ?>
          <!-- IF REF IMPORT -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-table"></i> Import List By Ref/TN
            </div>
            <div class="panel-body">
              <div class="p-b-20" style="margin-bottom: 15px;">
                <div class="alert-modify">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  <div>
                    <h3 style="margin-top: 0px;"><i class="fa fa-search"></i> Search Result!</h3>
                  </div>
                  <hr>
                  <p style="margin-bottom: 0px;">Ref / Tn: <b><?= $findInputREFTN ?></b></p>
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
                    $con = mysqli_connect("localhost", "root", "", "contta");
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    // $result = mysqli_query($con,"SELECT * FROM tb_cnee ORDER BY regdate DESC LIMIT 50");
                    if (isset($_GET['findone'])) {
                      $findInputREFTN = $_GET['findInputREFTN'];
                      $findInputTypeREFTN = $_GET['findInputTypeREFTN'];
                      $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN 
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
                      while ($row = mysqli_fetch_array($result)) {
                        $no++;
                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td>
                           <font><b>ID: </b> " . $row['rcd_id'] . "</font>
                           <br>
                           <font><b>REF/TN: </b>" . $row['rcd_ref'] . "</font>
                           <br>
                           <font><b>AJU: </b>" . $row['rcd_aju'] . "</font>
                           <br>
                           <font><b>INV: </b>" . $row['rcd_inv_no'] . "</font>
                           <br>
                           <font><b>HBL: </b>" . $row['rcd_hbl'] . "</font>
                           </td>";
                        echo "<td>
                           <font><b>Shipper: </b> " . $row['rcd_shipper'] . "</font>
                           <br>
                           <font><b>Consignee: </b>" . $row['rcd_cnee'] . "</font>
                           </td>";
                        echo "<td style='text-align: center;'>
                           <font><b>ETA: </b> " . $row['rcd_eta'] . "</font>
                           <font><b>ATA: </b> " . $row['rcd_ata'] . "</font>
                           <hr>
                           <font><b>MOT: </b> " . $row['rcd_mot'] . "</font>
                           <br>
                           <font><b>COO: </b>" . $row['rcd_coo'] . "</font>
                           </td>";
                        echo "<td>
                           <font><b>Created Date:</b> " . $row['rcd_create_date'] . "</font>
                           <br>
                           <font><b>Created By: </b>" . $row['rcd_create_by'] . "</font>
                           </td>";
                        echo "</tr>";
                    ?>
                    <?php }
                    } else {
                      echo "<tr>";
                      echo "<td colspan='6' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                      echo "</tr>";
                    }
                    mysqli_close($con);
                    ?>
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
                mysql_connect('localhost', 'root', '');
                mysql_select_db('contta');
                $getsearch = mysql_query("SELECT * FROM tb_master_impor 
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
                        <td><?php echo $getsql['rcd_20_type']; ?></td>
                        <td><?php echo $getsql['rcd_40_type']; ?></td>
                        <td><?php echo $getsql['rcd_party']; ?></td>
                        <td><?php echo $getsql['rcd_weight']; ?></td>
                        <td><?php echo $getsql['rcd_package']; ?></td>
                        <td><?php echo $getsql['rcd_cbm']; ?></td>
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
                        <td><?php echo $getsql['pre_send_pib_draft']; ?></td>
                        <td><?php echo $getsql['pre_rcvd_pib_rev']; ?></td>
                        <td><?php echo $getsql['pre_send_pib']; ?></td>
                        <td><?php echo $getsql['pre_rcvd_complete']; ?></td>
                        <td><?php echo $getsql['pre_create_pib']; ?></td>
                        <td><?php echo $getsql['cle_trf_pib']; ?></td>
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
                        <td><?php echo $getsql['cle_paid_duty_tax']; ?></td>
                        <td><?php echo $getsql['cle_spjk']; ?></td>
                        <td><?php echo $getsql['cle_spjm']; ?></td>
                        <td><?php echo $getsql['cle_sppb']; ?></td>
                        <td><?php echo $getsql['cle_submit_coo']; ?></td>
                        <td><?php echo $getsql['rcd_rcvd_do']; ?></td>
                        <td><?php echo $getsql['rcd_do_validation']; ?></td>
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
                  mysql_connect('localhost', 'root', '');
                  mysql_select_db('contta');
                  $getsearch2 = mysql_query("SELECT * FROM tb_master_impor 
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
                            <td><?php echo $getsql2['assign_vendor']; ?></td>
                            <td><?php echo $getsql2['order_rcvd_date']; ?></td>
                            <td><?php echo $getsql2['tract_order_rcvd']; ?></td>
                            <td><?php echo $getsql2['tract_order_rcvd_by']; ?></td>
                            <td><?php echo $getsql2['tract_driver_name']; ?></td>
                            <td><?php echo $getsql2['tract_driver_phone']; ?></td>
                            <td><?php echo $getsql2['tract_vehicle_no']; ?></td>
                            <td><?php echo $getsql2['tract_cont_no']; ?></td>
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
                            <td><?php echo $getsql2['rcd_cus_peb_date']; ?></td>
                            <td><?php echo $getsql2['rcd_cus_peb_transmit']; ?></td>
                            <td><?php echo $getsql2['rcd_cus_no_aju']; ?></td>
                            <td><?php echo $getsql2['rcd_cus_peb_nopen']; ?></td>
                            <td><?php echo $getsql2['rcd_cus_npe_date']; ?></td>
                            <td><?php echo $getsql2['rcd_ar_ck2_app']; ?></td>
                            <td><?php echo $getsql2['rcd_ar_sac_no']; ?></td>
                            <td><?php echo $getsql2['rcd_ar_sac']; ?></td>
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
              <!-- END IF REF IMPORT -->
            <?php } else if ($findInputTypeREFTN == 'export') { ?>
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
                      <p style="margin-bottom: 0px;">Ref / Tn: <b><?= $findInputREFTN ?></b></p>
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
                        $con = mysqli_connect("localhost", "root", "", "contta");
                        if (mysqli_connect_errno()) {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        // $result = mysqli_query($con,"SELECT * FROM tb_cnee ORDER BY regdate DESC LIMIT 50");
                        if (isset($_GET['findone'])) {
                          $findInputREFTN = $_GET['findInputREFTN'];
                          $findInputTypeREFTN = $_GET['findInputTypeREFTN'];
                          $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN 
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
                          while ($row = mysqli_fetch_array($result)) {
                            $no++;
                            echo "<tr>";
                            echo "<td>" . $no . ".</td>";
                            echo "<td>" . $row['rcd_id'] . "</td>";
                            echo "<td>" . $row['rcd_create_date'] . "</td>";
                            echo "<td>" . $row['rcd_create_by'] . "</td>";
                            echo "<td>" . $row['rcd_ship_plan'] . "</td>";
                            echo "<td>" . $row['rcd_shipper'] . "</td>";
                            echo "<td>" . $row['rcd_cnee'] . "</td>";
                            echo "<td>" . $row['rcd_po_no'] . "</td>";
                            echo "<td align= ''>
                      <a href='$row[sipl_file]' target='_BLANK' ><span class='label label-primary'>SIPL</span></a>
                      </td>";
                            echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#arr$row[rcd_id]' ><span class='label label-primary'>$row[miles_arr]</span></a>
                      </td>";
                            echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#custom$row[rcd_id]' ><span class='label label-primary'>$row[miles_custom]</span></a>
                      </td>";
                            echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#exe$row[rcd_id]' ><span class='label label-primary'>$row[miles_execution]</span></a>
                      </td>";
                            echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#mon$row[rcd_id]' ><span class='label label-primary'>$row[miles_monitor]</span></a>
                      </td>";
                            echo "</tr>";
                        ?>
                        <?php }
                        } else {
                          echo "<tr>";
                          echo "<td colspan='6' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                          echo "</tr>";
                        }
                        mysqli_close($con);
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- END IF REF EXPORT -->
            <?php } ?>
            </div>
          </div>
          <!-- END BY REF / TN -->
          <!-- BY AJU -->
          <div class="row" style="display: <?= $resultaju ?>;">
            <div class="col-lg-12">
              <?php
              $findInputTypeAJU = $_GET['findInputTypeAJU'];
              if ($findInputTypeAJU == 'import') {
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
                          $con = mysqli_connect("localhost", "root", "", "contta");
                          if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }
                          // $result = mysqli_query($con,"SELECT * FROM tb_cnee ORDER BY regdate DESC LIMIT 50");
                          if (isset($_GET['findtwo'])) {
                            $findInputAJU = $_GET['findInputAJU'];
                            $findInputTypeAJU = $_GET['findInputTypeAJU'];
                            $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN 
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
                            while ($row = mysqli_fetch_array($result)) {
                              $no++;
                              echo "<tr>";
                              echo "<td>" . $no . ".</td>";
                              echo "<td>
                           <font><b>ID: </b> " . $row['rcd_id'] . "</font>
                           <br>
                           <font><b>REF/TN: </b>" . $row['rcd_ref'] . "</font>
                           <br>
                           <font><b>AJU: </b>" . $row['rcd_aju'] . "</font>
                           <br>
                           <font><b>INV: </b>" . $row['rcd_inv_no'] . "</font>
                           <br>
                           <font><b>HBL: </b>" . $row['rcd_hbl'] . "</font>
                           </td>";
                              echo "<td>
                           <font><b>Shipper: </b> " . $row['rcd_shipper'] . "</font>
                           <br>
                           <font><b>Consignee: </b>" . $row['rcd_cnee'] . "</font>
                           </td>";
                              echo "<td style='text-align: center;'>
                           <font><b>ETA: </b> " . $row['rcd_eta'] . "</font>
                           <font><b>ATA: </b> " . $row['rcd_ata'] . "</font>
                           <hr>
                           <font><b>MOT: </b> " . $row['rcd_mot'] . "</font>
                           <br>
                           <font><b>COO: </b>" . $row['rcd_coo'] . "</font>
                           </td>";
                              echo "<td>
                           <font><b>Created Date:</b> " . $row['rcd_create_date'] . "</font>
                           <br>
                           <font><b>Created By: </b>" . $row['rcd_create_by'] . "</font>
                           </td>";
                              echo "</tr>";
                          ?>
                          <?php }
                          } else {
                            echo "<tr>";
                            echo "<td colspan='6' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                            echo "</tr>";
                          }
                          mysqli_close($con);
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- END IF AJU IMPORT -->
              <?php } else if ($findInputTypeAJU == 'export') { ?>
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
                          $con = mysqli_connect("localhost", "root", "", "contta");
                          if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }
                          // $result = mysqli_query($con,"SELECT * FROM tb_cnee ORDER BY regdate DESC LIMIT 50");
                          if (isset($_GET['findtwo'])) {
                            $findInputAJU = $_GET['findInputAJU'];
                            $findInputTypeAJU = $_GET['findInputTypeAJU'];
                            $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN 
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
                            while ($row = mysqli_fetch_array($result)) {
                              $no++;
                              echo "<tr>";
                              echo "<td>" . $no . ".</td>";
                              echo "<td>" . $row['rcd_id'] . "</td>";
                              echo "<td>" . $row['rcd_create_date'] . "</td>";
                              echo "<td>" . $row['rcd_create_by'] . "</td>";
                              echo "<td>" . $row['rcd_ship_plan'] . "</td>";
                              echo "<td>" . $row['rcd_shipper'] . "</td>";
                              echo "<td>" . $row['rcd_cnee'] . "</td>";
                              echo "<td>" . $row['rcd_po_no'] . "</td>";
                              echo "<td align= ''>
                      <a href='$row[sipl_file]' target='_BLANK' ><span class='label label-primary'>SIPL</span></a>
                      </td>";
                              echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#arr$row[rcd_id]' ><span class='label label-primary'>$row[miles_arr]</span></a>
                      </td>";
                              echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#custom$row[rcd_id]' ><span class='label label-primary'>$row[miles_custom]</span></a>
                      </td>";
                              echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#exe$row[rcd_id]' ><span class='label label-primary'>$row[miles_execution]</span></a>
                      </td>";
                              echo "<td align= ''>
                      <a href='#' data-toggle='modal' data-target='#mon$row[rcd_id]' ><span class='label label-primary'>$row[miles_monitor]</span></a>
                      </td>";
                              echo "</tr>";
                          ?>
                          <?php }
                          } else {
                            echo "<tr>";
                            echo "<td colspan='6' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                            echo "</tr>";
                          }
                          mysqli_close($con);
                          ?>
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
      </div>
    </div>
    <?php
    include 'include/jquery.php';
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