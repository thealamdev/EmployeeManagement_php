<?php
session_start();
include('../../database.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $role = $_POST['role_name'];
    $description = $_POST['role_description'];
}

$update_role = "UPDATE role SET role_name = '$role', role_description = '$description' WHERE id = $id";
$result = mysqli_query($connection, $update_role);

if ($result == true) {
    $_SESSION['success'] = "Role Update success full";
    header('location:index.php');
}
