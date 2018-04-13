
<!-- Popup Modal -->
<div id="popModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Voting</h4>
            </div>
            <form class="needs-validation" method="post" action="http://localhost/projectVoting/pages/voting/newNominee.inc.php" novalidate>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- new Voting Name Modal ->

<!-- Edit Voting modal -->
<div class="modal fade" id="updateVotingInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Voting Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../../validation/voting/updateVotingInfo.php" class="needs-validation form-material" id="updateVotingForm" name="updateVotingForm" novalidate>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row form-material">
                                <div class="col-md-12 mb-3">
                                    <label for="editVotingName">Voting name</label>
                                    <input type="text" class="form-control" id="editVotingName" name="editVotingName" placeholder="Enter Voting name" required>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                            </div>
                            <div class="form-row form-material">
                                <div class="col-md-4 mb-3">
                                    <label for="editVotingDate">Voting Date</label>
                                    <input type="text" class="form-control" id="editVotingDate" name="editVotingDate" placeholder="Date" required>
                                    <div class="invalid-feedback">
                                        Date is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="editStartingTime">Starting Time</label>
                                    <input type="text" class="form-control" id="editStartingTime" name="editStartingTime" placeholder="Starting Time" required>
                                    <div class="invalid-feedback">
                                        Starting time is required
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="editEndingTime">Ending Time</label>
                                    <input type="text" class="form-control" id="editEndingTime" name="editEndingTime" placeholder="Ending Time" required>
                                    <div class="invalid-feedback">
                                        Ending time is required
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer editVotingInfo">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn_updateVotingInfo">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete Voting Modal -->
<div class="modal" id="deleteVotingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Voting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-danger">Are you want to Delete This Voting?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="deleteVotingBtn" id="deleteVotingBtn">Delete</button>
            </div>
        </div>
    </div>
</div>



<!-- edit Position Modal -->
<div class="modal fade" id="editNomineeInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="../../validation/nominees/updateNomineeInfo.php" class="needs-validation form-material" id="updateNomineeForm" name="updateNomineeForm" novalidate>
            <div class="modal-header edit_nominee_Info">
                <h5 class="modal-title" id="exampleModalLabel">Update Nominee Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                            <div class="col-md-4 m-t-20 mb-3">
                                                <input type="hidden" class="form-control" id="editID" name="editID" placeholder="Enter First name" required>
                                            </div>

                                        <div class="form-row text-center">
                                            <div class="col-md-6 m-t-20 mb-3">
                                                <div class="card">
                                                    <div class="card-title text-center">
                                                        Image
                                                    </div>
                                                    <div class="card-body">

                                                        <?php

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-4 m-t-20 mb-3">
                                                <label for="editFristName">First name</label>
                                                <input type="text" class="form-control" id="editFristName" name="editFristName" placeholder="Enter First name" required>
                                                <div class="invalid-feedback">
                                                    First Name is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 m-t-20 mb-3">
                                                <label for="editLastName">Last name</label>
                                                <input type="text" class="form-control" id="editLastName" name="editLastName" placeholder="Last Name" required>
                                                <div class="invalid-feedback">
                                                    Last Name is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 m-t-20 mb-3">
                                                <label for="editOtherName">Other Name</label>
                                                <input type="text" class="form-control" id="editOtherName" name="editOtherName" placeholder="Other Name">
                                            </div>
                                        </div>
                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label for="editNomineePosition">Position</label>
                                                <select id="editNomineePosition" name="editNomineePosition" class="custom-select form-control" required>
                                                    <option value="">Select Position</option>
                                                    <option value="President">President</option>
                                                    <option value="Vice President">Vice President</option>
                                                    <option value="Secetary">Secetary</option>
                                                    <option value="Organizer">Organizer</option>
                                                    <option value="Asst. Organizer">Asst. Organizer</option>
                                                    <option value="Treasure">Treasure</option>
                                                    <option value="Interest & Innovations Cordinator">Interest & Innovations Cordinator</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Position is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="editNomineeClass">Class</label>
                                                <select id="editNomineeClass" name="editNomineeClass" class="custom-select form-control" required>
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

                                            <div class="col-md-4 mb-3">
                                                <label for="editIndexNumber">Index Number</label>
                                                <input type="text" class="form-control" id="editIndexNumber" name="editIndexNumber" minlength="8" maxlength="8" placeholder="Index Number" required>
                                                <div class="invalid-feedback">
                                                    Index Number is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary" name="btn_updateNomineeInfo">Save changes</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div><!-- edit positon Modal  -->



