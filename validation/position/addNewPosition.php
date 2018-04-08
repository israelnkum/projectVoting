<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false,'messages' => array());
//Retrieve the field values from our registration form.

    $selectVotingName = !empty($_POST['selectVotingName']) ? trim($_POST['selectVotingName']) : null;
    $selecPosition = !empty($_POST['selecPosition']) ? trim($_POST['selecPosition']) : null;

//checking if the supplied username already exists.
    // SQL statement and prepare it.
    $sql = "SELECT COUNT(positionType) AS num FROM positions WHERE positionType = :positionType AND voting_name = :votingName";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':positionType', $selecPosition);
    $stmt->bindValue(':votingName', $selectVotingName);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {
        $sql = "INSERT INTO positions
            ( voting_name, positionType)
             VALUES 
             (:votingName, :position_type)";

        $stmt = $connection -> prepare($sql);
        $stmt->bindValue(':votingName',$selectVotingName);
        $stmt->bindValue(':position_type',$selecPosition);



        $result = $stmt->execute();
        if($result ===true){
            $validator['success'] = true;

        }else {
            $validator['success'] = false;

        }
    }// else --> username validation

    $connection=null;
    echo json_encode($validator);

}// post

