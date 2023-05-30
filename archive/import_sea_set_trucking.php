<script src="assets/js/jquery.min.js"></script>
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
    header("Location: ./import_sea_set_trucking.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_set_trucking.php?InputFailed=true");
  }
}

if (isset($_POST["settruck"])) {

  $vendor         = $_POST['vendor'];
  $addressto      = $_POST['addressto'];
  $rcd_id         = $_POST['rcd_id'];
  $track_id       = $_POST['track_id'];
  $user_name      = $_POST['user_name'];
  $mot            = $_POST['mot'];
  $datenow        = date('Y-m-d');


  $query = mysql_query("UPDATE tb_truck_assign SET assign_by='$user_name',assign_date='$datenow',assign_vendor='$vendor',assign_remark='$addressto', mot = '$mot' where truck_job_id = '$track_id' AND rcd_id='$rcd_id'");
  // var_dump($query);
  // exit;

  if ($query) {
    header("Location: ./import_sea_set_trucking.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_set_trucking.php?InputFailed=true");
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_record_miles_import SET clear ='$datenow',action_by_2='$user_name' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_set_trucking.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_set_trucking.php?InputFailed=true");
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
      header("Location: ./import_sea_set_trucking.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_set_trucking.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_set_trucking.php?InputFailed=true");
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
            <li class="breadcrumb-item active" aria-current="page">Set Trucking</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Set Trucking
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="display hover" id="users">
                <thead>
                  <tr>
                    <th rowspan="2" class="no-sort" style="text-align: center;">#</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Number</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">S & C</th>
                    <th colspan="5" class="no-sort" style="text-align: center;">Details</th>
                    <th colspan="3" class="no-sort" style="text-align: center;">Total</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">ETA</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">COO</th>
                    <th rowspan="2" class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                  <tr>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">MOT</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Invoice<font style="color: transparent;">.</font>NBR</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">20'</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">40'</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Party</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Total<font style="color: transparent;">.</font>Package<font style="color: transparent;">.</font>LCL</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Total<font style="color: transparent;">.</font>Weight</font>
                    </th>
                    <th class="no-sort" style="text-align: center;">
                      <font style="font-size: 12px;">Total<font style="color: transparent;">.</font>CBM</font>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "contta");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $result = mysqli_query($con, "SELECT * FROM tb_imp_clear INNER JOIN tb_truck_assign ON tb_imp_clear.rcd_id=tb_truck_assign.rcd_id WHERE tb_imp_clear.cle_billing != '0000-00-00' AND tb_truck_assign.assign_vendor =''");
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;
                      echo "<tr>";
                      $get_data = mysql_query("SELECT * FROM tb_master_impor WHERE rcd_id = '$row[rcd_id]'");
                      $row2 = mysql_fetch_array($get_data);
                      echo "<td>" . $no . "</td>";

                      // echo "<td>" . $row2['rcd_id'] . "</td>";
                      // echo "<td>" . $row2['rcd_hbl'] . "</td>";
                      // echo "<td>" . $row2['rcd_aju'] . "</td>";
                      // echo "<td>" . $row2['rcd_ref'] . "</td>";
                      // echo "<td>" . $row2['rcd_shipper'] . "</td>";
                      // echo "<td>" . $row2['rcd_cnee'] . "</td>";
                      // echo "<td>" . $row2['rcd_mot'] . "</td>";
                      // echo "<td>" . $row2['rcd_inv_no'] . "</td>";
                      // echo "<td>" . $row2['rcd_20_type'] . "</td>";
                      // echo "<td>" . $row2['rcd_40_type'] . "</td>";
                      // echo "<td>" . $row2['rcd_party'] . "</td>";
                      // echo "<td>" . $row2['rcd_package'] . "</td>";
                      // echo "<td>" . $row2['rcd_weight'] . "</td>";
                      // echo "<td>" . $row2['rcd_cbm'] . "</td>";
                      // echo "<td>" . $row2['rcd_eta'] . "</td>";
                      // echo "<td>" . $row2['rcd_coo'] . "</td>";

                      echo "<td>
                      <div style='width:300px'>
                      <font style='font-weight:600'>RCD ID:</font> " . $row2['rcd_id'] . "
                      <br>
                      <font style='font-weight:600'>REF:</font> " . $row2['rcd_ref'] . "
                      <br>
                      <font style='font-weight:600'>AJU:</font> " . $row2['rcd_aju'] . "
                      <br>
                      <font style='font-weight:600'>HBL:</font> " . $row2['rcd_hbl'] . "
                      </div>
                      </td>";

                      echo "<td>
                      <div style='width:300px'>
                      <font style='font-weight:600'>Shipper:</font> " . $row2['rcd_shipper'] . "
                      <br>
                      <font style='font-weight:600'>Consignee:</font> " . $row2['rcd_cnee'] . "
                      </div>
                      </td>";

                      // echo "<td>" . $row2['rcd_mot'] . "</td>";
                      if ($row2['rcd_mot'] == 'AIR') {
                        echo "<td><i class='fas fa-plane-departure'></i> " . $row2['rcd_mot'] . "</td>";
                      } else {
                        echo "<td><i class='fas fa-ship'></i> " . $row2['rcd_mot'] . "</td>";
                      }
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#viewinv$row[rcd_id]' title='View Invoice this record'><span class='btn btn-primary'><i class='fa fa-eye'></i></span></a>
                      </td>";
                      // echo "<td>" . $row2['rcd_inv_no'] . "</td>";
                      echo "<td>" . $row2['rcd_20_type'] . "</td>";
                      echo "<td>" . $row2['rcd_40_type'] . "</td>";
                      echo "<td>" . $row2['rcd_party'] . "</td>";
                      echo "<td>" . $row2['rcd_package'] . "</td>";
                      echo "<td>" . $row2['rcd_weight'] . "</td>";
                      echo "<td>" . $row2['rcd_cbm'] . "</td>";
                      echo "<td>" . $row2['rcd_eta'] . "</td>";
                      echo "<td>" . $row2['rcd_coo'] . "</td>";

                      echo "<td style='text-align: center;'>
                        <a href='#' data-toggle='modal' data-target='#edit$row[rcd_id]' title='Edit this record'><span class='label label-primary'>Set Trucker</span></a>
                        </td>";
                      echo "</tr>";
                  ?>
                      <div class="modal fade" id="viewinv<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[View Invoice Number]</b> Set Trucker</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <textarea name="" class="form-control"><?= $row2['rcd_inv_no'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="edit<?php echo $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[RecordMaster] </b> Set Trucker</h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Address Destination</label>
                                      <input type="text" name="addressto" class="form-control" value="<?php echo $row['assign_remark']; ?>" required>
                                      <input type="hidden" name="track_id" class="form-control" value="<?php echo $row['truck_job_id']; ?>" required>
                                      <input type="hidden" name="rcd_id" class="form-control" value="<?php echo $row['rcd_id']; ?>" required>
                                      <input type="hidden" name="mot" class="form-control" value="<?php echo $row2['rcd_mot']; ?>" required>
                                      <input type="hidden" name="user_name" class="form-control" value="<?php echo $_SESSION['username']; ?>" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Trucker/Vendor</label>
                                      <select class="form-control" name="vendor" id="vendor">
                                        <option value=" ">--- SELECT ---</option>
                                        <?php
                                        $result1 = mysql_query("SELECT * FROM tb_trucker");
                                        while ($data = mysql_fetch_array($result1)) {
                                          echo "<option value='$data[trucker_name]'> $data[trucker_name] </option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                  <button type="submit" name="settruck" value="settruck" class="btn btn-primary"><i class="fas fa-truck"></i> Set Trucker</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

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
</div>
<?php
include 'include/jquery.php';
include 'include/alert.php';
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript">
  // Input - Add
  if (window?.location?.href?.indexOf('InputSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data saved successfully!',
    })
    history.replaceState({}, '', './import_sea_set_trucking.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_set_trucking.php');
  }
  // End Input - Add
</script>