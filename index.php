<?php


header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require './model/db_conn.php';
require './model/login_model.php';
//require './model/private_data_model.php';

require './controller/login_controller.php';
//require './controller/private_data_controller.php';

require './view/login_view.php';
//require './view/data_view.php';

$connection = new DB_conn();

$login_model = new Login_model($connection);
//$private_data_model = new Private_data_model($connection, $login_model);

$login_controller = new Login_controller($login_model);
//$private_data_controller = new Private_data_controller($private_data_model);

$login_view = new Login_view($login_controller, $login_model);
//$data_view = new Data_view($private_data_controller, $private_data_model);


if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
}

if (isset($_POST["username"])) {
    $username = $_POST["username"];
}

if (isset($_POST["password"])) {
    $password = md5($_POST["password"]);
}

if (isset($username) && isset($password)) {
    $login_controller->login($username, $password);
}

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $login_controller->{$_GET['action']}();
}
//$login_controller->clear();


/*if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    $login_view->login_view();
} else {
    $data_view->data_view();
}*/

$login_view->login_view();
  
 