<?php
include('../include/db.php');

if (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
    echo "<script>alert('Edited details!')</script>";
    echo "<script>window.location.assign('account_admin.php')</script>";
}
?>
<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>

<!doctype html>
<html lang="en">

 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OCS - Admin Account</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
    <?php
        include('admin_nav.php');
        include('admin_sidenav.php');
        ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Admin Account</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Admin account</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        $admin_id = $_SESSION['user_admin_id'];
                        $select = "SELECT * FROM admin_area Where admin_id = $admin_id";
                        $query = mysqli_query($con, $select);
                        $res = mysqli_fetch_assoc($query);
                        ?>
                        <form id="form" class="splash-container" method="post" action="update_admin.php">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" name="admin_username" required="" autocomplete="off" value="<?php echo $res['admin_username'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="email" name="admin_email" required="" autocomplete="off" value="<?php echo $res['admin_email'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" required="" name="admin_password" value="<?php echo $res['admin_password'];?>">
                                    </div>
                                    <div class="form-group pt-2">
                                        <input type="hidden" value="<?php echo $res['admin_id'];?>" name="hidden_admin_id">
                                        <button class="btn btn-block btn-primary" type="submit">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            include("../include/footer.php")
            ?>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
}
?>