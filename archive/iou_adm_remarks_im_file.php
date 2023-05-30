<script src="assets/js/jquery.min.js"></script>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

// ADD
if (isset($_POST["create"])) {
  $check_d = $_POST['remarks'];

  $con = mysqli_connect("localhost", "root", "", "contta");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con, "SELECT remarks FROM tb_remarks WHERE remarks ='$check_d'");
  $vald_d = mysqli_fetch_array($result);

  if ($vald_d == NULL) {
    $remarks                = $_POST['remarks'];
    $description            = $_POST['description'];
    $status                 = 'E-File';
    $type                   = 'import';

    $query = mysql_query("INSERT INTO tb_remarks (id, remarks,description,status,type)
      VALUES
      (' ','$remarks','$description','$status','$type')");

    if ($query) {
      header("Location: ./iou_adm_remarks_im_file.php?DaddSuccess=true");
    } else {
      header("Location: ./iou_adm_remarks_im_file.php?DaddFailed=true");
    }
  } else {
    header("Location: ./iou_adm_remarks_im_file.php?DaddReady=true");
  }
}

// EDIT
if (isset($_POST["edit"])) {
  $ID             = $_POST['uid'];
  $remarks        = $_POST['remarks'];
  $description    = $_POST['description'];

  $query = mysql_query("UPDATE tb_remarks SET remarks='$remarks',
                                              description='$description'
                                              WHERE id='$ID'");

  if ($query) {
    header("Location: ./iou_adm_remarks_im_file.php?DaddSuccess=true");
  } else {
    header("Location: ./iou_adm_remarks_im_file.php?DaddFailed=true");
  }
}

// DELETE
if (isset($_POST["delete"])) {
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_remarks WHERE id='$ID'");

  if ($query) {
    header("Location: ./iou_adm_remarks_im_file.php?DeleteSuccess=true");
  } else {
    header("Location: ./iou_adm_remarks_im_file.php?DeleteFailed=true");
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
          <i class="fa fa-atlas icon-title"></i> Administration - Set Remarks Import
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Remarks E-File</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Remarks E-File
          </div>
          <div class="panel-body">
            <div class="page-add">
              <!-- Add Data -->
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-Data">
                <i class="fas fa-plus-circle"></i> Add Remarks E-File
              </button>
              <!-- Modal content-->
              <div class="modal fade" id="add-Data" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[Add] </b> Remarks E-File</h4>
                    </div>
                    <form method="post" action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Remarks <font style="color: red;">*</font></label>
                              <input type="text" name="remarks" class="form-control" placeholder="Remarks..." required>
                            </div>
                          </div>
                          <!-- <div class="col-md-6">
                            <div class="form-group">
                              <label>Remarks For <font style="color: red;">*</font></label>
                              <select name="remarksfor" class="form-control" placeholder="Remarks..." required>
                                <option value="">--- SELECT ---</option>
                                <option value="E-File">E-File</option>
                                <option value="Clearance">Clearance</option>
                                <option value="E-File">E-File</option>
                                <option value="E-File">E-File</option>
                              </select>
                            </div>
                          </div> -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Description</label>
                              <textarea type="text" name="description" class="form-control" placeholder="Description..."></textarea>
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
              <!-- End Add Data -->
            </div>
            <?php
            $con = mysqli_connect("localhost", "root", "", "contta");
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_remarks WHERE status='E-File' AND type='import'");
            $cont_c = mysqli_fetch_array($result);
            ?>
            <div class="p-b-20" style="margin-bottom: 15px;">
              <div class="alert-info">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Information!</strong> Total Remarks E-File on Localcontta: <b><?= $cont_c['total'] ?> Remarks E-File</b>.
                <p style="margin-bottom: 0px;">Remarks E-File List on tables only shows the last 50 data, search Remarks E-File' names if you can't find them in the table.</p>
              </div>
            </div>
            <div class="table-responsive">
              <table class="display hover" id="document">
                <thead>
                  <tr>
                    <th class="no-sort">#</th>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Remarks</th>
                    <th style="text-align: center;">Description</th>
                    <th class="no-sort" style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "contta");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $result = mysqli_query($con, "SELECT * FROM tb_remarks WHERE status='E-File' AND type='import' ORDER BY id");
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
                      $no++;
                      echo "<tr>";
                      echo "<td>" . $no . ".</td>";
                      echo "<td style='text-align: center;'>" . $row['id'] . "</td>";
                      echo "<td>" . $row['remarks'] . "</td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td style='text-align: center;'>
                      <a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'>
                      <span class='btn btn-sm btn-primary'>
                      <i class='fa fa-edit'></i>
                      </span>
                      </a>
                      <a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'>
                      <span class='btn btn-sm btn-danger'>
                      <i class='fa fa-trash'></i>
                      </span>
                      </a>
                      </td>";
                      echo "</tr>";
                  ?>
                      <!-- Edit -->
                      <div class="modal fade" id="edit<?= $row['id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit] </b> Remarks E-File</h4>
                            </div>
                            <form method="post" action="">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <input type="hidden" name="uid" value="<?= $row['id'] ?>">
                                      <input type="text" name="remarks" class="form-control" placeholder="Remarks..." value="<?= $row['remarks'] ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Description</label>
                                      <textarea type="text" name="description" class="form-control" placeholder="Description..."><?= $row['description'] ?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Edit -->

                      <!-- Delete -->
                      <div class="modal fade" id="delete<?= $row['id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Delete]</b> Remarks E-File</h4>
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
                                  <input type="hidden" name="uid" class="form-control" value="<?= $row['id']; ?>" required>
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
                    echo "<td colspan='5' align='center'><b><i>" . "No Available Record" . "</i></b></td>";
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
?>
<!-- Data -->
<script type="text/javascript">
  // Input - Add
  if (window?.location?.href?.indexOf('DaddSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data saved successfully!',
    })
    history.replaceState({}, '', './iou_adm_remarks_im_file.php');
  }

  if (window?.location?.href?.indexOf('DaddFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_remarks_im_file.php');
  }

  if (window?.location?.href?.indexOf('DaddReady') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data already registered, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_remarks_im_file.php');
  }
  // End Input - Add

  // Delete
  if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
    Swal.fire({
      title: 'Delete Alert!',
      icon: 'info',
      text: 'Data delete successfully!',
    })
    history.replaceState({}, '', './iou_adm_remarks_im_file.php');
  }

  if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
    Swal.fire({
      title: 'Delete Alert!',
      icon: 'info',
      text: 'Data failed to delete, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_remarks_im_file.php');
  }
  // End Delete
</script>