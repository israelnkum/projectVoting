
<?php
include '../../includes/header.inc.php';
include '../../includes/navs.inc.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Voting</a></li>
                            <li class="breadcrumb-item active">New Nominee</li>
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
                        <div class="col-md-6 offset-md-6 text-right">
                            <button type="button" data-toggle="modal" data-target="#popModal" class="btn btn-primary" href="votingType.php">
                                Select New Voting Name
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-title">
                                    Nomination Form
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" action="../../validation/nominees/addNewNominee.php"  class="needs-validation form-material"  novalidate>
                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="fristName">First name</label>
                                                <input type="text" class="form-control" id="fristName" name="fristName"  placeholder="First name" required>
                                                <div class="invalid-feedback">
                                                    First Name is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="lastName">Last name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                                <div class="invalid-feedback">
                                                    Last Name is required
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="otherName">Other Name</label>
                                                <input type="text" class="form-control" id="otherName" name="otherName" placeholder="Other Name">
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="dateOfBirth">Date Of Birth</label>
                                                <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth"  placeholder="Date of Birth" required>
                                                <div class="invalid-feedback">
                                                    Date of Birth is required
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="homeTown">Home Town</label>
                                                <input type="text" class="form-control" id="homeTown" name="homeTown" required placeholder="Home Town">
                                                <div class="invalid-feedback">
                                                    Home Town is required
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label class="text-primary" for="region">Region</label>
                                                <select id="region" name="region" class="custom-select form-control" required>
                                                    <option value="">Select Region</option>
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
                                                <label class="text-primary" for="homeAddress">Home Address</label>
                                                <input type="text" class="form-control" id="homeAddress" name="homeAddress"  placeholder="Home Address" required>
                                                <div class="invalid-feedback">
                                                    Home Address is required
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="telePhone">Telephone</label>
                                                <input type="text" class="form-control" id="telePhone" minlength="10" maxlength="10" name="telePhone" placeholder="Telephone" required>
                                                <div class="invalid-feedback">
                                                    Telephone is required
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="emailAddress">Email</label>
                                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" required placeholder="Email Address">
                                            </div>
                                            <div class="invalid-feedback">
                                                Email Town is required
                                            </div>
                                        </div>


                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="nomineeClass">Class</label>
                                                <select id="nomineeClass" name="nomineeClass" class="custom-select form-control" required>
                                                    <option value="">Select Class</option>
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
                                                <label class="text-primary" for="indexNumber">Index Number</label>
                                                <input type="text" class="form-control" id="indexNumber" name="indexNumber" minlength="8" maxlength="8" placeholder="Index Number" required>
                                                <div class="invalid-feedback">
                                                    Index Number is required
                                                </div>
                                            </div>


                                            <div class="col-md-3 mb-3">
                                                <label class="text-primary" for="cgpa">CGPA</label>
                                                <input type="number" class="form-control" id="cgpa" name="cgpa" placeholder="CGPA" required>
                                                <div class="invalid-feedback">
                                                   CGPA is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-material">
                                            <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="nomineePosition">Position</label>
                                                <select id="nomineePosition" name="nomineePosition" class="custom-select form-control" required>
                                                    <option value="">Select Position</option>
                                                    <?php
                                                    if (isset($_POST['submit'])){
                                                        include "../../validation/dbConnection.php";
                                                        global $selected;
                                                        $selected = $_POST['VotingName'];
                                                        $sql = "SELECT * FROM positions WHERE  voting_name=:selected";
                                                        $stmt = $connection->prepare($sql);
                                                        $stmt->bindValue(":selected", $selected);
                                                        $stmt->execute();
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                            echo "<option value='" . $row['positionType']."'>". $row['positionType'] . "</option>";
                                                        }

                                                    }

                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Position is required
                                                </div>


                                            </div>
                                            <?php
                                            echo '


                                           <div class="col-md-4 mb-3">
                                                <label class="text-primary" for="previousPositon">Previous Position Held in TTU</label>
                                                <input type="text" class="form-control" id="previousPositon" name="previousPositon" placeholder="Previous Position Held" >
                                                <div class="small text-danger">
                                                    Leave this blank if you don\'t have
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-1 mb-3">
                                                <input type="hidden" class="form-control" id="voteName" name="voteName" value="'.$selected.'" required>
                                            </div>
                                            ';
                                            ?>
                                        </div>


                                        <div class="form-group ">
                                            <label class="text-primary" for="nomineeImage">Picture</label>
                                            <input type="file" name="nomineeImage" id="nomineeImage" class="form-control-file" required>
                                        <div class="invalid-feedback">
                                            Picture is required
                                        </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-primary " name="btn_uploadImage" type="submit">Submit</button>
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
<!-- end wrapper -->
<?php
include '../../includes/footer.inc.php';
?>
