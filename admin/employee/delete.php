<?php
session_start();
include('../../database.php');
$id = $_GET['id'];

$delete_query = "DELETE FROM employee WHERE user_id = $id";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result == true) {
    $_SESSION['success'] = "Employee Delete successfull";
    header('location:index.php');
}
 
?>