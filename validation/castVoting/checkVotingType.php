<?php
include_once '../../validation/dbConnection.php';
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
                            <li class="breadcrumb-item active">Cast Voting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Voting</h4>
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
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['btn_CheckVoting'])){

                                    $value = $_POST['btn_CheckVoting'];

                                    $sql = "SELECT * FROM nominees WHERE votingName  = :votingName";
                                    $stmt = $connection->prepare($sql);
                                    $stmt->bindValue(":votingName", $value);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                       <div class='container '>
                                           <div class='row'>
                                               <div class="col-md-6">
                                                   <?php
                                                   for ($i = 2; $i < 3; $i++){
                                                       ?>

                                                       <div class="card">
                                                           <div class="col-md-2 ">
                                                               <img src="../../assets/nomineeUploads/profiledefault.png">
                                                           </div>
                                                           <div class="card-title">
                                                               President
                                                           </div>
                                                       </div>
                                                       <?php
                                                   }
                                                   ?>
                                               </div>

                                               <div class="col-md-6">
                                                   <?php
                                                   for ($i = 2; $i < 3; $i++){
                                                       ?>

                                                       <div class="card">
                                                           <div class="col-md-2 ">
                                                               <img src="../../assets/nomineeUploads/profiledefault.png">
                                                           </div>
                                                           <div class="card-title">
                                                               President
                                                           </div>
                                                       </div>
                                                       <?php
                                                   }
                                                   ?>
                                               </div>
                                           </div>
                                       </div>
                                        <?php
                                    }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div><!-- column 8 -->
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
