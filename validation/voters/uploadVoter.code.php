<?php
include '../dbConnection.php';

if (isset($_POST['btn_upload'])){
    //$file = $_FILES['file'];

    $fileName = $_FILES['selected_file']['name'];
    $fileTmpName = $_FILES['selected_file']['tmp_name'];

    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    $files_allowed = array('csv');

    if (!in_array($fileExt,$files_allowed)){

        header("Location: ../../pages/voters/uploadVoter.inc.php?fileTypeError=".urlencode("Please Select a .csv File"));
    }else{
        $handle = fopen($fileTmpName, 'r');
        while (($myData = fgetcsv($handle,1000,',')) !== FALSE){
            $fName = $myData[0];
            $lName = $myData[1];
            $oName = $myData[2];
            $class = $myData[3];
            $indexNumber = $myData[4];
            $password = $myData[5];

            $sql = "INSERT INTO voters
        (firstName, lastName, otherName, class, indexNumber, voterPassword) 
        VALUES
        (:firstName,:lastName,:otherName,:class,:indexNumber,:voterPassword )";

            $stmt = $connection -> prepare($sql);
            $stmt->bindValue(':firstName',$fName);
            $stmt->bindValue(':lastName',$lName);
            $stmt->bindValue(':otherName',$oName);
            $stmt->bindValue(':class',$class);
            $stmt->bindValue(':indexNumber',$indexNumber);
            $stmt->bindValue(':voterPassword',$password);


            $result = $stmt->execute();
            if($result ===true){
                header("Location: ../../pages/voters/uploadVoter.inc.php?fileTypeError=".urlencode("Please Select a .csv File"));

            }else {
                $validator['success'] = false;

            }
        }
    }

}
