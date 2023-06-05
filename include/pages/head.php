<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/app/icon/icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/app/icon/icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/app/icon/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/apps.css">
</head>
<script type="text/javascript">
    function display_c() {
        var refresh = 1000;
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var x = new Date()
        document.getElementById('ct').innerHTML = x;
        display_c();
    }
</script>

<body onload=display_ct();>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="assets/app/icon/icon.png" alt="Loader" width="150px"></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>