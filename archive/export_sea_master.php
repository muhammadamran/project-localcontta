<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if(isset($_POST["createExportSea"]))    
{    
  $hbl            = $_POST['InputHBL'];
  $aju            = $_POST['InputAJUNBR'];
  $shipper        = $_POST['InputShipper'];
  $cnee           = $_POST['InputConsignee'];
  $inv_no         = $_POST['InputInvoiceNo'];
  $mot            = $_POST['InputMOT'];
  $weight         = $_POST['InputWeight'];
  $c20            = $_POST['Input20'];
  $c40            = $_POST['Input40'];
  $ref            = $_POST['InputKNREFTN'];

  if ($c20 == "0") {
    $party_sql = $c40."x40";
  } elseif ($c40 == "0") {
    $party_sql = $c20."x20";
  } elseif ($c40 == 0 and $c20 == 0) {
    $party_sql = "";
  } elseif ($c40 != 0 and $c20 != 0) {
    $party_sql = $c20."x20". " + " . $c40."x40";
  }

  $cbm            = $_POST['InputCBM'];
  $eta            = $_POST['InputETA'];
    //$ata            = $_POST['ata'];
  $coo            = $_POST['InputCOO'];

    //$do_validation  = $_POST['do_validation'];
  $rcd_type             = "export";
  $user_name            = $_SESSION['username'];
  $datenow              = date('Y-m-d h:m:i');
  $monthnow             = date('m');
  $yearnow              = date('Y');

  if ($mot == "LCL") {
    $package_sql  = $_POST['InputPackage'];
  } else {
    $package_sql  = "No package";
  }

  $query = mysql_query("INSERT INTO tb_master_export VALUES (' ','$datenow','$monthnow','$yearnow','$user_name','$rcd_type','$hbl','$shipper','$cnee','$inv_no','$aju','$ref','$c20','$c40','$party_sql','$weight','$package_sql','$cbm','$eta','','$coo','','','$mot','New','')");
  $last_id = mysql_insert_id();
  $query .= mysql_query("INSERT INTO tb_record_miles_export (miles_id,rcd_id,miles_arr,action_by,miles_custom,action_by_2,miles_execution,action_by_3,miles_monitor,action_by_4,mot) 
    VALUES 
    (' ','$last_id','1','1','0','0','1','1','0','0','$mot')");
  $query .= mysql_query("INSERT INTO tb_ex_arr(rcd_ar_id,rcd_id) VALUES (' ','$last_id')");
  $query .= mysql_query("INSERT INTO tb_ex_custom(rcd_cus_id,rcd_id) VALUES (' ','$last_id')");
  $query .= mysql_query("INSERT INTO tb_ex_execute(rcd_exe_id,rcd_id) VALUES (' ','$last_id')");
  $query .= mysql_query("INSERT INTO tb_ex_monitor(rcd_mon_id,rcd_id) VALUES (' ','$last_id')");

  if($query) {
    header("Location: ./export_sea_master.php?InputSuccess=true");                                        
  } else {
    header("Location: ./export_sea_master.php?InputFailed=true");                                                  
  }
}
// DELETE
if(isset($_POST["delete"]))    
{
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_user WHERE user_id='$ID'");

  if($query) {
    header("Location: ./export_sea_master.php?DeleteSuccess=true");                                            
  } else {
    header("Location: ./export_sea_master.php?DeleteFailed=true");                              
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
          <i class="fa fa-box icon-title"></i> Export - Seafreight
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
            <i class="fa fa-table"></i> Export - Seafreight
          </div>
          <div class="panel-body">
            <!-- Add Export - Airfreight -->
            <div class="page-add-new">
              <h4>Create New Record</h4>
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#CMasterExportSeafreight">
                <i class="fa fa-plus"></i> Create!
              </button>
            </div>
            <?php include 'modals/m_export_sea_master.php';?>
            <!-- End Add Export - Airfreight -->
            <hr>
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
                  $result = mysqli_query($con,"SELECT * FROM tb_master_export WHERE rcd_status = 'New' AND rcd_mot!='AIR' ORDER BY rcd_id DESC");
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
                      <div class="modal fade" id="confirm<?= $row['rcd_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Complete] </b> Export - Seafreight - RCD ID - <?php echo $row['rcd_id'];?></h4>
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
                                      <input type="hidden" name="rcdid" class="form-control" value="<?php echo $row['rcd_id'];?>">
                                      <input type="hidden" name="user_name" class="form-control" value="<?php echo $_SESSION['username'];?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <?php if ($row['cipl_file'] == "") { ?>
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
<script type="text/javascript" src="assets/thirdparty/chosen/chosen.jquery.js"></script>
<!-- Managemen Users -->
<script type="text/javascript">
  $(function() {
    $("#IdMOT").change(function() {
      if ($(this).val() == "FCL") {
        $("#forPackage").hide();
      } else if ($(this).val() == "LCL") {
        $("#forPackage").show();
      } else {
        $("#forPackage").hide();
      }
    });
  });

  jQuery(function($){
    $("#IdShipper").chosen({width: "100%"});
    $("#IdConsignee").chosen({width: "100%"});
  });
    // Input - Add
    if (window?.location?.href?.indexOf('InputSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './export_sea_master.php');
    }

    if (window?.location?.href?.indexOf('InputFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './export_sea_master.php');
    }
    // End Input - Add
  </script>