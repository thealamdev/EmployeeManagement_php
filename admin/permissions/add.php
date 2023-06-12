<?php
 
session_start();

include('../../database.php');
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $username = trim(htmlentities($_POST['username']));
    $password = $_POST['password'];
    $role = $_POST['role'];
    $emp_name = trim(htmlentities($_POST['emp_name']));
    $emp_department = $_POST['emp_department'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];
    $emp_address = $_POST['emp_address'];
    $zip_code = $_POST['zip_code'];
    $blood_group = $_POST['blood_group'];
    $dob = $_POST['dob'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
}


if (!empty($_SESSION)) {
    
    $new_user_id = $user_id;
    $insert_employee = "INSERT INTO `employee`(`user_id`, `emp_department`, `emp_email`, `emp_phone`, `emp_address`, `zip_code`, `blood_group`, `dob`, `created_at`, `updated_at`, `emp_name`) VALUES ('$new_user_id','$emp_department','$emp_email','$emp_phone','$emp_address','$zip_code','$blood_group','$dob','$created_at','$updated_at','$emp_name')";

    $insert_result = mysqli_query($connection, $insert_employee);

    if ($insert_result == true) {
        $_SESSION['success'] = "Employee Created Success";
        header('location:http://localhost/EmpoyeeManagement/admin/permissions/index.php');
    }
} else{
    echo "error";
}
