<title>Management Users - Localcontta | Kuehne + Nagel Indonesia</title>
<script src="assets/js/jquery.min.js"></script>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";
require($_SERVER['DOCUMENT_ROOT'] . '/thirdparty/PHPMailer/class.phpmailer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/thirdparty/PHPMailer/class.smtp.php');

// Search
$findUsername   = '';
$findRole       = '';
$findBranch     = '';
$findScope      = '';
$findDeaprtment = '';
if (isset($_POST['findFilter'])) {
}

// ADD
if (isset($_POST["create"])) {
  // Admin
  $cekRole =  $_POST['user_role'];
  if ($cekRole == 'admin') {
    $username             = $_POST['admin_user_name'];
    $password             = 'changeme';
    $email                = $_POST['admin_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['admin_scope'];
    $department           = $_POST['admin_dept'];
    $user_branches        = $_POST['admin_user_branches'];
    $user_modules         = $_POST['user_modules'];
    $modules              = "";
    foreach ($user_modules as $row_modules) {
      $modules .= $row_modules . ",";
    }

    // CRUD
    if ($_POST['AddInsert'] != 'Y') {
      $AddInsert = '0';
    } else {
      $AddInsert = '1';
    }
    if ($_POST['AddUpdate'] != 'Y') {
      $AddUpdate = '0';
    } else {
      $AddUpdate = '1';
    }
    if ($_POST['AddDelete'] != 'Y') {
      $AddDelete = '0';
    } else {
      $AddDelete = '1';
    }
    // END CRUD

    // Email Send
    $mail               = new PHPMailer();
    $mail->IsSMTP();
    $mail->Debugoutput  = 'html';
    $mail->Host         = "smtplocal.us.int.kn";
    $mail->Port         = 25;
    // $mail->SMTPSecure   = 'ssl';
    $mail->From         = "donotreply@kuehne-nagel.com";
    $mail->FromName     = "Administrator";
    $to                 =  $email;
    $mail->AddAddress($to);
    $mail->Subject = 'LOCALCONTTA for CUSTOMS';
    $mail->isHTML(true);
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Localcontta | Kuehne + Nagel Indonesia</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjuc4O-N5W-IvaUh7DI0a4zcEzcW7vw7om9daaq4ULOyrjrYP2d-fsuYwOtVbaN1yFCJLP2x3qlt95n4jltwyuwZ8lUvTYEF9YIrRnZr-UWF46Yd1qiJmowkwybdZoVrW3iWs_4OhYT1_vOCaZf3JF1_qMst1l4MPMMcTq2wiGn_XJt_TZ3-SqbsqwS/s320/logo.png">
    </head>
    <body><table width="100%"><tbody><tr><td><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiHSDnonr4g4HPX5bPU9HXAx5N5K8DGJJ-nCVqCX1eaT49JpaLt4dUoQXOzdRg8aGnx-j3VqgOpFoQIsl6zRiocvMS4pExpkHXBhHE3KfqTEijoHRjgeXF75edSzUsBr4gCg1NX0jb4VPQG-Va5_eDLl2toYtw13M_omb9A3POjwLAcbyyREpIc5J7D/s1600/kn-indo.png" align="center" border="0" alt="Image" title="Image" style="text-decoration:none;height:auto;border:none;width:100%;max-width:215px;display:block" width="615"></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Paragraph --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:transparent"><div style="border-collapse:collapse;display:table;width:100%;background-color:transparent"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px"><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:5px;padding-right:10px;padding-bottom:0px;padding-left:10px"><div style="font-size:12px;line-height:1.5;font-family:Poppins,sans-serif;color:#555555"><p style="font-size:13px;line-height:1.5;text-align:left;margin:0"><span style="font-size:13px;color:#000000"><span style="font-size:13px"><strong><span style="font-size:13px">Hi, ' . $username . '!</span></strong></span><span style="font-size:13px"><strong><span style="font-size:13px"></span></strong></span></span></p></div></div><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><div style="font-family:Poppins,sans-serif;font-size:12px;line-height:1.5;color:#555555"><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000">This email is a notification to you, you have been registered as a localcontta application user, here are your account details:<br><br><b>Username: ' . $username . '</b> <br><b>Password: ' . $password . '</b> <br><b>Role: ' . $role . '</b> <br><b>Branch: ' . $user_branches . '</b> <br><b>Scope: ' . $scope . '</b> <br><b>Business Unit: ' . $department . '</b> <br><br><br><br></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"><br>Click the button to open appliacation Localcontta:</span></p></div></div></div></div></div></div></div><!-- Button --><div align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><a href="http://kn-idcore.ap.win.int.kn/localcontta" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#2196f3;border-radius:4px;width:auto;width:auto;border-top:1px solid #2196f3;border-right:1px solid #2196f3;border-bottom:1px solid #2196f3;border-left:1px solid #2196f3;padding-top:5px;padding-bottom:5px;font-family:Poppins,sans-serif;text-align:center;word-break:keep-all" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block"><span style="font-size:12px;line-height:2"><span style="font-size:16px;line-height:32px">Link!</span></span></span></a></div><!-- Garis --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Slogan --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><br><span class="login100-form-title p-b-5 p-t-27" style="font-family: Poppins;font-size: 30px;color: #fff;line-height: 1.2;text-align: center;text-transform: uppercase;display: block;display: inline-block;margin-bottom: 20px;">LOCALCONTTA<div class="menu__divider"></div></span><br></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:1px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Poltekpos --><div style="background-color:transparent"><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:#ffffff"><div style="border-collapse:collapse;display:table;width:100%;background-color:#ffffff"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right:0px;padding-left:0px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px" valign="top"><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:undefined" valign="top"><tbody><tr style="vertical-align:top;display:inline-block;text-align:center" align="center" valign="top"><center style="font-family: Poppins, sans-serif;font-size: 12px;font-weight: 600;"><p align="center"><b>LOCALCONTTA </b><i>for</i><b> CUSTOMS</b></p></center><br><td style="word-break:break-word;vertical-align:top;padding-bottom:0px;padding-right:3px;padding-left:3px" valign="top"><a href="http://kn-idcore.ap.win.int.kn/" target="_blank"><img style="text-decoration:none;height:auto;border:none;display:block;width: 180px;margin-top: -30px;margin-bottom: 0px;" width="32" height="32" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4zONU3t5CcDeNAagII3K3B2ExrIEcqmpzivX8tcD9IVLZcP2DCGfCXZR7bN4F58JxQDHKkc12QFm4tocNKvDb0jYfJYAPChrS7y1VmT4xxqCEPiQbcmdzT_mXP3Q01yM3SQNe0_fHHCxzlVPW9vZ7j3UL1UReCU1T1uwUT1T59RB5-DRCMo13Wzw9/w143-h23/header.png" alt="KN-IDCORE" title="KN-IDCORE" style="text-decoration:none;height:auto;border:none;display:block"></a></td></tr></tbody></table></td></tr></tbody></table><div style="font-family:Poppins,sans-serif;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"></div></div></div></div></div></div></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></td></tr></tbody></table></body></html>';
    if ($mail->Send()) {
      echo "<script language=javascript> alert(\"Sending Success!!\");</script>";
    } else {
      echo "<script language=javascript> alert(\"Sending Failed!!\");</script>";
    }

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches,user_modules,INSERT,UPDATE,DELETE)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches','$modules','$AddInsert','$AddUpdate','$AddDelete')");
    if ($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");
    }
    // General Manager
  } else if ($cekRole == 'gm') {
    $username             = $_POST['gm_user_name'];
    $password             = 'changeme';
    $email                = $_POST['gm_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['gm_scope'];
    $department           = $_POST['gm_dept'];
    $user_branches        = $_POST['gm_user_branches'];
    $user_modules         = $_POST['user_modules'];
    $modules              = "";
    foreach ($user_modules as $row_modules) {
      $modules .= $row_modules . ",";
    }

    // CRUD
    if ($_POST['AddInsert'] != 'Y') {
      $AddInsert = '0';
    } else {
      $AddInsert = '1';
    }
    if ($_POST['AddUpdate'] != 'Y') {
      $AddUpdate = '0';
    } else {
      $AddUpdate = '1';
    }
    if ($_POST['AddDelete'] != 'Y') {
      $AddDelete = '0';
    } else {
      $AddDelete = '1';
    }
    // END CRUD

    // Email Send
    $mail               = new PHPMailer();
    $mail->IsSMTP();
    $mail->Debugoutput  = 'html';
    $mail->Host         = "smtplocal.us.int.kn";
    $mail->Port         = 25;
    // $mail->SMTPSecure   = 'ssl';
    $mail->From         = "donotreply@kuehne-nagel.com";
    $mail->FromName     = "Administrator";
    $to                 =  $email;
    $mail->AddAddress($to);
    $mail->Subject = 'LOCALCONTTA for CUSTOMS';
    $mail->isHTML(true);
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Localcontta | Kuehne + Nagel Indonesia</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjuc4O-N5W-IvaUh7DI0a4zcEzcW7vw7om9daaq4ULOyrjrYP2d-fsuYwOtVbaN1yFCJLP2x3qlt95n4jltwyuwZ8lUvTYEF9YIrRnZr-UWF46Yd1qiJmowkwybdZoVrW3iWs_4OhYT1_vOCaZf3JF1_qMst1l4MPMMcTq2wiGn_XJt_TZ3-SqbsqwS/s320/logo.png">
    </head>
    <body><table width="100%"><tbody><tr><td><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiHSDnonr4g4HPX5bPU9HXAx5N5K8DGJJ-nCVqCX1eaT49JpaLt4dUoQXOzdRg8aGnx-j3VqgOpFoQIsl6zRiocvMS4pExpkHXBhHE3KfqTEijoHRjgeXF75edSzUsBr4gCg1NX0jb4VPQG-Va5_eDLl2toYtw13M_omb9A3POjwLAcbyyREpIc5J7D/s1600/kn-indo.png" align="center" border="0" alt="Image" title="Image" style="text-decoration:none;height:auto;border:none;width:100%;max-width:215px;display:block" width="615"></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Paragraph --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:transparent"><div style="border-collapse:collapse;display:table;width:100%;background-color:transparent"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px"><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:5px;padding-right:10px;padding-bottom:0px;padding-left:10px"><div style="font-size:12px;line-height:1.5;font-family:Poppins,sans-serif;color:#555555"><p style="font-size:13px;line-height:1.5;text-align:left;margin:0"><span style="font-size:13px;color:#000000"><span style="font-size:13px"><strong><span style="font-size:13px">Hi, ' . $username . '!</span></strong></span><span style="font-size:13px"><strong><span style="font-size:13px"></span></strong></span></span></p></div></div><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><div style="font-family:Poppins,sans-serif;font-size:12px;line-height:1.5;color:#555555"><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000">This email is a notification to you, you have been registered as a localcontta application user, here are your account details:<br><br><b>Username: ' . $username . '</b> <br><b>Password: ' . $password . '</b> <br><b>Role: ' . $role . '</b> <br><b>Branch: ' . $user_branches . '</b> <br><b>Scope: ' . $scope . '</b> <br><b>Business Unit: ' . $department . '</b> <br><br><br><br></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"><br>Click the button to open appliacation Localcontta:</span></p></div></div></div></div></div></div></div><!-- Button --><div align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><a href="http://kn-idcore.ap.win.int.kn/localcontta" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#2196f3;border-radius:4px;width:auto;width:auto;border-top:1px solid #2196f3;border-right:1px solid #2196f3;border-bottom:1px solid #2196f3;border-left:1px solid #2196f3;padding-top:5px;padding-bottom:5px;font-family:Poppins,sans-serif;text-align:center;word-break:keep-all" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block"><span style="font-size:12px;line-height:2"><span style="font-size:16px;line-height:32px">Link!</span></span></span></a></div><!-- Garis --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Slogan --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><br><span class="login100-form-title p-b-5 p-t-27" style="font-family: Poppins;font-size: 30px;color: #fff;line-height: 1.2;text-align: center;text-transform: uppercase;display: block;display: inline-block;margin-bottom: 20px;">LOCALCONTTA<div class="menu__divider"></div></span><br></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:1px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Poltekpos --><div style="background-color:transparent"><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:#ffffff"><div style="border-collapse:collapse;display:table;width:100%;background-color:#ffffff"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right:0px;padding-left:0px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px" valign="top"><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:undefined" valign="top"><tbody><tr style="vertical-align:top;display:inline-block;text-align:center" align="center" valign="top"><center style="font-family: Poppins, sans-serif;font-size: 12px;font-weight: 600;"><p align="center"><b>LOCALCONTTA </b><i>for</i><b> CUSTOMS</b></p></center><br><td style="word-break:break-word;vertical-align:top;padding-bottom:0px;padding-right:3px;padding-left:3px" valign="top"><a href="http://kn-idcore.ap.win.int.kn/" target="_blank"><img style="text-decoration:none;height:auto;border:none;display:block;width: 180px;margin-top: -30px;margin-bottom: 0px;" width="32" height="32" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4zONU3t5CcDeNAagII3K3B2ExrIEcqmpzivX8tcD9IVLZcP2DCGfCXZR7bN4F58JxQDHKkc12QFm4tocNKvDb0jYfJYAPChrS7y1VmT4xxqCEPiQbcmdzT_mXP3Q01yM3SQNe0_fHHCxzlVPW9vZ7j3UL1UReCU1T1uwUT1T59RB5-DRCMo13Wzw9/w143-h23/header.png" alt="KN-IDCORE" title="KN-IDCORE" style="text-decoration:none;height:auto;border:none;display:block"></a></td></tr></tbody></table></td></tr></tbody></table><div style="font-family:Poppins,sans-serif;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"></div></div></div></div></div></div></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></td></tr></tbody></table></body></html>';
    if ($mail->Send()) {
      echo "<script language=javascript> alert(\"Sending Success!!\");</script>";
    } else {
      echo "<script language=javascript> alert(\"Sending Failed!!\");</script>";
    }

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches,user_modules,INSERT,UPDATE,DELETE)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches','$modules','$AddInsert','$AddUpdate','$AddDelete')");
    if ($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");
    }
    // Manager
  } else if ($cekRole == 'manager') {
    $username             = $_POST['manager_user_name'];
    $password             = 'changeme';
    $email                = $_POST['manager_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['manager_scope'];
    $department           = $_POST['manager_dept'];
    $user_branches        = $_POST['manager_user_branches'];
    $user_modules         = $_POST['user_modules'];
    $modules              = "";
    foreach ($user_modules as $row_modules) {
      $modules .= $row_modules . ",";
    }

    // CRUD
    if ($_POST['AddInsert'] != 'Y') {
      $AddInsert = '0';
    } else {
      $AddInsert = '1';
    }
    if ($_POST['AddUpdate'] != 'Y') {
      $AddUpdate = '0';
    } else {
      $AddUpdate = '1';
    }
    if ($_POST['AddDelete'] != 'Y') {
      $AddDelete = '0';
    } else {
      $AddDelete = '1';
    }
    // END CRUD

    // Email Send
    $mail               = new PHPMailer();
    $mail->IsSMTP();
    $mail->Debugoutput  = 'html';
    $mail->Host         = "smtplocal.us.int.kn";
    $mail->Port         = 25;
    // $mail->SMTPSecure   = 'ssl';
    $mail->From         = "donotreply@kuehne-nagel.com";
    $mail->FromName     = "Administrator";
    $to                 =  $email;
    $mail->AddAddress($to);
    $mail->Subject = 'LOCALCONTTA for CUSTOMS';
    $mail->isHTML(true);
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Localcontta | Kuehne + Nagel Indonesia</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjuc4O-N5W-IvaUh7DI0a4zcEzcW7vw7om9daaq4ULOyrjrYP2d-fsuYwOtVbaN1yFCJLP2x3qlt95n4jltwyuwZ8lUvTYEF9YIrRnZr-UWF46Yd1qiJmowkwybdZoVrW3iWs_4OhYT1_vOCaZf3JF1_qMst1l4MPMMcTq2wiGn_XJt_TZ3-SqbsqwS/s320/logo.png">
    </head>
    <body><table width="100%"><tbody><tr><td><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiHSDnonr4g4HPX5bPU9HXAx5N5K8DGJJ-nCVqCX1eaT49JpaLt4dUoQXOzdRg8aGnx-j3VqgOpFoQIsl6zRiocvMS4pExpkHXBhHE3KfqTEijoHRjgeXF75edSzUsBr4gCg1NX0jb4VPQG-Va5_eDLl2toYtw13M_omb9A3POjwLAcbyyREpIc5J7D/s1600/kn-indo.png" align="center" border="0" alt="Image" title="Image" style="text-decoration:none;height:auto;border:none;width:100%;max-width:215px;display:block" width="615"></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Paragraph --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:transparent"><div style="border-collapse:collapse;display:table;width:100%;background-color:transparent"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px"><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:5px;padding-right:10px;padding-bottom:0px;padding-left:10px"><div style="font-size:12px;line-height:1.5;font-family:Poppins,sans-serif;color:#555555"><p style="font-size:13px;line-height:1.5;text-align:left;margin:0"><span style="font-size:13px;color:#000000"><span style="font-size:13px"><strong><span style="font-size:13px">Hi, ' . $username . '!</span></strong></span><span style="font-size:13px"><strong><span style="font-size:13px"></span></strong></span></span></p></div></div><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><div style="font-family:Poppins,sans-serif;font-size:12px;line-height:1.5;color:#555555"><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000">This email is a notification to you, you have been registered as a localcontta application user, here are your account details:<br><br><b>Username: ' . $username . '</b> <br><b>Password: ' . $password . '</b> <br><b>Role: ' . $role . '</b> <br><b>Branch: ' . $user_branches . '</b> <br><b>Scope: ' . $scope . '</b> <br><b>Business Unit: ' . $department . '</b> <br><br><br><br></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"><br>Click the button to open appliacation Localcontta:</span></p></div></div></div></div></div></div></div><!-- Button --><div align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><a href="http://kn-idcore.ap.win.int.kn/localcontta" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#2196f3;border-radius:4px;width:auto;width:auto;border-top:1px solid #2196f3;border-right:1px solid #2196f3;border-bottom:1px solid #2196f3;border-left:1px solid #2196f3;padding-top:5px;padding-bottom:5px;font-family:Poppins,sans-serif;text-align:center;word-break:keep-all" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block"><span style="font-size:12px;line-height:2"><span style="font-size:16px;line-height:32px">Link!</span></span></span></a></div><!-- Garis --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Slogan --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><br><span class="login100-form-title p-b-5 p-t-27" style="font-family: Poppins;font-size: 30px;color: #fff;line-height: 1.2;text-align: center;text-transform: uppercase;display: block;display: inline-block;margin-bottom: 20px;">LOCALCONTTA<div class="menu__divider"></div></span><br></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:1px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Poltekpos --><div style="background-color:transparent"><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:#ffffff"><div style="border-collapse:collapse;display:table;width:100%;background-color:#ffffff"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right:0px;padding-left:0px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px" valign="top"><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:undefined" valign="top"><tbody><tr style="vertical-align:top;display:inline-block;text-align:center" align="center" valign="top"><center style="font-family: Poppins, sans-serif;font-size: 12px;font-weight: 600;"><p align="center"><b>LOCALCONTTA </b><i>for</i><b> CUSTOMS</b></p></center><br><td style="word-break:break-word;vertical-align:top;padding-bottom:0px;padding-right:3px;padding-left:3px" valign="top"><a href="http://kn-idcore.ap.win.int.kn/" target="_blank"><img style="text-decoration:none;height:auto;border:none;display:block;width: 180px;margin-top: -30px;margin-bottom: 0px;" width="32" height="32" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4zONU3t5CcDeNAagII3K3B2ExrIEcqmpzivX8tcD9IVLZcP2DCGfCXZR7bN4F58JxQDHKkc12QFm4tocNKvDb0jYfJYAPChrS7y1VmT4xxqCEPiQbcmdzT_mXP3Q01yM3SQNe0_fHHCxzlVPW9vZ7j3UL1UReCU1T1uwUT1T59RB5-DRCMo13Wzw9/w143-h23/header.png" alt="KN-IDCORE" title="KN-IDCORE" style="text-decoration:none;height:auto;border:none;display:block"></a></td></tr></tbody></table></td></tr></tbody></table><div style="font-family:Poppins,sans-serif;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"></div></div></div></div></div></div></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></td></tr></tbody></table></body></html>';
    if ($mail->Send()) {
      echo "<script language=javascript> alert(\"Sending Success!!\");</script>";
    } else {
      echo "<script language=javascript> alert(\"Sending Failed!!\");</script>";
    }

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches,user_modules,INSERT,UPDATE,DELETE)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches','$modules','$AddInsert','$AddUpdate','$AddDelete')");
    if ($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");
    }
    // User
  } else if ($cekRole == 'user') {
    $username             = $_POST['user_user_name'];
    $password             = 'changeme';
    $email                = $_POST['user_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['user_scope'];
    $department           = $_POST['user_dept'];
    $user_branches        = $_POST['user_branches'];
    $user_modules         = $_POST['user_modules'];
    $modules              = "";
    foreach ($user_modules as $row_modules) {
      $modules .= $row_modules . ",";
    }

    // CRUD
    if ($_POST['AddInsert'] != 'Y') {
      $AddInsert = '0';
    } else {
      $AddInsert = '1';
    }
    if ($_POST['AddUpdate'] != 'Y') {
      $AddUpdate = '0';
    } else {
      $AddUpdate = '1';
    }
    if ($_POST['AddDelete'] != 'Y') {
      $AddDelete = '0';
    } else {
      $AddDelete = '1';
    }
    // END CRUD

    // Email Send
    $mail               = new PHPMailer();
    $mail->IsSMTP();
    $mail->Debugoutput  = 'html';
    $mail->Host         = "smtplocal.us.int.kn";
    $mail->Port         = 25;
    // $mail->SMTPSecure   = 'ssl';
    $mail->From         = "donotreply@kuehne-nagel.com";
    $mail->FromName     = "Administrator";
    $to                 =  $email;
    $mail->AddAddress($to);
    $mail->Subject = 'LOCALCONTTA for CUSTOMS';
    $mail->isHTML(true);
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Localcontta | Kuehne + Nagel Indonesia</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjuc4O-N5W-IvaUh7DI0a4zcEzcW7vw7om9daaq4ULOyrjrYP2d-fsuYwOtVbaN1yFCJLP2x3qlt95n4jltwyuwZ8lUvTYEF9YIrRnZr-UWF46Yd1qiJmowkwybdZoVrW3iWs_4OhYT1_vOCaZf3JF1_qMst1l4MPMMcTq2wiGn_XJt_TZ3-SqbsqwS/s320/logo.png">
    </head>
    <body><table width="100%"><tbody><tr><td><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiHSDnonr4g4HPX5bPU9HXAx5N5K8DGJJ-nCVqCX1eaT49JpaLt4dUoQXOzdRg8aGnx-j3VqgOpFoQIsl6zRiocvMS4pExpkHXBhHE3KfqTEijoHRjgeXF75edSzUsBr4gCg1NX0jb4VPQG-Va5_eDLl2toYtw13M_omb9A3POjwLAcbyyREpIc5J7D/s1600/kn-indo.png" align="center" border="0" alt="Image" title="Image" style="text-decoration:none;height:auto;border:none;width:100%;max-width:215px;display:block" width="615"></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Paragraph --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:transparent"><div style="border-collapse:collapse;display:table;width:100%;background-color:transparent"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px"><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:5px;padding-right:10px;padding-bottom:0px;padding-left:10px"><div style="font-size:12px;line-height:1.5;font-family:Poppins,sans-serif;color:#555555"><p style="font-size:13px;line-height:1.5;text-align:left;margin:0"><span style="font-size:13px;color:#000000"><span style="font-size:13px"><strong><span style="font-size:13px">Hi, ' . $username . '!</span></strong></span><span style="font-size:13px"><strong><span style="font-size:13px"></span></strong></span></span></p></div></div><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><div style="font-family:Poppins,sans-serif;font-size:12px;line-height:1.5;color:#555555"><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000">This email is a notification to you, you have been registered as a localcontta application user, here are your account details:<br><br><b>Username: ' . $username . '</b> <br><b>Password: ' . $password . '</b> <br><b>Role: ' . $role . '</b> <br><b>Branch: ' . $user_branches . '</b> <br><b>Scope: ' . $scope . '</b> <br><b>Business Unit: ' . $department . '</b> <br><br><br><br></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"><br>Click the button to open appliacation Localcontta:</span></p></div></div></div></div></div></div></div><!-- Button --><div align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><a href="http://kn-idcore.ap.win.int.kn/localcontta" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#2196f3;border-radius:4px;width:auto;width:auto;border-top:1px solid #2196f3;border-right:1px solid #2196f3;border-bottom:1px solid #2196f3;border-left:1px solid #2196f3;padding-top:5px;padding-bottom:5px;font-family:Poppins,sans-serif;text-align:center;word-break:keep-all" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block"><span style="font-size:12px;line-height:2"><span style="font-size:16px;line-height:32px">Link!</span></span></span></a></div><!-- Garis --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Slogan --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><br><span class="login100-form-title p-b-5 p-t-27" style="font-family: Poppins;font-size: 30px;color: #fff;line-height: 1.2;text-align: center;text-transform: uppercase;display: block;display: inline-block;margin-bottom: 20px;">LOCALCONTTA<div class="menu__divider"></div></span><br></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:1px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Poltekpos --><div style="background-color:transparent"><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:#ffffff"><div style="border-collapse:collapse;display:table;width:100%;background-color:#ffffff"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right:0px;padding-left:0px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px" valign="top"><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:undefined" valign="top"><tbody><tr style="vertical-align:top;display:inline-block;text-align:center" align="center" valign="top"><center style="font-family: Poppins, sans-serif;font-size: 12px;font-weight: 600;"><p align="center"><b>LOCALCONTTA </b><i>for</i><b> CUSTOMS</b></p></center><br><td style="word-break:break-word;vertical-align:top;padding-bottom:0px;padding-right:3px;padding-left:3px" valign="top"><a href="http://kn-idcore.ap.win.int.kn/" target="_blank"><img style="text-decoration:none;height:auto;border:none;display:block;width: 180px;margin-top: -30px;margin-bottom: 0px;" width="32" height="32" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4zONU3t5CcDeNAagII3K3B2ExrIEcqmpzivX8tcD9IVLZcP2DCGfCXZR7bN4F58JxQDHKkc12QFm4tocNKvDb0jYfJYAPChrS7y1VmT4xxqCEPiQbcmdzT_mXP3Q01yM3SQNe0_fHHCxzlVPW9vZ7j3UL1UReCU1T1uwUT1T59RB5-DRCMo13Wzw9/w143-h23/header.png" alt="KN-IDCORE" title="KN-IDCORE" style="text-decoration:none;height:auto;border:none;display:block"></a></td></tr></tbody></table></td></tr></tbody></table><div style="font-family:Poppins,sans-serif;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"></div></div></div></div></div></div></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></td></tr></tbody></table></body></html>';
    if ($mail->Send()) {
      echo "<script language=javascript> alert(\"Sending Success!!\");</script>";
    } else {
      echo "<script language=javascript> alert(\"Sending Failed!!\");</script>";
    }

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches,user_modules,INSERT,UPDATE,DELETE)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches','$modules','$AddInsert','$AddUpdate','$AddDelete')");
    if ($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");
    }
    // Guest
  } else if ($cekRole == 'guest') {
    $username             = $_POST['guest_user_name'];
    $password             = 'changeme';
    $email                = $_POST['guest_user_mail'];
    $role                 = $_POST['user_role'];
    $scope                = $_POST['guest_scope'];
    $department           = $_POST['guest_dept'];
    $user_branches        = $_POST['guest_user_branches'];
    $user_modules         = $_POST['user_modules'];
    $modules              = "";
    foreach ($user_modules as $row_modules) {
      $modules .= $row_modules . ",";
    }

    // CRUD
    if ($_POST['AddInsert'] != 'Y') {
      $AddInsert = '0';
    } else {
      $AddInsert = '1';
    }
    if ($_POST['AddUpdate'] != 'Y') {
      $AddUpdate = '0';
    } else {
      $AddUpdate = '1';
    }
    if ($_POST['AddDelete'] != 'Y') {
      $AddDelete = '0';
    } else {
      $AddDelete = '1';
    }
    // END CRUD

    // Email Send
    $mail               = new PHPMailer();
    $mail->IsSMTP();
    $mail->Debugoutput  = 'html';
    $mail->Host         = "smtplocal.us.int.kn";
    $mail->Port         = 25;
    // $mail->SMTPSecure   = 'ssl';
    $mail->From         = "donotreply@kuehne-nagel.com";
    $mail->FromName     = "Administrator";
    $to                 =  $email;
    $mail->AddAddress($to);
    $mail->Subject = 'LOCALCONTTA for CUSTOMS';
    $mail->isHTML(true);
    $mail->Body    = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Localcontta | Kuehne + Nagel Indonesia</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjuc4O-N5W-IvaUh7DI0a4zcEzcW7vw7om9daaq4ULOyrjrYP2d-fsuYwOtVbaN1yFCJLP2x3qlt95n4jltwyuwZ8lUvTYEF9YIrRnZr-UWF46Yd1qiJmowkwybdZoVrW3iWs_4OhYT1_vOCaZf3JF1_qMst1l4MPMMcTq2wiGn_XJt_TZ3-SqbsqwS/s320/logo.png">
    </head>
    <body><table width="100%"><tbody><tr><td><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiHSDnonr4g4HPX5bPU9HXAx5N5K8DGJJ-nCVqCX1eaT49JpaLt4dUoQXOzdRg8aGnx-j3VqgOpFoQIsl6zRiocvMS4pExpkHXBhHE3KfqTEijoHRjgeXF75edSzUsBr4gCg1NX0jb4VPQG-Va5_eDLl2toYtw13M_omb9A3POjwLAcbyyREpIc5J7D/s1600/kn-indo.png" align="center" border="0" alt="Image" title="Image" style="text-decoration:none;height:auto;border:none;width:100%;max-width:215px;display:block" width="615"></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Paragraph --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:transparent"><div style="border-collapse:collapse;display:table;width:100%;background-color:transparent"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px"><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:5px;padding-right:10px;padding-bottom:0px;padding-left:10px"><div style="font-size:12px;line-height:1.5;font-family:Poppins,sans-serif;color:#555555"><p style="font-size:13px;line-height:1.5;text-align:left;margin:0"><span style="font-size:13px;color:#000000"><span style="font-size:13px"><strong><span style="font-size:13px">Hi, ' . $username . '!</span></strong></span><span style="font-size:13px"><strong><span style="font-size:13px"></span></strong></span></span></p></div></div><div style="color:#555555;font-family:Poppins,sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><div style="font-family:Poppins,sans-serif;font-size:12px;line-height:1.5;color:#555555"><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000">This email is a notification to you, you have been registered as a localcontta application user, here are your account details:<br><br><b>Username: ' . $username . '</b> <br><b>Password: ' . $password . '</b> <br><b>Role: ' . $role . '</b> <br><b>Branch: ' . $user_branches . '</b> <br><b>Scope: ' . $scope . '</b> <br><b>Business Unit: ' . $department . '</b> <br><br><br><br></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"></span></p><p style="font-size:13px;line-height:1.5;margin:0"><span style="font-size:13px;color:#000000"><br>Click the button to open appliacation Localcontta:</span></p></div></div></div></div></div></div></div><!-- Button --><div align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><a href="http://kn-idcore.ap.win.int.kn/localcontta" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#2196f3;border-radius:4px;width:auto;width:auto;border-top:1px solid #2196f3;border-right:1px solid #2196f3;border-bottom:1px solid #2196f3;border-left:1px solid #2196f3;padding-top:5px;padding-bottom:5px;font-family:Poppins,sans-serif;text-align:center;word-break:keep-all" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block"><span style="font-size:12px;line-height:2"><span style="font-size:16px;line-height:32px">Link!</span></span></span></a></div><!-- Garis --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Slogan --><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background: #002766;"><div align="center" style="padding-right:0px;padding-left:0px"><a href="#!"><br><span class="login100-form-title p-b-5 p-t-27" style="font-family: Poppins;font-size: 30px;color: #fff;line-height: 1.2;text-align: center;text-transform: uppercase;display: block;display: inline-block;margin-bottom: 20px;">LOCALCONTTA<div class="menu__divider"></div></span><br></a></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:1px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></div><!-- Poltekpos --><div style="background-color:transparent"><div style="margin:0 auto;min-width:320px;max-width:615px;word-wrap:break-word;word-break:break-word;background-color:#ffffff"><div style="border-collapse:collapse;display:table;width:100%;background-color:#ffffff"><div style="min-width:320px;max-width:615px;display:table-cell;vertical-align:top;width:615px"><div style="width:100%!important"><div style="border-top:0px solid transparent;border-left:0px solid transparent;border-bottom:0px solid transparent;border-right:0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right:0px;padding-left:0px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top;padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px" valign="top"><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:undefined" valign="top"><tbody><tr style="vertical-align:top;display:inline-block;text-align:center" align="center" valign="top"><center style="font-family: Poppins, sans-serif;font-size: 12px;font-weight: 600;"><p align="center"><b>LOCALCONTTA </b><i>for</i><b> CUSTOMS</b></p></center><br><td style="word-break:break-word;vertical-align:top;padding-bottom:0px;padding-right:3px;padding-left:3px" valign="top"><a href="http://kn-idcore.ap.win.int.kn/" target="_blank"><img style="text-decoration:none;height:auto;border:none;display:block;width: 180px;margin-top: -30px;margin-bottom: 0px;" width="32" height="32" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4zONU3t5CcDeNAagII3K3B2ExrIEcqmpzivX8tcD9IVLZcP2DCGfCXZR7bN4F58JxQDHKkc12QFm4tocNKvDb0jYfJYAPChrS7y1VmT4xxqCEPiQbcmdzT_mXP3Q01yM3SQNe0_fHHCxzlVPW9vZ7j3UL1UReCU1T1uwUT1T59RB5-DRCMo13Wzw9/w143-h23/header.png" alt="KN-IDCORE" title="KN-IDCORE" style="text-decoration:none;height:auto;border:none;display:block"></a></td></tr></tbody></table></td></tr></tbody></table><div style="font-family:Poppins,sans-serif;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"></div></div></div></div></div></div></div><table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;vertical-align:top;border-spacing:0;border-collapse:collapse;border-top:4px solid #2196f3;height:0px;width:100%" align="center" role="presentation" height="0" valign="top"><tbody><tr style="vertical-align:top" valign="top"><td style="word-break:break-word;vertical-align:top" height="0" valign="top"><span></span></td></tr></tbody></table></td></tr></tbody></table></body></html>';
    if ($mail->Send()) {
      echo "<script language=javascript> alert(\"Sending Success!!\");</script>";
    } else {
      echo "<script language=javascript> alert(\"Sending Failed!!\");</script>";
    }

    $query = mysql_query("INSERT INTO tb_user
      (user_id,user_name,user_pass,user_mail,user_role,user_scope,user_dept,user_branches,user_modules,INSERT,UPDATE,DELETE)
      VALUES
      ('','$username','$password','$email','$role','$scope','$department','$user_branches','$modules','$AddInsert','$AddUpdate','$AddDelete')");
    if ($query) {
      header("Location: ./iou_adm_user.php?InputSuccess=true");
    } else {
      header("Location: ./iou_adm_user.php?InputFailed=true");
    }
  }
}

// DELETE
if (isset($_POST["delete"])) {
  $ID             = $_POST['uid'];

  $query = mysql_query("DELETE FROM tb_user WHERE user_id='$ID'");

  if ($query) {
    header("Location: ./iou_adm_user.php?DeleteSuccess=true");
  } else {
    header("Location: ./iou_adm_user.php?DeleteFailed=true");
  }
}
// DELETE ALL
if (isset($_POST['chk_id'])) {
  $arr = $_POST['chk_id'];
  foreach ($arr as $id) {
    $query = mysql_query("DELETE FROM tb_user WHERE user_id='$id'");
  }

  if ($query) {
    header("Location: ./iou_adm_user.php?DeleteSuccess=true");
  } else {
    header("Location: ./iou_adm_user.php?DeleteFailed=true");
  }
}
?>
<?php include 'include/head.php'; ?>
<div id="wrapper">
  <?php include 'include/header.php'; ?>
  <div id="page-wrapper">
    <!-- Page -->
    <div class="row" style="display: flex;justify-content: space-between;align-items: center;">
      <div class="col-lg-8">
        <div style="display: flex;justify-content: flex-start;align-items: center;">
          <div>
            <h1 class="page-header"><i class="fas fa-house-user icon-title"></i></h1>
          </div>
          <div style="margin-left: 10px;">
            <div style="margin-top: -30px;">
              <h1>Management Users</h1>
            </div>
            <div style="margin-top: -10px;">
              <font>Administration Section</font>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="display: flex;justify-content: flex-end;">
        <span id="ct" class="clock-ct btn btn-primary" style="font-size: 12px;"></span>
      </div>
    </div>
    <!-- End Page -->
    <!-- Search -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fas fa-filter"></i> Filter Data Management Users
          </div>
          <div class="panel-body">
            <div class="page-add">
              <form method="get" action="iou_adm_shipper.php" id="fformone" style="display: show;">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Username </label>
                      <input type="text" name="findUsername" class="form-control" placeholder="Username..." value="<?= $findUsername; ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Role </label>
                      <select type="text" name="findRole" class="form-control">
                        <option value="">-- Select User Role --</option>
                        <option value="admin">Administrator</option>
                        <option value="gm">General Manager</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                        <option value="guest">Guest</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Branch </label>
                      <select type="text" name="findBranch" class="form-control">
                        <option value="">-- Select Branch --</option>
                        <option value="JKT">JKT</option>
                        <option value="CGK">CGK</option>
                        <option value="SUB">SUB</option>
                        <option value="CHB">CHB</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Scope </label>
                      <select type="text" name="findScope" class="form-control">
                        <option value="">-- Select Scope --</option>
                        <option value="all">All</option>
                        <option value="import">Import</option>
                        <option value="export">Export</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Deaprtment </label>
                      <select type="text" name="findDeaprtment" class="form-control">
                        <option value="">-- Select Department --</option>
                        <option value="all">All</option>
                        <option value="sea">Sea Freight</option>
                        <option value="air">Air Freight</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2" style="text-align: right;margin-top: 25px;">
                    <div class="form-group">
                      <a href="iou_adm_user.php" type="button" class="btn btn-info"><i class="fas fa-redo"></i> Reset</a>
                      <button type="submit" name="findFilter" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
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
            <i class="fa fa-table"></i> Management Users
          </div>
          <div class="panel-body">
            <div class="page-add">
              <!-- Add Users -->
              <!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-users">
                <i class="fa fa-user-plus"></i> Add Users
              </button>
              <!-- Modal content-->
              <div class="modal fade" id="add-users" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><b>[Add] </b> Management User</h4>
                    </div>
                    <form method="post" action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>User Role <font style="color: red;">*</font></label>
                              <select class="form-control" name="user_role" id="input-role" required>
                                <option id="option_empty" value="">-- Select User Role --</option>
                                <option id="option_admin" value="admin">Administrator</option>
                                <option id="option_gm" value="gm">General Manager</option>
                                <option id="option_manager" value="manager">Manager</option>
                                <option id="option_user" value="user">User</option>
                                <option id="option_guest" value="guest">Guest</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Modules</label>
                              <select class="form-control" name="user_modules[]" multiple>
                                <optgroup label="APPLICATION SECTION" class="group-1">
                                  <option value="Export">Export</option>
                                  <option value="Import">Import</option>
                                  <option value="Trucker">Trucker</option>
                                </optgroup>
                                <optgroup label="REPORT SECTION" class="group-2">
                                  <option value="Daily Report">Daily Report</option>
                                  <option value="Air Report">Air Report</option>
                                  <option value="Sea Report">Sea Report</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>CRUD</label>
                              <br>
                              <input name="AddInsert" type="checkbox" id="IDInsert" class="chkbox" value="Y"> <label for="IDInsert" style="font-weight: 300;">Insert</label>
                              <input name="AddUpdate" type="checkbox" id="IDUpdate" class="chkbox" value="Y"> <label for="IDUpdate" style="font-weight: 300;">Update</label>
                              <input name="AddDelete" type="checkbox" id="IDDelete" class="chkbox" value="Y"> <label for="IDDelete" style="font-weight: 300;">Delete</label>
                            </div>
                          </div>
                        </div>
                        <!-- Admin Scope and Department -->
                        <div class="row" id="admin_input" style="display:none;">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scope</label>
                              <input type="text" class="form-control" name="admin_scope" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" class="form-control" name="admin_dept" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username <font style="color: red;">*</font></label>
                              <input type="text" class="form-control" name="admin_user_name" placeholder="Input username...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" class="form-control" name="admin_user_mail" placeholder="Input email...">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Branch <font style="color: red;">*</font></label>
                              <select class="form-control" name="admin_user_branches">
                                <option value="">-- Select Branch --</option>
                                <option value="JKT">JKT</option>
                                <option value="CGK">CGK</option>
                                <option value="SUB">SUB</option>
                                <option value="CHB">CHB</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- End Admin Scope and Department -->
                        <!-- GM Scope and Department -->
                        <div class="row" id="gm_input" style="display:none;">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scope</label>
                              <input type="text" class="form-control" name="gm_scope" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" class="form-control" name="gm_dept" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username <font style="color: red;">*</font></label>
                              <input type="text" class="form-control" name="gm_user_name" placeholder="Input username...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" class="form-control" name="gm_user_mail" placeholder="Input email...">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Branch <font style="color: red;">*</font></label>
                              <select class="form-control" name="gm_user_branches">
                                <option value="">-- Select Branch --</option>
                                <option value="JKT">JKT</option>
                                <option value="CGK">CGK</option>
                                <option value="SUB">SUB</option>
                                <option value="CHB">CHB</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- End GM Scope and Department -->
                        <!-- Guest Scope and Department -->
                        <div class="row" id="guest_input" style="display:none;">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scope</label>
                              <input type="text" class="form-control" name="guest_scope" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" class="form-control" name="guest_dept" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username <font style="color: red;">*</font></label>
                              <input type="text" class="form-control" name="guest_user_name" placeholder="Input username...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" class="form-control" name="guest_user_mail" placeholder="Input email...">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Branch <font style="color: red;">*</font></label>
                              <select class="form-control" name="guest_user_branches">
                                <option value="">-- Select Branch --</option>
                                <option value="JKT">JKT</option>
                                <option value="CGK">CGK</option>
                                <option value="SUB">SUB</option>
                                <option value="CHB">CHB</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- End Guest Scope and Department -->
                        <!-- Manager Scope and Department -->
                        <div class="row" id="manager_input" style="display:none;">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scope</label>
                              <input type="text" class="form-control" name="manager_scope" value="all" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Department <font style="color: red;">*</font></label>
                              <select class="form-control" id="id_manager_dept" name="manager_dept">
                                <option value="">-- Select User Role --</option>
                                <option value="all">All</option>
                                <option value="sea">Sea Freight</option>
                                <option value="air">Air Freight</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username <font style="color: red;">*</font></label>
                              <input type="text" class="form-control" name="manager_user_name" placeholder="Input username...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" class="form-control" name="manager_user_mail" placeholder="Input email...">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Branch <font style="color: red;">*</font></label>
                              <select class="form-control" name="manager_user_branches">
                                <option value="">-- Select Branch --</option>
                                <option value="JKT">JKT</option>
                                <option value="CGK">CGK</option>
                                <option value="SUB">SUB</option>
                                <option value="CHB">CHB</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- End Manager Scope and Department -->
                        <!-- User Scope and Department -->
                        <div class="row" id="user_input" style="display:none;">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Scope <font style="color: red;">*</font></label>
                              <select class="form-control" id="id_user_scope" name="user_scope">
                                <option value="">-- Select Scope --</option>
                                <option value="all">All</option>
                                <option value="import">Import</option>
                                <option value="export">Export</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Department <font style="color: red;">*</font></label>
                              <select class="form-control" id="id_user_dept" name="user_dept">
                                <option value="">-- Select Department --</option>
                                <option value="all">All</option>
                                <option value="sea">Sea Freight</option>
                                <option value="air">Air Freight</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Username <font style="color: red;">*</font></label>
                              <input type="text" class="form-control" name="user_user_name" placeholder="Input username...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email <font style="color: red;">*</font></label>
                              <input type="email" class="form-control" name="user_user_mail" placeholder="Input email...">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Branch <font style="color: red;">*</font></label>
                              <select class="form-control" name="user_branches">
                                <option value="">-- Select Branch --</option>
                                <option value="JKT">JKT</option>
                                <option value="CGK">CGK</option>
                                <option value="SUB">SUB</option>
                                <option value="CHB">CHB</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- End User Scope and Department -->
                        <div class="col-md-12">
                          <div class="form-group">
                            <label style="color: red; font-weight: 300;">* <i style="color: #000;">Required!</i></label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                        <button type="submit" name="create" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Add Users -->
            </div>
            <form action="iou_adm_user.php" method="post">
              <div style="margin-bottom: 15px;">
                <input id="submit" name="submit" type="submit" class="btn btn-sm btn-danger" value="Delete Selected" />
              </div>
              <div class="table-responsive">
                <table class="display hover" id="users">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="no-sort" style="text-align: center;">
                        <input id="chk_all" name="chk_all" type="checkbox" />
                      </th>
                      <th style="text-align: center;">Username</th>
                      <th style="text-align: center;">Password</th>
                      <th style="text-align: center;">Role</th>
                      <th style="text-align: center;">Branch</th>
                      <th style="text-align: center;">Scope</th>
                      <th style="text-align: center;">Department</th>
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
                    if (isset($_POST['findFilter'])) {
                      $result = mysqli_query($con, "SELECT * FROM tb_user ORDER BY user_name ASC");
                    } else {
                      $result = mysqli_query($con, "SELECT * FROM tb_user ORDER BY user_name ASC");
                    }
                    if (mysqli_num_rows($result) > 0) {
                      $no = 0;
                      while ($row = mysqli_fetch_array($result)) {
                        $no++;
                        if ($row['user_name'] == $me) {
                          $show_btn = 'disabled';
                          $modal_btn = 'disabled';
                        } else {
                          $show_btn = '';
                          $modal_btn = 'modal';
                        }

                        echo "<tr>";
                        echo "<td>" . $no . ".</td>";
                        echo "<td style='text-align: center;'>
                        <input name='chk_id[]' type='checkbox' class='chkbox' value='" . $row['user_id'] . "' $show_btn>
                        </td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        if ($row['user_pass'] == 'changeme') {
                          echo "<td style='text-align: center;'>
                          <span title='Password: changeme'>
                          <font style='background: #55b8f2;padding: 5px;border-radius: 5px;font-size: 12px;color: #000;'><i class='fa fa-eye'></i> Default</font>
                          </span>
                          </td>";
                        } else {
                          echo "<td style='text-align: center;'>
                          <font style='font-size: 10px;font-weight: 300;'><i>Log: " . $row['user_pass_update'] . "</i></font>
                          <br>
                          <font style='font-size: 10px;font-weight: 300;'><i>By: " . $row['user_pass_update_by'] . "</i></font>
                          </td>";
                        }
                        echo "<td style='text-align: center;'>" . $row['user_role'] . "</td>";
                        if ($row['user_branches'] == NULL) {
                          echo "<td style='text-align: center;'><i>Empty</i></td>";
                        } else {
                          echo "<td style='text-align: center;'>" . $row['user_branches'] . "</td>";
                        }
                        echo "<td style='text-align: center;'>" . $row['user_scope'] . "</td>";
                        // SEAFREIGHT
                        if ($row['user_dept'] == 'sea') {
                          echo "<td style='text-align: center;'>
                          <i class='fas fa-ship'></i> " . $row['user_dept'] . "
                          </td>";
                          // AIRFREIGHT
                        } else if ($row['user_dept'] == 'air') {
                          echo "<td style='text-align: center;'>
                          <i class='fas fa-plane'></i> " . $row['user_dept'] . "
                          </td>";
                          // ALL
                        } else {
                          echo "<td style='text-align: center;'>
                          <i class='fas fa-border-all'></i> " . $row['user_dept'] . "
                          </td>";
                        }
                        echo "<td style='text-align: center;'>
                        <a href='iou_adm_user_edit.php?user_id=$row[user_id]' target='_blank' title='Edit'>
                        <span class='btn btn-sm btn-warning' $show_btn>
                        <i class='fa fa-pencil'></i>
                        </span>
                        </a>
                        <a href='iou_adm_user_cp.php?user_id=$row[user_id]' target='_blank' title='Edit'>
                        <span class='btn btn-sm btn-change' $show_btn>
                        <i class='fa fa-unlock'></i>
                        </span>
                        </a>
                        <a href='#' data-toggle='" . $modal_btn . "' data-target='#delete$row[user_id]' title='Delete'>
                        <span class='btn btn-sm btn-danger' $show_btn>
                        <i class='fa fa-trash'></i>
                        </span>
                        </a>
                        </td>";
                        echo "</tr>";
                    ?>
                        <!-- Delete -->
                        <div class="modal fade" id="delete<?= $row['user_id']; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>[Delete] </b> Management User - <?= $row['user_name'] ?></h4>
                              </div>
                              <form method="post" action=" ">
                                <div class="modal-body">
                                  <div class="alert-delete">
                                    <h4><i class="fa fa-info-circle"></i> Are you sure you want to delete this data?</h4>
                                    <p>
                                      You will not see this data again, it will be permanently deleted in the <b>Localcontta</b> system!
                                      <br>
                                      <i>"Please click <b>Yes</b> to continue the data deletion process."</i>
                                    </p>
                                    <input type="hidden" name="uid" class="form-control" value="<?= $row['user_id']; ?>" required>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> No</button>
                                  <button type="submit" name="delete" class="btn btn-danger"><i class="far fa-check-circle"></i> Yes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- Delete -->
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
            </form>
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
<!-- Delete also Checklist ALL -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#chk_all').click(function() {
      if (this.checked)
        $(".chkbox").prop("checked", true);
      else
        $(".chkbox").prop("checked", false);
    });
  });

  $(document).ready(function() {
    $('#delete_form').submit(function(e) {
      if (!confirm("Confirm Delete?")) {
        e.preventDefault();
      }
    });
  });
