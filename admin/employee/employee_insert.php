<?php
 
session_start();
// print_r($_REQUEST);
// die();
include('../../database.php');
if (isset($_POST['submit'])) {
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

// validation:
// if (empty($emp_name)) {
//     $_SESSION['emp_name'] = "Enter Employee Name";
// }

// if (empty($emp_department)) {
//     $_SESSION['emp_department'] = "Enter Department";
// }

// if (empty($emp_email)) {
//     $_SESSION['emp_email'] = "Enter Empoyee Email";
// }

// if ($emp_phone) {
//     $_SESSION['emp_phone'] = "Enter phone Number";
// }

// if ($emp_address) {
//     $_SESSION['emp_address'] = "Enter address";
// }

// if ($zip_code) {
//     $_SESSION['zip_code'] = "Enter Zipe Code";
// }

// if ($blood_group) {
//     $_SESSION['blood_group'] = "Enter Blood Group";
// }

// if ($dob) {
//     $_SESSION['dob'] = "Enter Date Of Birth";
// }



if (!empty($_SESSION)) {

    $insert_user = "INSERT INTO users(username,password,role,created_at,updated_at) values('$username','$password','$role','$created_at','$updated_at')";
    $user_result = mysqli_query($connection, $insert_user);
    $new_user_id = mysqli_insert_id($connection);
    
    $insert_employee = "INSERT INTO `employee`(`user_id`, `emp_department`, `emp_email`, `emp_phone`, `emp_address`, `zip_code`, `blood_group`, `dob`, `created_at`, `updated_at`, `emp_name`) VALUES ('$new_user_id','$emp_department','$emp_email','$emp_phone','$emp_address','$zip_code','$blood_group','$dob','$created_at','$updated_at','$emp_name')";

    $insert_result = mysqli_query($connection, $insert_employee);

    if ($insert_result == true) {
        $_SESSION['success'] = "Employee Created Success";
        header('location:http://localhost/EmpoyeeManagement/admin/employee/create.php');
    }
} else{
    echo "error";
}
