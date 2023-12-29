<?php
include('../include/db.php');

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('Users edited!');
    window.location.assign('view_users.php');
    </script>";
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
    <title>View Users - Sweet & Delices Cake Shop</title>
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
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
                            <h2 class="pageheader-title">Users</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View orders</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Users Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT * FROM user";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['username'];?></td>
                                                <td><?php echo $res['user_email'];?></td>
                                                <td><?php echo $res['user_password'];?></td>
                                                <td><?php echo $res['user_mobile'];?></td>
                                                <td><?php echo $res['user_address'];?></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('../include/footer.php');?>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_users.php" id="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header">Edit users</h5>
                    <div class="card-body">    
                        <div class="form-group">
                            <label for="inputUserName">Username</label>
                            <input id="inputUserName" type="text" name="username" required="" placeholder="Enter username" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputUserEmail">Email</label>
                            <input id="inputUserEmail" type="email" name="user_email" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputUserPassword">Password</label>
                            <input id="inputUserPassword" type="password" name="user_password" required="" placeholder="Enter password" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputUserMobile">Mobile No.</label>
                            <input id="inputUserMobile" type="tel" name="user_mobile" required="" placeholder="Enter mobile no." pattern="[0-9]{10}" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputUserAddress">Address</label>
                            <input id="inputUserAddress" type="text" name="user_address" required="" placeholder="Enter address" autocomplete="off" class="form-control">
                        </div>
                        <input type="hidden" name="hidden_users">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-space btn-secondary">Clear</button>
                <button type="submit" class="btn btn-space btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/data-table.js"></script>
    <script>
        function edit_users(users_id) {
            $.ajax({
                url:'get_users.php',
                data:'id='+users_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="users_username"]').val(res.users_username);
                    $('input[name="users_email"]').val(res.users_email);
                    $('input[name="users_password"]').val(res.users_password);
                    $('input[name="users_mobile"]').val(res.users_mobile);
                    $('input[name="users_address"]').val(res.users_address);
                    $('input[name="hidden_users"]').val(res.users_id);
                }
            })
        }
        function delete_users(users_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_users.php?users_id="+users_id;
            }
        }
    </script>
</body>
 
</html>
<?php
}
else {
    header("Location: index.php");
}
?>