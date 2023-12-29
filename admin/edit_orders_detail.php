<?php
include('../include/db.php');

$order_id = $_POST['order_id'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$hidden_id = $_POST['hidden_orders_detail'];
$update = "UPDATE order_details SET order_id = '$order_id', product_name = '$product_name', quantity = '$quantity' WHERE order_details_id = $hidden_id";
mysqli_query($con, $update);
header('Location: view_orders.php?edit_msg=2');
?>