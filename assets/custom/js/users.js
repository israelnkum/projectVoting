

var usersTable;
$(document).ready(function() {

    usersTable= $("#usersTable").DataTable({

        "ajax": "../../validation/users/selectUsers.php",
        "order":[]
    });
    $("#btnAddNewUser").on('click',function () {
        $("#newUserForm").removeClass();
        $("#newUserForm")[0].reset();
    });

    $("#newUserForm").unbind('submit').bind('submit',function () {
        var form = $(this);
        //validation
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var userName = $("#userName").val();
        var userMail = $("#userMail").val();
        var userPassword = $("#userPassword").val();



        if (lastName  && userName  && userMail  && userPassword && firstName){
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
                            text: "User Added Successfully",
                            icon: "success",
                            button:true
                        });
                        $("#newUserForm")[0].reset();
                        $("#newUserForm").removeClass();
                        usersTable.ajax.reload(false);

                    }else{
                        $("#deleteUserModal").modal('hide');
                        swal({
                            title: "Error",
                            text: "User Already Exit",
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


function editUserInfo(id) {
    $("#c_normId").remove();

    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../validation/users/getUserId.php',
            type : 'post',
            data :{user_id :id},
            dataType : 'json',
            success:function (response) {

                $("#editUserId").val(response.users_id);
                $("#editUserName").val(response.userName);
                $("#editlastName").val(response.lastName);
                $("#editFirstName").val(response.firstName);
                $("#editUserMail").val(response.email);

                // Update Data
                $("#editUserForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation

                    var editUserName = $("#editUserName").val();
                    var editlastName = $("#editlastName").val();
                    var editFirstName = $("#editFirstName").val();
                    var editUserMail = $("#editUserMail").val();

                    if (editUserName && editlastName && editFirstName && editUserMail) {
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
                                    $("#editUserModal").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Information Successfully Update",
                                        icon: "success",
                                        button:true
                                    });

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();

                                    usersTable.ajax.reload(false);

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


function deleteUser(id) {
    if(id){
        //click on delete button
        $("#btn_deleteUser").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../validation/users/deleteUser.php',
                type :'post',
                data :{user_id :id},
                dataType : 'json',
                success:function (response) {
                    // $("#deleteVotingModal").modal('hide');
                    if (response.success === true){
                        $("#deleteUserModal").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        swal({
                            title: "success",
                            text: "User Deleted Successfully",
                            icon: "success",
                            button:true
                        });


                        // refresh table after deleting
                        usersTable.ajax.reload(false);


                    }else {
                        //close the modal after deleting
                        $("#deleteUserModal").modal('hide');


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


