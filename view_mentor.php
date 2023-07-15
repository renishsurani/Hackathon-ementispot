<?php session_start();
include('./setting/dbconnection.php');
$id = $_SESSION['user_id'];
$sql1 = "SELECT * FROM register WHERE id = $id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();

$m_sql = "SELECT * FROM register WHERE post = 'Mentor'";
$m_result = $conn->query($m_sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Project</title>
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

        p {
            margin-bottom: 0.3rem;
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
            <h1>All Mentors</h1>
        </div>
        <section id="team" class="pb-5">
            <div class="container">
                <div class="row">
                    <?php
                    while ($m_row = $m_result->fetch_assoc()) {
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 mt-4">
                            <div class="image-flip">
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p><img class="img-fluid" src="<?php if ($m_row['profile_img'] == NULL) {
                                                                                    echo "./assets/img/default-profile-pic.jpg";
                                                                                } else {
                                                                                    echo "assets/profile_pic/" . $m_row['profile_img'];
                                                                                } ?>" style="height: 200px; width: 200;" alt="card image"></p>
                                                <h4 class="card-title"><?php echo $m_row['first_name'] . ' ' . $m_row['last_name']; ?></h4>
                                                <?php
                                                $u_id = $m_row['id'];
                                                $skills = "SELECT * FROM skills WHERE user_id = $u_id";
                                                $result = $conn->query($skills);
                                                $skill_list = '';
                                                while ($row1 = $result->fetch_assoc()) {
                                                    $skill_list = $skill_list . ', ' . $row1['skill'];
                                                }
                                                $skill_list = substr($skill_list, 1, strlen($skill_list));
                                                ?>
                                                <p class="card-text"><?php echo $m_row['about']; ?></p>
                                                <p class="card-text mb-2"><?php echo $skill_list; ?></p>
                                                <button type='button' class='btn btn-info' name='doInsert'>View</button>
                                                <a href="./php/controll.php?pi=<?php echo $_GET['pi'].'&'.'mi='.$m_row['id']?>"><button type='submit' class='btn btn-primary' name='request_mentor'>Request</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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