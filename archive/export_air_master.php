<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if(isset($_POST["create"]))    
{    
  // Admin
  $cekRole =  $_POST['user_role'];
  if ($cekRole == 'admin') {
    $username             = $_POST['admin_user_name'];
    $password             = 'changeme';
    $email                = $_POST['admin_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['admin_scope'];
    $department           = $_POST['admin_dept'];
    $user_branches        = $_POST['admin_user_branches'];

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches')");
    if($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");                                           
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");                                                  
    }
  // General Manager
  } else if ($cekRole == 'gm') {
    $username             = $_POST['gm_user_name'];
    $password             = 'changeme';
    $email                = $_POST['gm_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['gm_scope'];
    $department           = $_POST['gm_dept'];
    $user_branches        = $_POST['gm_user_branches'];

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches')");
    if($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");                                                  
    }
  // Manager
  } else if ($cekRole == 'manager') {
    $username             = $_POST['manager_user_name'];
    $password             = 'changeme';
    $email                = $_POST['manager_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['manager_scope'];
    $department           = $_POST['manager_dept'];
    $user_branches        = $_POST['manager_user_branches'];

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches')");
    if($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");                                    
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");                                                  
    }
  // User
  } else if ($cekRole == 'user') {
    $username             = $_POST['user_user_name'];
    $password             = 'changeme';
    $email                = $_POST['user_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['user_scope'];
    $department           = $_POST['user_dept'];
    $user_branches        = $_POST['user_branches'];

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches')");
    if($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");                                      
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");                                                  
    }
  // Guest
  } else if ($cekRole == 'guest') {
    $username             = $_POST['guest_user_name'];
    $password             = 'changeme';
    $email                = $_POST['guest_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['guest_scope'];
    $department           = $_POST['guest_dept'];
    $user_branches        = $_POST['guest_user_branches'];

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches')");
    if($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");                                        
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");                                                  
    }
  }
}
// DELETE
if(isset($_POST["delete"]))    
{
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_user WHERE user_id='$ID'");

  if($query) {
    header("Location: ./iou_adm_user.php?DeleteSuccess=true");                                            
  } else {
    header("Location: ./iou_adm_user.php?DeleteFailed=true");                              
  }
}
// DELETE ALL
if(isset($_POST['chk_id']))
{
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $query = mysql_query("DELETE FROM tb_user WHERE user_id='$id'");
  }

  if($query) {
    header("Location: ./iou_adm_user.php?DeleteSuccess=true");                                          
  } else {
    header("Location: ./iou_adm_user.php?DeleteFailed=true");                                                  
  }
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
          <i class="fa fa-box icon-title"></i> Export - Airfreight
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Export Master</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Export - Airfreight
          </div>
          <div class="panel-body">
            <!-- Add Export - Airfreight -->
            <div class="page-add-new">
              <h4>Create New Record</h4>
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#CMasterExportAirfreight">
                <i class="fa fa-plus"></i> Create!
              </button>
            </div>
            <?php include 'modals/m_export_air_master.php';?>
            <!-- End Add Export - Airfreight -->
            <hr>
            <form action="iou_adm_user.php" method="post">
              <div class="table-responsive">
                <table class="display hover" id="users">
                  <thead>
                    <tr>
                      <th class="no-sort" style="text-align: center;">#</th>
                      <th style="text-align: center;">RCD</th>
                      <th style="text-align: center;">Number</th>
                      <th style="text-align: center;">S & C</th>
                      <th style="text-align: center;">Details</th>
                      <!-- <th style="text-align: center;">MOT</th>
                      <th style="text-align: center;">20'</th>
                      <th style="text-align: center;">40'</th>
                      <th style="text-align: center;">PARTY</th>
                      <th style="text-align: center;">TOTAL PACKAGE LCL</th>
                      <th style="text-align: center;">TOTAL WEIGHT</th>
                      <th style="text-align: center;">TOTAL CBM</th> -->
                      <!-- <th style="text-align: center;">ETA | COO</th> -->
                      <th style="text-align: center;">CIPL</th>
                      <th class="no-sort" style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","contta");
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $me = $_SESSION['username'];
                    $result = mysqli_query($con,"SELECT * FROM tb_master_export WHERE rcd_status = 'New' AND rcd_mot='AIR' ORDER BY rcd_id DESC");
                    if(mysqli_num_rows($result)>0){
                      $no=0;
                      while($row = mysqli_fetch_array($result))
                      {
                        $no++;

                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td>
                              <div style='width:300px'>
                              <font style='font-weight:600'>RCD ID:</font> " . $row['rcd_id'] . "
                              <br>
                              <font style='font-weight:600'>RCD Created:</font> " . $row['rcd_create_date'] . "
                              <br>
                              <font style='font-weight:600'>RCD By:</font> " . $row['rcd_create_by'] . "
                              </div>
                              </td>"; 
                        echo "<td>
                              <div style='width:300px'>
                              <font style='font-weight:600'>REF:</font> " . $row['rcd_ref'] . "
                              <br>
                              <font style='font-weight:600'>AJU:</font> " . $row['rcd_aju'] . "
                              <br>
                              <font style='font-weight:600'>INV:</font> " . $row['rcd_inv_no'] . "
                              <br>
                              <font style='font-weight:600'>HBL:</font> " . $row['rcd_hbl'] . "
                              </div>
                              </td>";   
                        echo "<td>
                              <div style='width:300px'>
                              <font style='font-weight:600'>Shipper:</font> " . $row['rcd_shipper'] . "
                              <br>
                              <font style='font-weight:600'>Consignee:</font> " . $row['rcd_cnee'] . "
                              </div>
                              </td>";   
                        echo "<td>
                              <div style='width:300px'>
                              <font style='font-weight:600'>MOT:</font> " . $row['rcd_mot'] . "
                              <br>
                              <font style='font-weight:600'>20':</font> " . $row['rcd_20_type'] . "
                              <br>
                              <font style='font-weight:600'>40':</font> " . $row['rcd_40_type'] . "
                              <br>
                              <font style='font-weight:600'>Party:</font> " . $row['rcd_party'] . "
                              <br>
                              <font style='font-weight:600'>Total Package LCL:</font> " . $row['rcd_package'] . "
                              <br>
                              <font style='font-weight:600'>Total Weight:</font> " . $row['rcd_weight'] . "
                              <br>
                              <font style='font-weight:600'>Total CBM:</font> " . $row['rcd_cbm'] . "
                              <hr>
                              <font style='font-weight:600'>ETA:</font> " . $row['rcd_eta'] . "
                              <br>
                              <font style='font-weight:600'>COO:</font> " . $row['rcd_coo'] . "
                              </div>
                              </td>";      
                        if ($row['cipl_file'] == '') {
                          echo "<td>" . "File Not Found" . "</td>";
                        } else {
                          echo "<td>" . "File Uploaded" . "</td>";
                        }
                        
                        echo "<td align= ''>
                        <a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'><span class='label label-primary'>Complete</span></a>
                        </td>";
                        echo "</tr>";
                        ?>
                        <!-- Delete -->
                        <div class="modal fade" id="delete<?= $row['user_id'];?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>[Delete] </b> Management User</h4>
                              </div>
                              <form method="post" action=" ">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label>Are you sure delete this user?</label>
                                    <h6>User Name : <?= $row['user_name'];?></h6>
                                    <input type="hidden" name="uid" class="form-control" value="<?= $row['user_id'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <h6>Role : <?= $row['user_role'];?></h6>
                                  </div>
                                  <div class="form-group">
                                    <h6>Scope : <?= $row['user_scope'];?></h6>
                                  </div>
                                  <div class="form-group">
                                    <h6>Department : <?= $row['user_dept'];?></h6>
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
                      echo "<td colspan='8' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
                      echo "</tr>";
                    }  mysqli_close($con); 
                    ?>
                  </tbody>
                </table>
              </div>
            </form>
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

<!-- Managemen Users -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('InputSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './iou_adm_user.php');
    }

    if (window?.location?.href?.indexOf('InputFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_user.php');
    }
    // End Input - Add
  </script>