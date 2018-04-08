<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false,'messages' => array());
//Retrieve the field values from our registration form.

    $votingName = !empty($_POST['votingName']) ? trim($_POST['votingName']) : null;
    $votingDate = !empty($_POST['votingDate']) ? trim($_POST['votingDate']) : null;
    $startingTime = !empty($_POST['startingTime']) ? trim($_POST['startingTime']) : null;
    $endingTime  = !empty($_POST['endingTime']) ? trim($_POST['endingTime']) : null;



//checking if the supplied username already exists.
    // SQL statement and prepare it.
    $sql = "SELECT COUNT(voting_name) AS num FROM new_voting WHERE voting_name = :votingName";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':votingName', $votingName);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {
            $sql = "INSERT INTO new_voting
            (voting_name, voting_date, starting_time, ending_time)
             VALUES 
             (:votingName, :votingDate, :startingTime, :edingTime)";

            $stmt = $connection -> prepare($sql);
            $stmt->bindValue(':votingName',$votingName);
            $stmt->bindValue(':votingDate',$votingDate);
            $stmt->bindValue(':startingTime',$startingTime);
            $stmt->bindValue(':edingTime',$endingTime);


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

