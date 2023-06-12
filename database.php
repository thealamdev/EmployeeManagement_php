<?php
$connection = mysqli_connect('localhost','root','123','employee_management') or die("Connection Failed");
date_default_timezone_set("Asia/Dhaka");

$server = $_SERVER['SERVER_NAME'];
$full_uri = ($_SERVER['REQUEST_URI']);
$uri =  explode('/',$full_uri);
$base =  'http://'.$server.'/'.$uri[1].'/';
// $base =  'http://localhost/EmpoyeeManagement';
// print_r($base);
$app_name = "Employee Management";