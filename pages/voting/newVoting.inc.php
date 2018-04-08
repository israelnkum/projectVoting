

<?php
include "../../includes/header.inc.php";
include "../../includes/navs.inc.php";
?>


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
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-title">
                                    Add New Voting
                                </div>

                                <div class="card-body">
                                    <form method="post" action="../../validation/voting/addNewVoting.php" id="addNewVotingForm" name="addNewVotingForm" class="needs-validation" novalidate>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="votingName">Voting name</label>
                                                <input type="text" class="form-control" id="votingName" name="votingName" placeholder="Voting Name"  required>
                                                <div class="invalid-feedback">
                                                    Voting Name is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="votingDate">Voting Date</label>
                                                <input type="text" class="form-control" id="votingDate" name="votingDate" placeholder="Voting Date"  required>
                                                <div class="invalid-feedback">
                                                    Voting Date is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="startingTime">Starting Time</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="startingTime" name="startingTime" placeholder="Starting Time"  required>
                                                    <div class="invalid-feedback">
                                                        Starting Time is required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="endingTime">Ending Time</label>
                                                <input type="text" class="form-control" id="endingTime" name="endingTime" placeholder="Ending Time" required>
                                                <div class="invalid-feedback">
                                                    Ending Time is required
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- col md -4 -->

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-title">
                                    All Voting
                                </div>

                                <div class="card-body">
                                    <div class="table-rep-plugin">
                                        <div class="tablesaw table-responsive table-hover table-bordered" data-pattern="priority-columns">
                                            <table id="allVotingTable" class="table text-dark  table-striped">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">#</th>
                                                        <th data-priority="3">Voting Name</th>
                                                        <th data-priority="1">Voting Date</th>
                                                        <th data-priority="3">Starting Time</th>
                                                        <th data-priority="3">Ending Time</th>
                                                        <th data-priority="3">Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
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


<?php

include '../../includes/footer.inc.php';

?>
