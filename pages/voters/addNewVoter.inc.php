

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
                            <li class="breadcrumb-item active">New Voter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add New Voter</h4>
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
                                    Add New Voter
                                </div>

                                <div class="card-body">
                                    <form method="post" action="../../validation/voters/addNewVoter.php" id="newVoterForm" class="needs-validation form-material"  novalidate>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="voterFirstName">First name</label>
                                                <input type="text" class="form-control" id="voterFirstName" name="voterFirstName"  placeholder="First name" required>
                                                <div class="invalid-feedback">
                                                    First Name is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="voterLastName">Last name</label>
                                                <input type="text" class="form-control" id="voterLastName" name="voterLastName" placeholder="Last Name" required>
                                                <div class="invalid-feedback">
                                                    Last Name is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="voterOtherName">Other Name</label>
                                                <input type="text" class="form-control" id="voterOtherName" name="voterOtherName" placeholder="Other Name">
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="voterClass">Class</label>
                                                <select id="voterClass" name="voterClass" class="custom-select form-control" required>
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
                                                <label for="voterIndexNumber">Index Number</label>
                                                <input type="text" class="form-control" id="voterIndexNumber" name="voterIndexNumber" minlength="8" maxlength="8" placeholder="Index Number" required>
                                                <div class="invalid-feedback">
                                                    Index Number is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-12 mb-3">
                                                <label for="voterPassword">Password</label>
                                                <input type="text" class="form-control" id="voterPassword" name="voterPassword"  placeholder="Password" required>
                                                <div class="invalid-feedback">
                                                    Password is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
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
                                            <table id="allVotersTable" class="table text-dark  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="1">#</th>
                                                    <th data-priority="3">First Name</th>
                                                    <th data-priority="1">Last Date</th>
                                                    <th data-priority="3">Other Name</th>
                                                    <th data-priority="3">Class</th>
                                                    <th data-priority="3">Index Number</th>
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

