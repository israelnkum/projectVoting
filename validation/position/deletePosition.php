<?php
require_once '../dbConnection.php';
$output = array('success' => false, 'messages' => array());
$positionID = $_POST['pstion'];

//select every info from the new Voting table which has the id above
$pos = "SELECT * FROM positions WHERE position_id = :positionID";
$stmt_pos =$connection->prepare($pos);// prepare the statement
$stmt_pos->bindValue(':positionID', $positionID);//binding Value
$result = $stmt_pos->execute();// executing the statement

while ($row = $stmt_pos->fetch(PDO::FETCH_ASSOC)){
    $votingName = $row['voting_name'];
    $postionName = $row['positionType'];

    $sql1 = "DELETE FROM nominees WHERE votingName = :vote_name AND postion= :postions";
    $stmt1 =$connection->prepare($sql1);
    $stmt1->bindValue(':vote_name', $votingName);
    $stmt1->bindValue(':postions', $postionName);
    $result = $stmt1->execute();

}

$sql = "DELETE FROM positions WHERE position_id = :pos_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':pos_id', $positionID);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
