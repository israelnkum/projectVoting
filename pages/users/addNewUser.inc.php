
<?php
include '../../includes/header.inc.php';
include '../../includes/navs.inc.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card-box">
                    <div class="row">
                        <div class="col-md-6 offset-md-6 text-right">
                            <button type="button" data-toggle="modal" id="btnAddNewUser" data-target="#newUserModal" class="btn btn-primary" href="votingType.php">
                                <i class="fi fi-plus"></i> Add New Admin
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-title">
                                    All Administrators
                                </div>
                                <div class="card-body">
                                    <div class="table-rep-plugin">
                                        <div class="tablesaw table-responsive table-hover table-bordered" data-pattern="priority-columns">
                                            <table id="usersTable"  class="table text-dark  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="4">#</th>
                                                    <th data-priority="4">Username</th>
                                                    <th data-priority="4">Email</th>
                                                    <th data-priority="3">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end column 4 -->
                    </div>  <!-- end row -->
                </div>
            </div><!-- end col-12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<?php
include '../../includes/footer.inc.php';
?>
