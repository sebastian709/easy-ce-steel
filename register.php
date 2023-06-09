<?php
session_start();
require 'db/connection.php';



if (isset($_POST['AJAXLocator']) || isset($_GET['AJAXLocator'])) {
    if (isset($_POST['AJAXLocator'])) {
        $locator = $_POST['AJAXLocator'];
    } else {
        $locator = $_GET['AJAXLocator'];
    }
    if ($locator == "register") {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO users (fulname, email, password) VALUES ('" . $fullname . "','" . $email . "','" . $password . "')";

        $result = $conn->query($sql) or die("Error in Selecting " . mysqli_error($conn));

        echo json_encode(1);
        exit;
        
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ECES - Home</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://i.pinimg.com/564x/68/d1/fe/68d1fedb9f6e107b5e6dd68396870a54.jpg" />
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />
</head>

<style>
    @media screen and (min-width:767px) {
        .formx {
            margin: 2% 7%;
        }

        .inner-formx {
            padding: 70px 70px;
        }
    }

    @media screen and (max-width:765px) {
        .formx {
            margin: 22% 8%;
            width: 350px;
        }

        .inner-formx {
            padding: 50px 20px;
        }
        
        .floating {
            display: none;
        }
    }

    .floating {
        animation-name: floating;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
        margin-left: 30px;
        margin-top: 5px;
    }

    @keyframes floating {
        0% {
            transform: translate(0, 0px);
        }

        50% {
            transform: translate(0, 50px);
        }

        100% {
            transform: translate(0, -0px);
        }
    }
</style>

<body style="background:rgb(24,35,58);">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 card formx rounded-3">
                <div class="container inner-formx">
                    <div class="row">
                        <div class="col text-center mb-4">
                            <img src="assets/images/ecs.png" alt="" style="width:100px;">
                            <h4 class="fw-bold">EASY CE STEEL</h4>
                            <h5 class="fw-normal text-uppercase">Register</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Full name</label>
                                <input type="text" id="fullname" class="form-control" />
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example1">Email address</label>
                                <input type="email" id="email" class="form-control" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example2">Password</label>
                                <input type="password" id="password" class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <!-- Submit button -->
                                    <button type="button" id="register" class="btn btn-info btn-block mb-4 form-control">Register</button>
                                </div>
                            </div>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Have an account? <a href="index.php">Login</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <img src="assets/images/ecs-art.png" class="floating" alt="" style="width:550px; margin:15% 0%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#register').on('click', function() {
            let fullname = $('#fullname').val();
            let email = $('#email').val();
            let password = $('#password').val();

            if (email.indexOf('student.fatima.edu.ph') > -1) {
                $.ajax({
                    url: "register.php",
                    type: "POST",
                    data: {
                        fullname: fullname,
                        email: email,
                        password: password,
                        AJAXLocator: "register",
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);

                        if (result == 1) {
                            swal({
                                title: "Success!",
                                text: "You're successfully registered!",
                                icon: "success",
                            });
                            $('#fullname').val('');
                            $('#email').val('');
                            $('#password').val('');
                        }
                    }
                });
            } else {
                swal({
                    title: "Failed!",
                    text: "Please use your fatima email account!",
                    icon: "error",
                });
            }

        });
    </script>


</body>

</html>