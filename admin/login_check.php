<?php
include('../include/db.php');

$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$select = "SELECT * FROM admin_area WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
$query = mysqli_query($con, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	session_start();
	$_SESSION['user_admin_id'] = $res['admin_id'];
	$_SESSION['user_admin_username'] = $res['admin_username'];
	header("Location: dashboard.php?login_success=1");
} 
else {
	header("Location: user_login.php?login_error=1");
}
?>