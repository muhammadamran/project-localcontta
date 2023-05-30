<?php
include "include/db.php";
include "include/restrict.php";
include "include/datatables.php";
?>
<!-- begin #content -->
<div id="content" class="nav-top-content">
    <div class="line-page"></div>
    <!-- begin row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="ui-icons-1">
                <div class="panel-body text-inverse">
                    <form action="report_ck5_plb_upload.php" method="post" enctype="multipart/form-data">
                        <div class="row" style="display: flex;align-items: center;">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div style="margin-bottom: 10px;justify-content: center;align-items: center;display: flex;">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg/826px-Microsoft_Office_Excel_%282019%E2%80%93present%29.svg.png" style="width: 15%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Upload Excel File:</label>
                                    <input type="hidden" class="form-control" name="username" value="<?= $_SESSION['username'] ?>" required>
                                    <input type="file" class="form-control" name="file_upload" required>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="btn btn-block btn-primary" value="Upload"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
</div>