</script>
<!-- End Delete also Checklist ALL -->

<!-- Add, Edit, Validasi -->
<script type="text/javascript">
  // ADD
  $(function() {
    $("#input-role").change(function() {
      if ($(this).val() == "admin") {
        $("#admin_input").show();
        $("#gm_input").hide();
        $("#guest_input").hide();
        $("#manager_input").hide();
        $("#user_input").hide();
      } else if ($(this).val() == "gm") {
        $("#gm_input").show();
        $("#admin_input").hide();
        $("#guest_input").hide();
        $("#manager_input").hide();
        $("#user_input").hide();
      } else if ($(this).val() == "guest") {
        $("#guest_input").show();
        $("#admin_input").hide();
        $("#gm_input").hide();
        $("#manager_input").hide();
        $("#user_input").hide();
      } else if ($(this).val() == "manager") {
        $("#manager_input").show();
        $("#admin_input").hide();
        $("#gm_input").hide();
        $("#guest_input").hide();
        $("#user_input").hide();
        Swal.fire({
          icon: 'info',
          title: 'Information!',
          imageWidth: 400,
          imageHeight: 250,
          imageAlt: 'Custom image',
          html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
          showCloseButton: false,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText: 'OK'
        })
      } else if ($(this).val() == "user") {
        $("#user_input").show();
        $("#admin_input").hide();
        $("#gm_input").hide();
        $("#guest_input").hide();
        $("#manager_input").hide();
        Swal.fire({
          icon: 'info',
          title: 'Information!',
          imageWidth: 400,
          imageHeight: 250,
          imageAlt: 'Custom image',
          html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
          showCloseButton: false,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText: 'OK'
        })
      } else {
        $("#admin_input").hide();
        $("#gm_input").hide();
        $("#guest_input").hide();
        $("#manager_input").hide();
        $("#user_input").hide();
      }
    });
  });

  function validasi() {
    var v_option_manager = document.getElementById("option_manager").value;
    // Manager
    var input_manager_dept = document.getElementById("id_manager_dept").value;
    // User
    var input_user_scope = document.getElementById("id_user_scope").value;
    var input_user_dept = document.getElementById("id_user_dept").value;

    if (v_option_manager == "manager" && input_manager_dept != "") {
      return true;
    } else {
      Swal.fire({
        icon: 'info',
        title: 'Information!',
        imageWidth: 400,
        imageHeight: 250,
        imageAlt: 'Custom image',
        html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
        showCloseButton: false,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: 'OK'
      })
      return false;
    }
  }

  // Edit
  $(function() {
    $("#input-role-edit").change(function() {
      if ($(this).val() == "admin") {
        $("#admin_input_edit").show();
        $("#gm_input_edit").hide();
        $("#guest_input_edit").hide();
        $("#manager_input_edit").hide();
        $("#user_input_edit").hide();
      } else if ($(this).val() == "gm") {
        $("#gm_input_edit").show();
        $("#admin_input_edit").hide();
        $("#guest_input_edit").hide();
        $("#manager_input_edit").hide();
        $("#user_input_edit").hide();
      } else if ($(this).val() == "guest") {
        $("#guest_input_edit").show();
        $("#admin_input_edit").hide();
        $("#gm_input_edit").hide();
        $("#manager_input_edit").hide();
        $("#user_input_edit").hide();
      } else if ($(this).val() == "manager") {
        $("#manager_input_edit").show();
        $("#admin_input_edit").hide();
        $("#gm_input_edit").hide();
        $("#guest_input_edit").hide();
        $("#user_input_edit").hide();
        Swal.fire({
          icon: 'info',
          title: 'Information!',
          imageWidth: 400,
          imageHeight: 250,
          imageAlt: 'Custom image',
          html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
          showCloseButton: false,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText: 'OK'
        })
      } else if ($(this).val() == "user") {
        $("#user_input_edit").show();
        $("#admin_input_edit").hide();
        $("#gm_input_edit").hide();
        $("#guest_input_edit").hide();
        $("#manager_input_edit").hide();
        Swal.fire({
          icon: 'info',
          title: 'Information!',
          imageWidth: 400,
          imageHeight: 250,
          imageAlt: 'Custom image',
          html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
          showCloseButton: false,
          showCancelButton: false,
          focusConfirm: false,
          confirmButtonText: 'OK'
        })
      } else {
        $("#admin_input_edit").hide();
        $("#gm_input_edit").hide();
        $("#guest_input_edit").hide();
        $("#manager_input_edit").hide();
        $("#user_input_edit").hide();
      }
    });
  });
