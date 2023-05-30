<script src="assets/js/jquery.min.js"></script>
<style type="text/css">
  #for-form {
    margin-bottom: 0px;
  }
</style>
<?php
include "include/db.php";
include "include/restrict.php";
include "include/datatables.php";

if (isset($_POST["update"])) {

  $rcd_id                 = $_POST['rcd_id'];
  $remark1                = $_POST['remark1'];
  $aju                    = $_POST['aju'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_rev_remark='$remark1' WHERE rcd_id='$rcd_id'");
  $query .= mysql_query("UPDATE tb_master_impor SET rcd_aju='$aju' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
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
      pre_rev_status    = 'Pre-Clearance',
      pre_rev_type      = 'import'
  ");

  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

// if (isset($_POST["updateRemarks"])) {

//   $rcd_id                 = $_POST['rcd_id'];
//   $name                   = $_POST['name'];
//   $InputRemarks           = $_POST['EditInputRemarks'];
//   $Others                 = $_POST['Others'];

//   $total = count($InputRemarks);

//   for ($i = 0; $i < $total; $i++) {

//     $query = mysql_query("INSERT INTO tb_imp_remarks SET
//         rcd_id            = '$rcd_id',
//         pre_rev_remark    = '$InputRemarks[$i]',
//         pre_rev_others    = '$Others'
//     ");

//     var_dump($query);
//     exit;

//     if ($query) {
//       header("Location: ./import_sea_pre.php?InputSuccess=true");
//     } else {
//       header("Location: ./import_sea_pre.php?InputFailed=true");
//     }
//   }
// }

// if (isset($_POST['updateRemarks'])) {
//   // Counting No fo skilss
//   $rcd_id      = $_POST['rcd_id'];
//   $count       = count($_POST["EditInputRemarks"]);
//   $Others      = $_POST['Others'];

//   //Getting post values
//   $EditInputRemarks = $_POST["EditInputRemarks"];

//   if ($count > 1) {
//     for ($i = 0; $i < $count; $i++) {
//       if (trim($_POST["EditInputRemarks"][$i] != '')) {
//         $sql = mysql_query("INSERT INTO tb_imp_remarks (id,rcd_id,pre_rev_remark,pre_rev_others) VALUES('','$rcd_id','$EditInputRemarks[$i]','$Others')");
//       }
//     }

//     $ss = $EditInputRemarks[$i];

//     var_dump($ss);
//     exit;

//     header("Location: ./import_sea_pre.php?InputSuccess=true");
//   } else {
//     header("Location: ./import_sea_pre.php?InputFailed=true");
//   }
// }

if (isset($_POST["pre_rcvd_cipl"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_rcvd_cipl ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pre_send_pib_draft"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_send_pib_draft ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pre_rcvd_pib_rev"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_rcvd_pib_rev ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pre_create_pib"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_create_pib ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pre_send_pib"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_send_pib ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pre_rcvd_complete"])) {

  $datenow          = date('Y-m-d');
  $rcd_id           = $_POST['rcd_id'];

  $query = mysql_query("UPDATE tb_imp_pre SET pre_rcvd_complete ='$datenow' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_record_miles_import SET pre ='$datenow',action_by='$user_name' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_pre.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["pib"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/pib/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_imp_pre SET pib_file ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./import_sea_pre.php?InputSuccess=true");
    } else {
      echo "Updated Failed - Please contact your administrator" . mysql_error();
    }
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST["npe"])) {
  $rid                = $_POST['rid'];

  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/npe/';
  $uploadfile = $uploaddir . '_' . $rid . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_record_ship_cus SET npe_file ='$uploadfile' WHERE rcd_id='$rid'")) {
      header("Location: ./ship_cus.php");
    } else {
      header("Location: ./import_sea_pre.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_pre.php?InputFailed=true");
  }
}

if (isset($_POST['submit'])) {
  $nameArr = $_POST['name'];
  if (!empty($nameArr)) {
    for ($i = 0; $i < count($nameArr); $i++) {
      if (!empty($nameArr[$i])) {
        $name = $nameArr[$i];

        // Database insert query goes here
      }
    }
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
            <li class="breadcrumb-item active" aria-current="page">Pre-Clearance</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Pre-Clearance
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="display hover" id="users">
                <thead>
                  <tr>
                    <th rowspan="2" class="no-sort" style="text-align: center;">#</th>
                    <th rowspan="2" style="text-align: center;">Number</th>
                    <th colspan="6" style="text-align: center;">Progress</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">File PIB</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Remarks</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                  <tr>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Receive<font style="color: transparent;">.</font>CIPL</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Send<font style="color: transparent;">.</font>PIB<font style="color: transparent;">.</font>Draft</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Receive<font style="color: transparent;">.</font>PIB<font style="color: transparent;">.</font>Revision</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Send<font style="color: transparent;">.</font>PIB<font style="color: transparent;">.</font>Revision</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Receive<font style="color: transparent;">.</font>DOC<font style="color: transparent;">.</font>Completed</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">PIB<font style="color: transparent;">.</font>Confirmation</font>
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
                   INNER JOIN tb_imp_pre ON tb_record_miles_import.rcd_id=tb_imp_pre.rcd_id 
                   WHERE tb_record_miles_import.pre = '0' 
                   AND tb_record_miles_import.mot != 'AIR' ORDER BY tb_imp_pre.rcd_id DESC");
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;

                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      $get_data = mysql_query("SELECT rcd_aju,rcd_ref,rcd_cnee,rcd_hbl FROM tb_master_impor WHERE rcd_id = '$row[rcd_id]'");
                      $get1 = mysql_fetch_array($get_data);
                      echo "<td>
                      <div style='width:300px'>
                      <font style='font-weight:600'>PRE ID:</font> " . $row['pre_id'] . "
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

                      if ($row['pre_rcvd_cipl'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_rcvd_cipl' value='pre_rcvd_cipl' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_rcvd_cipl'] . "</button></td>";
                      }

                      if ($row['pre_send_pib_draft'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_send_pib_draft' value='pre_send_pib_draft' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_send_pib_draft'] . "</button></td>";
                      }

                      if ($row['pre_rcvd_pib_rev'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_rcvd_pib_rev' value='pre_rcvd_pib_rev' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_rcvd_pib_rev'] . "</button></td>";
                      }

                      if ($row['pre_send_pib'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_send_pib' value='pre_send_pib' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_send_pib'] . "</button></td>";
                      }

                      if ($row['pre_rcvd_complete'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_rcvd_complete' value='pre_rcvd_complete' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_rcvd_complete'] . "</button></td>";
                      }

                      if ($row['pre_create_pib'] == "0000-00-00") {
                        echo "<td style='text-align: center'>" .
                          "<form method='post' action='' id='for-form'>" .
                          "<input type='hidden' value='$row[rcd_id]' name='rcd_id'>" .
                          "<button type='submit' name='pre_create_pib' value='pre_create_pib' class='btn btn-primary'><i class='fas fa-calendar-plus'></i></button>" .
                          "</form>"
                          . "</td>";
                      } else {
                        echo "<td style='text-align: center'><button class='btn btn-sm btn-success'><i class='fas fa-calendar-check'></i> " . $row['pre_create_pib'] . "</button></td>";
                      }

                      if ($row['pib_file'] == "") {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center'>" . "<a href='$row[pib_file]' class='btn btn-primary' title='File' target='_blank'><i class='fa fa-file-invoice'></i></a>" . "</td>";
                      }

                      // Desc Remarks
                      $CEKRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Pre-Clearance' AND pre_rev_type='import'");
                      $GetDataCEKRemarksTB = mysql_fetch_array($CEKRemarksTB);

                      // Count Remarks
                      $CountRemarksTB = mysql_query("SELECT COUNT(*) AS total FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Pre-Clearance' AND pre_rev_type='import'");
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

                      // echo "<td>" . $row['pre_rev_remark'] . "</td>";                     
                      echo "<td style='text-align: center;'>
                      <div style='display: flex;'>
                      <div>
                      <a href='#' data-toggle='modal' data-target='#edit$row[rcd_id]' title='edit this record'><span class='btn btn-primary'><i class='fa fa-pencil'></i> AJU</span></a>
                      </div>
                      <div style='margin-left: 5px;'>";
                      if ($row['pib_file'] == "") {
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
                              <h4 class="modal-title"><b>[Remarks]</b> Pre-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
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
                              <h4 class="modal-title"><b>[View Remarks]</b> Pre-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-warning" style="padding: 10px; border-radius: 5px">
                                  <div>
                                    <h4>Remarks Details:</h4>
                                    <ol>
                                      <?php
                                      $ViewRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[rcd_id]' AND pre_rev_status='Pre-Clearance' AND pre_rev_type='import' ORDER BY id DESC");
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

                      <!-- <div class="modal fade" id="remarks<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Remarks]</b> Pre-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
                            </div>
                            <form method="POST" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group control-group after-add-more">
                                      <label>Remarks</label>
                                      <div style="display: flex;justify-content: space-between;">
                                        <input type="text" name="name[]" value="<?php echo $row['rcd_id']; ?>">
                                        <select class="form-control" name="EditInputRemarks[]" id="IdRemarks">
                                          <option value=" ">--- SELECT ---</option>
                                          <?php
                                          mysql_connect('localhost', 'root', '');
                                          mysql_select_db('contta');
                                          $resultRemarks = mysql_query("SELECT * FROM tb_remarks ORDER BY remarks ASC");
                                          while ($dataRemarks = mysql_fetch_array($resultRemarks)) {
                                            echo "<option value='$dataRemarks[remarks]'> $dataRemarks[remarks] </option>";
                                          }
                                          ?>
                                          <option value="Others">Others</option>
                                        </select>
                                        <button type="button" class="btn btn-sm btn-primary add-more" title="Add more"><i class="fas fa-plus-square" style="margin: 5px;"></i></button>
                                      </div>
                                    </div>
                                    <div class="copy hide">
                                      <div class="form-group">
                                        <div class="control-group">
                                          <label>Remarks</label>
                                          <div style="display: flex;justify-content: space-between;">
                                            <input type="text" name="name[]" value="<?php echo $row['rcd_id']; ?>">
                                            <select class="form-control" name="EditInputRemarks[]" id="IdRemarks">
                                              <option value=" ">--- SELECT ---</option>
                                              <?php
                                              mysql_connect('localhost', 'root', '');
                                              mysql_select_db('contta');
                                              $DUAresultRemarks = mysql_query("SELECT * FROM tb_remarks ORDER BY remarks ASC");
                                              while ($DUAdataRemarks = mysql_fetch_array($DUAresultRemarks)) {
                                                echo "<option value='$DUAdataRemarks[remarks]'> $DUAdataRemarks[remarks] </option>";
                                              }
                                              ?>
                                              <option value="Others">Others</option>
                                            </select>
                                            <button type="button" class="btn btn-sm btn-danger remove" title="Remove"><i class="glyphicon glyphicon-remove" style="margin: 5px;"></i></button>
                                          </div>
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
                                  <button type="submit" name="updateRemarks" class="btn btn-primary" value="update"><i class="fa fa-list-ol"></i> Remarks</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div> -->

                      <!-- Add Aju -->
                      <div class="modal fade" id="edit<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit AJU]</b> Pre-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
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
                              <h4 class="modal-title"><b>[Complete]</b> Pre-Clearance - RCD ID - <?php echo $row['rcd_id']; ?></h4>
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
                                <?php if ($row['pib_file'] == "") { ?>
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
    history.replaceState({}, '', './import_sea_pre.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_pre.php');
  }
  // End Input - Add
</script>