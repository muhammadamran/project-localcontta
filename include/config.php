<?php
$dbhost     = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname     = 'contta';
$db         = new mysqli($dbhost, $dbusername, $dbpassword, $dbname) or die(mysqli_connect_errno());

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

date_default_timezone_set("Asia/jakarta");

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

class helpers
{
    function dateIndonesia($date)
    {
        $result = '';
        if (!empty($date) && $date !== '0000-00-00') {
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl = substr($date, 8, 2);

            $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
        }
        return $result;
    }

    function dateTimeIndonesia($date)
    {
        $result = '';
        if (!empty($date) && $date !== '0000-00-00 00:00:00') {
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl = substr($date, 8, 2);

            $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun . ' - ' . substr($date, 11, 19);
        }
        return $result;
    }

    function berita($content)
    {
        $isi = strip_tags($content);
        if (strlen($isi) > 80) {
            $berita = substr($isi, 0, 80) . ' ...';
        } else {
            $berita = $content;
        }

        return $berita;
    }

    function hargaRupiah($harga)
    {
        return "Rp. " . number_format($harga, 0, ',', '.');
    }
}

// DATE SPLIT
function date_indo_s($date, $print_day = false)
{
    $day = array(
        1 =>
        'Sen',
        'Sel',
        'Rab',
        'Kam',
        'Jum',
        'Sab',
        'Min'
    );
    $month = array(
        1 =>
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );
    $split = explode('-', $date);
    $tgl_indo = $split[2] . ' ' . $month[(int)$split[1]] . ' ' . $split[0];

    if ($print_day) {
        $num = date('N', strtotime($date));
        return $day[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

// RUPIAH
function Rupiah($angka)
{
    $hasil = "Rp. " . number_format($angka, 2, ',', '.');
    return $hasil;
}

// DECIMAL
function decimal($number)
{
    $hasil = number_format($number, 0, ",", ",");
    return $hasil;
}

// NPWP
function NPWP($value)
{
    // 12.345.678.9-012.345
    $hasil = number_format($value, 0, ',', '.');
    return $hasil;
}

$helpers = new helpers();
