<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
//mysqli_query("SET NAMES utf8");
//mysqli_query("SET CHARACTER SET utf8");

include ('functions.php');


function updateInf(){
    $mysqli = ConnectDB();
    if (!$res = $mysqli->query("CALL GetMeUserFromEmail('$_SESSION[email]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $res = $res->fetch_assoc();
    $_SESSION['id'] = $res['id'];
    $_SESSION['email'] = $res['email'];
    $_SESSION['first_name'] = $res['first_name'];
    $_SESSION['last_name'] = $res['last_name'];
    $_SESSION['middle_name'] = $res['middle_name'];
    $_SESSION['number'] = $res['number'];
    $_SESSION['data'] = $res['data'];
    $_SESSION['id_status_user'] = $res['id_status_user'];
    $_SESSION['img_user'] = $res['img_user'];
}

if(isset($_SESSION['email'])){
    $mysqli = ConnectDB();

        if (!$res = $mysqli->query("CALL GetMeUserFromEmail('$_SESSION[email]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        $res = $res->fetch_assoc();
        $_SESSION['id'] = $res['id'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['first_name'] = $res['first_name'];
        $_SESSION['last_name'] = $res['last_name'];
        $_SESSION['middle_name'] = $res['middle_name'];
        $_SESSION['number'] = $res['number'];
        $_SESSION['data'] = $res['data'];
        $_SESSION['id_status_user'] = $res['id_status_user'];
        $_SESSION['img_user'] = $res['img_user'];
        $_SESSION['expert'] = $res['expert'];
        if($_SESSION['expert']!=0) {
            $mysqli1 = ConnectDB();
            if (!$res1 = $mysqli1->query("CALL GetExpertName('$_SESSION[expert]')")) {
                echo "Не удалось вызвать хранимую процедуру: (" . $mysqli1->errno . ") " . $mysqli1->error;
            }
            $res1 = $res1->fetch_assoc();
            $_SESSION['expert_name']=$res1['name'];
        }

}

if(isset ($_POST['login'])){
    $mysqli = ConnectDB();
    if (!$res = $mysqli->query("CALL Login('$_POST[email]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    $res = $res->fetch_assoc();
    echo $res['pass'];
    if (password_verify($_POST['pass'], $res['pass'])) {
        $mysqli = ConnectDB();
        if (!$res = $mysqli->query("CALL GetMeUserFromEmail('$_POST[email]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        $res = $res->fetch_assoc();
        $_SESSION['id'] = $res['id'];
        $_SESSION['email'] = $res['email'];
        $_SESSION['first_name'] = $res['first_name'];
        $_SESSION['last_name'] = $res['last_name'];
        $_SESSION['middle_name'] = $res['middle_name'];
        $_SESSION['number'] = $res['number'];
        $_SESSION['data'] = $res['data'];
        $_SESSION['id_status_user'] = $res['id_status_user'];
        $_SESSION['img_user'] = $res['img_user'];
        $_SESSION['expert'] = $res['expert'];
        if($_SESSION['expert']!=0) {
            $mysqli1 = ConnectDB();
            if (!$res1 = $mysqli1->query("CALL GetExpertName('$_SESSION[expert]')")) {
                echo "Не удалось вызвать хранимую процедуру: (" . $mysqli1->errno . ") " . $mysqli1->error;
            }
            $res1 = $res1->fetch_assoc();
            $_SESSION['expert_name']=$res1['name'];
        }

    } else $_SESSION['badlogin']=true;}




if(isset($_POST['logout'])) logout();