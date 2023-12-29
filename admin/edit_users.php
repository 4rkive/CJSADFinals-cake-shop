<?php
include('../include/db.php');

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_mobile = $_POST['user_mobile'];
$user_address = $_POST['user_address'];
$hidden_id = $_POST['hidden_user'];
$update = "UPDATE user SET username = '$username', user_email = '$user_email', user_password = '$user_password', user_mobile = '$user_mobile', user_address = '$user_address' WHERE user_id = $hidden_id";
mysqli_query($con, $update);
header('Location: view_users.php?edit_msg=1');
?>