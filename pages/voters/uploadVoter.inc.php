

<?php
include "../../includes/header.inc.php";
include "../../includes/navs.inc.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Voters</a></li>
                            <li class="breadcrumb-item active">Upload Voter(s)</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Upload New Voter(s)</h4>
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
                                <div class="card-title">
                                    Upload Voter(s)
                                </div>
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <h1 class="display-6">Note</h1>
                                        <p></p>
                                    </div>
                                    <div class="col-md-6 offset-md-5">
                                        <form enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>

                                            <div class="form-material">
                                                <button class="btn btn-danger" name="btn_remove" id="btn_remove">Remove</button>
                                                <button class="btn btn-success" name="btn_upload" id="btn_upload">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  <!-- end row -->
                </div><!-- card box -->
            </div><!-- col-lg-12-->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<?php

include '../../includes/footer.inc.php';

?>

