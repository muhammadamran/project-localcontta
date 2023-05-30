<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

if(isset($_POST['delete']))
{

  $rcd_id       = $_POST['uid'];
  $user_name    = $_POST['user_name'];
  $date_now     = date('Y-m-d H:i:s');

  if($rcd_id) {
    $query = mysql_query("DELETE FROM tb_master_impor WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("DELETE FROM tb_imp_pre WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("DELETE FROM tb_imp_clear WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("DELETE FROM tb_imp_post WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("DELETE FROM tb_record_miles_import WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("DELETE FROM tb_truck_assign WHERE rcd_id = '$rcd_id' ");
    $query .= mysql_query("INSERT into tb_log values(' ','$user_name','delete-main-record','$date_now','$rcd_id')");
    if($query){
      header("Location: ./iou_adm_record.php?DeleteSuccess=true");                                            
     } else {
      header("Location: ./iou_adm_record.php?DeleteFailed=true");                              
    }
  } else {
    echo "Operation Failed! Please contact your administrator".mysql_error();
  }
}

// FUNCTION SEARCHING
$findREF = '';
$findAJU = '';
if(isset($_GET['findone']))
{
  $findREF = $_GET['findREF'];
  $findAJU = $_GET['findAJU'];
}

$startdate = '';
$enddate = '';
if(isset($_GET['findtwo']))
{
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];
}

?>
<?php include 'include/head.php';?>
<div id="wrapper">
  <?php include 'include/header.php';?>
  <div id="page-wrapper">
    <!-- Page -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          <i class="fa fa-atlas icon-title"></i> Administration
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Record Management</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <!-- Search -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fas fa-filter"></i> Filter Data - by
            <select type="text" id="findby" style="background: transparent;border-color: transparent;">
              <option value="opone">No. REF,No. AJU</option>
              <option value="optwo">Date Range</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="iou_adm_record.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>No. REF </label>
                      <?php if ($findREF == '') { ?>
                        <input type="text" name="findREF" id="idfindREF" class="form-control" placeholder="No. REF...">
                      <?php } else { ?>
                        <input type="text" name="findREF" id="idfindREF" class="form-control" placeholder="No. REF..." value="<?= $findREF; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>No. AJU </label>
                      <?php if ($findAJU == '') { ?>
                        <input type="text" name="findAJU" id="idfindAJU" class="form-control" placeholder="No. AJU...">
                      <?php } else { ?>
                        <input type="text" name="findAJU" id="idfindAJU" class="form-control" placeholder="No. AJU..." value="<?= $findAJU; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="iou_adm_record.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              <form method="get" action="iou_adm_record.php" id="fformtwo" style="display: none;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date</label>
                      <?php if ($startdate == '') { ?>
                        <input type="date" name="startdate" class="form-control">
                      <?php } else { ?>
                        <input type="date" name="startdate" class="form-control" value="<?= $startdate ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Date</label>
                      <?php if ($enddate == '') { ?>
                        <input type="date" name="enddate" class="form-control">
                      <?php } else { ?>
                        <input type="date" name="enddate" class="form-control" value="<?= $enddate ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="iou_adm_record.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findtwo" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Search -->
    <style type="text/css">
      thead {
          background: #55b8f2;
          color: white;
          font-size: 14px;
      }
      table.dataTable tbody th, table.dataTable tbody td {
          padding: 10px 40px;
      }
      tbody {
          font-size: 12px;
      }
    </style>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Record Management List
          </div>
          <div class="panel-body">
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_master_impor");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
                <div class="alert-info">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                  <strong>Information!</strong> Total Record Management on Localcontta: <b><?= $cont_c['total'] ?> Record Management</b>.
                  <p style="margin-bottom: 0px;">Record Management List on tables only shows the last 50 data, search Record Management' names if you can't find them in the table.</p>
                </div>
            </div>
            <div class="table-responsive">
              <table class="display hover" id="RecordManagement">
                <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <!-- <th style="text-align: center;">ID, REF, AJU & INV</th> -->
                    <th style="text-align: center;">Number</th>
                    <!-- <th style="text-align: center;">REF</th> -->
                    <!-- <th style="text-align: center;">No. AJU</th> -->
                    <!-- <th style="text-align: center;" class="no-sort">No. INV</th> -->
                    <th style="text-align: center;">S & C</th>
                    <!-- <th style="text-align: center;">Consignee</th> -->
                    <th style="text-align: center;">Type</th>
                    <!-- <th style="text-align: center;">HBL</th> -->
                    <th style="text-align: center;">Created</th>
                    <th class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                  <!-- <tr>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Month</th>
                    <th style="text-align: center;">Year</th>
                    <th style="text-align: center;">By</th>
                  </tr> -->
                </thead>
                <tbody>
                  <?php
                  $con=mysqli_connect("localhost","root","","contta");
                  if (mysqli_connect_errno())
                  {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  if(isset($_GET['findone']))
                  {
                    $findREF = $_GET['findREF'];
                    $findAJU = $_GET['findAJU'];
                    $result = mysqli_query($con,"SELECT * FROM tb_master_impor WHERE rcd_ref LIKE '%$findREF%' AND rcd_aju LIKE '%$findAJU%'");       
                  } else if(isset($_GET['findtwo'])) {
                    $startdate = $_GET['startdate'];
                    $enddate = $_GET['enddate'];
                    $result = mysqli_query($con,"SELECT * FROM tb_master_impor WHERE rcd_create_date BETWEEN '$startdate' AND '$enddate'");  
                  } else {
                    $result = mysqli_query($con,"SELECT * FROM tb_master_impor ORDER BY rcd_id DESC LIMIT 50");   
                  }
                  if(mysqli_num_rows($result)>0){
                    $no=0;
                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td style='text-align: center;'>" . $no . ".</td>";
                      echo "<td>
                           <div style='width:300px'>
                           <font style='font-weight:600'>ID:</font> " . $row['rcd_id'] . "
                           <br> 
                           <font style='font-weight:600'>REF:</font> " . $row['rcd_ref'] . "
                           <br> 
                           <font style='font-weight:600'>AJU:</font> " . $row['rcd_aju'] . "
                           <br> 
                           <font style='font-weight:600'>INV:</font> " . $row['rcd_inv_no'] . "
                           <br> 
                           <font style='font-weight:600'>HBL:</font> " . $row['rcd_hbl'] . "
                           </div>
                           </td>";
                      // echo "<td>" . $row['rcd_ref'] . "</td>";   
                      // echo "<td>" . $row['rcd_aju'] . "</td>";   
                      // echo "<td>" . $row['rcd_inv_no'] . "</td>";   
                      echo "<td>
                            <div style='width:300px'>
                              <font style='font-weight:600'>Shipper:</font> " . $row['rcd_shipper'] . "
                              <br>
                              <font style='font-weight:600'>Consignee:</font> " . $row['rcd_cnee'] . "
                            </div>
                            </td>";   
                      // echo "<td><div style='width:255px'>" . $row['rcd_cnee'] . "</div></td>";   
                      echo "<td>" . $row['rcd_type'] . "</td>";   
                      // echo "<td><div style='width:120px'>" . $row['rcd_hbl'] . "</div></td>";   
                      echo "<td>
                            <div style='width:180px'>
                            <font style='font-weight:600'>Datetime:</font> " . $row['rcd_create_date'] . "
                            <br>
                            <font style='font-weight:600'>Month:</font> " . $row['rcd_create_month'] . "
                            <br>
                            <font style='font-weight:600'>Year:</font> " . $row['rcd_create_year'] . "
                            <br>
                            <font style='font-weight:600'>By:</font> " . $row['rcd_create_by'] . "
                            </div>
                            </td>";   
                      // echo "<td>" . $row['rcd_create_month'] . "</td>";   
                      // echo "<td>" . $row['rcd_create_year'] . "</td>";   
                      // echo "<td>" . $row['rcd_create_by'] . "</td>";
                      echo "<td style='text-align: center;'>
                              <a href='#' data-toggle='modal' data-target='#delete$row[rcd_id]' title='Delete'>
                              <span class='btn btn-sm btn-danger'>
                              <i class='fa fa-trash'></i>
                              </span>
                              </a>
                            </td>";
                      echo "</tr>";
                      ?>
                      <!-- Delete -->
                      <div class="modal fade" id="delete<?= $row['rcd_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Delete]</b> Record Management</h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                      <label>Are you sure delete this Record Management?</label>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label><u>Number:</u></label>
                                      <ul>
                                        <li>ID: <?= $row['rcd_id'] ?> </li>
                                        <li>REF: <?= $row['rcd_ref'] ?> </li>
                                        <li>AJU: <?= $row['rcd_aju'] ?> </li>
                                        <li>INV: <?= $row['rcd_inv_no'] ?> </li>
                                        <li>HBL: <?= $row['rcd_hbl'] ?> </li>
                                      </ul>
                                      <input type="hidden" name="uid" class="form-control" value="<?= $row['rcd_id'];?>" required>
                                      <input type="hidden" name="user_name" class="form-control" value="<?= $_SESSION['username'];?>" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label><u>S & C:</u></label>
                                      <ul>
                                        <li>Shipper: <?= $row['rcd_shipper'] ?></li>
                                        <li>Consignee: <?= $row['rcd_cnee'] ?></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <label>Type: <?= $row['rcd_type'] ?></label>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="delete" class="btn btn-danger"> Yes</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"> No</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Delete -->
                    <?php }
                  } else {
                    echo "<tr>";
                    echo "<td colspan='6' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                    echo "</tr>";
                  }  mysqli_close($con); 
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
?>
<!-- Record Management -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('CaddSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }

    if (window?.location?.href?.indexOf('CaddFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }

    if (window?.location?.href?.indexOf('CaddReady') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Record Management Name already registered, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('CUpdateSuccessCC') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data updated successfully!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }

    if (window?.location?.href?.indexOf('CUpdateFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to updated, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }

    if (window?.location?.href?.indexOf('CUpdateReady') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Record Management Name already registered, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data delete successfully!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data failed to delete, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_record.php');
    }
    // End Delete
</script>
<!-- Search -->
<script type="text/javascript">
  $(function() {
    $("#findby").change(function() {
      if ($(this).val() == "opone") {
        $("#fformone").show();
        $("#fformtwo").hide();
      } else if ($(this).val() == "optwo") {
        $("#fformtwo").show();
        $("#fformone").hide();
      } else {
        $("#fformone").hide();
        $("#fformtwo").hide();
      }
    });
  });
</script>
<!-- End Search -->