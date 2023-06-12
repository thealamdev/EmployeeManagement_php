<?php
session_start();
include('../../database.php');
$id = $_GET['id'];

$delete_query = "DELETE FROM role WHERE id = $id";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result == true) {
    $_SESSION['success'] = "Role Delete successfull";
    header('location:index.php');
}
 
?>