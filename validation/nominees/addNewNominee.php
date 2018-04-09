<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false,'messages' => array());
//Retrieve the field values from our registration form.
    $voteName = !empty($_POST['voteName']) ? trim($_POST['voteName']) : null;
    $fristName = !empty($_POST['fristName']) ? trim($_POST['fristName']) : null;
    $lastName = !empty($_POST['lastName']) ? trim($_POST['lastName']) : null;
    $otherName  = !empty($_POST['otherName']) ? trim($_POST['otherName']) : null;
    $nomineePosition = !empty($_POST['nomineePosition']) ? trim($_POST['nomineePosition']) : null;
    $nomineeClass = !empty($_POST['nomineeClass']) ? trim($_POST['nomineeClass']) : null;
    $indexNumber  = !empty($_POST['indexNumber']) ? trim($_POST['indexNumber']) : null;



//checking if the supplied username already exists.
    // SQL statement and prepare it.
    $sql = "SELECT COUNT(indexNumber) AS num FROM nominees WHERE indexNumber = :indexNumber";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':indexNumber', $indexNumber);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {
        $sql = "INSERT INTO `nominees`
        (votingName, firstName, lastName, otherName, postion, class, indexNumber) 
        VALUES (:votingName, :firstName, :lastName, :otherName, :postion,:class, :indexNumber)";

        $stmt = $connection -> prepare($sql);
        $stmt->bindValue(':votingName',$voteName);
        $stmt->bindValue(':firstName',$fristName);
        $stmt->bindValue(':lastName',$lastName);
        $stmt->bindValue(':otherName',$otherName);
        $stmt->bindValue(':postion',$nomineePosition);
        $stmt->bindValue(':class',$nomineeClass);
        $stmt->bindValue(':indexNumber',$indexNumber);


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

