<?php

class uploadVoter extends mysqli
{
    private $state_csv =false;
    public function __construct()
    {
        parent::__construct("localhost", "root", "","itsu_issues");

        if ($this->connect_error){
            die("Fail to connect to Database: ".$this->connect_error);
        }
    }

    public function import($file){

            $this->state_csv=false;
           // $this->update_csv = false;
            $file = fopen($file,'r');
            while ($row = fgetcsv($file)){
               // $value = "'".implode("','",$row)."'";
//                echo "<pre>";
//                print_r($row);
//                echo "</pre>";
                $sql = "SELECT indexNumber  FROM voters WHERE indexNumber = '$row[4]'";
                $result = $this->query($sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    $hashPassword = password_hash($row[5], PASSWORD_BCRYPT, array("cost" => 12));
                    $update = "UPDATE voters SET 
                  firstName ='$row[0]',lastName='$row[1]',otherName='$row[2]',
                  class='$row[3]',indexNumber='$row[4]',voterPassword='$hashPassword'
                   WHERE indexNumber='$row[4]'";
                   if ( $this->query($update)){
                       $this->state_csv=true;
                   }else{
                       $this->state_csv=false;
                   }
                }else {
                    $hashPassword = password_hash($row[5], PASSWORD_BCRYPT, array("cost" => 12));
                    $sql = "INSERT INTO voters(firstName, lastName, otherName, class, indexNumber, voterPassword)
                        VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$hashPassword')";
                    if ($this->query($sql)){
                        $this->state_csv=true;
                    }else{
                        $this->state_csv=false;
                    }
                }


            }//while

        if ($this->state_csv){
                ?>
            <script type="text/javascript">
                window.location.assign("http://localhost/projectVoting/pages/voters/uploadVoter.inc.php?file_uploadSuccess=".concat("File Uploaded Successfully"));
            </script>
        <?php
        }else{
        ?>
            <script type="text/javascript">
                window.location.assign("http://localhost/projectVoting/pages/voters/uploadVoter.inc.php?file_not_uploaded=".concat("Something went wrong! Try Again Later"));
            </script>
            <?php
        }


    }// function imports
}// class Extends
/*


if (isset($_POST['btn_upload'])){
  $file = $_FILES['selected_file'];

    $fileName = $_FILES['selected_file']['name'];
    $fileTmpName = $_FILES['selected_file']['tmp_name'];

    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('csv');

    if (in_array($fileAcutalExt, $allowed)){

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
    }else{

        header("Location: ../../pages/voters/uploadVoter.inc.php?fileTypeError=".urlencode("Please Select a .csv File"));

    }

}*/
