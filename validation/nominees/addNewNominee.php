<?php
/*$nomImage ="SELECT  * FROM `votingName` WHERE `nominee_id` = :currentNomineeId";
$stmt = $connection->prepare($nomImage);
//Bind the provided username to our prepared statement.
$stmt->bindValue(':currentNomineeId', $_POST['profile_normID']);
//Execute.
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nomineePosition = $row['postion'];
    $indexNumber = $row['indexNumber'];
    if ($row['image'] == '1') {
        include '';
        $file_name = "../assets/nomineeUploads/" . $nomineePosition.$indexNumber . "*";
        $file_info = glob($file_name);
        $file_ext = explode(".", $file_info[0]);
        $file_acutal_ext = $file_ext[3];
        echo "<img  src='../assets/nomineeUploads/".$nomineePosition.$indexNumber.".jpg? ".mt_rand(). "' style=' margin: 25px; width:150px; height: 150px; border-radius:50%; '/>
                        <form method='post' action='../validation/nominees/updateNomineeInfo.php' enctype='multipart/form-data'>
                              <div class='col-md-4 m-t-20 mb-3'>
                                 <input type='text' class='form-control' id='profile_normID' name='profile_normID' placeholder='profileId' required>
                              </div>
                              <div class='form-group'>
                              <input type='file' name = 'file' class='form-control-file' id='exampleFormControlFile1'>
                              </div>
                              <button class='btn btn-secondary' type='submit' name='submit'>Upload</button>
                              <button class='btn btn-primary' type='submit' name='btn_delete'>Remove</button>
                        </form>
                        "; } else {
        echo "<img  src='../assets/nomineeUploads/profiledefault.png' style=' margin: 25px; width:150px; height: 150px; border-radius:50%; '/>
                              <form method='post' action='../validation/nominees/updateNomineeInfo.php' enctype='multipart/form-data'>
                                    <div class='form-group'>
                                    <input type='file' name = 'file' class='form-control-file' id='exampleFormControlFile1'>
                                    </div>
                                    <button class='btn btn-secondary' type='submit' name='submit'>Upload</button>
                                    <button class='btn btn-primary' type='submit' name='btn_delete'>Remove</button>
                              </form>
                              ";
    }


}*/
?>

<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked

