<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if(isset($_POST["create"]))    
{ 
  $check_t = $_POST['tname'];

  $con=mysqli_connect("localhost","root","","contta");
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT trucker_name FROM tb_trucker WHERE trucker_name ='$check_t'");
  $vald_c = mysqli_fetch_array($result);

  if ($vald_c == NULL) {
    $tname                = $_POST['tname'];
    $taddress             = $_POST['taddress'];
    $temail               = $_POST['temail'];
    $tphone               = $_POST['tphone'];
    $tpic                 = $_POST['tpic'];

    $query = mysql_query("INSERT INTO tb_trucker (trucker_id, trucker_name, trucker_address, trucker_mail, trucker_phone, trucker_pic)
      VALUES
      (' ','$tname','$taddress','$temail','$tphone','$tpic')");

    if($query){
      header("Location: ./iou_adm_trucker.php?TaddSuccess=true");                                      
    } else {
      header("Location: ./iou_adm_trucker.php?TaddFailed=true");                                                  
    }
  } else {
    header("Location: ./iou_adm_trucker.php?TaddReady=true");                                                  
  }
}
// EDIT
if(isset($_POST["edit"]))    
{ 
  $check_t = $_POST['tname'];

  $con=mysqli_connect("localhost","root","","contta");
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT trucker_name FROM tb_trucker WHERE trucker_name='$check_t'");
  $vald_c = mysqli_fetch_array($result);

  if ($vald_c == NULL) {
    $uid                  = $_POST['uid'];
    $tname                = $_POST['tname'];
    $taddress             = $_POST['taddress'];
    $temail               = $_POST['temail'];
    $tphone               = $_POST['tphone'];
    $tpic                 = $_POST['tpic'];

    $query = mysql_query("UPDATE tb_trucker SET trucker_name='$tname',
     trucker_address='$taddress',
     trucker_mail='$temail',
     trucker_phone='$tphone',
     trucker_pic='$tpic'
     WHERE trucker_id='$uid'");

    if($query){
      header("Location: ./iou_adm_trucker.php?TUpdateSuccessCC=true");                                      
    } else {
      header("Location: ./iou_adm_trucker.php?TUpdateFailed=true");                                                  
    }
  } else {
    header("Location: ./iou_adm_trucker.php?TUpdateReady=true");                                                  
  }
}
// DELETE
if(isset($_POST["delete"]))    
{
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_trucker WHERE trucker_id='$ID'");

  if($query) {
    header("Location: ./iou_adm_trucker.php?DeleteSuccess=true");                                            
  } else {
    header("Location: ./iou_adm_trucker.php?DeleteFailed=true");                              
  }
}

// FUNCTION SEARCHING
$findTN = '';
$findEM = '';
$findPIC = '';
if(isset($_GET['findone']))
{
  $findTN = $_GET['findTN'];
  $findEM = $_GET['findEM'];
  $findPIC = $_GET['findPIC'];
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
            <li class="breadcrumb-item active" aria-current="page">Trucker</li>
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
              <option value="opone">Trucker</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="iou_adm_trucker.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Trucker Name </label>
                      <?php if ($findTN == '') { ?>
                        <input type="text" name="findTN" id="idfindTN" class="form-control" placeholder="Trucker Name...">
                      <?php } else { ?>
                        <input type="text" name="findTN" id="idfindTN" class="form-control" placeholder="Trucker Name..." value="<?= $findTN; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Email </label>
                      <?php if ($findEM == '') { ?>
                        <input type="text" name="findEM" id="idfindEM" class="form-control" placeholder="Email...">
                      <?php } else { ?>
                        <input type="text" name="findEM" id="idfindEM" class="form-control" placeholder="Email..." value="<?= $findEM; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>PIC </label>
                      <?php if ($findPIC == '') { ?>
                        <input type="text" name="findPIC" id="idfindPIC" class="form-control" placeholder="PIC...">
                      <?php } else { ?>
                        <input type="text" name="findPIC" id="idfindPIC" class="form-control" placeholder="PIC..." value="<?= $findPIC; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="iou_adm_trucker.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
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
            <i class="fa fa-table"></i> Trucker List
          </div>
          <div class="panel-body">
            <div class="page-add">
              <!-- Add Trucker -->
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-Trucker">
                <i class="fas fa-plus-circle"></i> Add Trucker
              </button>
              <!-- Modal content-->
              <div class="modal fade" id="add-Trucker" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[Add] </b> Trucker</h4>
                    </div>
                    <form method="post" action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Trucker Name <font style="color: red;">*</font></label>
                              <input type="text" name="tname" class="form-control" placeholder="Trucker Name..." required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Address <font style="color: red;">*</font></label>
                              <textarea type="text" name="taddress" class="form-control" placeholder="Address..." required></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" name="temail" class="form-control" placeholder="Email..." required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="number" name="tphone" class="form-control" placeholder="Phone...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>PIC</label>
                              <input type="text" name="tpic" class="form-control" placeholder="PIC...">
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
              <!-- End Add Trucker -->
            </div>
            <?php
            $con=mysqli_connect("localhost","root","","contta");
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT COUNT(*) AS total FROM tb_trucker");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
              <div class="alert-info">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Information!</strong> Total Trucker on Localcontta: <b><?= $cont_c['total'] ?> Trucker</b>.
                <p style="margin-bottom: 0px;">Trucker List on tables only shows the last 50 data, search Trucker' names if you can't find them in the table.</p>
              </div>
            </div>
            <div class="table-responsive">
              <table class="display hover" id="trucker">
                <thead>
                  <tr>
                    <th class="no-sort">#</th>
                    <th style="text-align: center;">Trucker Name</th>
                    <th style="text-align: center;">Address</th>                      
                    <th style="text-align: center;">Email</th>    
                    <th style="text-align: center;">Phone</th>                  
                    <th style="text-align: center;">PIC</th>                  
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
                  // $result = mysqli_query($con,"SELECT * FROM tb_trucker ORDER BY regdate DESC LIMIT 50");
                  if(isset($_GET['findone']))
                  {
                    $findTN = $_GET['findTN'];
                    $findEM = $_GET['findEM'];
                    $findPIC = $_GET['findPIC'];
                    $result = mysqli_query($con,"SELECT * FROM tb_trucker WHERE trucker_name LIKE '%$findTN%' AND trucker_mail LIKE '%$findEM%' AND trucker_pic LIKE '%$findPIC%' ");       
                  } else {
                    $result = mysqli_query($con,"SELECT * FROM tb_trucker ORDER BY trucker_id DESC LIMIT 50");   
                  }
                  if(mysqli_num_rows($result)>0){
                    $no=0;
                    while($row = mysqli_fetch_array($result))
                    {
                      $no++;
                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      echo "<td>" . $row['trucker_name'] . "</td>";
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#address$row[trucker_id]' title='Address'>
                      <span class='btn btn-sm btn-change'>
                      <i class='fas fa-map-marker-alt'></i>
                      </span>
                      </a>
                      </td>";
                      echo "<td style='text-align: center;'>" . $row['trucker_mail'] . "</td>";       
                      echo "<td style='text-align: center;'>" . $row['trucker_phone'] . "</td>";            
                      echo "<td style='text-align: center;'>" . $row['trucker_pic'] . "</td>";   
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#edit$row[trucker_id]' title='Edit'>
                      <span class='btn btn-sm btn-warning'>
                      <i class='fa fa-pencil'></i>
                      </span>
                      </a>
                      <a href='#' data-toggle='modal' data-target='#delete$row[trucker_id]' title='Delete'>
                      <span class='btn btn-sm btn-danger'>
                      <i class='fa fa-trash'></i>
                      </span>
                      </a>
                      </td>";
                      echo "</tr>";
                      ?>
                      <!-- Address -->
                      <div class="modal fade" id="address<?= $row['trucker_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Address]</b> Trucker</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Trucker Name</label>
                                    <input type="text" name="cname" class="form-control" value="<?= $row['trucker_name'] ?>">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Trucker Address</label>
                                    <textarea type="text" name="caddress" class="form-control"><?= $row['trucker_address'] ?></textarea>
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
                      <!-- Edit -->
                      <div class="modal fade" id="edit<?= $row['trucker_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit] </b> Trucker</h4>
                            </div>
                            <form method="post" action="">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Trucker Name</label>
                                      <input type="text" name="tname" class="form-control" placeholder="Trucker Name..." value="<?= $row['trucker_name']; ?>">
                                      <input type="hidden" name="uid" value="<?= $row['trucker_id']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Address</label>
                                      <textarea type="text" name="taddress" class="form-control" placeholder="Address..."><?= $row['trucker_address']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="temail" class="form-control" placeholder="Email..." value="<?= $row['trucker_mail']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input type="text" name="tphone" class="form-control" placeholder="Phone..." value="<?= $row['trucker_phone']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>PIC</label>
                                      <input type="text" name="tpic" class="form-control" placeholder="PIC..." value="<?= $row['trucker_pic']; ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="edit" class="btn btn-primary"><i class="fas fa-pencil"></i> Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Edit -->
                      <!-- Delete -->
                      <div class="modal fade" id="delete<?= $row['trucker_id'];?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Delete]</b> Trucker - <?= $row['trucker_name'];?></h4>
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
                                  <input type="hidden" name="uid" class="form-control" value="<?= $row['trucker_id'];?>" required>
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
                    echo "<td colspan='7' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
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
<!-- Trucker -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('TaddSuccess') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data saved successfully!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }

    if (window?.location?.href?.indexOf('TaddFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to save, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }

    if (window?.location?.href?.indexOf('TaddReady') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Trucker Name already registered, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('TUpdateSuccessCC') > -1) {
      Swal.fire({
        title: 'Success Alert!',
        icon: 'success',
        text: 'Data updated successfully!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }

    if (window?.location?.href?.indexOf('TUpdateFailed') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Data failed to updated, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }

    if (window?.location?.href?.indexOf('TUpdateReady') > -1) {
      Swal.fire({
        title: 'Failed Alert!',
        icon: 'error',
        text: 'Trucker Name already registered, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data delete successfully!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
      Swal.fire({
        title: 'Delete Alert!',
        icon: 'info',
        text: 'Data failed to delete, please contact your administrator!',
      })
      history.replaceState({}, '', './iou_adm_trucker.php');
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