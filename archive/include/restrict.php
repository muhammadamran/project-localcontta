<?php
session_start();
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    // header('location: http://kn-idcore.ap.win.int.kn/localcontta/login.php');
    header("location:../localcontta3/login.php");
}
$user = $_SESSION['username'];