<!--Delete Position Modal -->
<div class="modal fade" id="deletePositionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cofirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Do you really want to <b>Delete</b> this Postion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_DeletePosition">Delete</button>
            </div>
        </div>
    </div>
</div><!-- Delete Position Modal -->



<!-- delete Voting Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Do you want to Delete this Nominee</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnDeleteNominee" name="btnDeleteNominee">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete voter Modal -->
<div class="modal fade" id="deleteVoterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Voter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Do you want to Delete this voter</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnDeleteVoter" name="btnDeleteVoter">Delete</button>
            </div>
        </div>
    </div>
</div><!-- Delete Voter modal -->



<!-- edit voter Modal -->
<div class="modal fade" id="editVoterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Voter Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../../validation/voters/editVoter.php" id="editVoterForm" class="needs-validation form-material"  novalidate>
                <div class="modal-body">
                    <div>
                        <div class="col-md-4 mb-3">
                            <label for="editVoterID">First name</label>
                            <input type="text" class="form-control" id="editVoterID" name="editVoterID"  placeholder="id name" required>
                        </div>
                    </div>
                        <div class="form-row form-material">
                            <div class="col-md-4 mb-3">
                                <label for="editVoterFirstName">First name</label>
                                <input type="text" class="form-control" id="editVoterFirstName" name="editVoterFirstName"  placeholder="First name" required>
                                <div class="invalid-feedback">
                                    First Name is required
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="editVoterLastName">Last name</label>
                                <input type="text" class="form-control" id="editVoterLastName" name="editVoterLastName" placeholder="Last Name" required>
                                <div class="invalid-feedback">
                                    Last Name is required
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="editVoterOtherName">Other Name</label>
                                <input type="text" class="form-control" id="editVoterOtherName" name="editVoterOtherName" placeholder="Other Name">
                            </div>
                        </div>

                        <div class="form-row form-material">
                            <div class="col-md-6 mb-3">
                                <label for="editVoterClass">Class</label>
                                <select id="editVoterClass" name="editVoterClass" class="custom-select form-control" required>
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

                            <div class="col-md-6 mb-3">
                                <label for="editVoterIndexNumber">Index Number</label>
                                <input type="text" class="form-control" id="editVoterIndexNumber" name="editVoterIndexNumber" minlength="8" maxlength="8" placeholder="Index Number" required>
                                <div class="invalid-feedback">
                                    Index Number is required
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- Edit Voter Modal- -->




<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                2018 © Highdmin. - Coderthemes.com
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>

<!-- jQuery  -->
<script src="../../assets/js/jquery/jquery.min.js"></script>
<script src="../../assets/js/jquery/popper.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery/waves.js"></script>
<script src="../../assets/js/jquery/jquery.slimscroll.js"></script>
<script src="../../assets/js/jquery/jquery-ui.min.js"></script>

<!-- Flot chart -->
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.min.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.time.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.resize.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.pie.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.crosshair.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/curvedLines.js"></script>
<script src="http://coderthemes.com/highdmin/plugins/flot-chart/jquery.flot.axislabels.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
<![endif]-->

<script src="../../assets/js/jquery/jquery.knob.js"></script>


<!-- Dashboard Init -->
<script src="../../assets/js/jquery/jquery.dashboard.init.js"></script>
<script src="../../assets/dateTime/jquery.datetimepicker.full.js"></script>
<script src="../../assets/dataTables/datatables.min.js"></script>
<!-- App js -->
<script src="../../assets/js/jquery/sweetalert.min.js"></script>


<script src="../../assets/custom/js/voters.js"></script>
<script src="../../assets/custom/js/NewVoting.js"></script>
<script src="../../assets/custom/js/addNewPosition.js"></script>
<script src="../../assets/custom/js/newNominee.js"></script>


<script src="../../assets/js/jquery/jquery.core.js"></script>
<script src="../../assets/js/jquery/jquery.app.js"></script>

<script>
    $("#votingDate").datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        weeks:true
    });
    $("#startingTime").datetimepicker({
        datepicker:false,
        format:'h:i',
        step:5
    });

    $("#endingTime").datetimepicker({
        datepicker:false,
        format:'h:i',
        step:5
    });

    $("#editStartingTime").datetimepicker({
        datepicker:false,
        format:'h:i',
        step:5
    });

    $("#editEndingTime").datetimepicker({
        datepicker:false,
        format:'h:i',
        step:5
    });


    $("#editVotingDate").datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        weeks:true
    });

    $("#dateOfBirth").datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        weeks:true
    });
</script>
</body>
</html>