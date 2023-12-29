<?php
include('../include/db.php');

$user_id = $_POST['users_id'];
$delivery_date = $_POST['delivery_date'];
$payment_method = $_POST['payment_method'];
$total_amount = $_POST['total_amount'];
$hidden_id = $_POST['hidden_orders'];
$update = "UPDATE orders SET user_id = '$user_id', delivery_date = '$delivery_date', payment_method = '$payment_method', total_amount = '$total_amount' WHERE order_id = $hidden_id";
mysqli_query($con, $update);
header('Location: view_orders.php?edit_msg=1');
?>