if (isset($_POST['btn_uploadImage'])){
//Retrieve the field values from our registration form.
    $voteName = !empty($_POST['voteName']) ? trim($_POST['voteName']) : null;
    $fristName = !empty($_POST['fristName']) ? trim($_POST['fristName']) : null;
    $lastName = !empty($_POST['lastName']) ? trim($_POST['lastName']) : null;
    $otherName  = !empty($_POST['otherName']) ? trim($_POST['otherName']) : null;
    $dateOfBirth = !empty($_POST['dateOfBirth']) ? trim($_POST['dateOfBirth']) : null;
    $homeTown = !empty($_POST['homeTown']) ? trim($_POST['homeTown']) : null;
    $region  = !empty($_POST['region']) ? trim($_POST['region']) : null;
    $homeAddress = !empty($_POST['homeAddress']) ? trim($_POST['homeAddress']) : null;
    $telePhone  = !empty($_POST['telePhone']) ? trim($_POST['telePhone']) : null;
    $emailAddress = !empty($_POST['emailAddress']) ? trim($_POST['emailAddress']) : null;
    $nomineeClass  = !empty($_POST['nomineeClass']) ? trim($_POST['nomineeClass']) : null;
    $indexNumber  = !empty($_POST['indexNumber']) ? trim($_POST['indexNumber']) : null;
    $cgpa = !empty($_POST['cgpa']) ? trim($_POST['cgpa']) : null;
    $nomineePosition  = !empty($_POST['nomineePosition']) ? trim($_POST['nomineePosition']) : null;
    $previousPositon  = !empty($_POST['previousPositon']) ? trim($_POST['previousPositon']) : null;


    $file = $_FILES['nomineeImage'];

    $fileName = $_FILES['nomineeImage']['name'];
    $fileTmpName = $_FILES['nomineeImage']['tmp_name'];
    $fileSize = $_FILES['nomineeImage']['size'];
    $fileError = $_FILES['nomineeImage']['error'];
    $fileType= $_FILES['nomineeImage']['name'];

    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg');

    if (in_array($fileAcutalExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000){
                //$fileNameNew = "profile".$id.".".$fileAcutalExt;
                $fileNameNew = $nomineePosition.$indexNumber.".".$fileAcutalExt;
                $fileDestination = '../../assets/nomineeUploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                $validator = array('success' => false,'messages' => array());

                // SQL statement and prepare it.
                $sql = "SELECT COUNT(indexNumber) AS num FROM nominees WHERE indexNumber=:indexNumber AND votingName =:votingName ";
                $stmt = $connection->prepare($sql);
                //Bind the provided username to our prepared statement.
                $stmt->bindValue(':indexNumber', $indexNumber);
                $stmt->bindValue(':votingName', $voteName);
                //Execute.
                $stmt->execute();
                //Fetch the row.
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($row['num'] > 0){
                    header("Location: ../../pages/voting/votingType.php?norm_error=".urlencode("New Nominee Alredy Exist"));
                    exit();
                }else {
                    $sql = "INSERT INTO nominees
                  (votingName, firstName, lastName, otherName, dateOfBirth,
                   homeTown, region, homeAddress, telephone, email, class,
                  indexNumber, CGPA, postion, postionHeld, image)
                  VALUES 
                  (:votingName, :firstName, :lastName, :otherName,:dateOfBirth,
                   :homeTown, :region,:homeAddress, :telephone, :email,:class, 
                   :indexNumber, :CGPA, :postion, :postionHeld, :image)";

                    $stmt = $connection -> prepare($sql);
                    $stmt->bindValue(':votingName',$voteName);
                    $stmt->bindValue(':firstName',$fristName);
                    $stmt->bindValue(':lastName',$lastName);
                    $stmt->bindValue(':otherName',$otherName);
                    $stmt->bindValue(':dateOfBirth',$dateOfBirth);
                    $stmt->bindValue(':homeTown',$homeTown);
                    $stmt->bindValue(':region',$region);
                    $stmt->bindValue(':homeAddress',$homeAddress);
                    $stmt->bindValue(':telephone',$telePhone);
                    $stmt->bindValue(':email',$emailAddress);
                    $stmt->bindValue(':class',$nomineeClass);
                    $stmt->bindValue(':indexNumber',$indexNumber);
                    $stmt->bindValue(':CGPA',$cgpa);
                    $stmt->bindValue(':postion',$nomineePosition);
                    $stmt->bindValue(':postionHeld',$previousPositon);
                    $stmt->bindValue(':image','1');

                    $result = $stmt->execute();
                    if($result ===true){

                        header("Location: ../../pages/voting/votingType.php?msg=".urlencode("New Nominee Added Successfuly"));
                        exit();
                    }else {
                        header("Location: ../../pages/voting/votingType.php?msg=".urlencode("Oops! Something Went wrong. Try again in a few minutes"));
                        exit();
                    }
                }// else --> username validation

                //$connection=null;
               // echo json_encode($validator);


            }else{
                ?>
                <script type="text/javascript">
                    swal({
                        title: "Error",
                        text: "File size Too big",
                        icon: "Warning",
                        button:true
                    });
                </script>
        <?php
            }
        }else{
            ?>
            <script type="text/javascript">
                swal({
                    title: "Error",
                    text: "Error While Uploading Image",
                    icon: "Warning",
                    button:true
                });
            </script>
            <?php
        }
    }else{
        ?>
        <script type="text/javascript">
            swal({
                title: "Error",
                text: "You Can't Upload Files of This Type",
                icon: "Warning",
                button:true
            });
        </script>
        <?php
    }

}







