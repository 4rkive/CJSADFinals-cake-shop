<?php
$order_id = $_GET['order_id'];
include('../include/db.php');
$delete = "DELETE FROM orders WHERE order_id = $order_id";
mysqli_query($con, $delete);
header("Location: view_orders.php");
?>