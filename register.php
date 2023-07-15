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
      <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
      <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                  <div class="container">
                        <a href="#" class="navbar-brand">
                              <h2 class=" d-lg-block"> <img src="assets/img/logo.png" alt=""> E-MentiSpot</h2>
                        </a>
                  </div>
            </nav>
      </header>
      <div class="error_same_mail hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
            <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
                  <div class="col-lg-12 ml-auto">
                        <div class="alert alert-danger fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True">&times;</span>
                              </button>
                              <h4 class="alert-heading">error!</h4>
                              <p><?php echo $_SESSION['error_same_mail']; ?></p>
                        </div>
                  </div>
            </div>
      </div>
      <div class="container" id="register_form">
            <div class="row py-2 mt-5 align-items-center">
                  <!-- For Demo Purpose -->
                  <div class="col-md-6 pr-lg-8 mb-5 mb-md-0 d-none d-md-block">
                        <img src="./assets/img/ment1.svg" alt="" class="img-fluid mb-3">
                        <p class="font-italic text-muted mb-0">Create a minimal registeration page using
                              Bootstrap 4 HTML form
                              elements.</p>
                        <p class="font-italic text-muted">Snippet By <a href="https://bootstrapious.com" class="text-muted">
                                    <u>Bootstrapious</u></a>
                        </p>
                  </div>

                  <!-- Registeration Form -->
                  <div class="col-md-9 col-lg-5 ml-auto">
                        <form action="./Mail/send-mails.php" method="post">
                              <h3 class="font-weight-bold mb-4">REGISTER NOW</h3>
                              <div class="row">
                                    <!-- First Name -->
                                    <div class="input-group col-lg-6 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-user text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                                    </div>

                                    <!-- Last Name -->
                                    <div class="input-group col-lg-6 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-user text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                                    </div>

                                    <!-- Email Address -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-envelope text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="email-register" id="email-register" type="email" name="email" placeholder="Email Address" class="email-register form-control bg-white border-left-0 border-md">

                                    </div>


                                    <!-- Password -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-lock text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="password-register" type="password" name="password" placeholder="Password" class="password-register form-control bg-white border-left-0 border-md">
                                    </div>

                                    <!-- Password Confirmation -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-lock text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="passwordConfirmation form-control bg-white border-left-0 border-md">
                                    </div>
                                    <div class="col-lg-12 mb-4 text-left">
                                          <div class="form-check">
                                                <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                      I agree to the Terms of Service and Privacy Policy
                                                </label>
                                          </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <button class="form-group col-lg-12 mx-auto mb-0 btn btn-primary btn-block" name="btn-send" type="submit">
                                                <!-- <a href="#" class="btn btn-primary btn-block"> -->
                                                <span class="font-weight-bold"> Create your account</span>
                                                <!-- </a> -->
                                          </button>
                                    </div>

                                    <!-- Divider Text -->
                                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                          <div class="border-bottom w-100 ml-5"></div>
                                          <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                                          <div class="border-bottom w-100 mr-5"></div>
                                    </div>

                                    <!-- Already Registered -->
                                    <div class="text-center w-100">
                                          <p class="text-muted font-weight-bold"> Already Registered?
                                                <a href="./index.php" class="text-primary ml-2">Login</a>
                                          </p>
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
<script src="./assets/js/login.js"></script>
<script src="./assets/js/validation.js"></script>

</html>

<?php
if (isset($_SESSION['error_same_mail'])) {
?>
      <script>
            function addHide() {
                  var element = document.getElementsByClassName("error_same_mail")[0];
                  element.classList.add("hide");
            }
            var element = document.getElementsByClassName("error_same_mail")[0];
            element.classList.remove("hide");
            const myTimeout = setTimeout(addHide, 2000);
      </script>
<?php
      unset($_SESSION['error_same_mail']);
}
?>