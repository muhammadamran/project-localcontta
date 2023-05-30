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
  $rcd_type             = "import";
  $user_name            = $_POST['user_name'];
  $datenow              = date('Y-m-d H:i:s');

  $query = mysql_query("INSERT into tb_record_master values(' ','$datenow','$user_name','$rcd_type','$ship_plan','$shipper','$cnee','$inv_no','$commo','$c20','$c40','$party','$po_no')");
  if ($query) {
    header("Location: ./export_master.php");
  } else {
    echo "Updated Failed - Please contact your administrator" . mysql_error();
  }
}


if (isset($_POST["assign"])) {

  $vendor       = $_POST['vendor'];
  $remarks      = $_POST['remarks'];
  $rcdid        = $_POST['rcdid'];
  $user_name    = $_POST['user_name'];
  $datenow    = date('Y-m-d');

  $query = mysql_query("INSERT into tb_truck_assign values(' ','$datenow','$user_name','$vendor','$rcdid','$remarks','','')");
  if ($query) {
    header("Location: ./truck_assign_job.php?ref=0000");
  } else {
    echo "Updated Failed - Please contact your administrator" . mysql_error();
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_record_miles_import SET pre ='$datenow',action_by='$user_name' where rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./imp_pre.php");
  } else {
    echo "Updated Failed - Please contact your administrator";
  }
}

if (isset($_POST['delete'])) {

  $rcdid                = $_POST['rcdid'];
  /*$del_ref            = $_POST['del_ref'];
$del_name           = $_POST['del_name'];
$date_now           = date('Y-m-d H:i:s');*/

  if ($did) {
    $query = mysql_query("DELETE FROM tb_rcd_master WHERE rcd_ref = '$del_ref' ");
    $query .= mysql_query("DELETE FROM tb_delivery_master WHERE dlv_ref = '$del_ref' ");
    $query .= mysql_query("DELETE FROM tb_docs_master WHERE docs_ref = '$del_ref' ");
    $query .= mysql_query("DELETE FROM tb_printed_docs WHERE print_ref = '$del_ref' ");
    $query .= mysql_query("INSERT into tb_log values(' ','$del_name','delete-record','$date_now','$del_ref')");
    if ($query) {
      header("Location: ./admin_rcdmanage.php");
    } else {
      echo "Operation Failed! Please contact your administrator" . mysql_errno();
    }
  } else {
    echo "Operation Failed! Please contact your administrator" . mysql_errno();
  }
}

