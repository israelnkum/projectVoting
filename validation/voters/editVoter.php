<?php
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.

    $editVoterID = !empty($_POST['editVoterID']) ? trim($_POST['editVoterID']) : null;
    $editVoterFirstName = !empty($_POST['editVoterFirstName']) ? trim($_POST['editVoterFirstName']) : null;
    $editVoterLastName = !empty($_POST['editVoterLastName']) ? trim($_POST['editVoterLastName']) : null;
    $editVoterOtherName = !empty($_POST['editVoterOtherName']) ? trim($_POST['editVoterOtherName']) : null;
    $editVoterClass = !empty($_POST['editVoterClass']) ? trim($_POST['editVoterClass']) : null;
    $editVoterIndexNumber = !empty($_POST['editVoterIndexNumber']) ? trim($_POST['editVoterIndexNumber']) : null;

    $sql = "UPDATE voters SET 
    firstName= :firstName,lastName=:lastName,otherName=:otherName,
    class=:class,indexNumber=:indexNumber WHERE voter_id =:voterId";

    $stmt = $connection->prepare($sql);

    $stmt->bindValue(':firstName',$editVoterFirstName);
    $stmt->bindValue(':lastName',$editVoterLastName);
    $stmt->bindValue(':otherName',$editVoterOtherName);
    $stmt->bindValue(':class',$editVoterClass);
    $stmt->bindValue(':indexNumber',$editVoterIndexNumber);
    $stmt->bindValue(':voterId',$editVoterID);

    $result=$stmt->execute();
    if($result){
        $validator['success'] = true;

    }else{
        $validator['success'] = false;
    }
    $connection=null;
    echo json_encode($validator);

}