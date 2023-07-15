<?php
session_start();
include("../setting/dbconnection.php");
if(isset($_POST['doInsert'])) {
    $title = trim($_POST["prj_title"]);
    $desc = trim($_POST["prj_desc"]);
    $tool = trim($_POST["prj_tool_tech"]);
    $domain = trim($_POST["prj_domain"]);
    $id = $_SESSION['user_id'];

    $ins = "INSERT INTO project_details (prj_title,prj_desc,prj_tool_tech,prj_domain,delete_status,std_id) VALUES ('$title','$desc','$tool','$domain',1,$id)";
    if($conn->query($ins)) {
        $_SESSION['project_add'] = "Project Added Successfully";
        header("Location: ../view_project.php");
    }else{
        $_SESSION['project_add_err'] = "Add Again!!!";
        header("Location: ../add_new_project.php");
    }
}

if(isset($_POST['project_delete'])){
    $project_id = $_POST['project_id'];
    $sql = "UPDATE project_details SET delete_status = 0 WHERE prj_id = $project_id";
    if ($conn->query($sql)) {
        // $_SESSION['project_add'] = "Project Added Successfully";
        header("Location: ../view_project.php");
    } else {
        // $_SESSION['project_add_err'] = "Add Again!!!";
        header("Location: ../0.php");
    }
}

if (isset($_POST['updatepro'])) {
    $pid = $_GET['p'];
    $title = trim($_POST["prj_title"]);
    $desc = trim($_POST["prj_desc"]);
    $tool = trim($_POST["prj_tool_tech"]);
    $domain = trim($_POST["prj_domain"]);
    $id = $_SESSION['user_id'];

    $ins = "UPDATE project_details SET prj_title = '$title', prj_desc = '$desc',prj_tool_tech = '$tool',prj_domain = '$domain' WHERE prj_id = $pid";
    if ($conn->query($ins)) {
        $_SESSION['project_add'] = "Project Update Successfully";
        header("Location: ../view_project.php");
    } else {
        $_SESSION['project_add_err'] = "Update Again!!!";
        header("Location: ../add_new_project.php?p=$pid");
    }
}
?>
