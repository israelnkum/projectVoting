<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false,'messages' => array());
//Retrieve the field values from our registration form.

    $voterFirstName = !empty($_POST['voterFirstName']) ? trim($_POST['voterFirstName']) : null;
    $voterLastName = !empty($_POST['voterLastName']) ? trim($_POST['voterLastName']) : null;
    $voterOtherName  = !empty($_POST['voterOtherName']) ? trim($_POST['voterOtherName']) : null;
    $voterClass = !empty($_POST['voterClass']) ? trim($_POST['voterClass']) : null;
    $voterIndexNumber = !empty($_POST['voterIndexNumber']) ? trim($_POST['voterIndexNumber']) : null;
    $voterPassword  = !empty($_POST['voterPassword']) ? trim($_POST['voterPassword']) : null;



//checking if the supplied username already exists.
    // SQL statement and prepare it.
    $sql = "SELECT COUNT(indexNumber) AS num FROM voters WHERE indexNumber = :indexNumber";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':indexNumber', $voterIndexNumber);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {
        $sql = "INSERT INTO voters
        (firstName, lastName, otherName, class, indexNumber, voterPassword) 
        VALUES
        (:firstName,:lastName,:otherName,:class,:indexNumber,:voterPassword )";

        $stmt = $connection -> prepare($sql);
        $stmt->bindValue(':firstName',$voterFirstName);
        $stmt->bindValue(':lastName',$voterLastName);
        $stmt->bindValue(':otherName',$voterOtherName);
        $stmt->bindValue(':class',$voterClass);
        $stmt->bindValue(':indexNumber',$voterIndexNumber);
        $stmt->bindValue(':voterPassword',$voterIndexNumber);


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

