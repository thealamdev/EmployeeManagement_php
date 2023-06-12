<?php
session_start();
include('../../database.php');

if (isset($_POST['submit'])) {
    $id = $_POST['emp_id'];
    $role = $_POST['role'];
    $emp_department = $_POST['emp_department'];
    $emp_email = $_POST['emp_email'];
    $emp_username = $_POST['username'];
    $emp_phone = $_POST['emp_phone'];
    $emp_address = $_POST['emp_address'];
    $zip_code = $_POST['zip_code'];
    $dob = $_POST['dob'];
    $emp_name = $_POST['emp_name'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $blood_group = $_POST['blood_group'];
}

$update_emp = "UPDATE `employee` SET `emp_department`='$emp_department',`emp_email`='$emp_email',`emp_phone`='$emp_phone',`emp_address`='$emp_address',`zip_code`='$zip_code',`blood_group`='$blood_group',`dob`='$dob',`created_at`='$created_at',`updated_at`='$updated_at',`emp_name`='$emp_name'WHERE user_id = $id";

$result = mysqli_query($connection, $update_emp);

$update_role = "UPDATE users SET username = '$emp_username', role = '$role' where id = $id";
$result_role = mysqli_query($connection,$update_role);

if ($result && $result_role == true) {
    $_SESSION['success'] = "Employee Update success full";
    header('location:index.php');
}