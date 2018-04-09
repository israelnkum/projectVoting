<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM nominees";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $actionBtn ='
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editNomineeInfoModal" onclick="updateNomineeInformation('.$row['nominee_id'].')">
    <i class="fa fa-edit"></i>
    </button>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="deleteNomineeInfo('.$row['nominee_id'].')">
<i class="fa fa-trash-o">

</i></button>
     ';

    $output['data'][] = array(
        $x,
        $row['votingName'],
        $row['lastName']." ".$row['firstName']." ".$row['otherName'],
        $row['postion'],
        $row['class'],
        $actionBtn,
    );
    $x++;
    $connection=null;

}

echo json_encode($output);


