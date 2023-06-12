<?php
session_start();
include('../../database.php');
$id = $_GET['id'];

$delete_query = "DELETE FROM users WHERE  id = $id";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result == true) {
    $_SESSION['success'] = "User Delete successfull";
    header('location:index.php');
}
 
?>