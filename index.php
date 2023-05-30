<?php
session_start();
include "include/config.php";

$url = $_SERVER['REQUEST_URI'];
$get_api = explode('/', $url);

if ($get_api[1] == 'api') {
    include $get_api[1] . '/' . $get_api[2] . '.php';
} else {
    if (!empty($_SESSION['ROLE'])) {
        include "include/pages/head.php";
        include "include/pages/alert.php";
        include "include/pages/header.php";
        include "include/pages/sidebar.php";

        if (empty($_GET['m']) and empty($_GET['s'])) {
            include "pages/home/index.php";
        } else if ($_GET['m'] != "" and $_GET['s'] != "") {
            if (file_exists("pages/" . $_GET['m'] . "/" . $_GET['s'] . ".php")) {
                include "pages/" . $_GET['m'] . "/" . $_GET['s'] . ".php";
            } else {
                include "notfound.php";
            }
        }

        include "include/pages/chat-panel.php";
        include "include/pages/modal-menu.php";
        include "include/pages/footer.php";
    } else {
        include "login.php";
    }
}
