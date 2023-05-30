<?php

include "include/connection.php";
include "include/restrict.php";

if (isset($_POST["submit"])) {  
  $uploaddir = 'file/freight/';
  $uploadfile = $uploaddir.date('Y-m-d');

  $query = move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
  if ($query) {
    if (mysql_query("LOAD DATA LOCAL INFILE '$uploadfile'
      INTO TABLE tb_freight
      FIELDS TERMINATED BY ','
      LINES TERMINATED BY '\n'
      IGNORE 1 LINES")) {
      header("Location: ./iou_adm_freight.php");
    } else{
      echo "submit data failed";
    }
  } else {
    echo "moving data failed".mysql_error();
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
          <i class="fa fa-atlas icon-title"></i> Administration
        </h1>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Upload Freight</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-table"></i> Record List
          </div>
          <div class="panel-body">
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-danger">
                    <div class="box-body">
                      <form name="postform" action=" " enctype='multipart/form-data' method="post">
                        <div class="form-group">
                          <label align="center">Upload the file:</label>
                          <input type="file" name="file" class="form-control" required/>        
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-block btn-warning"><i class="fas fa-upload"></i> Upload</button>                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </section>
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
