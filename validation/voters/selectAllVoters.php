<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM voters";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $action ='

<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deletePositionModal" onclick="deletePosition('.$row['voter_id'].')">
    <i class="fa fa-edit"></i>
</button>


<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteVoterModal" onclick="deleteVoterInfo('.$row['voter_id'].')">
    <i class="fa fa-trash-o"></i>
</button>
     ';

    $output['data'][] = array(
        $x,
        $row['firstName'],
        $row['otherName'],
        $row['lastName'],
        $row['class'],
        $row['indexNumber'],
        $action

    );
    $x++;
    $connection=null;

}

echo json_encode($output);
