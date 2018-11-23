<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | JamgPH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/css.css" rel="stylesheet">
</head>

<body>
    <!-- this is the header of logged user -->
    <?php if (isset($_SESSION['username'])) {?>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <span class="navbar-brand mb-0 h1">
                        <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt=""> JAMGPH</span>
            <!-- toggler code here -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="softwares.php">Softwares</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movies.php">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generator.php">Generator <span class="badge badge-danger">New</span></a>
                    </li>
                    <!--
                                <li class="nav-item dropdown active">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Others
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">...</a>
                                        <a class="dropdown-item" href="#">...</a>
                                    </div>
                                </li>
                                -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="logout.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
            <!-- navbar end tag -->
        </nav>
    </header>
    <?php } else {?>
    <!-- this is the header of non logged user -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <span class="navbar-brand mb-0 h1">
                        <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">JAMGPH</span>
            <!-- toggler code here -->
            <!-- navbar end tag -->
            <button id="logModalButton" class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#loginModal"><i class="fas fa-spinner fa-spin d-none" id="spinner-log"></i> Login</button>
        </nav>
    </header>
    <?php }?>
    <!-- header end -->
    <!-- user body -->
    <main role="main" class="container">
        <?php if (isset($_SESSION['username'])) {?>
        <h1 class="mt-5">Hello <?php echo $_SESSION['username'] ?>,</h1>
        <hr class="my-4">
        <p>You are awesome.</p>
        <p>Visit our beta website <a href="https://beta.jamgph.com">https://beta.jamgph.com</a></p>
        <?php } else {?>
        <!-- non logged body -->
        <h1 class="mt-5">Hello stranger !</h1>
        <p class="lead">Welcome to my website.</p>
        <hr class="my-4">
        <p>There's more content inside, I appreciate if you create one.</p>
        <p>Visit our beta website <a href="https://beta.jamgph.com">https://beta.jamgph.com</a></p>
        <button id="regModalButton" type="button" class="btn btn-success" data-toggle="modal" data-target="#registerModal"><i class="fas fa-spinner fa-spin d-none" id="spinner-reg"></i> Register</button>
        <?php }?>
    </main>
    <footer class="footer">
        <div class="container" align="center">
            <span class="text-muted">www.jamgph.com</span>
        </div>
    </footer>
</body>

</html>
<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="login-captcha" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Please solve basic math.
                </div>
                <div id="login-wrong" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Incorrect username or password.
                </div>
                <div id="login-no" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Cannot be blank.
                </div>
                <form action="">
                    <label>Username </label>
                    <input type="text" name="username" id="username" class="form-control" />
                    <br>
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="password" /><br>
                    <label id="captcha-label"></label>
                    <input type="text" name="captcha" id="captcha" class="form-control" /><br>
                    <button type="button" name="loginButton" id="loginButton" class="btn btn-success">Login</button>
                    <button type="button" name="forgotPasswordButton" id="forgotPasswordButton" class="btn btn-danger d-none" 0>Forgot Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Registration Modal -->
<div id="registerModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="registrationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="reg-captcha-notify" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Please solve basic math.
                </div>
                <div id="reg-no-input" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Some forms are blanked.
                </div>
                <div id="reg-mismatched" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Password mismatched.
                </div>
                <div id="reg-dup" class="alert alert-danger fade show d-none" role="alert">
                    <strong>Failed!</strong> Duplicate email or password.
                </div>
                <div id="reg-success" class="alert alert-success fade show d-none" role="alert">
                    <strong>Success!</strong> You may now log in.
                </div>
                <form action="">
                    <label>Username</label>
                    <input type="text" name="newUsername" id="newUsername" class="form-control" />
                    <br>
                    <label>Password</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control" autocomplete="password" />
                    <br>
                    <label>Re-type Password</label>
                    <input type="password" name="newPassword2" id="newPassword2" class="form-control" autocomplete="password" />
                    <br>
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                    <br>
                    <label id="captcha-label-reg"></label>
                    <input type="text" name="captcha-reg" id="captcha-reg" class="form-control" /><br>
                    <button type="button" name="registerButton" id="registerButton" class="btn btn-info">Confirm</button>
                    <button type="button" name="registerBtnSuccess" id="registerBtnSuccess" class="btn btn-success d-none" onclick="window.location.replace('/')">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for success registration -->
