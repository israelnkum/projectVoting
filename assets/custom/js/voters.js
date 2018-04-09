
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
function updateNomineeInformation(id) {
    $("#c_normId").remove();

    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../validation/nominees/getNomineeID.php',
            type : 'post',
            data :{nom_id :id},
            dataType : 'json',
            success:function (response) {

                $("#editID").val(response.nominee_id);
                $("#editFristName").val(response.firstName);
                $("#editLastName").val(response.lastName);
                $("#editOtherName").val(response.otherName);
                $("#editNomineePosition").val(response.postion);
                $("#editNomineeClass").val(response.class);
                $("#editIndexNumber").val(response.indexNumber);

                // Update Data
                $("#updateNomineeForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation
                    var editFristName = $("#editFristName").val();
                    var editLastName = $("#editLastName").val();
                    var editOtherName = $("#editOtherName").val();
                    var editNomineePosition = $("#editNomineePosition").val();
                    var editNomineeClass = $("#editNomineeClass").val();
                    var editIndexNumber = $("#editIndexNumber").val();




                    if (editFristName && editLastName && editOtherName && editNomineePosition && editNomineeClass && editIndexNumber) {
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
                                    $("#editNomineeInfoModal").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Information Successfully Update",
                                        icon: "success",
                                        button:true
                                    });

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();

                                    nomineeTable.ajax.reload(false);

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



