
<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/highdmin/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Apr 2018 04:16:34 GMT -->
<head>
    <meta charset="utf-8" />
    <title>iTSU Voting System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/itsu.jpeg">

    <!-- App css -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/icons/icons.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/custom/style.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/custom/styles.css" rel="stylesheet" type="text/css" />

    <script src="../../assets/js/jquery/modernizr.min.js"></script>

</head>

<body>

<!-- Begin page -->
<div class="accountbg" style="background: url('../../assets/images/e_Voting.jpg.jpg');background-size: cover;"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-8 " style="max-width: 540px;">
            <div class="card" >
                <div class="card-block">
                    <div class="account-box" >
                        <div class="card-box p-5">
                            <div class="text-center">
                                <?php if (isset($_GET['err'])) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $_GET['err'];?>
                                    </div>
                                <?php }?>
                                <a href="admin_login.php" class="text-success">
                                    <img src="../../assets/images/itsu.jpeg" style="width: 80px;height: auto" alt="iTSU VOTING">
                                </a>
                            </div>
                            <h6 class="text-primary display-4 text-center" style="font-size: 20px;">iTSU Voting System</h6>

                            <form method="post" action="../../validation/authentication/adminLogin.php" class="needs-validation" novalidate>
                                <div class="form-row form-material">
                                    <div class="col-md-12 mb-3">
                                        <label for="adminUserName">Username</label>
                                        <input type="text" class="form-control" id="adminUserName" name="adminUserName" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Username is required
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-material">
                                    <div class="col-md-12 mb-3">
                                        <label for="adminPassword">Password</label>
                                        <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-block btn-success" name="btnAdminLogin" id="btnAdminLogin" type="submit">Login</button>
                            </form>
                            <div class="text-center m-t-30">
                                <small class="text-danger"><a href="../../index.php">Login as an Voter</a></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-t-40 text-center">
                    <p class="account-copyright">2018 © iTSU Department</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<!-- jQuery  -->
<script src="../../assets/js/jquery/jquery.min.js"></script>
<script src="../../assets/js/jquery/popper.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery/waves.js"></script>
<script src="../../assets/js/jquery/jquery.slimscroll.js"></script>

<!-- App js -->
<script src="../../assets/js/jquery/jquery.core.js"></script>
<script src="../../assets/js/jquery/jquery.app.js"></script>

</body>

<!-- Mirrored from coderthemes.com/highdmin/horizontal/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Apr 2018 04:16:35 GMT -->
</html>