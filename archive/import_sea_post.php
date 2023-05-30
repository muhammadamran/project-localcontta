<script src="assets/js/jquery.min.js"></script>
<style type="text/css">
  #for-form {
    margin-bottom: 0px;
  }
</style>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

if (isset($_POST["create"])) {

  $ship_plan            = $_POST['ship_plan'];
  $shipper              = $_POST['shipper'];
  $cnee                 = $_POST['cnee'];
  $inv_no               = $_POST['inv_no'];
  $commo                = $_POST['commo'];
  $c20                  = $_POST['c20'];
  $c40                  = $_POST['c40'];
  $party                = $_POST['party'];
  $po_no                = $_POST['po_no'];
  $rcd_type             = "export";
  $user_name            = $_POST['user_name'];
  $datenow              = date('Y-m-d H:i:s');

  $query = mysql_query("INSERT into tb_record_master values(' ','$datenow','$user_name','$rcd_type','$ship_plan','$shipper','$cnee','$inv_no','$commo','$c20','$c40','$party','$po_no')");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["update"])) {

  $rcd_id                     = $_POST['rcd_id'];
  $remark1                    = $_POST['remark1'];

  $query = mysql_query("UPDATE tb_imp_post SET post_remark='$remark1' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["post_rcvd_inv_vendor"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_post SET post_rcvd_inv_vendor ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["post_billing_customer"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_post SET post_billing_customer ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["post_billing_send"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_post SET post_billing_send ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["post_filling"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_post SET post_filling ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_record_miles_import SET post ='$datenow',action_by_3='$user_name' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./imp_pre.php");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["vendor"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/inv-vendor/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_imp_post SET post_invoice_vendor_file ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./import_sea_post.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_post.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["cust"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/inv-customer/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_imp_post SET post_customer_invoice_file ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./import_sea_post.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_post.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
}

if (isset($_POST["updateRemarks"])) {

  $rcd_id                 = $_POST['rcd_id'];
  $InputRemarks           = $_POST['EditInputRemarks'];

  if ($InputRemarks == 'Others') {
    $forRemarks = $_POST['Others'];
  } else {
    $forRemarks = $_POST['EditInputRemarks'];
  }

  $query = mysql_query("INSERT INTO tb_imp_remarks SET
      rcd_id            = '$rcd_id',
      pre_rev_remark    = '$forRemarks',
      pre_rev_status    = 'Post-Clearance',
      pre_rev_type      = 'import'
  ");

  if ($query) {
    header("Location: ./import_sea_post.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_post.php?InputFailed=true");
  }
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
          <i class="fa fa-dolly-flatbed icon-title"></i> Import - Seafreight
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post-Clearance</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Post-Clearance
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="display hover" id="users">
                <thead>
                  <tr>
                    <th rowspan="2" class="no-sort" style="text-align: center;">#</th>
                    <th rowspan="2" style="text-align: center;">Number</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Consignee</th>
                    <th colspan="4" style="text-align: center;">Progress</th>
                    <th colspan="2" style="text-align: center;">File</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Remarks</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                  <tr>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Receive<font style="color: transparent;">.</font>Invoice<font style="color: transparent;">.</font>Vendor</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Create<font style="color: transparent;">.</font>Billing</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Send<font style="color: transparent;">.</font>Billing</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Filling</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Invoice<font style="color: transparent;">.</font>Vendor</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Invoice<font style="color: transparent;">.</font>Customer</font>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "contta");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $me = $_SESSION['username'];
                  $result = mysqli_query($con, "SELECT * FROM tb_record_miles_import 
                                                INNER JOIN tb_imp_post ON tb_record_miles_import.rcd_id=tb_imp_post.rcd_id 
                                                WHERE tb_record_miles_import.post = '0' AND tb_record_miles_import.clear != '0' 
                                                AND tb_record_miles_import.mot != 'AIR'");
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;

                      echo "<tr>";
                      echo "<td style='text-align: center;'>" . $no . ".</td>";
                      $get_data = mysql_query("SELECT rcd_aju,rcd_ref,rcd_cnee,rcd_hbl FROM tb_master_impor WHERE rcd_id = '$row[rcd_id]'");
                      $get1 = mysql_fetch_array($get_data);
                      echo "<td>
                      <div style='width:300px'>
                      <font style='font-weight:600'>POST ID:</font> " . $row['post_id'] . "
                      <br>
                      <font style='font-weight:600'>RCD ID:</font> " . $row['rcd_id'] . "
                      <br>
                      <font style='font-weight:600'>REF:</font> " . $get1['rcd_ref'] . "
                      <br>
                      <font style='font-weight:600'>AJU:</font> " . $get1['rcd_aju'] . "
                      <br>
                      <font style='font-weight:600'>HBL:</font> " . $get1['rcd_hbl'] . "
                      </div>
                      </td>";
                      echo "<td style='text-align: center;'>" . $get1['rcd_cnee'] . "</td>";
                      if ($row['post_rcvd_inv_vendor'] == "0000-00-00") {
                        echo "<td style='text-align: center;'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='post_rcvd_inv_vendor' value='post_rcvd_inv_vendor' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center;'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['post_rcvd_inv_vendor'] . "</button></td>";
                      }

                      if ($row['post_billing_customer'] == "0000-00-00") {
                        echo "<td style='text-align: center;'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='post_billing_customer' value='post_billing_customer' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center;'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['post_billing_customer'] . "</button></td>";
                      }

                      if ($row['post_billing_send'] == "0000-00-00") {
                        echo "<td style='text-align: center;'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='post_billing_send' value='post_billing_send' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center;'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['post_billing_send'] . "</button></td>";
                      }

                      if ($row['post_filling'] == "0000-00-00") {
                        echo "<td style='text-align: center;'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='post_filling' value='post_filling' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center;'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['post_filling'] . "</button></td>";
                      }

                      if ($row['post_invoice_vendor_file'] == "") {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center;'>" . "<a href='$row[post_invoice_vendor_file]' title='File' target='_BLANK'><span class='btn btn-primary'><i class='fa fa-file-invoice'></i></span></a>" . "</td>";
                      }
                      if ($row['post_customer_invoice_file'] == "") {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center;'>" . "<a href='$row[post_customer_invoice_file]' title='File' target='_BLANK'><span class='btn btn-primary'><i class='fa fa-file-invoice'></i></span></a>" . "</td>";
                      }

                      // Desc Remarks
                      $CEKRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Post-Clearance' AND pre_rev_type='import'");
                      $GetDataCEKRemarksTB = mysql_fetch_array($CEKRemarksTB);

                      // Count Remarks
                      $CountRemarksTB = mysql_query("SELECT COUNT(*) AS total FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Post-Clearance' AND pre_rev_type='import'");
                      $GetDataCountRemarksTB = mysql_fetch_array($CountRemarksTB);

                      if ($GetDataCEKRemarksTB['pre_rev_remark'] == NULL) {
                        echo "<td style='text-align: center;'>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#remarks$row[rcd_id]' title='add remarks this record'><i class='fas fa-folder-plus'></i></a>
                        </td>";
                      } else {
                        echo "<td style='text-align: center;'>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#viewremarks$row[rcd_id]' title='view remarks this record'><i class='fas fa-eye'></i></a>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#remarks$row[rcd_id]' title='add more remarks this record'><i class='fas fa-folder-plus'></i></a>
                        <div style='margin-top 5px;margin-bottom: -25px;'>
                          <font class='blink_me' style='font-size: 8px;color: red;font-weight: 600'><i>Note: Total Remarks: " . $GetDataCountRemarksTB['total'] . "</i></font>
                        </div>
                        </td>";
                      }

                      // echo "<td style='text-align: center;'>" . $row['pre_rev_remark'] . "</td>";                     
                      echo "<td style='text-align: center;'>
                      <div style='display: flex;'>
                      <div style='margin-left: 5px;'>";
                      if ($row['post_invoice_vendor_file'] == "" or $row['post_customer_invoice_file'] == "") {
                        echo "<a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'><span class='btn btn-danger'>Complete</span></a>";
                      } else {
                        echo "<a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'><span class='btn btn-success'>Complete</span></a>";
                      }
                      echo "
                      </div>
                      </div>
                      </td>";
                      echo "</tr>";
                  ?>
                      <!-- Remarks -->
                      <div class="modal fade" id="remarks<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Remarks]</b> Post-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="POST" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <div style="display: flex;justify-content: space-between;">
                                        <select class="form-control" name="EditInputRemarks" id="IdRemarks">
                                          <option value=" ">--- SELECT ---</option>
                                          <?php
                                          mysql_connect('localhost', 'root', '');
                                          mysql_select_db('contta');
                                          $resultRemarks = mysql_query("SELECT * FROM tb_remarks WHERE status='Post-Clearance' AND type='import' ORDER BY remarks ASC");
                                          while ($dataRemarks = mysql_fetch_array($resultRemarks)) {
                                            echo "<option value='$dataRemarks[remarks]'> $dataRemarks[remarks] </option>";
                                          }
                                          ?>
                                          <option value="Others">Others</option>
                                        </select>
                                        <!-- <button type="button" class="btn btn-sm btn-primary add-more" title="Add more"><i class="fas fa-plus-square" style="margin: 5px;"></i></button> -->
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12" id="for-others" style="display: none;">
                                    <div class="form-group">
                                      <label>Others</label>
                                      <input type="text" class="form-control" name="Others" placeholder="Others...">
                                    </div>
                                  </div>
                                  <input type="hidden" name="rcd_id" value="<?php echo $row['rcd_id']; ?>" class="form-control">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="updateRemarks" class="btn btn-primary" value="update"><i class="fas fa-folder-plus"></i> Remarks</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Remarks -->

                      <!-- View Remakrs -->
                      <div class="modal fade" id="viewremarks<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[View Remarks]</b> Post-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-warning" style="padding: 10px; border-radius: 5px">
                                  <div>
                                    <h4>Remarks Details:</h4>
                                    <ol>
                                      <?php
                                      $ViewRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Post-Clearance' AND pre_rev_type='import' ORDER BY id DESC");
                                      if (mysql_num_rows($ViewRemarksTB) > 0) {
                                        while ($GetDataViewRemarksTB = mysql_fetch_array($ViewRemarksTB)) {
                                      ?>
                                          <li><?= $GetDataViewRemarksTB['pre_rev_remark']; ?></li>
                                        <?php } ?>
                                      <?php } else { ?>
                                        <li>No Data</li>
                                      <?php } ?>
                                    </ol>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End View Remarks -->

                      <!-- Add Aju -->
                      <div class="modal fade" id="edit<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit AJU]</b> Post-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12" style="margin-top: -25px;margin-bottom: 10px;">
                                    <div class="row" style="background: linear-gradient(45deg, #002765, #0b429b, #002765);border-radius: 5px;color: #fff;">
                                      <div class="col-md-6">
                                        <div style="display: grid;padding: 10px;">
                                          <font style="font-weight: 500;">PRE ID: <b><?= $row['pre_id']; ?></b></font>
                                          <font style="font-weight: 500;">RCD ID: <b><?= $row['rcd_id']; ?></b></font>
                                          <font style="font-weight: 500;">KN REF/TN: <b><?= $get1['rcd_ref']; ?></b></font>
                                          <font style="font-weight: 500;">HBL: <b><?= $get1['rcd_hbl']; ?></b></font>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div style="display: grid;padding: 10px;">
                                          <font style="font-weight: 500;">Receive CIPL:
                                            <?php if ($row['pre_rcvd_cipl'] == NULL || $row['pre_rcvd_cipl'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_rcvd_cipl'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                          <font style="font-weight: 500;">Send PIB Draft:
                                            <?php if ($row['pre_send_pib_draft'] == NULL || $row['pre_send_pib_draft'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_send_pib_draft'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                          <font style="font-weight: 500;">Receive PIB Revision:
                                            <?php if ($row['pre_rcvd_pib_rev'] == NULL || $row['pre_rcvd_pib_rev'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_rcvd_pib_rev'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                          <font style="font-weight: 500;">Send PIB Revision:
                                            <?php if ($row['pre_send_pib'] == NULL || $row['pre_send_pib'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_send_pib'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                          <font style="font-weight: 500;">Receive DOC Completed:
                                            <?php if ($row['pre_rcvd_complete'] == NULL || $row['pre_rcvd_complete'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_rcvd_complete'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                          <font style="font-weight: 500;">PIB Confirmation:
                                            <?php if ($row['pre_create_pib'] == NULL || $row['pre_create_pib'] == '0000-00-00') { ?>
                                              <b>-</b>
                                            <?php } else { ?>
                                              <b><?= date_indo($row['pre_create_pib'], TRUE); ?></b>
                                            <?php } ?>
                                          </font>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <?php
                                      mysql_connect('localhost', 'root', '');
                                      mysql_select_db('contta');
                                      $aju = mysql_query("SELECT rcd_aju FROM tb_master_impor WHERE rcd_id = '$row[rcd_id]' ");
                                      $getaju = mysql_fetch_array($aju);
                                      ?>
                                      <label>No. AJU</label>
                                      <input name="aju" class="form-control" placeholder="No. AJU ..." value="<?php echo $getaju['rcd_aju'] ?>">
                                    </div>
                                    <!-- <div class="form-group"> -->
                                    <!-- <label>Remarks</label> -->
                                    <!-- <textarea name="remark1" class="form-control" placeholder="Remarks ..."><?php echo $row['pre_rev_remark'] ?></textarea> -->
                                    <input type="hidden" name="rcd_id" value="<?php echo $row['rcd_id']; ?>" class="form-control">
                                    <!-- </div> -->
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="update" class="btn btn-primary" value="update"><i class="fas fa-pencil"></i> AJU</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Add Aju -->

                      <!-- Complete -->
                      <div class="modal fade" id="confirm<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Complete]</b> Post-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-info">
                                  <div style="display: flex;align-items: center;">
                                    <div>
                                      <i class="fa fa-info-circle" style="font-size: 35px;"></i>
                                    </div>
                                    <div style="display: grid;margin-left: 5px;">
                                      <font style="font-weight: 800;">This record couldn't be completed.</font>
                                      <font style="font-weight: 800;">Please check the mandatory file and ensure the file was submitted!</font>
                                      <input type="hidden" name="rcdid" class="form-control" value="<?php echo $row['rcd_id']; ?>">
                                      <input type="hidden" name="user_name" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <?php if ($row['post_invoice_vendor_file'] == "" or $row['post_customer_invoice_file'] == "") { ?>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> No</button>
                                  <button type="submit" name="" class="btn btn-primary" disabled><i class="far fa-check-circle"></i> Yes</button>
                                <?php } else { ?>
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> No</button>
                                  <button type="submit" name="complete" class="btn btn-primary"><i class="far fa-check-circle"></i> Yes</button>
                                <?php } ?>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Complete -->
                  <?php }
                  } else {
                    echo "<tr>";
                    echo "<td colspan='8' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                    echo "</tr>";
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
</div>
<?php
include 'include/jquery.php';
include 'include/alert.php';
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".add-more").click(function() {
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });

    // saat tombol remove dklik control group akan dihapus 
    $("body").on("click", ".remove", function() {
      $(this).parents(".control-group").remove();
    });
  });

  $(function() {
    $("#IdRemarks").change(function() {
      if ($(this).val() == "Others") {
        $("#for-others").show();
      } else {
        $("#for-others").hide();
      }
    });
  });

  // Input - Add
  if (window?.location?.href?.indexOf('InputSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data saved successfully!',
    })
    history.replaceState({}, '', './import_sea_post.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_post.php');
  }
  // End Input - Add
</script>