<div class="modal fade" id="okModal" tabindex="-1" role="dialog" aria-labelledby="okModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="okModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You may now log in.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Javascript / JQuery BEGIN (sorry for encrypting my js) -->
<script>
$(document).ready(function() {
    //captcha generating random
    var a = Math.floor((Math.random() * 10) + 1);
    var b = Math.floor((Math.random() * 10) + 1);
    var a2 = Math.floor((Math.random() * 10) + 1);
    var b2 = Math.floor((Math.random() * 10) + 1);
    var captcha = a + b;
    var captcha2 = a2 + b2;
    //Login function
    $("#loginButton").click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var ans = $("#captcha").val();
        $('#loginButton').attr('disabled', true);
        //captcha verify
        if (ans != captcha) {
            $('#login-captcha').removeClass('d-none');
            $('#loginButton').attr('disabled', false);
            $('#captcha').addClass('is-invalid');
            $('#username,#password').removeClass('is-invalid');
            $('#login-no,#login-wrong').addClass('d-none');
        } else {
            if (username != '' && password != '') {
                $.ajax({
                    url: "php/loginRequest.php",
                    method: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if (data == 'No') {
                            //wrong user pass
                            $('#username,#password').addClass('is-invalid'); //place red border
                            //  $('#forgotPasswordButton').removeClass('d-none'); //show forgotpw button
                            $('#login-wrong').removeClass('d-none');
                            $("#username,#password,#captcha").val(''); //remove value
                            $('#loginButton').attr('disabled', false);
                            $('#login-captcha,#login-no').addClass('d-none');
                        } else {
                            $("#loginModal").hide();
                            location.reload();
                            $.ajax({
                                url: "php/mailto.php",
                                method: "POST",
                                data: {
                                    username: username
                                }
                            });
                        }
                    }
                });
            } else {
                //blank input
                $('#username,#password').addClass('is-invalid'); //place red border
                $('#loginButton').attr('disabled', false);
                $('#login-captcha').addClass('d-none');
                $('#login-no').removeClass('d-none');
                $('#captcha').removeClass('is-invalid');
            }
        }
    }); //Login function end tag
    //Register function
    $('#registerButton').click(function() {
        $('#registerButton').attr('disabled', true);
        var newUsername = $('#newUsername').val();
        var newPassword = $('#newPassword').val();
        var newPassword2 = $('#newPassword2').val();
        var email = $('#email').val();
        var ans2 = $('#captcha-reg').val();
        if (ans2 != captcha2) {
            $('#registerButton').attr('disabled', false);
            $('#reg-captcha-notify').removeClass('d-none');
            $('#captcha-reg').addClass('is-invalid');
            $('#newUsername,#newPassword,#newPassword2,#email').removeClass('is-invalid');
            $('#reg-no-input').addClass('d-none');
            $('#reg-mismatched').addClass('d-none');
        } else {
            $('#reg-captcha-notify').addClass('d-none');
            if (newUsername != '' && newPassword != '' && newPassword2 != '' && email != '') {
                $.ajax({
                    url: "php/registerRequest.php",
                    method: "POST",
                    data: {
                        user: newUsername,
                        email: email,
                        pass: newPassword,
                        pass2: newPassword2
                    },
                    success: function(data) {
                        if (data == 'Yes') {
                            //success
                            $('#newUsername,#newPassword,#newPassword2,#email,#captcha-reg').attr('disabled', true);
                            $('#newUsername,#newPassword,#newPassword2,#email,#captcha-reg').removeClass('is-invalid').addClass('is-valid');
                            $('#registerButton').addClass('d-none');
                            $('#registerBtnSuccess').removeClass('d-none');
                            $('#reg-success').removeClass('d-none');
                            $('#reg-dup,#reg-no-input,#reg-mismatched,#reg-captcha-notify').addClass('d-none');
                            $.ajax({
                                url: "php/mailto.php",
                                method: "POST",
                                data: {
                                    newUsername: newUsername,
                                    email: email
                                }
                            });
                        } else if (data == 'Not') {
                            $('#newUsername,#newPassword,#newPassword2,#email').removeClass('is-invalid');
                            $('#newPassword,#newPassword2').addClass('is-invalid');
                            $("#newPassword,#newPassword2").val('');
                            $('#registerButton').attr('disabled', false);
                            $('#reg-mismatched').removeClass('d-none');
                            $('#reg-dup').addClass('d-none');
                            $('#reg-no-input').addClass('d-none');
                        } else if (data == 'Dup') {
                            $('#newUsername,#newPassword,#newPassword2,#email').removeClass('is-invalid');
                            $('#newUsername,#email').addClass('is-invalid');
                            $("#newUsername,#email").val('');
                            $('#registerButton').attr('disabled', false);
                            $('#reg-dup').removeClass('d-none');
                            $('#reg-no-input').addClass('d-none');
                        } else {
                            alert('Error');
                            window.location.replace('/');
                        }
                    }
                });
            } else {
                $('#newUsername,#newPassword,#newPassword2,#email').addClass('is-invalid');
                $('#registerButton').attr('disabled', false);
                $('#reg-no-input').removeClass('d-none');
                $('#captcha-reg').removeClass('is-invalid');
                $('#reg-mismatched').addClass('d-none');
            }
        }
    });
    //register form modal styles
    $('#regModalButton').click(function() {
        $(".alert").addClass('d-none');
        $('#spinner-reg').removeClass('d-none');
        $('#newUsername,#newPassword,#newPassword2,#email,#captcha-reg').removeClass('is-invalid');
        $('#newUsername,#newPassword,#newPassword2,#email').val("");
        $("#captcha-reg").val('');
    });
    $('#registerModal').on('hidden.bs.modal', function() {
        $('#spinner-reg').addClass('d-none');
        $('#regModalButton').attr('disabled', false);
    });
    $('#registerModal').on('show.bs.modal', function() {
        $('#regModalButton').attr('disabled', true);
        //$('#captcha-reg').attr("placeholder", a2 + ' + ' + b2);
        $('#captcha-label-reg').text(a2 + ' + ' + b2 + ' =');
    });
    //login forms modal styles
    $('#logModalButton').click(function() {
        $(".alert").addClass('d-none');
        $('#spinner-log').removeClass('d-none');
        $('#username,#password,#captcha').removeClass('is-invalid');
        $('#username,#password').attr("placeholder", "");
        $("#captcha").val('');
    });
    $('#loginModal').on('hidden.bs.modal', function() {
        $('#spinner-log').addClass('d-none');
        $('#logModalButton').attr('disabled', false);
    });
    $('#loginModal').on('show.bs.modal', function() {
        $('#logModalButton').attr('disabled', true);
        //captcha function
        //$('#captcha').attr("placeholder", a + ' + ' + b);
        $('#captcha-label').text(a + ' + ' + b + ' =');

    });
}); // ready function end tag
</script>