</script>
<!-- End Add, Edit, Validasi -->

<!-- Managemen Users -->
<script type="text/javascript">
  // Input - Add
  if (window?.location?.href?.indexOf('InputSuccess') > -1) {
    Swal.fire({
      title: 'Success Alert!',
      icon: 'success',
      text: 'Data saved successfully!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }

  if (window?.location?.href?.indexOf('InputFailed') > -1) {
    Swal.fire({
      title: 'Failed Alert!',
      icon: 'error',
      text: 'Data failed to save, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }
  // End Input - Add

  // Update Data
  if (window?.location?.href?.indexOf('UpdateSuccess') > -1) {
    Swal.fire({
      title: 'Update Alert!',
      icon: 'info',
      text: 'Data updated successfully!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }

  if (window?.location?.href?.indexOf('UpdateFailed') > -1) {
    Swal.fire({
      title: 'Update Alert!',
      icon: 'info',
      text: 'Data failed to updated, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }
  // End Update Data

  // Delete
  if (window?.location?.href?.indexOf('DeleteSuccess') > -1) {
    Swal.fire({
      title: 'Delete Alert!',
      icon: 'info',
      text: 'Data delete successfully!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }

  if (window?.location?.href?.indexOf('DeleteFailed') > -1) {
    Swal.fire({
      title: 'Delete Alert!',
      icon: 'info',
      text: 'Data failed to delete, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }
  // End Delete

  // Change Password
  if (window?.location?.href?.indexOf('UpdatePassSuccess') > -1) {
    Swal.fire({
      title: 'Update Alert!',
      icon: 'info',
      text: 'Data updated successfully!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }

  if (window?.location?.href?.indexOf('UpdatePassFailed') > -1) {
    Swal.fire({
      title: 'Update Alert!',
      icon: 'info',
      text: 'Data failed to updated, please contact your administrator!',
    })
    history.replaceState({}, '', './iou_adm_user.php');
  }
  // End Change Password
</script>