
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
                    <h4 class="page-title">New Position</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-title">
                                    Select Voting
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../../validation/position/addNewPosition.php" id="addNewPositionForm" class="needs-validation form-material" novalidate>
                                        <div class="col-md-12 mb-3">
                                            <label for="selectVotingName">Voting Name</label>

                                            <select id="selectVotingName" name="selectVotingName" class="custom-select form-control" required>
                                                <option value="">Select Voting</option>
                                                <?php
                                                include "../../validation/dbConnection.php";
                                                $sql = "SELECT * FROM new_voting";
                                                $stmt = $connection->prepare($sql);
                                                $stmt->execute();
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                    echo "<option value='" . $row['voting_name']."'>". $row['voting_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Voting Name is required
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="selecPosition">Position</label>
                                            <select id="selecPosition" name="selecPosition" class="custom-select form-control" required>
                                                <option value="">Select Position</option>
                                                <option value="President">President</option>
                                                <option value="Vice President">Vice President</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Organizer">Organizer</option>
                                                <option value="Asst. Organizer">Asst. Organizer</option>
                                                <option value="Treasure">Treasure</option>
                                                <option value="Interest & Innovations Cordinator">Interest & Innovations Cordinator</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Position is required
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit" id="btn_addPosition" name="btn_addPosition">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end column 4 -->

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-title cardMainTitle" data-bgColor="blue">
                                    All Position
                                </div>
                                <div class="card-body">
                                    <div class="table-rep-plugin">
                                        <div class="tablesaw table-responsive table-hover table-bordered" data-pattern="priority-columns">
                                            <table id="positionTable"  class="table text-dark  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="4">#</th>
                                                    <th data-priority="1">Voting Name</th>
                                                    <th data-priority="2">Postion</th>
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

<?php

include '../../includes/footer.inc.php';

?>
