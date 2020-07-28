<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a id="menuToggle" class="menutoggle mr-3 pr-3"><i class="fa fa-bars"></i></a>
               <a class="navbar-brand" href="./"><!-- <img src="images/logo.png" alt="Logo"> -->CSENotes</a>
        </div>
    </div>
    <div class="top-right"><!--top-right -->
        <div class="header-menu"><!--header-menu -->
            <div class="user-area dropdown float-right"><!--user area -->
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="<?= getAdminDetail()->fetch_assoc()['profile']  ?>" alt="User Avatar">
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link text-center"><?= getAdminDetail()->fetch_assoc()['username']  ?></a><hr>
                    <a class="nav-link" href="profile.php"><i class="fa fa-user"></i>My Profile</a>
                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                </div>
            </div><!--user area end -->
        </div><!--header menu end -->
    </div><!--top-right end -->
</header><!--header end -->