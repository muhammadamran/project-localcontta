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
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_submit_coo"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_submit_coo ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_sppb"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_sppb ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_spjm"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_spjm ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_spjk"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_spjk ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_paid_duty_tax"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_paid_duty_tax ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_billing"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_billing ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["cle_trf_pib"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_clear SET cle_trf_pib ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["rcd_ata"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_master_impor SET rcd_ata ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["rcd_do_validation"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_master_impor SET rcd_do_validation ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["rcd_rcvd_do"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_master_impor SET rcd_rcvd_do ='$datenow' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["update"])) {

  $ata                = $_POST['ata'];
  $do_validation      = $_POST['do_validation'];
  $rcd_id             = $_POST['rcd_id'];
  $remark1            = $_POST['remark1'];
  $new_coo            = $_POST['new_coo'];

  $query = mysql_query("UPDATE tb_master_impor SET rcd_ata ='$ata',rcd_do_validation='$do_validation',rcd_coo ='$new_coo' where rcd_id='$rcd_id'");
  $query .= mysql_query("UPDATE tb_imp_clear SET cle_remark='$remark1' where rcd_id='$rcd_id'");
  //$query .= mysqli_query("UPDATE tb_master_impor SET rcd_coo ='$coo1' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_record_miles_import SET clear ='$datenow',action_by_2='$user_name' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["coo"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/coo/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_imp_clear SET coo ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./import_sea_clear.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_clear.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
  }
}

if (isset($_POST["sppb"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/sppb/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_imp_clear SET sppb ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./import_sea_clear.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_clear.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
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
      pre_rev_status    = 'Clearance',
      pre_rev_type      = 'import'
  ");

  if ($query) {
    header("Location: ./import_sea_clear.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_clear.php?InputFailed=true");
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
            <li class="breadcrumb-item active" aria-current="page">Clearance</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Clearance
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="display hover" id="users">
                <thead>
                  <tr>
                    <th rowspan="2" class="no-sort" style="text-align: center;">#</th>
                    <th rowspan="2" style="text-align: center;">Number</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Consignee</th>
                    <th colspan="10" style="text-align: center;">Progress</th>
                    <th colspan="2" style="text-align: center;">File</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Remarks</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                  <tr>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">DO<font style="color: transparent;">.</font>Validation</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">ATA</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Receive<font style="color: transparent;">.</font>DO</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Transfer<font style="color: transparent;">.</font>PIB</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Billing</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Paid<font style="color: transparent;">.</font>Duty<font style="color: transparent;">.</font>TAX</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">SPJK</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">SPJM</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">SPPB</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Submit<font style="color: transparent;">.</font>COO</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">COO</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">SPPB</font>
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
                                                INNER JOIN tb_imp_clear ON tb_record_miles_import.rcd_id=tb_imp_clear.rcd_id 
                                                WHERE tb_record_miles_import.clear = '0' 
                                                AND tb_record_miles_import.pre != '0' 
                                                AND tb_record_miles_import.mot != 'AIR'");
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;

                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      $get_data = mysql_query("SELECT rcd_aju,rcd_ref,rcd_coo,rcd_do_validation,rcd_ata,rcd_rcvd_do,rcd_cnee,rcd_hbl FROM tb_master_impor WHERE rcd_id = '$row[rcd_id]'");
                      $get1 = mysql_fetch_array($get_data);
                      echo "<td>
                      <div style='width:300px'>
                      <font style='font-weight:600'>PRE ID:</font> " . $row['clear_id'] . "
                      <br>
                      <font style='font-weight:600'>RCD ID:</font> " . $row['rcd_id'] . "
                      <br>
                      <font style='font-weight:600'>REF:</font> " . $get1['rcd_ref'] . "
                      <br>
                      <font style='font-weight:600'>AJU:</font> " . $get1['rcd_aju'] . "
                      <br>
                      <font style='font-weight:600'>HBL:</font> " . $get1['rcd_hbl'] . "
                      <br>
                      <font style='font-weight:600'>COO:</font> " . $get1['rcd_coo'] . "
                      </div>
                      </td>";
                      echo "<td>" . $get1['rcd_cnee'] . "</td>";
                      echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $get1['rcd_do_validation'] . "</button></td>";
                      echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $get1['rcd_ata'] . "</button></td>";

                      if ($get1['rcd_rcvd_do'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='rcd_rcvd_do' value='rcd_rcvd_do' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $get1['rcd_rcvd_do'] . "</button></td>";
                      }

                      if ($row['cle_trf_pib'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_trf_pib' value='cle_trf_pib' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_trf_pib'] . "</button></td>";
                      }

                      if ($row['cle_billing'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_billing' value='cle_billing' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_billing'] . "</button></td>";
                      }

                      if ($row['cle_paid_duty_tax'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_paid_duty_tax' value='cle_paid_duty_tax' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_paid_duty_tax'] . "</button></td>";
                      }


                      if ($row['cle_spjk'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_spjk' value='cle_spjk' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_spjk'] . "</button></td>";
                      }


                      if ($row['cle_spjm'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_spjm' value='cle_spjm' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_spjm'] . "</button></td>";
                      }

                      if ($row['cle_sppb'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_sppb' value='cle_sppb' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_sppb'] . "</button></td>";
                      }

                      if ($row['cle_submit_coo'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='cle_submit_coo' value='cle_submit_coo' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['cle_submit_coo'] . "</button></td>";
                      }

                      if ($row['coo'] == "") {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center'>" . "<a href='$row[coo]' title='File' target='_BLANK'><span class='btn btn-primary'><i class='fa fa-file-invoice'></i></span></a>" . "</td>";
                      }

                      if ($row['sppb'] == "") {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center'>" . "<a href='$row[sppb]' title='File' target='_BLANK'><span class='btn btn-primary'><i class='fa fa-file-invoice'></i></span></a>" . "</td>";
                      }

                      // echo "<td>" . $row['cle_remark'] . "</td>";

                      // Desc Remarks
                      $CEKRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Clearance' AND pre_rev_type='import'");
                      $GetDataCEKRemarksTB = mysql_fetch_array($CEKRemarksTB);

                      // Count Remarks
                      $CountRemarksTB = mysql_query("SELECT COUNT(*) AS total FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Clearance' AND pre_rev_type='import'");
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

                      // echo "<td align= ''>
                      //   <a href='#' data-toggle='modal' data-target='#edit$row[rcd_id]' title='Edit this record'><span class='label label-primary'>Update</span></a>
                      //   <a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'><span class='label label-primary'>Complete</span></a>
                      // </td>";

                      echo "<td style='text-align: center;'>
                      <div style='display: flex;'>
                      <div>
                      <a href='#' data-toggle='modal' data-target='#edit$row[rcd_id]' title='edit this record'><span class='btn btn-primary'><i class='fa fa-pencil'></i> Update</span></a>
                      </div>
                      <div style='margin-left: 5px;'>";

                      if ($row['sppb'] == "") {
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
                              <h4 class="modal-title"><b>[Remarks]</b> Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
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
                                          $resultRemarks = mysql_query("SELECT * FROM tb_remarks WHERE status='Pre-Clearance' AND type='import' ORDER BY remarks ASC");
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
                              <h4 class="modal-title"><b>[View Remarks]</b> Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-warning" style="padding: 10px; border-radius: 5px">
                                  <div>
                                    <h4>Remarks Details:</h4>
                                    <ol>
                                      <?php
                                      $ViewRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Clearance' AND pre_rev_type='import' ORDER BY id DESC");
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

                      <!-- Update -->
                      <div class="modal fade" id="edit<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Update]</b> Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>COO</label>
                                      <select name="new_coo" class="form-control" required>
                                        <?php if ($get1['rcd_coo'] == NULL) { ?>
                                          <option value="">-- SELECT --</option>
                                        <?php } else { ?>
                                          <option value="<?php echo $get1['rcd_coo']; ?>" style="background-color: yellow;"><?php echo $get1['rcd_coo']; ?></option>
                                          <option value="">-- SELECT --</option>
                                        <?php } ?>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>ATA</label>
                                      <input type="date" name="ata" class="form-control" value="<?php echo $get1['rcd_ata']; ?>" required>
                                      <input type="hidden" name="rcd_id" class="form-control" value="<?php echo $row['rcd_id']; ?>" required>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>DO VALIDATION</label>
                                      <input type="date" name="do_validation" class="form-control" value="<?php echo $get1['rcd_do_validation']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Clearance Remark</label>
                                      <textarea name="remark1" class="form-control" readonly><?php echo $row['cle_remark'] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                  <button type="submit" name="update" class="btn btn-primary" value="update"><i class="fas fa-pencil"></i> Update</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Update -->

                      <!-- Complete -->
                      <div class="modal fade" id="confirm<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Complete]</b> Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
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
                                <?php if ($row['sppb'] == "") { ?>
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
    history.replaceState({}, '', './import_sea_clear.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_clear.php');
  }
  // End Input - Add
</script>