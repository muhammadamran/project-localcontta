<title>Search <?= $nameTitle; ?></title>
<?php
// FUNCTION SEARCHING
$findInputREFTN = '';
$findInputTypeREFTN = '';
$resultreftn = 'none';
if (isset($_GET['findone'])) {
    $findInputREFTN = $_GET['findInputREFTN'];
    $findInputTypeREFTN = $_GET['findInputTypeREFTN'];
    $resultreftn = 'show';
}

$findInputAJU = '';
$findInputTypeAJU = '';
$resultaju = 'none';
if (isset($_GET['findtwo'])) {
    $findInputAJU = $_GET['findInputAJU'];
    $findInputTypeAJU = $_GET['findInputTypeAJU'];
    $resultaju = 'show';
}
?>
<div class="main-container">
    <!-- Page Title -->
    <div class="up-page-title">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Search</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Search your data on this page.</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            January 2018
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="xs-pd-20-10 pd-ltr-20">
        <!-- UI -->
        <div class="row">
            <!-- End REF/TN -->
            <div class="col-md-6 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <!-- End REF/TN -->
            <!-- End No. Pengajuan (AJU) -->
            <div class="col-md-6 mb-30">
                <div class="card card-box">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <!-- End No. Pengajuan (AJU) -->
        </div>
        <!-- Search -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="icon-copy dw dw-filter1"></i> Filter Data - by
                        <select type="text" id="findby" style="background: transparent;border-color: transparent;">
                            <option value="opone">REF/TN</option>
                        </select>
                    </div>
                    <div class="panel-body">
                        <div class="page-add">
                            <form method="get" action="search.php" id="fformone" style="display: show;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ref / Tn </label>
                                            <?php if ($findInputREFTN == '') { ?>
                                                <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input Ref / Tn..." required>
                                            <?php } else { ?>
                                                <input type="text" name="findInputREFTN" id="idfindInputREFTN" class="form-control" placeholder="Input Ref / Tn..." value="<?= $findInputREFTN; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select type="text" name="findInputTypeREFTN" id="idfindInputTypeREFTN" class="form-control" required>
                                                <?php if ($findInputTypeREFTN == '') { ?>
                                                    <option value="">-- Select Type --</option>
                                                <?php } else { ?>
                                                    <option value="<?= $findInputTypeREFTN; ?>"><?= $findInputTypeREFTN; ?></option>
                                                    <option value="">-- Select Type --</option>
                                                <?php } ?>
                                                <option value="import">Import</option>
                                                <option value="export">Export</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: right;">
                                        <a href="search.php" type="button" class="btn btn-info">
                                            <div class="icon-btn-y">
                                                <i class="icon-copy dw dw-delete"></i>
                                                &nbsp;Cancel
                                            </div>
                                        </a>
                                        <button type="submit" name="findone" id="idbtnfindone" class="btn btn-primary"><i class="icon-copy dw dw-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="icon-copy dw dw-filter1"></i> Filter Data - by
                        <select type="text" id="findby" style="background: transparent;border-color: transparent;">
                            <option value="opone">Aju</option>
                        </select>
                    </div>
                    <div class="panel-body">
                        <div class="page-add">
                            <form method="get" action="search.php" id="fformone" style="display: show;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aju </label>
                                            <?php if ($findInputAJU == '') { ?>
                                                <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input Aju..." required>
                                            <?php } else { ?>
                                                <input type="text" name="findInputAJU" id="idfindInputAJU" class="form-control" placeholder="Input Aju..." value="<?= $findInputAJU; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select type="text" name="findInputTypeAJU" id="idfindInputTypeAJU" class="form-control" required>
                                                <?php if ($findInputTypeAJU == '') { ?>
                                                    <option value="">-- Select Type --</option>
                                                <?php } else { ?>
                                                    <option value="<?= $findInputTypeAJU; ?>"><?= $findInputTypeAJU; ?></option>
                                                    <option value="">-- Select Type --</option>
                                                <?php } ?>
                                                <option value="import">Import</option>
                                                <option value="export">Export</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: right;">
                                        <a href="search.php" type="button" class="btn btn-info">
                                            <div class="icon-btn-y">
                                                <i class="icon-copy dw dw-delete"></i>
                                                &nbsp;Cancel
                                            </div>
                                        </a>
                                        <button type="submit" name="findtwo" id="idbtnfindtwo" class="btn btn-primary"><i class="icon-copy dw dw-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search -->
        <!-- UI -->
    </div>
</div>
<!-- Consignee -->
<script type="text/javascript">
    // Input - Add
    if (window?.location?.href?.indexOf('CaddSuccess') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data saved successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CaddFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to save, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CaddReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Input - Add

    // Update Data
    if (window?.location?.href?.indexOf('CUpdateSuccessCC') > -1) {
        Swal.fire({
            title: 'Success Alert!',
            icon: 'success',
            text: 'Data updated successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CUpdateFailed') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Data failed to updated, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('CUpdateReady') > -1) {
        Swal.fire({
            title: 'Failed Alert!',
            icon: 'error',
            text: 'Consignee Name already registered, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Update Data

    // Delete
    if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data delete successfully!',
        })
        history.replaceState({}, '', './search.php');
    }

    if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
        Swal.fire({
            title: 'Delete Alert!',
            icon: 'info',
            text: 'Data failed to delete, please contact your administrator!',
        })
        history.replaceState({}, '', './search.php');
    }
    // End Delete

    // REF IMPORT
    function openDetails(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // END REF IMPORT
</script>