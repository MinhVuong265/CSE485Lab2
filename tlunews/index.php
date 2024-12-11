<?php
require_once('config/config.php');
require_once APP_ROOT . '/tlunews/controllers/Homecontroller.php';


$homeController = new Homecontroller();
$homeController->index();

?>