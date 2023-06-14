<?php
session_start();
include "include/config.php";

function f_login($data)
{
    if ($data['PASSWORD_HASH'] == $data['PASSWORD']) {
        $_SESSION['ID_USERS'] = $data['ID_USERS'];
        $_SESSION['USERNAME'] = $data['USERNAME'];
        $_SESSION['PASSWORD'] = $data['PASSWORD'];
        $_SESSION['ROLE'] = $data['ROLE'];
        $_SESSION['STATUS'] = $data['STATUS'];
        $_SESSION['CREATED_DATE'] = $data['CREATED_DATE'];
        $_SESSION['BY'] = $data['BY'];
        $_SESSION['THEME_BTN'] = $data['THEME_BTN'];
        $_SESSION['THEME_BG'] = $data['THEME_BG'];
        $_SESSION['LEVEL'] = $data['LEVEL'];
        $_SESSION['ID_ROLE'] = $data['ID_ROLE'];
        $_SESSION['ACCESS'] = $data['ACCESS'];
        $_SESSION['DESC_ACCESS'] = $data['DESC_ACCESS'];
        $_SESSION['MODULES'] = $data['MODULES'];
        $_SESSION['ID_EMPLOYEE'] = $data['ID_EMPLOYEE'];
        $_SESSION['NIK'] = $data['NIK'];
        $_SESSION['NPWP'] = $data['NPWP'];
        $_SESSION['FIRST_NAME'] = $data['FIRST_NAME'];
        $_SESSION['MIDDLE_NAME'] = $data['MIDDLE_NAME'];
        $_SESSION['LAST_NAME'] = $data['LAST_NAME'];
        $_SESSION['EMAIL'] = $data['EMAIL'];
        $_SESSION['HANDPHONE'] = $data['HANDPHONE'];
        $_SESSION['PROVINCE_E_D'] = $data['PROVINCE_E_D'];
        $_SESSION['CITY_E_D'] = $data['CITY_E_D'];
        $_SESSION['DISTRICS_E_D'] = $data['DISTRICS_E_D'];
        $_SESSION['REGENCIES_E_D'] = $data['REGENCIES_E_D'];
        $_SESSION['VILLAGES_E_D'] = $data['VILLAGES_E_D'];
        $_SESSION['RT_E_D'] = $data['RT_E_D'];
        $_SESSION['RW_E_D'] = $data['RW_E_D'];
        $_SESSION['ADDRESS_E_D'] = $data['ADDRESS_E_D'];
        $_SESSION['POSTAL_CODE_E_D'] = $data['POSTAL_CODE_E_D'];
        $_SESSION['PROVINCE_E_S'] = $data['PROVINCE_E_S'];
        $_SESSION['CITY_E_S'] = $data['CITY_E_S'];
        $_SESSION['DISTRICS_E_S'] = $data['DISTRICS_E_S'];
        $_SESSION['REGENCIES_E_S'] = $data['REGENCIES_E_S'];
        $_SESSION['VILLAGES_E_S'] = $data['VILLAGES_E_S'];
        $_SESSION['RT_E_S'] = $data['RT_E_S'];
        $_SESSION['RW_E_S'] = $data['RW_E_S'];
        $_SESSION['ADDRESS_E_S'] = $data['ADDRESS_E_S'];
        $_SESSION['POSTAL_CODE_E_S'] = $data['POSTAL_CODE_E_S'];
        $_SESSION['RELIGION'] = $data['RELIGION'];
        $_SESSION['BLOOD'] = $data['BLOOD'];
        $_SESSION['MARITAL_STATUS'] = $data['MARITAL_STATUS'];
        $_SESSION['PLACE_BIRTH'] = $data['PLACE_BIRTH'];
        $_SESSION['DATE_BIRTH'] = $data['DATE_BIRTH'];
        $_SESSION['AGE'] = $data['AGE'];
        $_SESSION['GENDER'] = $data['GENDER'];
        $_SESSION['STATUS_EMPLOYEE'] = $data['STATUS_EMPLOYEE'];
        $_SESSION['TYPE_EMPLOYEE'] = $data['TYPE_EMPLOYEE'];
        $_SESSION['BRANCHES'] = $data['BRANCHES'];
        $_SESSION['ID'] = $data['ID'];
        $_SESSION['COMPANY_CODE'] = $data['COMPANY_CODE'];
        $_SESSION['COMPANY_NAME'] = $data['COMPANY_NAME'];
        $_SESSION['COMPANY_TOKEN'] = $data['COMPANY_TOKEN'];
        $_SESSION['COMPANY_STATUS'] = $data['COMPANY_STATUS'];
        return 2;
    } else return 1;
}

