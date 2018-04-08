<?php
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.
    $id =$_POST['ps_id'];
    $editVotingNameNew = !empty($_POST['editVotingNameNew']) ? trim($_POST['editVotingNameNew']) : null;
    $editPosition = !empty($_POST['editPosition']) ? trim($_POST['editPosition']) : null;

    $sql = "SELECT COUNT(positionType) AS num FROM positions WHERE positionType = :positionType";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':positionType', $editPosition);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 1){
        $validator['success'] = false;
    }else {
        $sql = "UPDATE positions SET
    voting_name=:voting_name,positionType=:positionType WHERE position_id =:pos_id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':voting_name', $editVotingNameNew);
        $stmt->bindValue(':positionType', $editPosition);
        $stmt->bindValue(':pos_id', $id);

        $result = $stmt->execute();
        if ($result) {
            $validator['success'] = true;

        } else {
            $validator['success'] = false;
        }
    }
    $connection=null;
    echo json_encode($validator);

}