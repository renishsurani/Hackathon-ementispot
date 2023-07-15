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
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="#" class="navbar-brand">
                    <!-- <img src="https://bootstrapious.com/i/snippets/sn-registeration/logo.svg" alt="logo" width="150"> -->
                    <h2>Hackathon 2022</h2>
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row py-2 mt-0 pt-5 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-6 pr-lg-8 mb-5 mb-md-0 d-none d-md-block">
                <img src="../img/pass_reset.svg" alt="" class="img-fluid mb-3">
                <p class="font-italic text-muted mb-0">Create a minimal registeration page using
                    Bootstrap 4 HTML form
                    elements.</p>
                <p class="font-italic text-muted">Snippet By <a href="#" class="text-muted">
                        <u>Bootstrapious</u></a>
                </p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-9 col-lg-5 ml-auto">
                <?php
                $id = $_GET['id'];
                ?>
                <form id="login_form" class="" method="post" action="./controll.php?id=<?php echo $id; ?>">
                    <h3 class="font-weight-bold mb-4">Enter New password</h3>
                    <div class="row">
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input required id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input required id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            <button class="form-group col-lg-12 mx-auto mb-0 btn btn-primary btn-block py-2" name="btn-update" type="submit">
                                <!-- <a href="#" class="btn btn-primary btn-block py-2"> -->
                                <span class="font-weight-bold">Reset Password</span>
                                <!-- </a> -->
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
<script src="../js/main.js"></script>

<script>
    const password = document.getElementById("password");
    password.addEventListener("input", () => passwordValidation(password));

    function passwordValidation(element) {
        if (element.value.length < 8) {
            element.setCustomValidity("password length must be at least 8 characters");
            element.reportValidity();
        } else {
            element.setCustomValidity("");
        }
    }


    const passwordConfirmation = document.getElementById("passwordConfirmation");
    passwordConfirmation.addEventListener('input', () => conformation(passwordConfirmation, password))

    function conformation(passwordConfirmation, password) {
        if (passwordConfirmation.value === password.value) {
            passwordConfirmation.setCustomValidity("");
        } else {
            passwordConfirmation.setCustomValidity("password does not match");
            passwordConfirmation.reportValidity();
        }
    }
</script>

</html>