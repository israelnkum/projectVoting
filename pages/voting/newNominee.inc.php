
<?php
session_start();
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
                        <div class="col-md-12 text-right">
                            <a role="button" class="btn btn-primary" href="votingType.php">Voting Name</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-title">
                                    Add New Nominee
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../../validation/nominees/addNewNominee.php" id="newNomineeForm" class="needs-validation form-material"  novalidate>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="fristName">First name</label>
                                                <input type="text" class="form-control" id="fristName" name="fristName" value="<?php $_GET['VotingName'] ?>" placeholder="Enter First name" required>
                                                <div class="invalid-feedback">
                                                    First Name is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="lastName">Last name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                                <div class="invalid-feedback">
                                                    Last Name is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="otherName">Other Name</label>
                                                <input type="text" class="form-control" id="otherName" name="otherName" placeholder="Other Name">
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="nomineePosition">Position</label>
                                                <select id="nomineePosition" name="nomineePosition" class="custom-select form-control" required>
                                                    <option value="">Select Position</option>
                                                    <?php
                                                    if (isset($_POST['submit'])){
                                                        include "../../validation/dbConnection.php";
                                                        global $selected;
                                                        $selected = $_POST['VotingName'];
                                                        $sql = "SELECT * FROM positions WHERE  voting_name=:selected";
                                                        $stmt = $connection->prepare($sql);
                                                        $stmt->bindValue(":selected", $selected);
                                                        $stmt->execute();
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                            echo "<option value='" . $row['positionType']."'>". $row['positionType'] . "</option>";
                                                        }

                                                    }

                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Position is required
                                                </div>
                                            </div>
                                            <?php
                                            echo '
                                            <div class="col-md-12 mb-3">
                                                <label for="voteName">VoteName</label>
                                                <input type="text" class="form-control" id="voteName" name="voteName" value="'.$selected.'" required>
                                            </div>
                                            ';
                                            ?>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="nomineeClass">Class</label>
                                                <select id="nomineeClass" name="nomineeClass" class="custom-select form-control" required>
                                                    <option value="">Select Class</option>
                                                    <option value="HND Level 100">HND Level 100</option>
                                                    <option value="HND Level 200">HND Level 200</option>
                                                    <option value="HND Level 300">HND Level 300</option>
                                                    <option value="Diploma Level 100">Diploma Level 100</option>
                                                    <option value="Diploma Level 200">Diploma Level 200</option>
                                                    <option value="BTECH Level 100">BTECH Level 100</option>
                                                    <option value="BTECH Level 200">BTECH Level 200</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="indexNumber">Index Number</label>
                                                <input type="text" class="form-control" id="indexNumber" name="indexNumber" minlength="8" maxlength="8" placeholder="Index Number" required>
                                                <div class="invalid-feedback">
                                                    Index Number is required
                                                </div>
                                            </div>
                                        </div>

                                    <div class="text-right">
                                        <button type="button" data-toggle="modal" data-target="#uploadImageModal" class="btn btn-sm btn-success">Upload Image</button>
                                    </div>
                                        <hr>
                                        <div class="text-right">
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end column 4 -->

                        <div class="col-md-9">
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
<!-- end wrapper -->


<!-- Modal -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center ">
                            <img class="img-circle"  style=" height: 150px; width: 150px;"  src="../../assets/images/profiledefault.png">
                        </div>
                        <hr>
                        <div class="col-md-6 offset-sm-3">
                            <form>
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Remove</button>
                <button type="button" class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</div>




<?php

include '../../includes/footer.inc.php';

?>
