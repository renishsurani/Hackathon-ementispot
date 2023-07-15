<?php session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: ./index.php');
}
include('./setting/dbconnection.php');
$id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM register WHERE id = $id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
// $full_name = $row['first_name'].$row['']
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <?php
  include("./include/head.php");
  ?>
  <style>
    .hide {
      display: none;
    }

    .header-nav .nav-icon {
      margin-right: 0px;
    }
  </style>
</head>

<body>
  <div class="success_login hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
    <div class="row no-gutters col-md-3" style="position: absolute; top: 100px; right: 0px;">
      <div class="col-lg-12 ml-auto">
        <div class="alert alert-success fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="True">&times;</span>
          </button>
          <h4 class="alert-heading">Successfuly</h4>
          <p><?php echo $_SESSION['success_login']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <?php
  include("./include/header.php");
  ?>

  <!-- ======= Sidebar ======= -->
  <?php
  include("./include/sidebar.php");
  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <section class="section mt-3">
        <form action="#">
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Example Card</h5>
                  <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
    </div>

  </main><!-- End #main -->

  <?php
  include("./include/footer.php");
  include("./include/backtotop.php");
  include("./include/script.php");
  ?>

</body>

</html>

<?php
if (isset($_SESSION['success_login'])) {
?>
  <script>
    function addHide() {
      var element = document.getElementsByClassName("success_login")[0];
      element.classList.add("hide");
    }
    var element = document.getElementsByClassName("success_login")[0];
    element.classList.remove("hide");
    const myTimeout = setTimeout(addHide, 2000);
  </script>
<?php
  unset($_SESSION['success_login']);
}
?>