if (isset($_POST["USERNAME"])) {
    $USERNAME_ = $db->real_escape_string($_POST["USERNAME"]);
} else {
    $USERNAME_ = "";
}
if (isset($_POST["PASSWORD"])) {
    $PASSWORD_ = $db->real_escape_string($_POST["PASSWORD"]);
} else {
    $PASSWORD_ = "";
}

$DataUser = $db->query("SELECT * FROM view_privileges WHERE USERNAME='" . $USERNAME_ . "' AND PASSWORD='" . md5($PASSWORD_) . "'", 0);
$CheckResult = $DataUser->fetch_assoc();

if ($CheckResult != NULL) {
    $ID_USERS = $CheckResult['ID_USERS'];
    $COMPANY_CODE_USERS = $CheckResult['COMPANY_CODE_USERS'];
    $USERNAME = $CheckResult['USERNAME'];
    $PASSWORD = $CheckResult['PASSWORD'];
    $ROLE = $CheckResult['ROLE'];
    $STATUS = $CheckResult['STATUS'];
    $CREATED_DATE = $CheckResult['CREATED_DATE'];
    $BY = $CheckResult['BY'];
    $THEME_BTN = $CheckResult['THEME_BTN'];
    $THEME_BG = $CheckResult['THEME_BG'];
    $LEVEL = $CheckResult['LEVEL'];
    $ID_ROLE = $CheckResult['ID_ROLE'];
    $ACCESS = $CheckResult['ACCESS'];
    $DESC_ACCESS = $CheckResult['DESC_ACCESS'];
    $MODULES = $CheckResult['MODULES'];
    $ID_EMPLOYEE = $CheckResult['ID_EMPLOYEE'];
    $NIK = $CheckResult['NIK'];
    $NPWP = $CheckResult['NPWP'];
    $FIRST_NAME = $CheckResult['FIRST_NAME'];
    $MIDDLE_NAME = $CheckResult['MIDDLE_NAME'];
    $LAST_NAME = $CheckResult['LAST_NAME'];
    $EMAIL = $CheckResult['EMAIL'];
    $HANDPHONE = $CheckResult['HANDPHONE'];
    $PROVINCE_E_D = $CheckResult['PROVINCE_E_D'];
    $CITY_E_D = $CheckResult['CITY_E_D'];
    $DISTRICS_E_D = $CheckResult['DISTRICS_E_D'];
    $REGENCIES_E_D = $CheckResult['REGENCIES_E_D'];
    $VILLAGES_E_D = $CheckResult['VILLAGES_E_D'];
    $RT_E_D = $CheckResult['RT_E_D'];
    $RW_E_D = $CheckResult['RW_E_D'];
    $ADDRESS_E_D = $CheckResult['ADDRESS_E_D'];
    $POSTAL_CODE_E_D = $CheckResult['POSTAL_CODE_E_D'];
    $PROVINCE_E_S = $CheckResult['PROVINCE_E_S'];
    $CITY_E_S = $CheckResult['CITY_E_S'];
    $DISTRICS_E_S = $CheckResult['DISTRICS_E_S'];
    $REGENCIES_E_S = $CheckResult['REGENCIES_E_S'];
    $VILLAGES_E_S = $CheckResult['VILLAGES_E_S'];
    $RT_E_S = $CheckResult['RT_E_S'];
    $RW_E_S = $CheckResult['RW_E_S'];
    $ADDRESS_E_S = $CheckResult['ADDRESS_E_S'];
    $POSTAL_CODE_E_S = $CheckResult['POSTAL_CODE_E_S'];
    $RELIGION = $CheckResult['RELIGION'];
    $BLOOD = $CheckResult['BLOOD'];
    $MARITAL_STATUS = $CheckResult['MARITAL_STATUS'];
    $PLACE_BIRTH = $CheckResult['PLACE_BIRTH'];
    $DATE_BIRTH = $CheckResult['DATE_BIRTH'];
    $AGE = $CheckResult['AGE'];
    $GENDER = $CheckResult['GENDER'];
    $STATUS_EMPLOYEE = $CheckResult['STATUS_EMPLOYEE'];
    $TYPE_EMPLOYEE = $CheckResult['TYPE_EMPLOYEE'];
    $BRANCHES = $CheckResult['BRANCHES'];
    $ID = $CheckResult['ID'];
    $COMPANY_CODE = $CheckResult['COMPANY_CODE'];
    $COMPANY_NAME = $CheckResult['COMPANY_NAME'];
    $COMPANY_TOKEN = $CheckResult['COMPANY_TOKEN'];
    $COMPANY_STATUS = $CheckResult['COMPANY_STATUS'];

    if ($ROLE == 'Administrator') {
        $data = [
            'ID_USERS' => $ID_USERS,
            'USERNAME' => $USERNAME,
            'PASSWORD_HASH' => md5($PASSWORD_),
            'PASSWORD' => $PASSWORD,
            'ROLE' => $ROLE,
            'STATUS' => $STATUS,
            'CREATED_DATE' => $CREATED_DATE,
            'BY' => $BY,
            'THEME_BTN' => $THEME_BTN,
            'THEME_BG' => $THEME_BG,
            'LEVEL' => $LEVEL,
            'ID_ROLE' => $ID_ROLE,
            'ACCESS' => $ACCESS,
            'DESC_ACCESS' => $DESC_ACCESS,
            'MODULES' => $MODULES,
            'ID_EMPLOYEE' => $ID_EMPLOYEE,
            'NIK' => $NIK,
            'NPWP' => $NPWP,
            'FIRST_NAME' => $FIRST_NAME,
            'MIDDLE_NAME' => $MIDDLE_NAME,
            'LAST_NAME' => $LAST_NAME,
            'EMAIL' => $EMAIL,
            'HANDPHONE' => $HANDPHONE,
            'PROVINCE_E_D' => $PROVINCE_E_D,
            'CITY_E_D' => $CITY_E_D,
            'DISTRICS_E_D' => $DISTRICS_E_D,
            'REGENCIES_E_D' => $REGENCIES_E_D,
            'VILLAGES_E_D' => $VILLAGES_E_D,
            'RT_E_D' => $RT_E_D,
            'RW_E_D' => $RW_E_D,
            'ADDRESS_E_D' => $ADDRESS_E_D,
            'POSTAL_CODE_E_D' => $POSTAL_CODE_E_D,
            'PROVINCE_E_S' => $PROVINCE_E_S,
            'CITY_E_S' => $CITY_E_S,
            'DISTRICS_E_S' => $DISTRICS_E_S,
            'REGENCIES_E_S' => $REGENCIES_E_S,
            'VILLAGES_E_S' => $VILLAGES_E_S,
            'RT_E_S' => $RT_E_S,
            'RW_E_S' => $RW_E_S,
            'ADDRESS_E_S' => $ADDRESS_E_S,
            'POSTAL_CODE_E_S' => $POSTAL_CODE_E_S,
            'RELIGION' => $RELIGION,
            'BLOOD' => $BLOOD,
            'MARITAL_STATUS' => $MARITAL_STATUS,
            'PLACE_BIRTH' => $PLACE_BIRTH,
            'DATE_BIRTH' => $DATE_BIRTH,
            'AGE' => $AGE,
            'GENDER' => $GENDER,
            'STATUS_EMPLOYEE' => $STATUS_EMPLOYEE,
            'TYPE_EMPLOYEE' => $TYPE_EMPLOYEE,
            'BRANCHES' => $BRANCHES,
            'ID' => $ID,
            'COMPANY_CODE' => $COMPANY_CODE,
            'COMPANY_NAME' => $COMPANY_NAME,
            'COMPANY_TOKEN' => $COMPANY_TOKEN,
            'COMPANY_STATUS' => $COMPANY_STATUS,
        ];

        $loginarea = f_login($data);

        if ($loginarea == 2) {
            header("Location: ./index.php?notif_login_successfully");
        } else if ($loginarea == 1) {
            header("Location: ./index.php?notif_login_unsuccessfully");
        }
    } else {
        header("Location: ./index.php?notif_login_unsuccessfully");
    }
} else {
    header("Location: ./index.php?notif_login_unsuccessfully");
}
