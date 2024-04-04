<?php
//start sessions
session_start();

//config file
require_once 'config.php';
//AUtoloader
function __autoload($class_name)
{
    require_once 'lib/' . $class_name . '.php';
}
//Include Helper file
require_once 'helpers/system_helpers.php';
