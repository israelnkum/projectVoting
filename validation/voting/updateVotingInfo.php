<?php
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.
    $id =$_POST['voting_id'];
    $editVotingName = !empty($_POST['editVotingName']) ? trim($_POST['editVotingName']) : null;
    $editVotingDate = !empty($_POST['editVotingDate']) ? trim($_POST['editVotingDate']) : null;
    $editStartingTime = !empty($_POST['editStartingTime']) ? trim($_POST['editStartingTime']) : null;
    $editEndingTime = !empty($_POST['editEndingTime']) ? trim($_POST['editEndingTime']) : null;

    $sql = "UPDATE new_voting SET voting_name=:votingName,voting_date=:votingDate,
    starting_time=:startingTime,ending_time= :endingTime WHERE newVoting_id=:votingId";

    $stmt = $connection->prepare($sql);

    $stmt->bindValue(':votingName',$editVotingName);
    $stmt->bindValue(':votingDate',$editVotingDate);
    $stmt->bindValue(':startingTime',$editStartingTime);
    $stmt->bindValue(':endingTime',$editEndingTime);
    $stmt->bindValue(':votingId',$id);

    $result=$stmt->execute();
    if($result){
        $validator['success'] = true;

    }else{
        $validator['success'] = false;
    }
    $connection=null;
    echo json_encode($validator);

}