<?php
include('../../database.php');
if (!isset($_SESSION)) {
    session_start();
}
$user_id = $_SESSION['login'];
$created_at = date('Y-m-d');
$updated_at = date('Y-m-d');


$attandace_insert = "INSERT INTO attandance(user_id,created_at,updated_at)VALUES('$user_id','$created_at','$updated_at')";
$attandace_result = mysqli_query($connection, $attandace_insert);

if ($attandace_result) {
    $_SESSION['success'] = "Attandance done";
    header('location:' . $base . '/employee/attandance/index.php');
}
