<?php
session_start();
require_once ('../../validation/dbConnection.php');
if (isset($_POST['btnLogin'])){
    //Retrieve the field values from our registration form.

    $indexNumber = !empty($_POST['stdIndexNumber']) ? trim($_POST['stdIndexNumber']) : null;
    $stdPassword = !empty($_POST['stdPassword']) ? trim($_POST['stdPassword']) : null;

    //Construct the SQL statement and prepare it.
//Retrieve the user account information for the given username.
    $sql = "SELECT * FROM voters WHERE indexNumber = :stdIndexNumber";
    $stmt = $connection->prepare($sql);
    //Bind value.
    $stmt->bindValue(':stdIndexNumber', $indexNumber);
    //Execute.
    $stmt->execute();
    //Fetch row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if($row === false){
        //Could not find a user with that username!
        header("Location: ../../index.php?err=".urlencode("Oops! Index Number does Not Match any Record!"));
    } else{

        //User account found. Check to see if the given password matches the
        //password hash that we stored in our supervisors table.

        //Compare the passwords.
        $validPassword = password_verify($stdPassword, $row['voterPassword']);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
                    $_SESSION['indexNumber'] = $row['indexNumber'];
                    $_SESSION['voter_id'] = $row['voter_id'];
                    $_SESSION['logged_in'] = time();
                    header("Location: ../../pages/dashboard/voterDashboard.php?Welcome=".urlencode("login_success"));
                    exit();
            } else{
            //$validPassword was FALSE. Passwords do not match.
            header("Location: ../../index.php?err=".urlencode("Incorrect Index Number or Password Combination!"));
            exit();
        }
    }

}
