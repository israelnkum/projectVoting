<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM new_voting";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $actionBtn ='
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateVotingInfoModal" onclick="updateVotingInfo('.$row['newVoting_id'].')">
    <i class="fa fa-edit"></i>
    </button>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteVotingModal" onclick="deleteVoting('.$row['newVoting_id'].')">
<i class="fa fa-trash-o">

</i></button>
     ';

    $output['data'][] = array(
        $x,
        $row['voting_name'],
        $row['voting_date'],
        $row['starting_time'],
        $row['ending_time'],
        $actionBtn,
    );
    $x++;
    $connection=null;

}

echo json_encode($output);
