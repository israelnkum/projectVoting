<?php
require_once '../dbConnection.php';

$output = array('success' => false, 'messages' => array());

$voteID = $_POST['voting_id'];// getting Current id

//select every info from the new Voting table which has the id above
$pos = "SELECT * FROM new_voting WHERE newVoting_id = :vote_id";
$stmt_pos =$connection->prepare($pos);// prepare the statement
$stmt_pos->bindValue(':vote_id', $voteID);//binding Value
$result = $stmt_pos->execute();// executing the statement

while ($row = $stmt_pos->fetch(PDO::FETCH_ASSOC)){
    $votingName = $row['voting_name'];
    $sql1 = "DELETE FROM positions WHERE voting_name = :vote_name";
    $stmt1 =$connection->prepare($sql1);
    $stmt1->bindValue(':vote_name', $votingName);
    $result = $stmt1->execute();


    $sql2 = "DELETE FROM nominees WHERE votingName = :voteName";
    $stmt2 =$connection->prepare($sql2);
    $stmt2->bindValue(':voteName', $votingName);
    $result = $stmt2->execute();
}
// deleting from the new_voting table
$sql = "DELETE FROM new_voting WHERE newVoting_id = :vote_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':vote_id', $voteID);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
