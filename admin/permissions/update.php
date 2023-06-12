<?php
session_start();
include('../../database.php');

if (isset($_POST['submit'])) {
    $id = $_POST['emp_id'];
    $role = $_POST['role'];
}

$update_role = "UPDATE users SET role = '$role' where id = $id";
$result_role = mysqli_query($connection,$update_role);

if ($result_role == true) {
    $_SESSION['success'] = "Employee Update success full";
    header('location:index.php');
}