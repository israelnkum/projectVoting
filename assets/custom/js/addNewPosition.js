

var positionTable;
$(document).ready(function() {

    positionTable= $("#positionTable").DataTable({

        "ajax": "../../validation/position/selectAllpostion.php",
        "order":[]
    });

    $("#addNewPositionForm").unbind('submit').bind('submit',function () {
        var form = $(this);
        //validation
        var selectVotingName = $("#selectVotingName").val();
        var selecPosition = $("#selecPosition").val();



        if (selectVotingName && selecPosition ){
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
                            text: "Position Added Successfully",
                            icon: "success",
                            button:true
                        });
                        $("#addNewPositionForm")[0].reset();
                        $("#addNewPositionForm").removeClass();
                        positionTable.ajax.reload(false);

                    }else{
                        swal({
                            title: "Error",
                            text: "Postion Already Exit",
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





function deletePosition(id) {
    if(id){
        //click on delete button
        $("#btn_DeletePosition").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../validation/position/deletePosition.php',
                type :'post',
                data :{pstion :id},
                dataType : 'json',
                success:function (response) {
                    // $("#deleteVotingModal").modal('hide');
                    if (response.success === true){
                        $("#deletePositionModal").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        swal({
                            title: "success",
                            text: "Position Deleted Successfully",
                            icon: "success",
                            button:true
                        });


                        // refresh table after deleting
                        positionTable.ajax.reload(false);


                    }else {
                        //close the modal after deleting
                        $("#deletePositionModal").modal('hide');


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
