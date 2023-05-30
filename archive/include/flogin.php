<?php
include "db.php";
if (isset($_SESSION['newuser'])) {
    // header('location:http://kn-idcore.ap.win.int.kn/contta/index.php');
    header("Location: ./index.php");
}

if (isset($_POST['submit'])) {
    $user = $_POST['user_name'];
    $pass = $_POST['password'];
    $log_type = "login";
    $date_log = date('Y-m-d H:i:m');

    $q = $dbcon->query("SELECT * FROM tb_user WHERE user_name='$user' AND user_pass ='$pass'");

    if (mysqli_num_rows($q) == 1) {
        session_start();
        $_SESSION['username'] = $user;
        $query = $dbcon->query("INSERT INTO tb_log VALUES(' ','$user','$log_type','$date_log',' ')");
        if ($query) {
            header("Location: ./index.php?SignInsuccess=true");
        } else {
            echo "<h4>" . "log error" . $dbcon->connect_error . "</h4>";
        }
    } else {
        header("Location: ./login.php?error=true");
    }
}
