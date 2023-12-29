<?php
$order_details_id = $_GET['order_details_id'];
include('../include/db.php');
$delete = "DELETE FROM orders WHERE order_details_id = $order_details_id";
mysqli_query($con, $delete);
header("Location: view_orders.php");
?>