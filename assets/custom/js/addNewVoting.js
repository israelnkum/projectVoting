var myVotingTable;
$(document).ready(function() {

    myVotingTable = $("#myVotingTable").DataTable({
        retrieve: true,
        "ajax": "../../validation/voting/selectAllVoting.php",
        "order": []
    });

});