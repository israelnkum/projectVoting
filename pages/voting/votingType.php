
<?php
session_start();
include '../../includes/header.inc.php';
include '../../includes/navs.inc.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-md-12 m-t-10 text-center">
                <?php if (isset($_GET['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $_GET['msg'];?>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 m-t-20">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#popModal">
                    Add new Nominee
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Voting</a></li>
                            <li class="breadcrumb-item active">New Nominee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">New Nominee</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-title cardMainTitle" data-bgColor="blue">
                                    All Nominees
                                </div>
                                <div class="card-body">
                                    <div class="table-rep-plugin">
                                        <div class="tablesaw table-responsive table-hover table-bordered" data-pattern="priority-columns">
                                            <table id="nomineeTable"  class="table  text-dark table-striped" style="font-size: 15px;">
                                                <thead>
                                                <tr>
                                                    <th data-priority="4">#</th>
                                                    <th data-priority="1">Voting Name</th>
                                                    <th data-priority="3">Nominee</th>
                                                    <th data-priority="1">Position</th>
                                                    <th data-priority="3">Class</th>
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
                        </div><!-- column 8 -->
                    </div>  <!-- end row -->
                </div>
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->


    </div> <!-- end container -->
</div>





<?php
include '../../includes/footer.inc.php';

?>


