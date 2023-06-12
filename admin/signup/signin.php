<?php
session_start();
include('../../database.php');
if (isset($_POST['submit'])) {
    $username = trim(htmlentities($_POST['username']));
    $password = $_POST['password'];
}

// validation:
if (empty($username)) {
    $_SESSION['username_error'] = "Enter username";
}

if (empty($password)) {
    $_SESSION['pass_error'] = "Enter password";
}


// query :
$select_users = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
$select_result = mysqli_query($connection, $select_users);
$user = mysqli_fetch_all($select_result, true);
// print_r($user[0]['id']);
// die();

if (mysqli_num_rows($select_result) > 0) {
    if ($user[0]['role'] == 'user') {
        header('location:http://localhost/EmpoyeeManagement/error.php');
    }
    if ($user[0]['role'] == 'super-admin' || $user[0]['role'] == 'admin') {
        $_SESSION['success'] = "Login Successfull";
        $_SESSION['login'] = $user[0]['id'];
        $_SESSION['role'] = $user[0]['role'];
        $_SESSION['name'] = $user[0]['username'];
        header('location:http://localhost/EmpoyeeManagement/admin.php');
    }
    
} else {
    header('location:http://localhost/EmpoyeeManagement/index.php');
}
