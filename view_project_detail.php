<?php session_start();
include('./setting/dbconnection.php');
$id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM register WHERE id = $id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();

$pro = "SELECT * FROM project_details WHERE std_id = $id AND delete_status = 1";
$pro_result = $conn->query($pro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Project Detail</title>
    <?php
    include("./include/head.php");
    ?>
    <style>
        .hide {
            display: none;
        }

        .point:hover {
            cursor: pointer;
        }

        .input-group-text {
            width: 5rem;
        }
    </style>
</head>

<body>
    <div class="project_add hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
        <div class="row no-gutters col-md-3" style="position: absolute; top: 100px; right: 0px;">
            <div class="col-lg-12 ml-auto">
                <div class="alert alert-success fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="True">&times;</span>
                    </button>
                    <h4 class="alert-heading">Successfuly</h4>
                    <p><?php echo $_SESSION['project_add']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="project_add_err hide" aria-live="polite" aria-atomic="true" style="position: relative; z-index: 2; top: -50px;">
        <div class="row no-gutters col-md-3" style="position: absolute; top: 100px; right: 0px;">
            <div class="col-lg-12 ml-auto">
                <div class="alert alert-danger fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="True">&times;</span>
                    </button>
                    <h4 class="alert-heading">Error!</h4>
                    <p><?php echo $_SESSION['project_add_err']; ?></p>
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
            <h1>Project Details</h1>
        </div>

        <section class="section profile">
            <a href="./view_mentor.php?pi=<?php echo $_GET['pi'];?>"><button class="btn btn-primary">Find Mentor For this Project</button></a>
        </section>

    </main><!-- End #main -->
    <?php
    include("./include/footer.php");
    include("./include/backtotop.php");
    include("./include/script.php");
    ?>
</body>

</html>

<?php
if (isset($_SESSION['project_add'])) {
?>
    <script>
        function addHide() {
            var element = document.getElementsByClassName("project_add")[0];
            element.classList.add("hide");
        }
        var element = document.getElementsByClassName("project_add")[0];
        element.classList.remove("hide");
        const myTimeout = setTimeout(addHide, 2000);
    </script>
<?php
    unset($_SESSION['project_add']);
}
if (isset($_SESSION['project_add_err'])) {
?>
    <script>
        function addHide() {
            var element = document.getElementsByClassName("project_add_err")[0];
            element.classList.add("hide");
        }
        var element = document.getElementsByClassName("project_add_err")[0];
        element.classList.remove("hide");
        const myTimeout = setTimeout(addHide, 2000);
    </script>
<?php
    unset($_SESSION['project_add_err']);
}
?>