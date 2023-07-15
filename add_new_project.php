<?php session_start();
include('./setting/dbconnection.php');
$id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM register WHERE id = $id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
$p_title = '';
$p_desc = '';
$p_tool = '';
$p_domain = '';
if (isset($_GET['p'])) {
    $pid = $_GET['p'];

    $sql = "SELECT * FROM project_details WHERE prj_id = $pid";
    echo $sql;
    // exit(0);
    $p_result = $conn->query($sql);
    $p_data = $p_result->fetch_assoc(); 
    $p_title = $p_data['prj_title'];
    $p_desc = $p_data['prj_desc'];
    $p_tool = $p_data['prj_tool_tech'];
    $p_domain = $p_data['prj_domain'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
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
            <h1>Add New Project</h1>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-pane profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="<?php if(isset($_GET['p'])) {
                                    echo  "./php/project_crud.php?p=$pid";} else {
                                        echo './php/project_crud.php'; 
                                    }?>" method="POST">
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Project Title</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="prj_title" class="form-control" id="about" style="height: 60px" required><?php echo $p_title; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Project Description</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="prj_desc" class="form-control" id="about" style="height: 100px" required><?php echo $p_desc; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Project Tools & Tech</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="prj_tool_tech" class="form-control" id="about" style="height: 60px" required><?php echo $p_tool; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Project Domain</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="prj_domain" class="form-control" id="about" style="height: 60px" required><?php echo $p_domain; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <?php
                                        if (isset($_GET['p'])) {
                                            echo "<button type='submit' class='btn btn-primary' name='updatepro'>Update Project</button>";
                                        } else {
                                            echo "<button type='submit' class='btn btn-primary' name='doInsert'>Add Project</button>";
                                        }
                                        ?>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div>
                    </div>

                </div>
            </div>
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