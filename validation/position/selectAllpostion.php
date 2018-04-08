<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM positions";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $action ='

<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePositionModal" onclick="deletePosition('.$row['position_id'].')">
Delete <i class="fa fa-trash-o">

</i></button>
     ';

    $output['data'][] = array(
        $x,
        $row['voting_name'],
        $row['positionType'],
        $action

    );
    $x++;
    $connection=null;

}

echo json_encode($output);