if (isset($_POST["updatefile"])) {
  $rid                = $_POST['rcd_id'];
  $uploader           = $_POST['uploader'];
  $findhbl                = $_POST['hbl'];
  $dtype              = $_POST['dtype'];
  $date_taken         = date('Y-m-d H:i:s');
  $remark             = '';

  $uploaddir = 'file/';
  $uploadfile = $uploaddir . '_' . $rid . $dtype . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  $query .= mysql_query("INSERT into tb_docs_list values(' ','$rid','$dtype','$uploadfile','$uploader','$date_taken','$remark')");
  if ($query)
    if ($dtype == 'PIB') {
      $uploadplus = mysql_query("UPDATE tb_imp_pre SET pib_file ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    } elseif ($dtype == 'COO') {
      $uploadplus = mysql_query("UPDATE tb_imp_clear SET coo ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    } elseif ($dtype == 'SPPB') {
      $uploadplus = mysql_query("UPDATE tb_imp_clear SET sppb ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    } elseif ($dtype == 'INVOICE VENDOR') {
      $uploadplus = mysql_query("UPDATE tb_imp_post SET post_invoice_vendor_file ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    } elseif ($dtype == 'INVOICE CUSTOMER') {
      $uploadplus = mysql_query("UPDATE tb_imp_post SET post_customer_invoice_file ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    } elseif ($dtype == 'COMMERCIAL_INVOICE') {
      $uploadplus = mysql_query("UPDATE tb_master_impor SET cipl_file ='$uploadfile' WHERE rcd_id='$rid'");
      if ($uploadplus) {
        header("Location: ./imp_efile.php?hbl=$findhbl");
      }
    }
}

// FUNCTION SEARCHING
$findhbl = '';
if (isset($_GET['findone'])) {
  $findhbl = $_GET['findhbl'];
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
          <i class="fa fa-box icon-title"></i> Import - Seafreight
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">E-FILE - Document Management</li>
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
              <option value="opone">HBL</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="import_sea_efile.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Input HBL No.</label>
                      <?php if ($findhbl == '') { ?>
                        <input type="text" name="findhbl" id="idfindhbl" class="form-control" placeholder="HBL...">
                      <?php } else { ?>
                        <input type="text" name="findhbl" id="idfindhbl" class="form-control" placeholder="HBL..." value="<?= $findhbl; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="import_sea_efile.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
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
            <i class="fa fa-table"></i> Document Management (E-FILE - Import)
          </div>
          <div class="panel-body">
            <div class="row">
              <?php
              mysql_connect('localhost', 'root', '');
              mysql_select_db('contta');
              $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN tb_docs_list ON tb_master_impor.rcd_id=tb_docs_list.rcd_id WHERE rcd_hbl = '$findhbl'");
              $role1 = mysql_query("SELECT * FROM tb_master_impor WHERE rcd_hbl = '$findhbl' ");
              $access1 = mysql_fetch_array($role1);
              ?>
              <?php if (isset($_GET['findone'])) { ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body p-3">
                      <div class="card-content">
                        <div style="display: grid;">
                          <font style="font-size: 25px;font-weight: 600;">RCD ID</font>
                          <font style="font-size: 16px;font-weight: 600;"><?= $access1['rcd_id']; ?></font>
                        </div>
                        <div style="display: grid;">
                          <font style="font-size: 25px;font-weight: 600;">HBL</font>
                          <font style="font-size: 16px;font-weight: 600;"><?= $findhbl; ?></font>
                        </div>
                        <div style="display: grid;">
                          <font style="font-size: 25px;font-weight: 600;">Job Owner</font>
                          <font style="font-size: 16px;font-weight: 600;"><?= $access1['rcd_create_by']; ?></font>
                        </div>
                        <div style="display: grid;">
                          <font style="font-size: 25px;font-weight: 600;">Shipper</font>
                          <font style="font-size: 16px;font-weight: 600;"><?= $access1['rcd_shipper']; ?></font>
                        </div>
                        <div style="display: grid;">
                          <font style="font-size: 25px;font-weight: 600;">Consignee</font>
                          <font style="font-size: 16px;font-weight: 600;"><?= $access1['rcd_cnee']; ?></font>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <?php if (isset($_GET['findone'])) { ?>
              <div class="page-add">
                <!-- Add New File -->
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add">
                  <i class="fa fa-plus"></i> Add New File
                </button>
                <div class="modal fade" id="add" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b>[Docs Set] </b> Add New Docs </h4>
                      </div>
                      <form method="post" action=" " accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Docs. Name</label>
                                <select class="form-control" name="dtype">
                                  <option value=" ">--- SELECT ---</option>
                                  <?php
                                  mysql_connect('localhost', 'root', '');
                                  mysql_select_db('contta');
                                  $result = mysql_query("SELECT * FROM tb_docs_type order by dtype_name ASC");
                                  while ($data = mysql_fetch_array($result)) {
                                    echo "<option value='$data[dtype_name]'> $data[dtype_name] </option>";
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Browser/Drag and Drop File Here</label>
                                <input type="file" name="form" style="font-size: 20px" class="form-control">
                                <input type="hidden" name="rcd_id" value="<?php echo $access1['rcd_id']; ?>" class="form-control">
                                <input type="hidden" name="uploader" value="<?php echo $_SESSION['username']; ?>" class="form-control">
                                <input type="hidden" name="hbl" value="<?php echo $access1['rcd_hbl']; ?>" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                          <button type="submit" name="updatefile" value="updatefile" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="table-responsive">
              <table class="display hover" id="users">
                <thead>
                  <tr>
                    <th>#</th>
                    <th style="text-align: center;">DocsID</th>
                    <th style="text-align: center;">RcdID</th>
                    <th style="text-align: center;">Docs Name</th>
                    <th style="text-align: center;">File</th>
                    <th style="text-align: center;">Uploadedby</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Remarks</th>
                    <th class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "contta");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $me = $_SESSION['username'];
                  if (isset($_GET['findone'])) {
                    $findhbl = $_GET['findhbl'];
                    $result = mysqli_query($con, "SELECT * FROM tb_master_impor INNER JOIN tb_docs_list ON tb_master_impor.rcd_id=tb_docs_list.rcd_id WHERE rcd_hbl = '$findhbl'");
                  }
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;
                      echo "<tr>";
                      echo "<td style='text-align: center;'>" . $no . ".</td>";
                      echo "<td style='text-align: center;'>" . $row['doc_id'] . "</td>";
                      echo "<td style='text-align: center;'>" . $row['rcd_id'] . "</td>";
                      echo "<td>" . $row['doc_name'] . "</td>";
                      echo "<td style='text-align: center;'>" . "<a href='$row[doc_file]' title='File' target='_BLANK'><span class='label label-primary'>View</span></a>" . "</td>";
                      echo "<td style='text-align: center;'>" . $row['uploadby'] . "</td>";
                      echo "<td style='text-align: center;'>" . $row['uploaddate'] . "</td>";
                      // Desc Remarks
                      $CEKRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[doc_id]' AND pre_rev_status='E-File' AND pre_rev_type='import'");
                      $GetDataCEKRemarksTB = mysql_fetch_array($CEKRemarksTB);

                      // Count Remarks
                      $CountRemarksTB = mysql_query("SELECT COUNT(*) AS total FROM tb_imp_remarks WHERE rcd_id = '$row[doc_id]' AND pre_rev_status='E-File' AND pre_rev_type='import'");
                      $GetDataCountRemarksTB = mysql_fetch_array($CountRemarksTB);

                      if ($GetDataCEKRemarksTB['pre_rev_remark'] == NULL) {
                        echo "<td style='text-align: center;'>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#remarks$row[doc_id]' title='add remarks this record'><i class='fas fa-folder-plus'></i></a>
                        </td>";
                      } else {
                        echo "<td style='text-align: center;'>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#viewremarks$row[doc_id]' title='view remarks this record'><i class='fas fa-eye'></i></a>
                        <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#remarks$row[doc_id]' title='add more remarks this record'><i class='fas fa-folder-plus'></i></a>
                        <div style='margin-top 5px;margin-bottom: -10px;'>
                          <font class='blink_me' style='font-size: 8px;color: red;font-weight: 600'><i>Note: Total Remarks: " . $GetDataCountRemarksTB['total'] . "</i></font>
                        </div>
                        </td>";
                      }
                      echo "<td align= ''></td>";
                      echo "</tr>";
                  ?>
                      <!-- Remarks -->
                      <div class="modal fade" id="remarks<?php echo $row['doc_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Remarks]</b> E-File - DocsID - <?php echo $row['doc_id']; ?></h4>
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
                                          $resultRemarks = mysql_query("SELECT * FROM tb_remarks WHERE status='E-File' AND type='import' ORDER BY remarks ASC");
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
                                  <?php
                                  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                                    $url = "https://";
                                  else
                                    $url = "http://";
                                  $url .= $_SERVER['HTTP_HOST'];
                                  $url .= $_SERVER['REQUEST_URI'];
                                  ?>
                                  <input type="text" name="url_now" value="<?php echo $url; ?>" class="form-control">
                                  <input type="text" name="rcd_id" value="<?php echo $row['doc_id']; ?>" class="form-control">
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
                      <div class="modal fade" id="viewremarks<?php echo $row['doc_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[View Remarks]</b> E-File - DocsID - <?php echo $row['doc_id']; ?></h4>
                            </div>
                            <form method="post" action=" ">
                              <div class="modal-body">
                                <div class="alert-warning" style="padding: 10px; border-radius: 5px">
                                  <div>
                                    <h4>Remarks Details:</h4>
                                    <ol>
                                      <?php
                                      $ViewRemarksTB = mysql_query("SELECT * FROM tb_imp_remarks WHERE rcd_id = '$row[doc_id]' AND pre_rev_status='E-File' AND pre_rev_type='import' ORDER BY id DESC");
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
    history.replaceState({}, '', './import_sea_post.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_post.php');
  }
  // End Input - Add
</script>