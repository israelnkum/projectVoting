
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
                            <img src="../../assets/images/profiledefault.png" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name">Maxine K <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-head"></i> <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-power"></i> <span>Logout</span>
                            </a>
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
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="../../pages/dashboard/dashboard.inc.php"><i class="icon-speedometer"></i>Dashboard</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="icon-layers"></i>Voting</a>
                        <ul class="submenu">
                            <li><a href="../../pages/voting/newVoting.inc.php">New Voting</a></li>
                            <li><a href="../../pages/voting/newPosition.inc.php">Add Position</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-layers"></i>Nominees</a>
                        <ul class="submenu">
                            <li><a href="../../pages/voting/votingType.php">All Nominees</a></li>
                            <li><a href="#" role="button" data-toggle="modal" data-target="#popModal">Add Nominees</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-user"></i>Voter(s)</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="../../pages/voters/addNewVoter.inc.php">New Voter</a></li>
                                    <li><a href="../../pages/voters/uploadVoter.inc.php">Upload voter(s)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="../../pages/castVoting/selectVotingType.php"><i class="dripicons-box"></i>Cast Voting</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-docs"></i>View Result</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-docs"></i>Report(s)</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="extras-timeline.html">Generate Report(s)</a></li>
                                    <li><a href="extras-profile.html">All Generated Report(s)</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</div>
<!-- End Navigation Bar-->