<?php
session_start();
include('../../database.php');

if(isset($_POST['submit'])){
    $dep_name = $_POST['dep_name'];
    $dep_title = $_POST['dep_title'];
}

$dep_insert = "INSERT INTO department(dep_name,dep_title)values('$dep_name','$dep_title')";
$result = mysqli_query($connection,$dep_insert);

if($result){
    $_SESSION['success'] = "Department add successfull";
    header('location:http://localhost/EmpoyeeManagement/admin/department/index.php');
}

?>



