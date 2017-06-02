<?php

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

session_start();

require './utility/clear_session.php';

require './model/db_conn.php';
require './model/login_model.php';
require './model/data_model.php';

require './controller/login_controller.php';
require './controller/data_controller.php';

require './view/login_view.php';
require './view/data_view.php';

$connection = new DB_conn();

$login_model = new Login_model($connection);
$data_model = new Data_model($connection, $login_model);

$login_controller = new Login_controller($login_model);
$data_controller = new Data_controller($data_model);

$login_view = new Login_view($login_controller, $login_model);
$data_view = new Data_view($data_controller, $data_model);

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
   $login_view->login_view();
    echo 'session nije postavljen <br>';
} else {
   $data_view->data_view();
       $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    echo "session je postavljen <br>".
            "$username<br>".
            "$password<br>";
    
}

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    echo 'post user <br>';
}

if (isset($_POST["password"])) {
    $password = md5($_POST["password"]);
    echo 'post pass<br>';
}

//runs function login and pass values
if (isset($username) && isset($password)) {
    $login_controller->login($username, $password);
    echo 'login controller<br>';
}

 if (isset($_GET['action']) && !empty($_GET['action'])) {
     clear();
  } 


