
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
                            <li class="breadcrumb-item"><a href="#">Voting</a></li>
                            <li class="breadcrumb-item active">New Position</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cast Voting</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <?php
                        include "sidebar/sidebar.inc.php";
                        ?>

                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-md-12 text-center ">
                                           <div class="display-6 m-t-30 text-danger text-uppercase" style="max-font-size: 20px;">
                                               Please Select Voting Type
                                           </div>
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
<!-- end wrapper -->

<?php

include '../../includes/footer.inc.php';

?>
