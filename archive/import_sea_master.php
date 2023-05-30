<script src="assets/js/jquery.min.js"></script>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

if (isset($_POST["createImportSea"])) {

  $hbl            = $_POST['InputHBL'];
  $shipper        = $_POST['InputShipper'];
  $cnee           = $_POST['InputConsignee'];
  $inv_no         = $_POST['InputInvoiceNo'];
  $mot            = $_POST['InputMOT'];
  $weight         = $_POST['InputWeight'];
  $c20            = $_POST['Input20'];
  $c40            = $_POST['Input40'];
  $ref            = $_POST['InputKNREFTN'];

  if ($c20 == "0") {
    $party_sql = $c40 . "x40";
  } elseif ($c40 == "0") {
    $party_sql = $c20 . "x20";
  } elseif ($c40 == 0 and $c20 == 0) {
    $party_sql = "";
  } elseif ($c40 != 0 and $c20 != 0) {
    $party_sql = $c20 . "x20" . " + " . $c40 . "x40";
  }

  $cbm                  = $_POST['InputCBM'];
  $eta                  = $_POST['InputETA'];

  $rcd_type             = "import";
  $user_name            = $_SESSION['username'];
  $datenow              = date('Y-m-d h:i:s');
  $monthnow             = date('m');
  $yearnow              = date('Y');

  if ($mot == "LCL") {
    $package_sql  = $_POST['InputPackage'];
  } else {
    $package_sql  = "No package";
  }

  $cekref = mysql_query("SELECT rcd_hbl FROM tb_master_impor WHERE rcd_hbl = '$hbl'");
  if (mysql_num_rows($cekref) == 0) {
    $query = mysql_query("INSERT INTO tb_master_impor VALUES (' ','$datenow','$monthnow','$yearnow','$user_name','$rcd_type','$hbl','$shipper','$cnee','$inv_no','','$ref','$c20','$c40','$party_sql','$weight','$package_sql','$cbm','$eta','','','','','$mot','New','')");
    $last_id = mysql_insert_id();
    $query .= mysql_query("INSERT INTO tb_record_miles_import VALUES (' ','$last_id','0','0','0','0','0','0','$mot')");
    $query .= mysql_query("INSERT INTO tb_imp_pre(pre_id,rcd_id) VALUES (' ','$last_id')");
    $query .= mysql_query("INSERT INTO tb_imp_clear(clear_id,rcd_id) VALUES (' ','$last_id')");
    $query .= mysql_query("INSERT INTO tb_imp_post(post_id,rcd_id) VALUES (' ','$last_id')");
    $query .= mysql_query("INSERT INTO tb_truck_assign(truck_job_id,rcd_id) VALUES (' ','$last_id')");
    if ($query) {
      header("Location: ./import_sea_master.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_master.php?InputFailed=true");
    }
  }
}

