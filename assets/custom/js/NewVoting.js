
var myVotingTable;
$(document).ready(function() {

    myVotingTable= $("#myVotingTable").DataTable({
        retrieve: true,
        "ajax": "../../validation/voting/selectAllVoting.php",
        "order":[]
    });

    $("#addNewVotingForm").unbind('submit').bind('submit',function () {
        var form = $(this);
        //validation
        var votingName = $("#votingName").val();
        var votingDate = $("#votingDate").val();
        var startingTime = $("#startingTime").val();
        var endingTime = $("#endingTime").val();


        if (votingName && votingDate  && startingTime && endingTime){
            //submit the form to server

            $.ajax({
                url :form.attr('action'),
                type : form.attr('method'),
                data : form.serialize(),
                dataType : 'json',

                success:function (response) {
                    if(response.success === true){
                        // $("#addNewUserModal").hide();

                        swal({
                            title: "Success",
                            text: "Voting Added Successfully",
                            icon: "success",
                            button:true
                        });
                        $("#addNewVotingForm")[0].reset();
                        $("#addNewVotingForm").removeClass();
                        allVotingTable.ajax.reload(false);

                    }else{
                        swal({
                            title: "Error",
                            text: "Voting Already Exit",
                            icon: "warning",
                            button:true
                        });
                    }//else
                }//success,
            });//ajax submit
        }// if


        return false;
    });// new user form
});//document .ready function



/*
*Update Voting information
 */
function updateVotingInfo(id) {
    $("#voting_id").remove();

    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../validation/voting/getVotingID.php',
            type : 'post',
            data :{vote_id :id},
            dataType : 'json',
            success:function (response) {

                $("#editVotingName").val(response.voting_name);
                $("#editVotingDate").val(response.voting_date);
                $("#editStartingTime").val(response.starting_time);
                $("#editEndingTime").val(response.ending_time);



// supervisors id
                $(".editVotingInfo").append('<input type="hidden" name="voting_id" id="voting_id" value="'+response.newVoting_id+'">');


                // Update Data
                $("#updateVotingForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation
                    var editVotingName = $("#editVotingName").val();
                    var editVotingDate = $("#editVotingDate").val();
                    var editStartingTime = $("#editStartingTime").val();
                    var editEndingTime = $("#editEndingTime").val();




                    if (editVotingName && editVotingDate && editStartingTime && editEndingTime) {
                        //submit the form to server
                        $.ajax({
                            url :form.attr('action'),
                            type : form.attr('method'),
                            data : form.serialize(),
                            dataType : 'json',
                            success:function (response) {
                                //     $(".invalid-feedback").removeClass('has-error');
                                if(response.success === true){
                                    //close the modal after deleting
                                    $("#updateVotingInfoModal").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Voting Information Successfully Update",
                                        icon: "success",
                                        button:true
                                    });

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();

                                    allVotingTable.ajax.reload(false);

                                }else{
                                    swal({
                                        title: "Error",
                                        text: "Please Try Again in a Minute",
                                        icon: "warning",
                                        button:true
                                    });

                                }//else
                            }//success
                        });//ajax submit
                    }
                    return false;
                })
            }// success
        });// fetch selected hosteler's data
    }else{
        alert("Error: Please Refresh This Page");
    }
}// update user information -->Function



/*
* Delete hostelers
 */
function deleteVoting(id) {
    if(id){
        //click on delete button
        $("#deleteVotingBtn").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../validation/voting/deleteVoting.php',
                type :'post',
                data :{voting_id :id},
                dataType : 'json',
                success:function (response) {
                   // $("#deleteVotingModal").modal('hide');
                    if (response.success === true){
                        $("#deleteVotingModal").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        swal({
                            title: "success",
                            text: "Voting Deleted Successfully",
                            icon: "success",
                            button:true

                        });


                        // refresh table after deleting
                        allVotingTable.ajax.reload(false);


                    }else {
                        //close the modal after deleting
                        $("#deleteVotingModal").modal('hide');


                        swal({
                            title: "Error",
                            text: "Please Try Again in a few Mininute",
                            icon: "warning",
                            button:true
                        });
                    }//else
                }//success
            });//ajax submit
        });//click on delete button
    }//if
}// delete user Function


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

