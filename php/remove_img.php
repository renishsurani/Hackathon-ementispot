<?php
    require("../setting/dbconnection.php");

    $id = $_GET['i'];
    $update = "UPDATE register SET `profile_img` = NULL WHERE `id` = '$id'";
    if ($conn->query($update) === TRUE) {
        $_SESSION['profile_updated'] = 'Profile has been Updated';
        header('Location: ../users-profile.php');
    }
?>