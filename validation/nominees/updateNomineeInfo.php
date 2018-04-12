
<?php
session_start();
require_once ('../dbConnection.php');
// if button is actually clicked

if (isset($_POST['btn_update'])){
    $nom_id = !empty($_POST['nom_id']) ? trim($_POST['nom_id']) : null;
    $editVotingName = !empty($_POST['editVotingName']) ? trim($_POST['editVotingName']) : null;
    $editFristName = !empty($_POST['editFristName']) ? trim($_POST['editFristName']) : null;
    $editLastName = !empty($_POST['editLastName']) ? trim($_POST['editLastName']) : null;
    $editOtherName  = !empty($_POST['editOtherName']) ? trim($_POST['editOtherName']) : null;
    $editDateOfBirth = !empty($_POST['editDateOfBirth']) ? trim($_POST['editDateOfBirth']) : null;
    $editHomeTown = !empty($_POST['editHomeTown']) ? trim($_POST['editHomeTown']) : null;
    $editRegion  = !empty($_POST['editRegion']) ? trim($_POST['editRegion']) : null;
    $editHomeAddress = !empty($_POST['editHomeAddress']) ? trim($_POST['editHomeAddress']) : null;
    $editTelePhone  = !empty($_POST['editTelePhone']) ? trim($_POST['editTelePhone']) : null;
    $editEmailAddress = !empty($_POST['editEmailAddress']) ? trim($_POST['editEmailAddress']) : null;
    $editNomineeClass  = !empty($_POST['editNomineeClass']) ? trim($_POST['editNomineeClass']) : null;
    $editIndexNumber  = !empty($_POST['editIndexNumber']) ? trim($_POST['editIndexNumber']) : null;
    $edit_cgpa = !empty($_POST['edit_cgpa']) ? trim($_POST['edit_cgpa']) : null;
    $editNomineePosition  = !empty($_POST['editNomineePosition']) ? trim($_POST['editNomineePosition']) : null;
    $editPreviousPositon  = !empty($_POST['$editPreviousPositon']) ? trim($_POST['$editPreviousPositon']) : null;
    $img_name =$editVotingName.$editNomineePosition.$editIndexNumber;
    if ($_FILES["nomineeImage"]["name"] !== ""){
        //Retrieve the field values from our registration form.


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
                    $fileNameNew = $editVotingName.$editNomineePosition.$editIndexNumber.".".$fileAcutalExt;
                    $fileDestination = '../../assets/nomineeUploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);

                    $validator = array('success' => false,'messages' => array());
                    $sql= "
        UPDATE nominees SET 
        votingName=:votingName,firstName=:firstName,lastName=:lastName,
        otherName=:otherName,dateOfBirth=:dateOfBirth,homeTown=:homeTown,
        region=:region,homeAddress=:homeAddress,telephone=:telephone,
        email=:email,`class`=:class,`indexNumber`=:indexNumber,`CGPA`=:CGPA,
        `postion`=:postion,`postionHeld`=:postionHeld,imageName = :imageName,
        image=:image WHERE nominee_id=:nominee_id
    ";

                    $stmt = $connection -> prepare($sql);
                    $stmt->bindValue(':votingName',$editVotingName);
                    $stmt->bindValue(':firstName',$editFristName);
                    $stmt->bindValue(':lastName',$editLastName);
                    $stmt->bindValue(':otherName',$editOtherName);
                    $stmt->bindValue(':dateOfBirth',$editDateOfBirth);
                    $stmt->bindValue(':homeTown',$editHomeTown);
                    $stmt->bindValue(':region',$editRegion);
                    $stmt->bindValue(':homeAddress',$editHomeAddress);
                    $stmt->bindValue(':telephone',$editTelePhone);
                    $stmt->bindValue(':email',$editEmailAddress);
                    $stmt->bindValue(':class',$editNomineeClass);
                    $stmt->bindValue(':indexNumber',$editIndexNumber);
                    $stmt->bindValue(':CGPA',$edit_cgpa);
                    $stmt->bindValue(':postion',$editNomineePosition);
                    $stmt->bindValue(':postionHeld',$editPreviousPositon);
                    $stmt->bindValue(':imageName',$img_name);
                    $stmt->bindValue(':image',1);
                    $stmt->bindValue(':nominee_id',$nom_id);

                    $result = $stmt->execute();
                    if($result ===true){

                        header("Location: ../../pages/voting/votingType.php?msg=".urlencode("Nominee Infomation Updated Successfuly"));
                        exit();
                    }else {
                        header("Location: ../../pages/voting/votingType.php?msg=".urlencode("Oops! Something Went wrong. Try again in a few minutes"));
                        exit();
                    }// else --> username validation
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


        $sql = "SELECT * FROM nominees WHERE imageName =:imageName";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':imageName',$_SESSION['img']);
        $stmt->execute();
        if ($opt = $stmt->fetch(PDO::FETCH_ASSOC)){
             $opt['imageName'];
        }

         rename("../../assets/nomineeUploads/".$_SESSION['img'].".jpg","../../assets/nomineeUploads/".$editVotingName.$editNomineePosition.$editIndexNumber.".jpg");
        $validator = array('success' => false,'messages' => array());
        $sql= "
        UPDATE nominees SET 
        votingName=:votingName,firstName=:firstName,lastName=:lastName,
        otherName=:otherName,dateOfBirth=:dateOfBirth,homeTown=:homeTown,
        region=:region,homeAddress=:homeAddress,telephone=:telephone,
        email=:email,`class`=:class,`indexNumber`=:indexNumber,`CGPA`=:CGPA,
        `postion`=:postion,`postionHeld`=:postionHeld,imageName = :imageName
         WHERE nominee_id=:nominee_id
    ";

        $stmt = $connection -> prepare($sql);
        $stmt->bindValue(':votingName',$editVotingName);
        $stmt->bindValue(':firstName',$editFristName);
        $stmt->bindValue(':lastName',$editLastName);
        $stmt->bindValue(':otherName',$editOtherName);
        $stmt->bindValue(':dateOfBirth',$editDateOfBirth);
        $stmt->bindValue(':homeTown',$editHomeTown);
        $stmt->bindValue(':region',$editRegion);
        $stmt->bindValue(':homeAddress',$editHomeAddress);
        $stmt->bindValue(':telephone',$editTelePhone);
        $stmt->bindValue(':email',$editEmailAddress);
        $stmt->bindValue(':class',$editNomineeClass);
        $stmt->bindValue(':indexNumber',$editIndexNumber);
        $stmt->bindValue(':CGPA',$edit_cgpa);
        $stmt->bindValue(':postion',$editNomineePosition);
        $stmt->bindValue(':postionHeld',$editPreviousPositon);
        $stmt->bindValue(':imageName',$img_name);
        $stmt->bindValue(':nominee_id',$nom_id);

        $result = $stmt->execute();
        if($result ===true){

            header("Location: ../../pages/voting/votingType.php?msg=".urlencode("Nominee Infomation Updated Successfuly"));
            exit();
        }else {
            header("Location: ../../pages/voting/votingType.php?msg=".urlencode("Oops! Something Went wrong. Try again in a few minutes"));
            exit();
        }// else --> username validation



    }
    }







