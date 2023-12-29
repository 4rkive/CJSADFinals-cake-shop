<?php
$user_id = $_GET['users_id'];
include('../include/db.php');
$delete = "DELETE FROM user WHERE user_id = $user_id";
mysqli_query($conn, $delete);
header("Location: view_users.php");
?>