<?php
include('../include/db.php');

$id = $_GET['id'];
$select = "SELECT * FROM categories WHERE category_id = $id";
$query = mysqli_query($con, $select);
$res = mysqli_fetch_assoc($query);
echo json_encode($res);
?>