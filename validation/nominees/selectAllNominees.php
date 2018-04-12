<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM nominees";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $actionBtn = '
    <div class="row">
    <div class="col-md-2">
    <form action="../../pages/voting/editNomineeInfor.php" method="get">
    <input type="hidden" name="user_id" value="' .$row['nominee_id'].'">
    <input type="hidden" name="votename" value="' .$row['imageName'].'">

    <button type="submit" name="btn_nomineeInfo" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button>    
    </form>
    
    </div>
    <div class="col-md-4 offset-md-1">
    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="deleteNomineeInfo('.$row['nominee_id'].') ">
        <i class="fa fa-trash-o"> Delete</i>
    </button>
    </div>
    </div>
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


