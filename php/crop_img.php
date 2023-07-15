<?php
    session_start();
    if(isset($_POST["image"]))
    {
        include('../setting/dbconnection.php');
        $data = $_POST["image"];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.jpg';
        $folder = "../assets/profile_pic/".$imageName; 

        $put = file_put_contents($folder, $data);	
        $_SESSION['imageName'] = $imageName;
    }
