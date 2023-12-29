<div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <img src="./uploads/logo.png" alt="" class="logo" style="width: 50px; height: 50px; margin-left: 8px; margin-right: 2px;">
                <a class="navbar-brand text-danger">Sweet & Delices Cake Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="explore.php">Explore</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active text-dark" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                            <?php
                            $select = "SELECT * FROM categories";
                            $query = mysqli_query($con, $select);
                            while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                                <a class="dropdown-item" href="category.php?category=<?php echo $res['category_id'];?>">
                                    <?php echo $res['category_name'];?>
                                </a>
                            <?php
                            }
                            ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount;?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="about.php">About us</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername;?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="user_account.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="user_login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="user_logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>