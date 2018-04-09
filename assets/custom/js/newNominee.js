
var nomineeTable;
$(document).ready(function() {

    nomineeTable= $("#nomineeTable").DataTable({
        retrieve: true,
        "ajax": "../../validation/nominees/selectAllNominees.php",
        "order":[]
    });

    $("#newNomineeForm").unbind('submit').bind('submit',function () {
        var form = $(this);
        //validation
        var fristName = $("#fristName").val();
        var lastName = $("#lastName").val();
        var otherName = $("#otherName").val();
        var nomineePosition = $("#nomineePosition").val();
        var nomineeClass = $("#nomineeClass").val();
        var indexNumber = $("#indexNumber").val();



        if (fristName  && lastName && otherName && nomineePosition  && nomineeClass && indexNumber){
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
                            text: "Nominee Added Successfully",
                            icon: "success",
                            button:true
                        });
                        $("#newNomineeForm")[0].reset();
                        $("#newNomineeForm").removeClass();
                        nomineeTable.ajax.reload(false);

                    }else{
                        swal({
                            title: "Error",
                            text: "Nominee Already Exit",
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



