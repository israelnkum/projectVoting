<?php
include '../../validation/dbConnection.php';
include '../../includes/header.inc.php';
include '../../includes/navs.inc.php';
if (isset($_POST['btn_nomineeInfo'])) {
    $nominee_id = $_POST['user_id'];
    $nomImage = "SELECT  * FROM `nominees` WHERE `nominee_id` = :currentNomineeId";
    $stmt = $connection->prepare($nomImage);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':currentNomineeId', $nominee_id);
    //Execute.
    $stmt->execute();
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '
            <div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Nominees</a></li>
                            <li class="breadcrumb-item active">Edit Nominee</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="row">
                                ';
                                    ?>

                        <?php
                        echo '
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-title">
                                    Nomination Form
                                </div>
                                <div class="card-body">
                               ';?>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <?php
                                    if ($row['image'] == '1'){
                                        echo "<img  src='../../assets/nomineeUploads/".$row['votingName'].$row['postion'].$row['indexNumber'].".jpg? ".mt_rand(). "' style=' margin: 25px; width:100px; height: 100px; border-radius:50%; '/>
                                                            ";
                                    }
                                    ?>
                                </div>
                            </div>
                               <?php
                               echo '
                                    <form method="post" enctype="multipart/form-data" action="../../validation/nominees/updateNomineeInfo.php"  class="needs-validation form-material"  novalidate>
                                        <div class="form-row form-material">
                                  
                                                <input type="hidden" class="form-control" id="nom_id" name="nom_id" value="'.$row['nominee_id'].'" required>
                                           
                                         
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editFristName">First name</label>
                                                <input type="text" class="form-control" id="editFristName" name="editFristName" value="'.$row['firstName'].'"  placeholder="First name" required>
                                                <div class="invalid-feedback">
                                                    First Name is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editLastName">Last name</label>
                                                <input type="text" class="form-control" id="editLastName" name="editLastName" value="'.$row['lastName'].'" placeholder="Last Name" required>
                                                <div class="invalid-feedback">
                                                    Last Name is required
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editOtherName">Other Name</label>
                                                <input type="text" class="form-control" id="editOtherName" name="editOtherName" value="'.$row['otherName'].'" placeholder="Other Name">
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editDateOfBirth">Date Of Birth</label>
                                                <input type="text" class="form-control" id="editDateOfBirth" name="editDateOfBirth" value="'.$row['dateOfBirth'].'" placeholder="Date of Birth" required>
                                                <div class="invalid-feedback">
                                                    Date of Birth is required
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="editHomeTown">Home Town</label>
                                                <input type="text" class="form-control" id="editHomeTown" name="editHomeTown" value="'.$row['homeTown'].'" required placeholder="Home Town">
                                                <div class="invalid-feedback">
                                                    Home Town is required
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="text-primary" for="editRegion">Region</label>
                                                <select id="editRegion" name="editRegion"  class="custom-select form-control" required>
                                                    <option value="'.$row['region'].'">'.$row['region'].'</option>
                                                    <option value="Greater Accra">Greater Accra</option>
                                                    <option value="Central">Central</option>
                                                    <option value="Eastern">Eastern</option>
                                                    <option value="Western">Ashanti</option>
                                                    <option value="Northern">Northern</option>
                                                    <option value="Upper East">Upper East</option>
                                                    <option value="Upper West">Upper West</option>
                                                    <option value="Upper West">Western</option>
                                                    <option value="Volta">Volta</option>
                                                    <option value="Brong Ahafo">Brong Ahafo</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Region is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="editHomeAddress">Home Address</label>
                                                <input type="text" class="form-control" id="editHomeAddress" name="editHomeAddress" value="'.$row['homeAddress'].'"  placeholder="Home Address" required>
                                                <div class="invalid-feedback">
                                                    Home Address is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editTelePhone">Telephone</label>
                                                <input type="text" class="form-control" id="editTelePhone" minlength="10" maxlength="10" name="editTelePhone" value="'.$row['telephone'].'" placeholder="Telephone" required>
                                                <div class="invalid-feedback">
                                                    Telephone is required
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="editEmailAddress">Email</label>
                                                <input type="email" class="form-control" id="editEmailAddress" name="editEmailAddress" value="'.$row['email'].'" required placeholder="Email Address">
                                            </div>
                                            <div class="invalid-feedback">
                                                Email Town is required
                                            </div>
                                        </div>


                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editNomineeClass">Class</label>
                                                <select id="editNomineeClass" name="editNomineeClass" class="custom-select form-control" required>
                                                    <option value="'.$row['class'].'">'.$row['class'].'</option>
                                                    <option value="HND Level 100">HND Level 100</option>
                                                    <option value="HND Level 200">HND Level 200</option>
                                                    <option value="HND Level 300">HND Level 300</option>
                                                    <option value="Diploma Level 100">Diploma Level 100</option>
                                                    <option value="Diploma Level 200">Diploma Level 200</option>
                                                    <option value="BTECH Level 100">BTECH Level 100</option>
                                                    <option value="BTECH Level 200">BTECH Level 200</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Class is required
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="editIndexNumber">Index Number</label>
                                                <input type="text" class="form-control" id="editIndexNumber" name="editIndexNumber" minlength="8" maxlength="8" value="'.$row['indexNumber'].'" placeholder="Index Number" required>
                                                <div class="invalid-feedback">
                                                    Index Number is required
                                                </div>
                                            </div>


                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="edit_cgpa">CGPA</label>
                                                <input type="number" class="form-control" id="edit_cgpa" name="edit_cgpa" value="'.$row['CGPA'].'" placeholder="CGPA" required>
                                                <div class="invalid-feedback">
                                                    CGPA is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editNomineePosition">Position</label>
                                                <select id="editNomineePosition" name="editNomineePosition" class="custom-select form-control" required>
                                                    <option value="'.$row['postion'].'">'.$row['postion'].'</option>
                                                    <option value="President">President</option>
                                                    <option value="Vice President">Vice President</option>
                                                    <option value="Secetary">Secetary</option>
                                                    <option value="Organizer">Organizer</option>
                                                    <option value="Asst. Organizer">Asst. Organizer</option>
                                                    <option value="Treasure">Treasure</option>
                                                    <option value="Interest & Innovations Cordinator">Interest & Innovations Cordinator</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Position is required
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="editVotingName">Voting Name</label>
                                                <select id="editVotingName" name="editVotingName" class="custom-select form-control" required>
                                                    <option value="'.$row['votingName'].'">'.$row['votingName'].'</option>
                                          ';
                                          ?>

                                        <?php
                                        $sql = "SELECT voting_name FROM new_voting ";
                                        $stmt = $connection->prepare($sql);
                                        $stmt->execute();
                                        while ($opt = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$opt['voting_name'].'">'.$opt['voting_name'].'</option>';

                                        }
                                        echo '
                                                </select>
                                                <div class="invalid-feedback">
                                                    Position is required
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="$editPreviousPositon">Previous Held in TTU</label>
                                                <input type="text" class="form-control" id="$editPreviousPositon" name="$editPreviousPositon" value="'.$row['postionHeld'].'" placeholder="Previous Held in TTU">
                                                <div class="small text-danger">
                                                    Leave This Blank if you dont have
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row ">
                                            <div class="col-md-5">
                                            <div class="form-group ">
                                                <label class="text-primary" for="nomineeImage">Picture</label>
                                                <input type="file" name="nomineeImage" id="nomineeImage" class="btn btn-block btn-success form-control-file">
                                          
                                            </div>
                                            </div>
                                        </div>
                                      
                                        <div class="text-right">
                                            <button class="btn btn-primary " name="btn_update" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end column 4 -->
                    </div>  <!-- end row -->
                </div>
            </div><!-- end col-12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
        ';
    }
}

?>

<?php
include '../../includes/footer.inc.php';

?>




