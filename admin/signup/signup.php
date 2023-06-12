<?php
session_start();
include('../../database.php');
if (isset($_POST['submit'])) {
    $username = trim(htmlentities($_POST['username']));
    $password = $_POST['password'];
    $confir_pass = $_POST['confirm_pass'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
}

// validation:
if (empty($username)) {
    $_SESSION['username_error'] = "Enter username";
}

if (empty($password)) {
    $_SESSION['pass_error'] = "Enter password";
}

if (empty($confir_pass)) {
    $_SESSION['confirm_pass_error'] = "Confirm password needed";
}

if ($password !== $confir_pass) {
    $_SESSION['pass_not_match'] = "Password not matched";
}

$users_select = "SELECT * FROM users";
$users_query = mysqli_query($connection,$users_select);

if(mysqli_num_rows($users_query)>0){
    $user_results = mysqli_fetch_all($users_query,true);
}

foreach($user_results as $user_result){
    if($user_result['username'] == $username){
        $_SESSION['unique_username'] = "Username already taken";
    }
}
 

 


if (empty($_SESSION)) {

    $insert_user = "INSERT INTO users(username,password,created_at,updated_at) values('$username','$password','$created_at','$updated_at')";
    $insert_result = mysqli_query($connection, $insert_user);

    if ($insert_result == true) {
        $_SESSION['success'] = "Account Created successfull";
        header('location:http://localhost/EmpoyeeManagement/index.php');
    }
} else {
    header('location:http://localhost/EmpoyeeManagement/index.php');
}
