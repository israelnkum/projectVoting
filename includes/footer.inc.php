
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Nominee Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-title">
                                    Image Upload
                                </div>
                                <div class="card-body">
                                    <div class="text-center ">
                                        <img class="img-circle"  style=" height: 150px; width: 150px;"  src="../../assets/images/profiledefault.png">
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger">Remove</button>
                                        <button type="button" class="btn btn-success">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- col-md-4 -->

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-title">
                                    Nominee Infomation
                                </div>
                                <div class="card-body">
                                    <form method="post" action="../../validation/nominees/updateNomineeInfo.php" class="needs-validation form-material" id="updateNomineeForm" name="updateNomineeForm" novalidate>
                                            <div class="col-md-4 m-t-20 mb-3">
                                                <input type="hidden" class="form-control" id="editID" name="editID" placeholder="Enter First name" required>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer edit_nominee_Info">
                </div>


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
        format:'G:i A'
    });

    $("#endingTime").datetimepicker({
        datepicker:false,
        format:'G:i A'
    });

    $("#editStartingTime").datetimepicker({
        datepicker:false,
        format:'G:i A'
    });

    $("#editEndingTime").datetimepicker({
        datepicker:false,
        format:'G:i A'
    });


    $("#editVotingDate").datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        weeks:true
    });
</script>
</body>
</html>