<?php
session_start();
include('../../database.php');

if(isset($_POST['submit'])){
    $role = $_POST['role_name'];
    $description = $_POST['role_description'];
}

$insert_role = "INSERT INTO role(role_name,role_description)values('$role','$description')";
$result = mysqli_query($connection,$insert_role);

if($result){
    $_SESSION['success'] = "Role insert success full";
    header('location:http://localhost/EmpoyeeManagement/admin/role/index.php');
}

?>



