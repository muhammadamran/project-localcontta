<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if(isset($_POST["create"]))    
{ 
  $vname                = $_POST['vname'];
  $typePricingRate      = $_POST['typePricingRate'];
  $remark               = $_POST['remark'];
  $price                = $_POST['prate'];

  $query = mysql_query("INSERT INTO tb_pricing (item_id, vendorname, item_type, remark, price)
    VALUES
    (' ','$vname','$typePricingRate','$remark','$price')");

  if($query){
    header("Location: ./iou_adm_rate.php?CaddSuccess=true");                                      
  } else {
    header("Location: ./iou_adm_rate.php?CaddFailed=true");                                                  
  }
}
// EDIT
if(isset($_POST["edit"]))    
{ 
  $uid                  = $_POST['uid'];
  $vname                = $_POST['vname'];
  $typePricingRate      = $_POST['typePricingRate'];
  $remark               = $_POST['remark'];
  $price                = $_POST['prate'];

  $query = mysql_query("UPDATE tb_pricing SET vendorname='$vname',
    item_type='$typePricingRate',
    remark='$remark',
    price='$price'
    WHERE item_id='$uid'");

  if($query){
    header("Location: ./iou_adm_rate.php?CUpdateSuccessCC=true");                                      
  } else {
    header("Location: ./iou_adm_rate.php?CUpdateFailed=true");                                                  
  }
}
// DELETE
if(isset($_POST["delete"]))    
{
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_pricing WHERE item_id='$ID'");

  if($query) {
    header("Location: ./iou_adm_rate.php?DeleteSuccess=true");                                            
  } else {
    header("Location: ./iou_adm_rate.php?DeleteFailed=true");                              
  }
}

// FUNCTION SEARCHING
$findType = '';
$findVN = '';
$findPR = '';
if(isset($_GET['findone']))
{
  $findType = $_GET['findType'];
  $findVN = $_GET['findVN'];
  $findPR = $_GET['findPR'];
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
            <li class="breadcrumb-item active" aria-current="page">Pricing/Rate</li>
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
              <option value="opone">Pricing/Rate</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="iou_adm_rate.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Type Pricing/Rate</label>
                      <select type="text" name="findType" id="idfindType" class="form-control">
                        <?php if ($findType == '') { ?>
                          <option value="">-- Select Type Pricing/Rate --</option>
                        <?php } else { ?>
                          <option value="<?= $findType; ?>"><?= $findType; ?></option>
                          <option value="">-- Select Type Pricing/Rate --</option>
                        <?php } ?>
                        <option value="STORAGE">STORAGE</option>
                        <option value="TRUCKING">TRUCKING</option>
                        <option value="LOLO-EXPORT">LOLO-EXPORT</option>
                        <option value="LOLO-IMPORT">LOLO-IMPORT</option>
                        <option value="TERMINAL-CHARGES">TERMINAL-CHARGES</option>
                        <option value="HANDLING-CLEARANCE">HANDLING-CLEARANCE</option>
                        <option value="EDI-CHARGES">EDI-CHARGES</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Vendor Name</label>
                      <?php if ($findVN == '') { ?>
                        <input type="text" name="findVN" id="idfindVN" class="form-control" placeholder="Vendor Name...">
                      <?php } else { ?>
                        <input type="text" name="findVN" id="idfindVN" class="form-control" placeholder="Vendor Name..." value="<?= $findVN; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Pricing/Rate</label>
                      <?php if ($findPR == '') { ?>
                        <input type="text" name="findPR" id="idfindPR" class="form-control" placeholder="Pricing/Rate...">
                      <?php } else { ?>
                        <input type="text" name="findPR" id="idfindPR" class="form-control" placeholder="Pricing/Rate..." value="<?= $findPR; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="iou_adm_rate.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
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
            <i class="fa fa-table"></i> Pricing/Rate List
          </div>
          <div class="panel-body">
            <div class="page-add">
              <!-- Add Pricing/Rate -->
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-PricingRate">
                <i class="fas fa-plus-circle"></i> Add Pricing/Rate
              </button>
              <!-- Modal content-->
              <div class="modal fade" id="add-PricingRate" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[Add] </b> Pricing/Rate</h4>
                    </div>
                    <form method="post" action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Type Pricing/Rate <font style="color: red;">*</font></label>
                              <select  name="typePricingRate" class="form-control" required>
                                <option value="">-- Select Type Pricing/Rate --</option>
                                <option value="STORAGE">STORAGE</option>
                                <option value="TRUCKING">TRUCKING</option>
                                <option value="LOLO-EXPORT">LOLO-EXPORT</option>
                                <option value="LOLO-IMPORT">LOLO-IMPORT</option>
                                <option value="TERMINAL-CHARGES">TERMINAL-CHARGES</option>
                                <option value="HANDLING-CLEARANCE">HANDLING-CLEARANCE</option>
                                <option value="EDI-CHARGES">EDI-CHARGES</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Vendor Name <font style="color: red;">*</font></label>
                              <input type="text" name="vname" class="form-control" placeholder="Vendor Name..." required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Pricing/Rate <font style="color: red;">*</font></label>
                              <input type="text" name="prate" class="form-control" placeholder="Pricing/Rate..." required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Remarks <font style="color: red;">*</font></label>
                              <textarea type="text" name="remark" class="form-control" placeholder="Remarks..." required></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label style="color: red; font-weight: 300;">* <i style="color: #000;">Required!</i></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                        <button type="submit" name="create" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Add Pricing/Rate -->
            </div>
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_pricing");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
              <div class="alert-info">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Information!</strong> Total Pricing/Rate on Localcontta: <b><?= $cont_c['total'] ?> Pricing/Rate</b>.
                <p style="margin-bottom: 0px;">Pricing/Rate List on tables only shows the last 50 data, search Pricing/Rate' names if you can't find them in the table.</p>
              </div>
            </div>
            <div class="table-responsive">
              <table class="display hover" id="PricingRate">
                <thead>
                  <tr>
                    <th class="no-sort">#</th>
                    <th style="text-align: center;">Type Pricing/Rate</th>
                    <th style="text-align: center;">Vendor Name</th>                      
                    <th style="text-align: center;">Pricing/Rate</th>    
                    <th style="text-align: center;">Remarks</th>                  
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
                  // $result = mysqli_query($con,"SELECT * FROM tb_pricing ORDER BY regdate DESC LIMIT 50");
                  if(isset($_GET['findone']))
                  {
                    $findType = $_GET['findType'];
                    $findVN = $_GET['findVN'];
                    $findPR = $_GET['findPR'];
                    $result = mysqli_query($con,"SELECT * FROM tb_pricing WHERE item_type LIKE '%$findType%' AND vendorname LIKE '%$findVN%' AND price LIKE '%$findPR%'");       
                  } else {
                    $result = mysqli_query($con,"SELECT * FROM tb_pricing ORDER BY item_id DESC LIMIT 50");   
                  }
                  if(mysqli_num_rows($result)>0){
                    $no=0;
                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      echo "<td style='text-align: center;'>" . $row['item_type'] . "</td>";       
                      echo "<td>" . $row['vendorname'] . "</td>";
                      echo "<td style='text-align: center;'>" . $row['price'] . "</td>";       
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#remarks$row[item_id]' title='Remarks'>
                      <span class='btn btn-sm btn-change'>
                      <i class='fab fa-readme'></i>
                      </span>
                      </a>
                      </td>";       
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#edit$row[item_id]' title='Edit'>
                      <span class='btn btn-sm btn-warning'>
                      <i class='fa fa-pencil'></i>
                      </span>
                      </a>
                      <a href='#' data-toggle='modal' data-target='#delete$row[item_id]' title='Delete'>
                      <span class='btn btn-sm btn-danger'>
                      <i class='fa fa-trash'></i>
                      </span>
                      </a>
                      </td>";
                      echo "</tr>";
                      ?>
                      <!-- Remarks -->
                      <div class="modal fade" id="remarks<?= $row['item_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Remarks] </b> Pricing/Rate</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea type="text" name="remark" class="form-control" placeholder="Remarks..."><?= $row['remark'] ?></textarea>
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
                      <!-- End Remarks -->
                      <!-- Edit -->
                      <div class="modal fade" id="edit<?= $row['item_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit] </b> Pricing/Rate</h4>
                            </div>
                            <form method="post" action="">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Type Pricing/Rate</label>
                                      <select  name="typePricingRate" class="form-control">
                                        <option value="<?= $row['item_type'] ?>"><?= $row['item_type'] ?></option>
                                        <option value="">-- Select Type Pricing/Rate --</option>
                                        <option value="STORAGE">STORAGE</option>
                                        <option value="TRUCKING">TRUCKING</option>
                                        <option value="LOLO-EXPORT">LOLO-EXPORT</option>
                                        <option value="LOLO-IMPORT">LOLO-IMPORT</option>
                                        <option value="TERMINAL-CHARGES">TERMINAL-CHARGES</option>
                                        <option value="HANDLING-CLEARANCE">HANDLING-CLEARANCE</option>
                                        <option value="EDI-CHARGES">EDI-CHARGES</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Vendor Name</label>
                                      <input type="text" name="vname" class="form-control" placeholder="Vendor Name..." value="<?= $row['vendorname'] ?>">
                                      <input type="hidden" name="uid" value="<?= $row['item_id'] ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Pricing/Rate</label>
                                      <input type="text" name="prate" class="form-control" placeholder="Pricing/Rate..." value="<?= $row['price'] ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea type="text" name="remark" class="form-control" placeholder="Remarks..."><?= $row['remark'] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Edit -->
                      <!-- Delete -->
                      <div class="modal fade" id="delete<?= $row['item_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Delete]</b> Pricing/Rate - <?= $row['vendorname'];?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-delete">
                                  <h4><i class="fa fa-info-circle"></i> Are you sure you want to delete this data?</h4>
                                  <p>
                                    You will not see this data again, it will be permanently deleted in the <b>Localcontta</b> system!
                                    <br>
                                    <i>"Please click <b>Yes</b> to continue the data deletion process."</i>
                                  </p>
                                  <input type="hidden" name="uid" class="form-control" value="<?= $row['item_id'];?>" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> No</button>
                                <button type="submit" name="delete" class="btn btn-danger"><i class="far fa-check-circle"></i> Yes</button>
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
<!-- Pricing/Rate -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('CaddSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
    }

    if (window?.location?.href?.indexOf('CaddFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('CUpdateSuccessCC') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data updated successfully!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
    }

    if (window?.location?.href?.indexOf('CUpdateFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to updated, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data delete successfully!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data failed to delete, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_rate.php');
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