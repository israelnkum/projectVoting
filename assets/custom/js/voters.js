
var allVotersTable;
$(document).ready(function() {

    allVotersTable= $("#allVotersTable").DataTable({
        retrieve: true,
        "ajax": "../../validation/voters/selectAllVoters.php",
        "order":[]
    });

    $("#newVoterForm").unbind('submit').bind('submit',function () {
        var form = $(this);
        //validation
        var voterFirstName = $("#voterFirstName").val();
        var voterLastName = $("#voterLastName").val();
        var voterOtherName = $("#voterOtherName").val();
        var voterClass = $("#voterClass").val();
        var voterIndexNumber = $("#voterIndexNumber").val();
        var voterPassword = $("#voterPassword").val();



        if (voterFirstName  && voterLastName && voterOtherName && voterIndexNumber  && voterPassword && voterClass){
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
                            text: "Voter Added Successfully",
                            icon: "success",
                            button:true
                        });
                        $("#newVoterForm")[0].reset();
                        $("#newVoterForm").removeClass();
                        allVotersTable.ajax.reload(false);

                    }else{
                        swal({
                            title: "Error",
                            text: "Voter Already Exit",
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
function updateVoterInfor(id) {
    $("#c_normId").remove();

    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../validation/voters/getVoterId.php',
            type : 'post',
            data :{c_vote_id :id},
            dataType : 'json',
            success:function (response) {

                $("#editVoterID").val(response.voter_id);
                $("#editVoterFirstName").val(response.firstName);
                $("#editVoterLastName").val(response.lastName);
                $("#editVoterOtherName").val(response.otherName);
                $("#editVoterClass").val(response.class);
                $("#editVoterIndexNumber").val(response.indexNumber);

                // Update Data
                $("#editVoterForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation
                    var editVoterFirstName = $("#editVoterFirstName").val();
                    var editVoterLastName = $("#editVoterLastName").val();
                    var editVoterOtherName = $("#editVoterOtherName").val();
                    var editVoterClass = $("#editVoterClass").val();
                    var editVoterIndexNumber = $("#editVoterIndexNumber").val();

                    if (editVoterFirstName && editVoterLastName && editVoterOtherName && editVoterClass && editVoterIndexNumber) {
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
                                    $("#editVoterModal").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Information Successfully Update",
                                        icon: "success",
                                        button:true
                                    });

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();

                                    allVotersTable.ajax.reload(false);

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
function deleteVoterInfo(id) {
    if(id){
        //click on delete button
        $("#btnDeleteVoter").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../validation/voters/deleteVoter.php',
                type :'post',
                data :{vote_id :id},
                dataType : 'json',
                success:function (response) {
                    // $("#deleteVotingModal").modal('hide');
                    if (response.success === true){
                        $("#deleteVoterModal").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        swal({
                            title: "success",
                            text: "Voter Deleted Successfully",
                            icon: "success",
                            button:true
                        });


                        // refresh table after deleting
                        allVotersTable.ajax.reload(false);


                    }else {
                        //close the modal after deleting
                        $("#deleteVoterModal").modal('hide');


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



