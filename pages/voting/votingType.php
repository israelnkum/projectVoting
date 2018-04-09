
<?php
session_start();
include '../../includes/header.inc.php';
include '../../includes/navs.inc.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-md-6 offset-md-3 m-t-20">
                <button class="btn btn-primary btn-lg btn-block">
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

<!-- Popup Modal -->
<div id="popModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Popup Title</h4>
            </div>
            <form class="needs-validation" method="post" action="newNominee.inc.php" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-material ">
                            <label for="VotingName"></label>
                            <select id="VotingName"  name="VotingName" class="custom-select form-control" required>
                                <option value="">Select Voting Name</option>
                                <?php
                                include "../../validation/dbConnection.php";
                                $sql = "SELECT * FROM new_voting";
                                $stmt = $connection->prepare($sql);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    if ($row <0){
                                        echo "<option value=''>No Positon for the Selected Voting</option>";
                                    }else{
                                        echo "<option value='" . $row['voting_name']."'>". $row['voting_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Voting Name is required
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger" href="newNominee.inc.php">Close</a>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php
include '../../includes/footer.inc.php';

?>
<script>
$(document).ready(function () {
    $("#popModal").modal({
        backdrop:'static',
        keyboard:false
    });
});
    $('#popModal').modal({
        modal: true,
        autoOpen: false,
        autoClose:false
    });

    $('select').change(function () {
        if ($(this).val() === "") {
            $("#popModal").modal('show');


        }else {
            // $("#popModal").modal('hide');
        }
    });


</script>

