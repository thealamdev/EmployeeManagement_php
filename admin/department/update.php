<?php
session_start();
include('../../database.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $dep_name = $_POST['dep_name'];
    $dep_title = $_POST['dep_title'];
}

$update_dep = "UPDATE department SET dep_name = '$dep_name', dep_title = '$dep_title' WHERE id = $id";
$result = mysqli_query($connection, $update_dep);

if ($result == true) {
    $_SESSION['success'] = "Department Update successfull";
    header('location:index.php');
}
