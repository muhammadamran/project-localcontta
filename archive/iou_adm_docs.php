<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if(isset($_POST["create"]))    
{ 
  $check_d = $_POST['dname'];

  $con=mysqli_connect("localhost","root","","contta");
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT dtype_name FROM tb_docs_type WHERE dtype_name ='$check_d'");
  $vald_d = mysqli_fetch_array($result);

  if ($vald_d == NULL) {
    $dname                = $_POST['dname'];

    $query = mysql_query("INSERT INTO tb_docs_type (dtype_id, dtype_name)
      VALUES
      (' ','$dname')");

    if($query){
      header("Location: ./iou_adm_docs.php?DaddSuccess=true");                                      
    } else {
      header("Location: ./iou_adm_docs.php?DaddFailed=true");                                                  
    }
  } else {
    header("Location: ./iou_adm_docs.php?DaddReady=true");                                                  
  }
}
// DELETE
if(isset($_POST["delete"]))    
{
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_docs_type WHERE dtype_id='$ID'");

  if($query) {
    header("Location: ./iou_adm_docs.php?DeleteSuccess=true");                                            
  } else {
    header("Location: ./iou_adm_docs.php?DeleteFailed=true");                              
  }
}

// FUNCTION SEARCHING
$findDI = '';
$findDN = '';
if(isset($_GET['findone']))
{
  $findDI = $_GET['findDI'];
  $findDN = $_GET['findDN'];
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
            <li class="breadcrumb-item active" aria-current="page">Document Type</li>
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
              <option value="opone">Document Type</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="iou_adm_docs.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Document ID </label>
                      <?php if ($findDI == '') { ?>
                        <input type="text" name="findDI" id="idfindDI" class="form-control" placeholder="Document ID...">
                      <?php } else { ?>
                        <input type="text" name="findDI" id="idfindDI" class="form-control" placeholder="Document ID..." value="<?= $findDI; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Document Name </label>
                      <?php if ($findDN == '') { ?>
                        <input type="text" name="findDN" id="idfindDN" class="form-control" placeholder="Document Name...">
                      <?php } else { ?>
                        <input type="text" name="findDN" id="idfindDN" class="form-control" placeholder="Document Name..." value="<?= $findDN; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="iou_adm_docs.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
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
            <i class="fa fa-table"></i> Document Type List
          </div>
          <div class="panel-body">
            <div class="page-add">
              <!-- Add Document -->
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-Document">
                <i class="fas fa-plus-circle"></i> Add Document Type
              </button>
              <!-- Modal content-->
              <div class="modal fade" id="add-Document" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[Add] </b> Document Type</h4>
                    </div>
                    <form method="post" action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Document Name <font style="color: red;">*</font></label>
                              <input type="text" name="dname" class="form-control" placeholder="Document Name..." required>
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
              <!-- End Add Document -->
            </div>
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_docs_type");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
              <div class="alert-info">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Information!</strong> Total Document Type on Localcontta: <b><?= $cont_c['total'] ?> Document Type</b>.
                <p style="margin-bottom: 0px;">Document Type List on tables only shows the last 50 data, search Document Type' names if you can't find them in the table.</p>
              </div>
            </div>
            <div class="table-responsive">
              <table class="display hover" id="document">
                <thead>
                  <tr>
                    <th class="no-sort">#</th>
                    <th style="text-align: center;">Document ID</th>
                    <th style="text-align: center;">Document Name</th>                      
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
                  // $result = mysqli_query($con,"SELECT * FROM tb_docs_type ORDER BY regdate DESC LIMIT 50");
                  if(isset($_GET['findone']))
                  {
                    $findDI = $_GET['findDI'];
                    $findDN = $_GET['findDN'];
                    $result = mysqli_query($con,"SELECT * FROM tb_docs_type WHERE dtype_id LIKE '%$findDI%' AND dtype_name LIKE '%$findDN%'");       
                  } else {
                    $result = mysqli_query($con,"SELECT * FROM tb_docs_type ORDER BY dtype_id DESC LIMIT 50");   
                  }
                  if(mysqli_num_rows($result)>0){
                    $no=0;
                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      echo "<td style='text-align: center;'>" . $row['dtype_id'] . "</td>";       
                      echo "<td>" . $row['dtype_name'] . "</td>";       
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#delete$row[dtype_id]' title='Delete'>
                      <span class='btn btn-sm btn-danger'>
                      <i class='fa fa-trash'></i>
                      </span>
                      </a>
                      </td>";
                      echo "</tr>";
                      ?>
                      <!-- Delete -->
                      <div class="modal fade" id="delete<?= $row['dtype_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Delete]</b> Document Type</h4>
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
                                  <input type="hidden" name="uid" class="form-control" value="<?= $row['dtype_id'];?>" required>
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
                    echo "<td colspan='4' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
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
<!-- Document -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('DaddSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './iou_adm_docs.php');
    }

    if (window?.location?.href?.indexOf('DaddFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_docs.php');
    }

    if (window?.location?.href?.indexOf('DaddReady') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Document Name already registered, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_docs.php');
    }
    // End Input - Add

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data delete successfully!',
      })
      history.replaceState({}, '', './iou_adm_docs.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data failed to delete, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_docs.php');
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