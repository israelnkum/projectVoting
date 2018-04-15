
<div id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="../../pages/dashboard/dashboard.inc.php" class="logo">
                    <img src="../../assets/images/itsu.jpeg" alt=""  style="height: auto; width: 50px;">
                </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras topbar-custom">
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <span class="ml-1 pro-user-name"><?php echo $_SESSION['indexNumber']?><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-transparent">
                            <form method="post" action="../../validation/authentication/logout.inc.php">
                                <div class="text-right">
                                    <button name="btn_logout" type="submit" class="btn btn-sm btn-danger"><i class="fi-power"></i> Logout</button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end menu-extras -->
            <div class="clearfix"></div>
        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->
    <div class="navbar-custom">
        <div class="container-fluid text-center">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="../../pages/dashboard/voterDashboard.php"><i class="icon-speedometer"></i>Dashboard</a>
                    </li>
                    <li class="has-submenu">
                        <a href="../../pages/castVoting/selectVotingType.php"><i class="dripicons-box"></i>Cast Voting</a>
                    </li>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</div>
<!-- End Navigation Bar-->