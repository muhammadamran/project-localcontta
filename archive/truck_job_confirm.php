<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// Confrim
if(isset($_POST["confirmss"]))    
{    

$rcd_id         = $_POST['rcd_id'];
$user_name      = $_POST['user_name'];
$datenow        = date('Y-m-d');
$truck_job_id   = $_POST['truck_job_id'];
$c20            = $_POST['c20'];
$c40            = $_POST['c40'];

  $query = mysql_query("UPDATE tb_truck_assign SET order_rcvd_by='$user_name', order_rcvd_date='$datenow' where rcd_id='$rcd_id' ");

  /* START -  GET DATA FROM MASTER RECORD */
  mysql_connect('localhost','root','');
  mysql_select_db('contta'); 
  $get_master = mysql_query("SELECT * FROM tb_record_master WHERE rcd_id = '$rcd_id' ");
  $getmas = mysql_fetch_array($get_master);
  /* END - GET DATA FROM MASTER RECORD */

  if ($query) {
    $x = 1;
    $c20 = $c20;
    while($x <= $c20) {
      mysql_query("INSERT into tb_truck_job_details(cont_type,truck_job_id,rcd_id) values('20','$truck_job_id','$rcd_id')");
      $x++;
    } 
    if ($c40 != 0) {
      $z = 1;
      $c40 = $c40;
      while($z <= $c40) {
      mysql_query("INSERT into tb_truck_job_details(cont_type,truck_job_id,rcd_id) values('40','$truck_job_id','$rcd_id')");
      $z++;
      } 
      header("Location: ./truck_confirm_job.php?notif=no40"); 
    } else {
      header("Location: ./truck_confirm_job.php?notif=no40"); 
    }
  }
}


// FUNCTION SEARCHING
$findVAH = '';
$findMOTOne = '';
$findformOne = 'show';
if(isset($_GET['findone']))
{
  $findVAH = $_GET['findVAH'];
  $findMOTOne = $_GET['findMOTOne'];
  $findformOne = 'show';
}

$startdate = '';
$enddate = '';
$findformTwo = 'none';
if(isset($_GET['findtwo']))
{
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];
  $findformTwo = 'show';
  $findformOne = 'none';
}