if (isset($_POST["EditImportSea"])) {
  // For Where
  $ID             = $_POST['uid'];
  // End For Where
  $hbl            = $_POST['EditHBL'];
  $shipper        = $_POST['EditShipper'];
  $cnee           = $_POST['EditConsignee'];
  $inv_no         = $_POST['EditInvoiceNo'];
  $mot            = $_POST['EditMOT'];
  $weight         = $_POST['EditWeight'];
  $c20            = $_POST['Edit20'];
  $c40            = $_POST['Edit40'];
  $ref            = $_POST['EditKNREFTN'];

  if ($c20 == "0") {
    $party_sql = $c40 . "x40";
  } elseif ($c40 == "0") {
    $party_sql = $c20 . "x20";
  } elseif ($c40 == 0 and $c20 == 0) {
    $party_sql = "";
  } elseif ($c40 != 0 and $c20 != 0) {
    $party_sql = $c20 . "x20" . " + " . $c40 . "x40";
  }

  $cbm                  = $_POST['EditCBM'];
  $eta                  = $_POST['EditETA'];

  $rcd_type             = "import";
  $user_name            = $_SESSION['username'];
  $datenow              = date('Y-m-d h:i:s');
  $monthnow             = date('m');
  $yearnow              = date('Y');

  if ($mot == "LCL") {
    $package_sql  = $_POST['EditPackage'];
  } else {
    $package_sql  = "No package";
  }

  $query = mysql_query("UPDATE tb_master_impor SET rcd_hbl='$hbl',
                                                     rcd_shipper='$shipper',
                                                     rcd_cnee='$cnee',
                                                     rcd_inv_no='$inv_no',
                                                     rcd_mot='$mot',
                                                     rcd_weight='$weight',
                                                     rcd_20_type='$c20',
                                                     rcd_40_type='$c40',
                                                     rcd_ref='$ref',
                                                     rcd_cbm='$cbm',
                                                     rcd_eta='$eta',
                                                     rcd_package='$package_sql'
                                                 WHERE rcd_id='$ID'");

  $query .= mysql_query("UPDATE tb_record_miles_import SET mot='$mot'
                                                         WHERE rcd_id='$ID'");
  if ($query) {
    header("Location: ./import_sea_master.php?UpdateSuccess=true");
  } else {
    header("Location: ./import_sea_master.php?UpdateFailed=true");
  }
}

if (isset($_POST["resi"])) {
  $rid                = $_POST['rid'];
  $rcd_type           = $_POST['rcd_type'];
  $date_taken         = date('Y-m-d H:i:s');

  $uploaddir = 'file/cipl/';
  $uploadfile = $uploaddir . '_' . $rid . $rcd_type . '_' . date("YmdHis") . '_' . basename($_FILES['form']['name']);

  $query = move_uploaded_file($_FILES['form']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("UPDATE tb_master_impor SET cipl_file ='$uploadfile' WHERE rcd_id='$rid'")) {
      mysql_query("UPDATE tb_master_impor SET rcd_status = 'pre-clear' WHERE rcd_id='$rid'");
      header("Location: ./import_sea_master.php?InputSuccess=true");
    } else {
      header("Location: ./import_sea_master.php?InputFailed=true");
    }
  } else {
    header("Location: ./import_sea_master.php?InputFailed=true");
  }
}

if (isset($_POST["complete"])) {

  $rcd_id           = $_POST['rcdid'];
  $user_name        = $_POST['user_name'];
  $datenow          = date('Y-m-d H:i:s');

  $query = mysql_query("UPDATE tb_master_impor SET rcd_status = 'pre-clear' WHERE rcd_id='$rcd_id'");
  if ($query) {
    header("Location: ./import_sea_master.php?InputSuccess=true");
  } else {
    header("Location: ./import_sea_master.php?InputFailed=true");
  }
}

// FUNCTION SEARCHING
$fOP1 = '';
$fOP2 = '';
// 1
$findRCDID  = '';
$findRCDCreated = '';
if (isset($_GET['findone'])) {
  $findRCDID  = $_GET['findRCDID'];
  $findRCDCreated = $_GET['findRCDCreated'];
}

// 2
$findREF  = '';
$findINV = '';
$findHBL = '';
if (isset($_GET['findtwo'])) {
  $findREF  = $_GET['findREF '];
  $findINV = $_GET['findINV'];
  $findHBL = $_GET['findHBL'];
}

// 3
$startdate = '';
$enddate = '';
if (isset($_GET['findthree'])) {
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];
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
            <li class="breadcrumb-item active" aria-current="page">Import Master</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <!-- Search -->
    <?php
    if ($findRCDID != NULL) {
      $fOP1 = 'selected';
      $fOP2 = 'none';
    } else if ($findRCDCreated != NULL) {
      $fOP1 = 'none';
      $fOP2 = 'selected';
    }
    ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fas fa-filter"></i> Filter Data - by
            <select type="text" id="findby" style="background: transparent;border-color: transparent;">
              <option value="opone">RCD</option>
              <!-- <option value="optwo">Number</option> -->
              <option value="opthree">Date Range</option>
            </select>
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="import_sea_master.php" id="fformone" style="display: show;">
                <div class="row">
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Column <font style="color: red;">*</font></label>
                      <select class="form-control" id="idColoumOne" required>
                        <option value="">--- SELECT COLUMN ---</option>
                        <option value="opRCDID" <?= $fOP1 ?>>RCD ID</option>
                        <option value="opRCDDATE" <?= $fOP2 ?>>RCD Created</option>
                      </select>
                    </div>
                  </div> -->
                  <div class="col-md-12" id="DisplayRCDID" style="display: show;">
                    <div class="form-group">
                      <label>RCD ID </label>
                      <select class="form-control" name="findRCDID" id="idfindRCDID">
                        <?php if ($findRCDID == '') { ?>
                          <option value=" ">--- SELECT ---</option>
                        <?php } else { ?>
                          <option value="<?= $findRCDID ?>"><?= $findRCDID ?></option>
                          <option value=" ">--- SELECT ---</option>
                        <?php } ?>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('contta');
                        $resultFindRCDID = mysql_query("SELECT rcd_id FROM tb_master_impor WHERE rcd_status='New' GROUP BY rcd_id ORDER BY rcd_id DESC");
                        while ($dataFindRCDID = mysql_fetch_array($resultFindRCDID)) {
                          echo "<option value='$dataFindRCDID[rcd_id]'> $dataFindRCDID[rcd_id] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" id="DisplayRCDDATE" style="display: none;">
                    <div class="form-group">
                      <label>RCD Created </label>
                      <?php if ($findRCDCreated == '') { ?>
                        <input type="date" name="findRCDCreated" id="idfindRCDCreated" class="form-control" placeholder="RCD Created...">
                      <?php } else { ?>
                        <input type="date" name="findRCDCreated" id="idfindRCDCreated" class="form-control" placeholder="RCD Created..." value="<?= $findRCDCreated; ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="import_sea_master.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              <form method="get" action="import_sea_master.php" id="fformtwo" style="display: none;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>REF </label>
                      <select class="form-control" name="findREF" id="idfindREF">
                        <?php if ($findREF == '') { ?>
                          <option value=" ">--- SELECT ---</option>
                        <?php } else { ?>
                          <option value="<?= $findREF ?>"><?= $findREF ?></option>
                          <option value=" ">--- SELECT ---</option>
                        <?php } ?>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('contta');
                        $resultFindREF = mysql_query("SELECT rcd_ref FROM tb_master_impor WHERE rcd_status='New' GROUP BY rcd_ref ORDER BY rcd_id DESC");
                        while ($dataFindREF = mysql_fetch_array($resultFindREF)) {
                          echo "<option value='$dataFindREF[rcd_ref]'> $dataFindREF[rcd_ref] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>INV </label>
                      <select class="form-control" name="findINV" id="idfindINV">
                        <?php if ($findINV == '') { ?>
                          <option value=" ">--- SELECT ---</option>
                        <?php } else { ?>
                          <option value="<?= $findINV ?>"><?= $findINV ?></option>
                          <option value=" ">--- SELECT ---</option>
                        <?php } ?>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('contta');
                        $resultFindINV = mysql_query("SELECT rcd_inv_no FROM tb_master_impor WHERE rcd_status='New' GROUP BY rcd_inv_no ORDER BY rcd_id DESC");
                        while ($dataFindINV = mysql_fetch_array($resultFindINV)) {
                          echo "<option value='$dataFindINV[rcd_inv_no]'> $dataFindINV[rcd_inv_no] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>HBL </label>
                      <select class="form-control" name="findHBL" id="idfindHBL">
                        <?php if ($findHBL == '') { ?>
                          <option value=" ">--- SELECT ---</option>
                        <?php } else { ?>
                          <option value="<?= $findHBL ?>"><?= $findHBL ?></option>
                          <option value=" ">--- SELECT ---</option>
                        <?php } ?>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('contta');
                        $resultFindHBL = mysql_query("SELECT rcd_hbl FROM tb_master_impor WHERE rcd_status='New' GROUP BY rcd_hbl ORDER BY rcd_id DESC");
                        while ($dataFindHBL = mysql_fetch_array($resultFindHBL)) {
                          echo "<option value='$dataFindHBL[rcd_hbl]'> $dataFindHBL[rcd_hbl] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12" style="text-align: right;">
                    <a href="import_sea_master.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                    <button type="submit" name="findtwo" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
              <form method="get" action="import_sea_master.php" id="fformthree" style="display: none;">
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
                    <a href="import_sea_master.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
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
            <i class="fa fa-table"></i> Import - Seafreight
          </div>
          <div class="panel-body">
            <!-- Add Import - Airfreight -->
            <div class="page-add-new">
              <h4>Create New Record</h4>
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#CMasterImportSeafreight">
                <i class="fa fa-plus"></i> Create!
              </button>
            </div>
            <?php include 'modals/m_import_sea_master.php'; ?>
            <!-- End Add Import - Airfreight -->
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
                  $con = mysqli_connect("localhost", "root", "", "contta");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $me = $_SESSION['username'];
                  if (isset($_GET['findone'])) {
                    $findRCDID = $_GET['findRCDID'];
                    $findRCDCreated = $_GET['findRCDCreated'];
                    if ($findRCDID != NULL) {
                      $result = mysqli_query($con, "SELECT * FROM tb_master_impor WHERE rcd_status = 'New' AND rcd_mot!='AIR' AND rcd_id LIKE '%$findRCDID%'");
                    } else if ($findRCDCreated != NULL) {
                      $result = mysqli_query($con, "SELECT * FROM tb_master_impor WHERE rcd_status = 'New' AND rcd_mot!='AIR' AND rcd_created_date LIKE '%$findRCDCreated%'");
                    }
                  } else if (isset($_GET['findtwo'])) {
                    $findREF = $_GET['findREF'];
                    $findINV = $_GET['findINV'];
                    $findHBL = $_GET['findHBL'];
                    $result = mysqli_query($con, "SELECT * FROM tb_master_impor WHERE rcd_status = 'New' AND rcd_mot!='AIR' AND rcd_ref LIKE '%$findREF%' AND rcd_inv_no LIKE '%$findINV%' AND rcd_hbl LIKE '%$findHBL%'");
                  } else if (isset($_GET['findtthree'])) {
                    $startdate = $_GET['startdate'];
                    $enddate = $_GET['enddate'];
                    $result = mysqli_query($con, "SELECT * FROM tb_master_impor WHERE rcd_status = 'New' AND rcd_mot!='AIR' AND rcd_create_date BETWEEN '$startdate' AND '$enddate'");
                  } else {
                    $result = mysqli_query($con, "SELECT * FROM tb_master_impor WHERE rcd_status = 'New' AND rcd_mot!='AIR' ORDER BY rcd_id DESC LIMIT 50");
                  }
                  if (mysqli_num_rows($result) > 0) {
                    $no = 0;
                    while ($row = mysqli_fetch_array($result)) {
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
                      </div>
                      </td>";
                      if ($row['cipl_file'] == '') {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Not Found" . "</span></td>";
                      } else {
                        echo "<td style='text-align: center'><span class='label label-danger'>" . "File Uploaded" . "</span></td>";
                      }
                      echo "<td style='text-align: center;'>
                      <div style='display: flex;justify-content: space-between;align-items: center;'>
                        <div>
                          <a href='#' data-toggle='modal' data-target='#edit$row[rcd_id]' title='Edit this record'>
                          <span class='btn btn-warning'>
                          <i class='fa fa-pencil'></i>
                          </span>
                          </a>
                        </div>
                        <div style='margin-left: 10px;'>";
                      if ($row['cipl_file'] == "") {
                        echo "<a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'>
                          <span class='btn btn-sm btn-danger'>
                          Complete
                          </span>
                          </a>";
                      } else {
                        echo "<a href='#' data-toggle='modal' data-target='#confirm$row[rcd_id]' title='Completed this record'>
                          <span class='btn btn-sm btn-success'>
                          Complete
                          </span>
                          </a>";
                      }
                      echo "
                      </div>
                      </div>
                      </td>";
                      echo "</tr>";
                  ?>
                      <!-- Edit -->
                      <div class="modal fade" id="edit<?= $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Edit] </b> Import - Seafreight - RCD ID - <?= $row['rcd_id']; ?></h4>
                            </div>
                            <form action="" method="POST">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Document</p>
                                    <hr>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>KN. REF/TN NO. </label>
                                          <input type="hidden" name="uid" value="<?= $row['rcd_id'] ?>">
                                          <input type="text" class="form-control" name="EditKNREFTN" id="EditIdKNREFTN" placeholder="KN. REF/TN NO. ..." value="<?= $row['rcd_ref'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>HBL/HAWB </label>
                                          <input type="text" class="form-control" name="EditHBL" id="EditIdHBL" placeholder="HBL/HAWB ..." value="<?= $row['rcd_hbl'] ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Invoice No. </label>
                                          <input type="text" class="form-control" name="EditInvoiceNo" id="EditIdInvoiceNo" placeholder="Invoice No. ..." value="<?= $row['rcd_inv_no'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>ETA </label>
                                          <input type="date" class="form-control" name="EditETA" id="EditIdETA" placeholder="ETA ..." value="<?= $row['rcd_eta'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>MOT </label>
                                          <select class="form-control" name="EditMOT" id="EditIdMOT" required>
                                            <option value="<?= $row['rcd_mot'] ?>"><?= $row['rcd_mot'] ?></option>
                                            <option value="" id="">-- SELECT ---</option>
                                            <option value="FCL" id="IDFCL">FCL</option>
                                            <option value="LCL" id="IDLCL">LCL</option>
                                          </select>
                                        </div>
                                      </div>
                                      <?php
                                      if ($row['rcd_package'] == 'No package') {
                                        $dds = 'none';
                                      } else {
                                        $dds = 'show';
                                      }
                                      ?>
                                      <div class="col-md-12" id="EditforPackage" style="display: <?= $dds ?>;">
                                        <div class="form-group">
                                          <label>Package</label>
                                          <?php if ($row['rcd_package'] == 'No package') { ?>
                                            <input type="text" class="form-control" name="EditPackage" id="EditIdPackage" placeholder="Package ...">
                                          <?php } else { ?>
                                            <input type="text" class="form-control" name="EditPackage" id="EditIdPackage" placeholder="Package ..." value="<?= $row['rcd_package'] ?>">
                                          <?php } ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                    <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Shipper & Consignee</p>
                                    <hr>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Shipper </label>
                                          <select class="form-control" name="EditShipper" id="EditIdShipper" required>
                                            <option value="<?= $row['rcd_shipper'] ?>"><?= $row['rcd_shipper'] ?></option>
                                            <option value=" ">--- SELECT ---</option>
                                            <?php
                                            mysql_connect('localhost', 'root', '');
                                            mysql_select_db('contta');
                                            $resultEditShipper = mysql_query("SELECT * FROM tb_shipper WHERE type = 'import'");
                                            while ($dataEditShipper = mysql_fetch_array($resultEditShipper)) {
                                              echo "<option value='$dataEditShipper[user_name]'> $dataEditShipper[user_name] </option>";
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Consignee </label>
                                          <select class="form-control" name="EditConsignee" id="EditIdConsignee" required>
                                            <option value="<?= $row['rcd_cnee'] ?>"><?= $row['rcd_cnee'] ?></option>
                                            <option value=" ">--- SELECT ---</option>
                                            <?php
                                            mysql_connect('localhost', 'root', '');
                                            mysql_select_db('contta');
                                            $resultEditConsignee = mysql_query("SELECT * FROM tb_cnee WHERE type = 'import'");
                                            while ($dataEditConsignee = mysql_fetch_array($resultEditConsignee)) {
                                              echo "<option value='$dataEditConsignee[user_name]'> $dataEditConsignee[user_name] </option>";
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                    <p style="font-weight: 600;background-color: aqua;margin-right: 730px;border-radius: 0px 0px 35px 0;">Detail Import - Seafreight</p>
                                    <hr>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Weight</label>
                                          <input type="text" class="form-control" name="EditWeight" id="EditIdWeight" placeholder="Weight ..." value="<?= $row['rcd_weight'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>20'</label>
                                          <input type="text" class="form-control" name="Edit20" id="EditId20" placeholder="20' ..." value="<?= $row['rcd_20_type'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>40'</label>
                                          <input type="text" class="form-control" name="Edit40" id="EditId40" placeholder="40' ..." value="<?= $row['rcd_40_type'] ?>">
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>CBM </label>
                                          <input type="text" class="form-control" name="EditCBM" id="EditIdCBM" placeholder="CBM ..." value="<?= $row['rcd_cbm'] ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                                <button type="submit" name="EditImportSea" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Edit -->

                      <!-- Complete -->
                      <div class="modal fade" id="confirm<?= $row['rcd_id']; ?>" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><b>[Complete] </b> Import - Seafreight - RCD ID - <?= $row['rcd_id']; ?></h4>
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
                                      <input type="hidden" name="rcdid" class="form-control" value="<?= $row['rcd_id']; ?>">
                                      <input type="hidden" name="user_name" class="form-control" value="<?= $_SESSION['username']; ?>">
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
                      <!-- Complete -->
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
<script type="text/javascript" src="assets/thirdparty/chosen/chosen.jquery.js"></script>
<!-- Import Master Sea -->
<script type="text/javascript">
  // Add
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

  // Edit
  $(function() {
    $("#EditIdMOT").change(function() {
      if ($(this).val() == "FCL") {
        $("#EditforPackage").hide();
      } else if ($(this).val() == "LCL") {
        $("#EditforPackage").show();
      } else {
        $("#EditforPackage").hide();
      }
    });
  });

  jQuery(function($) {
    // Find
    // 1
    $("#idfindRCDID").chosen({
      width: "100%"
    });
    // 2
    $("#idfindREF").chosen({
      width: "100%"
    });
    $("#idfindINV").chosen({
      width: "100%"
    });
    $("#idfindHBL").chosen({
      width: "100%"
    });
    // Add
    $("#IdShipper").chosen({
      width: "100%"
    });
    $("#IdConsignee").chosen({
      width: "100%"
    });
    // Edit
    $("#EditIdShipper").chosen({
      width: "100%"
    });
    $("#EditIdConsignee").chosen({
      width: "100%"
    });
  });
  // Input - Add
  if (window?.location?.href?.indexOf('InputSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data saved successfully!',
    })
    history.replaceState({}, '', './import_sea_master.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_master.php');
  }
  // End Input - Add

  // Update - Add
  if (window?.location?.href?.indexOf('UpdateSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data updated successfully!',
    })
    history.replaceState({}, '', './import_sea_master.php');
  }

  if (window?.location?.href?.indexOf('UpdateFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to update, please contact your administrator!',
    })
    history.replaceState({}, '', './import_sea_master.php');
  }
  // End Update - Add

  $(function() {
    $("#idColoumOne").change(function() {
      if ($(this).val() == "opRCDID") {
        $("#DisplayRCDID").show();
        $("#DisplayRCDDATE").hide();
        $("#DisplayRCDBY").hide();
      } else if ($(this).val() == "opRCDDATE") {
        $("#DisplayRCDDATE").show();
        $("#DisplayRCDID").hide();
        $("#DisplayRCDBY").hide();
      } else if ($(this).val() == "opRCDBY") {
        $("#DisplayRCDBY").show();
        $("#DisplayRCDID").hide();
        $("#DisplayRCDDATE").hide();
      } else {
        $("#DisplayRCDID").hide();
        $("#DisplayRCDDATE").hide();
        $("#DisplayRCDBY").hide();
      }
    });
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