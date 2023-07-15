<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn & SignUp</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="#" class="navbar-brand">
                    <h2>Hackathon 2022</h2>
                </a>
            </div>
        </nav>
    </header>

    <div class="invalide_otp_error hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
        <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
            <div class="col-lg-12 ml-auto">
                <div class="alert alert-danger fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="True">&times;</span>
                    </button>
                    <h4 class="alert-heading">error!</h4>
                    <p><?php echo $_SESSION['invalid_otp']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row py-2 mt-1 pt-5 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-6 pr-lg-8 mb-5 mb-md-0 d-none d-md-block">
                <img src="../assets/img/otp-img.svg" alt="" class="img-fluid mb-3">
                <p class="font-italic text-muted mb-0">Create a minimal registeration page using
                    Bootstrap 4 HTML form
                    elements.</p>
                <p class="font-italic text-muted">Snippet By <a href="#" class="text-muted">
                        <u>Bootstrapious</u></a>
                </p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-9 col-lg-5 ml-auto">
                <form id="login_form" class="" method="post" action="../Mail/send-mails.php">
                    <h3 class="font-weight-bold mb-4">Enter OTP</h3>
                    <div class="row">
                        <div class="input-group col-lg-12">
                            <div class="alert alert-success" role="alert">
                                Check Your mail for OTP
                            </div>
                        </div>
                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="otp" placeholder="Enter OTP" class="email-register form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <div class="input-group col-lg-12 mb-4">
                            <button class="form-group col-lg-12 mx-auto mb-0 btn btn-primary btn-block py-2" name="btn-otp" type="submit">
                                <span class="font-weight-bold">Done!</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/login.js"></script>
<script src="../assets/js/validation.js"></script>

</html>
<?php
if (isset($_SESSION['invalid_otp'])) {
?>
    <script>
        function addHide() {
            var element = document.getElementsByClassName("invalide_otp_error")[0];
            element.classList.add("hide");
        }
        var element = document.getElementsByClassName("invalide_otp_error")[0];
        element.classList.remove("hide");

        const myTimeout = setTimeout(addHide, 2000);
    </script>
<?php
    unset($_SESSION['invalid_otp']);
}
?>