$findAssignBy = '';
$findMOTThree = '';
$findformThree = 'none';
if(isset($_GET['findthree']))
{
  $findAssignBy = $_GET['findAssignBy'];
  $findMOTThree = $_GET['findMOTThree'];
  $findformThree = 'show';
  $findformOne = 'none';
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
          <i class="fa fa-truck-moving icon-title"></i> Trucker - Job Confirm
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trucker - Job Confirm</li>
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
              <option value="opone">Vendor, AJU / HBL</option>
              <option value="optwo">Date Range Assign</option>
              <option value="opthree">Assign By</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="truck_confirm_job.php" id="fformone" style="display: <?= $findformOne ?>;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Vendor, AJU / HBL </label>
                      <?php if ($findVAH == '') { ?>
                        <input type="text" name="findVAH" id="idfindVAH" class="form-control" placeholder="Vendor, AJU / HBL...">
                      <?php } else { ?>
                        <input type="text" name="findVAH" id="idfindVAH" class="form-control" placeholder="Vendor, AJU / HBL..." value="<?= $findVAH; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>MOT</label>
                      <select type="text" name="findMOTOne" id="idfindMOTOne" class="form-control">
                        <?php if ($findMOTOne == '') { ?>
                        <option value="">-- Select MOT --</option>
                        <?php } else { ?>
                        <option value="<?= $findMOTOne; ?>"><?= $findMOTOne; ?></option>
                        <option value="">-- Select MOT --</option>
                        <?php } ?>
                        <option value="FCL">FCL</option>
                        <option value="LCL">LCL</option>
                        <option value="AIR">AIR</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="truck_confirm_job.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              <form method="get" action="truck_confirm_job.php" id="fformtwo" style="display: <?= $findformTwo ?>;">
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
                    <a href="truck_confirm_job.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findtwo" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              <form method="get" action="truck_confirm_job.php" id="fformthree" style="display: <?= $findformThree ?>;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Assign </label>
                      <?php if ($findAssignBy == '') { ?>
                        <input type="text" name="findAssignBy" id="idfindAssignBy" class="form-control" placeholder="Assign...">
                      <?php } else { ?>
                        <input type="text" name="findAssignBy" id="idfindAssignBy" class="form-control" placeholder="Assign..." value="<?= $findAssignBy; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>MOT</label>
                      <select type="text" name="findMOTThree" id="idfindMOTThree" class="form-control">
                        <?php if ($findMOTThree == '') { ?>
                        <option value="">-- Select Type --</option>
                        <?php } else { ?>
                        <option value="<?= $findMOTThree; ?>"><?= $findMOTThree; ?></option>
                        <option value="">-- Select Type --</option>
                        <?php } ?>
                        <option value="FCL">FCL</option>
                        <option value="LCL">LCL</option>
                        <option value="AIR">AIR</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="truck_confirm_job.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findthree" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Search -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Trucker - Job Confirm List
          </div>
          <div class="panel-body">
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!=''");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
                <div class="alert-info">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                  <strong>Information!</strong> Total Trucker - Job Confirm List on Localcontta: <b><?= $cont_c['total'] ?> Trucker - Job Confirm List</b>.
                  <p style="margin-bottom: 0px;">Trucker - Job Confirm List List on tables only shows the last 50 data, search Trucker - Job Confirm List' names if you can't find them in the table.</p>
                </div>
            </div>
            <!-- Count FCL LCL AIR -->
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result_fcl = mysqli_query($con,"SELECT COUNT(*) AS total_fcl FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!='' AND mot='FCL'");
            $cont_fcl = mysqli_fetch_array($result_fcl);

            $result_lcl = mysqli_query($con,"SELECT COUNT(*) AS total_lcl FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!='' AND mot='FCL'");
            $cont_lcl = mysqli_fetch_array($result_lcl);

            $result_air = mysqli_query($con,"SELECT COUNT(*) AS total_air FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!='' AND mot='AIR'");
            $cont_air = mysqli_fetch_array($result_air);
            ?>
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="card-content">
                      <div style="display: grid;">
                        <font style="font-size: 25px;font-weight: 600;">FCL</font>
                        <font style="font-size: 16px;font-weight: 600;"><?= $cont_fcl['total_fcl'] ?> Confirm</font>
                        <div class="card_divider"></div>
                        <font style="font-size: 10px;font-weight: 300;"><?= date_indo(date('Y-m-d'), true); ?></font>
                      </div>
                      <div class="icon-bg-na">
                        <i class="fas fa-ship fa-fw detail-na" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="card-content">
                      <div style="display: grid;">
                        <font style="font-size: 25px;font-weight: 600;">LCL</font>
                        <font style="font-size: 16px;font-weight: 600;"><?= $cont_lcl['total_lcl'] ?> Confirm</font>
                        <div class="card_divider"></div>
                        <font style="font-size: 10px;font-weight: 300;"><?= date_indo(date('Y-m-d'), true); ?></font>
                      </div>
                      <div class="icon-bg-na">
                        <i class="fas fa-ship fa-fw detail-na" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="card-content">
                      <div style="display: grid;">
                        <font style="font-size: 25px;font-weight: 600;">AIR</font>
                        <font style="font-size: 16px;font-weight: 600;"><?= $cont_air['total_air'] ?> Confirm</font>
                        <div class="card_divider"></div>
                        <font style="font-size: 10px;font-weight: 300;"><?= date_indo(date('Y-m-d'), true); ?></font>
                      </div>
                      <div class="icon-bg-na">
                        <i class="fas fa-plane-departure  detail-na" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Count FCL LCL AIR -->
            <style type="text/css">
              tbody {
                  font-size: 12px;
              }
              thead {
                  background: #55b8f2;
                  color: white;
                  font-size: 14px;
              }
            </style>
            <div class="table-responsive">
              <table class="display hover" id="TruckConfirmJob">
                <thead>
                  <tr>
                    <th class="no-sort">#</th>
                    <th class="no-sort" style="text-align: center;">ID</th>
                    <th class="no-sort" style="text-align: center;">Number</th>
                    <th style="text-align: center;">Vendor</th>
                    <th class="no-sort" style="text-align: center;">Address/Dest.</th>  
                    <th class="no-sort" style="text-align: center;">Details</th>
                    <th class="no-sort" style="text-align: center;">Assign</th>
                    <th style="text-align: center;">Action</th> 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con=mysqli_connect("localhost","root","","contta");
                  if (mysqli_connect_errno())
                  {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  // $result = mysqli_query($con,"SELECT * FROM tb_cnee ORDER BY regdate DESC LIMIT 50");
                  if(isset($_GET['findone']))
                  {
                    $findVAH = $_GET['findVAH'];
                    $findMOTOne = $_GET['findMOTOne'];
                    $result = mysqli_query($con,"SELECT * FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_vendor LIKE '%$findVAH%' AND assign_by!=''");       
                  } else if(isset($_GET['findtwo'])) {
                    $startdate = $_GET['startdate'];
                    $enddate = $_GET['enddate'];
                    $result = mysqli_query($con,"SELECT * FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!='' AND assign_date BETWEEN '$startdate' AND '$enddate'");  
                  } else if(isset($_GET['findthree'])) {
                    $findAssignBy = $_GET['findAssignBy'];
                    $findMOTThree = $_GET['findMOTThree'];
                    $result = mysqli_query($con,"SELECT * FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by LIKE '%$findAssignBy%' AND mot LIKE '%$findMOTThree%'");  
                  } else {
                    $result = mysqli_query($con,"SELECT * FROM tb_truck_assign WHERE order_rcvd_by='' AND assign_by!='' ORDER BY rcd_id DESC LIMIT 50");   
                  }
                  if(mysqli_num_rows($result)>0){
                    $no=0;
                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";

                      $role = mysqli_query($con,"SELECT * FROM tb_master_impor WHERE rcd_id='$row[rcd_id]' AND rcd_aju LIKE '%$findVAH%' AND rcd_hbl LIKE '%$findVAH%'");
                      $inv = mysqli_fetch_array($role);

                      echo "<td>" . $no . ".</td>";
                      echo "<td>
                           <font><b>RCD ID: </b>" . $row['rcd_id'] . "</font>
                           <br>
                           <font><b>TRUCK JOB ID: </b>" . $row['truck_job_id'] . "</font>
                           </td>";
                      echo "<td>
                           <font><b>AJU: </b>" . $inv['rcd_aju'] . "</font>
                           <br>
                           <font><b>HBL: </b>" . $inv['rcd_hbl'] . "</font>
                           </td>";
                      echo "<td>" . $row['assign_vendor'] . "</td>";
                      echo "<td style='text-align: center'>
                            <a href='#' data-toggle='modal' data-target='#address$row[rcd_id]' title='Address/Destination'>
                              <span class='for-address-truck'><i class='fas fa-map-marked-alt a-for-address'></i></span>
                            </a>
                           </td>"; 
                      echo "<td>
                           <font><b>MOT: </b>" . $inv['rcd_mot'] . "</font>
                           <br>
                           <font><b>Party: </b>" . $inv['rcd_party'] . "</font>
                           <br>
                           <font><b>CBM: </b>" . $inv['rcd_cbm'] . "</font>
                           <br>
                           <font><b>Package: </b>" . $inv['rcd_package'] . "</font>
                           <br>
                           <font><b>Weight: </b>" . $inv['rcd_weight'] . "</font>
                           </td>";
                      echo "<td>
                           <font><b>Date: </b>" . $row['assign_date'] . "</font>
                           <br>
                           <font><b>By: </b>" . $row['assign_by'] . "</font>
                           </td>";
                      echo "<td style='text-align: center'>
                        <a href='#' data-toggle='modal' data-target='#update$row[rcd_id]' title='Update Record'><span class='btn btn-sm btn-warning'><i class='fas fa-pencil'></i></span></a>
                        <a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Confirm Record'><span class='btn btn-sm btn-success'><i class='fas fa-check-circle'></i></span></a>
                        <a href='#' data-toggle='modal' data-target='#reject$row[rcd_id]' title='Reject Record'><span class='btn btn-sm btn-danger'><i class='fas fa-ban'></i></span></a>
                        </td>";
                      echo "</tr>";
                      ?>
                      <!-- Address -->
                      <div class="modal fade" id="address<?= $row['rcd_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Address]</b> Trucker - Job Confirm List</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Address/Destination</label>
                                    <textarea type="text" name="caddress" class="form-control"><?= $row['assign_remark'] ?></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Address -->
                      <!-- Confirm -->
                      <div class="modal fade" id="confirm<?= $row['rcd_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Confirm]</b> Trucker - Job Confirm List</h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -20px;margin-bottom: -12px;">
                                      <div class="form-group">
                                        <label>Are you sure to confirm this record?</label>                                    
                                        <input type="hidden" name="truck_job_id" class="form-control" value="<?= $row['truck_job_id'];?>">
                                        <input type="hidden" name="rcd_id" class="form-control" value="<?= $row['rcd_id'];?>">
                                        <input type="hidden" name="user_name" class="form-control" value="<?= $_SESSION['username'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <p>Required Container :</p> 
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>20' :</label>                                    
                                        <input type="text" name="c20" class="form-control" value="<?= $inv['rcd_20_type'];?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>40' :</label>                                    
                                        <input type="text" name="c40" class="form-control" value="<?= $inv['rcd_40_type'];?>" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="confirm" value="confirm" class="btn btn-success"> Yes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Confirm -->
                      <!-- Reject -->
                      <div class="modal fade" id="reject<?= $row['rcd_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Reject]</b> Trucker - Job Confirm List</h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -20px;margin-bottom: -12px;">
                                      <div class="form-group">
                                        <label>Are you sure to reject this record?</label>                                    
                                        <input type="hidden" name="truck_job_id" class="form-control" value="<?= $row['truck_job_id'];?>">
                                        <input type="hidden" name="rcd_id" class="form-control" value="<?= $row['rcd_id'];?>">
                                        <input type="hidden" name="user_name" class="form-control" value="<?= $_SESSION['username'];?>">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <p>Required Container :</p> 
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>20' :</label>                                    
                                        <input type="text" name="c20" class="form-control" value="<?= $inv['rcd_20_type'];?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>40' :</label>                                    
                                        <input type="text" name="c40" class="form-control" value="<?= $inv['rcd_40_type'];?>" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="reject" value="reject" class="btn btn-success"> Yes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Reject -->
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
<!-- Consignee -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('CaddSuccess') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data saved successfully!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }

    if (window?.location?.href?.indexOf('CaddFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to save, please contact your administrator!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }

    if (window?.location?.href?.indexOf('CaddReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('CUpdateSuccessCC') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data updated successfully!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }

    if (window?.location?.href?.indexOf('CUpdateFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to updated, please contact your administrator!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }

    if (window?.location?.href?.indexOf('CUpdateReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data delete successfully!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data failed to delete, please contact your administrator!',
        })
        history.replaceState({}, '', './truck_confirm_job.php');
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
        $("#fformthree").hide();
      } else if ($(this).val() == "optwo") {
        $("#fformtwo").show();
        $("#fformone").hide();
        $("#fformthree").hide();
      } else if ($(this).val() == "opthree") {
        $("#fformthree").show();
        $("#fformone").hide();
        $("#fformtwo").hide();
      } else {
        $("#fformone").hide();
        $("#fformtwo").hide();
        $("#fformthree").hide();
      }
    });
  });
</script>
<!-- End Search -->