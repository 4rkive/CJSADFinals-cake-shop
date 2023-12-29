<?php
include('../include/db.php');

$admin_username = $_POST['admin_username'];
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];
$insert = "INSERT INTO admin_area (admin_username, admin_email, admin_password) VALUES ('$admin_username', '$admin_email', '$admin_password')";
$select = "SELECT * FROM admin_area WHERE admin_username = '$admin_username'";
$query = mysqli_query($con, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	header("Location: admin_signup.php?register_msg=1");
}
else {
	mysqli_query($cnn, $insert);
	header("Location: index.php");
}
?>

