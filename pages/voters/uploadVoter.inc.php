
<?php
include "../../includes/header.inc.php";
include "../../includes/navs.inc.php";
include "uploadVoter.code.php";
$uploadVoters = new uploadVoter();
if (isset($_POST['btn_upload'])) {
    $fileName =$_FILES['file']['name'];
    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('csv');

    if (!in_array($fileAcutalExt, $allowed)){
        ?>
      <script type="text/javascript">
          window.location.assign("http://localhost/projectVoting/pages/voters/uploadVoter.inc.php?fileTypeError=".concat("Please Select a .csv File"));
      </script>
        <?php
        }else{
        $uploadVoters->import($_FILES['file']['tmp_name']);
       // $uploadVoters->import($_FILES['file']['name']);
    }

/*
    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('csv');

    if (!in_array($fileAcutalExt, $allowed)){
        header("Location: uploadVoter.inc.php?fileTypeError=".urlencode("Please Select .csv File"));
    }*/

}
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
            <div class="col-md-6 offset-md-10">
                <a role="button" href="addNewVoter.inc.php" class="btn btn-primary"><i class="ti ti-plus"></i> Add New Voter(s)</a>
            </div>
        </div>
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
                                    <div class="text-center col-sm-12">
                                        <?php if (isset($_GET['fileTypeError'])) { ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <?php echo $_GET['fileTypeError'];?>
                                            </div>
                                        <?php }?>


                                        <?php if (isset($_GET['file_uploadSuccess'])) { ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <?php echo $_GET['file_uploadSuccess'];?>
                                            </div>
                                        <?php }?>


                                        <?php if (isset($_GET['file_not_uploaded'])) { ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <?php echo $_GET['file_not_uploaded'];?>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1 class="display-6 text-danger">Note</h1>
                                            <p class="text-primary">1. Only .csv File Allowed</p>
                                            <p class="text-primary">2. The File should Follow the Format Below</p>

                                            <div class="tablesaw table-responsive table-hover table-bordered" data-pattern="priority-columns">
                                                <table  class="table text-dark  table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="3">First Name</th>
                                                        <th data-priority="1">Last Date</th>
                                                        <th data-priority="3">Other Name</th>
                                                        <th data-priority="3">Class</th>
                                                        <th data-priority="3">Index Number</th>
                                                        <th data-priority="3">Password</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form enctype="multipart/form-data" action="uploadVoter.inc.php" method="post">
                                                <div class="form-group m-t-30">
                                                    <input type="file" name="file" id="file" class="form-control-file">
                                                </div>

                                                <div class="form-material">
                                                    <button class="btn btn-danger" name="btn_remove" id="btn_remove">Remove</button>
                                                    <button class="btn btn-success" type="submit" name="btn_upload" id="btn_upload">Upload</button>
                                                </div>
                                            </form>
                                        </div>
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

