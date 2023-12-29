<?php
$cat_id = $_GET['cat_id'];
include('../include/db.php');
$delete = "DELETE FROM category WHERE category_id = $cat_id";
mysqli_query($con, $delete);
header("Location: view_category.php");
?>