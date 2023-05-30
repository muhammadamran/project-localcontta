<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keywords" content="Localcontta,KN,Kuehne+Nagel,Kuehne,Nagel">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo/logo.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/logo.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo/logo.svg">
    <link href="assets/css/localcontta.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/plugins/timeline.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Icon V5 -->
    <link href="assets/fontawesome-5.15.4/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome-5.15.4/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome-5.15.4/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome-5.15.4/css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome-5.15.4/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <!-- End Icon V5 -->
    <link href="assets/thirdparty/chosen/chosen.css" rel="stylesheet" type="text/css" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="assets/css/plugins/timeline/timeline.css" rel="stylesheet">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <!-- FA Awesome -->
    <script src="https://kit.fontawesome.com/bd33a9775b.js" crossorigin="anonymous"></script>
    <!-- Alert -->
    <script src="assets/sweet/sweetalert2.all.js"></script>
    <script src="assets/sweet/sweetalert2.all.min.js"></script>
    <script src="assets/sweet/sweetalert2.js"></script>
    <script src="assets/sweet/sweetalert2.min.js"></script>
    <!-- Datatables -->
    <link href="assets/js/dataTables/tables.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- Loading -->
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
</head>
<style type="text/css">
    /*loading*/
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }

    /*Sweet Alert*/
    .swal2-popup {
        display: none;
        position: relative;
        box-sizing: border-box;
        flex-direction: column;
        justify-content: center;
        width: 32em;
        max-width: 100%;
        padding: 1.25em;
        border: none;
        border-radius: 5px;
        background: #fff;
        font-family: inherit;
        font-size: 1.6rem;
    }

    .swal2-styled.swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #002766;
        color: #fff;
        font-size: 1.0625em;
    }

    /*End Sweet Alert*/

    body {
        font-family: "Poppins", sans-serif;
    }

    tbody {
        font-size: 14px;
    }
</style>
<script type="text/javascript">
    function display_c() {
        var refresh = 1;
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var strcount
        var x = new Date()
        document.getElementById('ct').innerHTML = x;
        tt = display_c();
    }
</script>
<?php
// DATE
function date_indo($date, $print_day = false)
{
    $day = array(
        1 =>
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    );
    $month = array(
        1 =>
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
    $split    = explode('-', $date);
    $tgl_indo = $split[2] . ' ' . $month[(int)$split[1]] . ' ' . $split[0];

    if ($print_day) {
        $num = date('N', strtotime($date));
        return $day[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}
?>

<body onload="display_ct()">
    <div class="preloader">
        <div class="loading">
            <img src="assets/images/loader/localcontta.png" width="150">
        </div>
    </div>