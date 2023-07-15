<?php
session_start();
if (isset($_COOKIE['rememberme'])) {

      $id = $_COOKIE['rememberme'];
      $cipher = "AES-128-CTR";
      $secret = 'cookie-ssip-2022-secret-key';
      $options = 0;
      $iv = str_repeat("0", openssl_cipher_iv_length($cipher));
      $_SESSION['user_id'] = openssl_decrypt($id, $cipher, $secret, $options, $iv);

      header('Location: ./dashboard.php');
}
?>
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
      <!-- <header class="header"> -->
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                  <div class="container">
                        <a href="#" class="navbar-brand">
                              <h2 class=" d-lg-block"> <img src="assets/img/logo.png" alt=""> E-MentiSpot</h2>
                        </a>
                  </div>
            </nav>
      <!-- </header> -->
      <div class="error_invalid_mail hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
            <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
                  <div class="col-lg-12 ml-auto">
                        <div class="alert alert-danger fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True">&times;</span>
                              </button>
                              <h4 class="alert-heading">error!</h4>
                              <p><?php echo $_SESSION['error_notvalid_mail']; ?></p>
                        </div>
                  </div>
            </div>
      </div>
      <div class="pass_reseted hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
            <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
                  <div class="col-lg-12 ml-auto">
                        <div class="alert alert-success fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True">&times;</span>
                              </button>
                              <h4 class="alert-heading">Sucess</h4>
                              <p><?php echo $_SESSION['pass_reseted']; ?></p>
                        </div>
                  </div>
            </div>
      </div>
      <div class="send-mail hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
            <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
                  <div class="col-lg-12 ml-auto">
                        <div class="alert alert-danger fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True">&times;</span>
                              </button>
                              <h4 class="alert-heading">Sucess</h4>
                              <p><?php echo $_SESSION['send-mail']; ?></p>
                        </div>
                  </div>
            </div>
      </div>

      <div class="send-mail-s hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
            <div class="row no-gutters col-md-3" style="position: absolute; top: 0; right: 0px;">
                  <div class="col-lg-12 ml-auto">
                        <div class="alert alert-success fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True">&times;</span>
                              </button>
                              <h4 class="alert-heading">Sucess</h4>
                              <p><?php echo $_SESSION['send-mail-s']; ?></p>
                        </div>
                  </div>
            </div>
      </div>
      <div class="container" id="login_form">
            <div class="row py-2 mt-5 pt-5 align-items-center">
                  <!-- For Demo Purpose -->
                  <div class="col-md-6 pr-lg-8 mb-5 mb-md-0 d-none d-md-block">
                        <img src="./assets/img/ment2.svg" alt="" class="img-fluid mb-3">
                        <p class="font-italic text-muted mb-0">Create a minimal registeration page using
                              Bootstrap 4 HTML form
                              elements.</p>
                        <p class="font-italic text-muted">Snippet By <a href="#" class="text-muted">
                                    <u>Bootstrapious</u></a>
                        </p>
                  </div>

                  <!-- Registeration Form -->
                  <div class="col-md-9 col-lg-5 ml-auto">
                        <form id="login_form" class="" method="post" action="./php/controll.php">
                              <h3 class="font-weight-bold mb-4">LOG IN NOW</h3>
                              <div class="row">
                                    <!-- Email Address -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-envelope text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="email-login" type="email" name="email" placeholder="Email Address" class="email-register form-control bg-white border-left-0 border-md">
                                    </div>

                                    <!-- Password -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-lock text-muted"></i>
                                                </span>
                                          </div>
                                          <input required id="password" type="password" name="password" placeholder="Password" class="password-register form-control bg-white border-left-0 border-md">
                                    </div>
                                    <div class="col-lg-6 mb-4 text-left">
                                          <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="rememberme">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                      Remember Me
                                                </label>
                                          </div>
                                    </div>
                                    <div class="col-lg-6 mb-4 text-right" data-toggle="modal" data-target="#exampleModalCenter">
                                          <a href="#">Forgot Password?</a>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="input-group col-lg-12 mb-4">
                                          <button class="form-group col-lg-12 mx-auto mb-0 btn btn-primary btn-block py-2" name="btn-login" type="submit">
                                                <!-- <a href="#" class="btn btn-primary btn-block py-2"> -->
                                                <span class="font-weight-bold">Login</span>
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
                                          <p class="text-muted font-weight-bold">Don't have an Account?
                                                <a href="./register.php" class="text-primary ml-2">Register</a>
                                          </p>
                                    </div>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Reset Password</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>

                        <div class="modal-body">
                              <form action="./Mail/send-mails.php" method="post">
                                    <div class="input-group col-lg-12 mb-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                      <i class="fa fa-envelope text-muted"></i>
                                                </span>
                                          </div>
                                          <input id="email-forgot" type="email" name="email-forgot" placeholder="Email Address" class="email-register form-control bg-white border-left-0 border-md">
                                    </div>

                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary" name="send-forget-mail">Send Email</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/login.js"></script>
<script src="./assets/js/validation.js"></script>
<script>
      const email = document.getElementById("email-forgot");
      email.addEventListener("input", () => validate(email));

      function validate(element) {
            if (element.validity.typeMismatch) {
                  element.setCustomValidity("The Email is not in the right format!!!");
                  element.reportValidity();
            } else {
                  element.setCustomValidity("");
            }
      }
</script>

</html>
<?php
if (isset($_SESSION['error_notvalid_mail'])) {
?>
      <script>
            function addHide() {
                  var element = document.getElementsByClassName("error_invalid_mail")[0];
                  element.classList.add("hide");
            }
            var element = document.getElementsByClassName("error_invalid_mail")[0];
            element.classList.remove("hide");
            const myTimeout = setTimeout(addHide, 2000);
      </script>
<?php
      unset($_SESSION['error_notvalid_mail']);
}
?>

<?php
if (isset($_SESSION['pass_reseted'])) {
?>
      <script>
            function addHide() {
                  var element = document.getElementsByClassName("pass_reseted")[0];
                  element.classList.add("hide");
            }
            var element = document.getElementsByClassName("pass_reseted")[0];
            element.classList.remove("hide");
            const myTimeout = setTimeout(addHide, 2000);
      </script>
<?php
      unset($_SESSION['pass_reseted']);
}
?>

<?php
if (isset($_SESSION['send-mail'])) {
?>
      <script>
            function addHide() {
                  var element = document.getElementsByClassName("send-mail")[0];
                  element.classList.add("hide");
            }
            var element = document.getElementsByClassName("send-mail")[0];
            element.classList.remove("hide");
            const myTimeout = setTimeout(addHide, 2000);
      </script>
<?php
      unset($_SESSION['send-mail']);
}
?>

<?php
if (isset($_SESSION['send-mail-s'])) {
?>
      <script>
            function addHide() {
                  var element = document.getElementsByClassName("send-mail-s")[0];
                  element.classList.add("hide");
            }
            var element = document.getElementsByClassName("send-mail-s")[0];
            element.classList.remove("hide");
            const myTimeout = setTimeout(addHide, 2000);
      </script>
<?php
      unset($_SESSION['send-mail-s']);
}
?>