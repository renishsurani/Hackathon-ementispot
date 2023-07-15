<?php
session_start();
if (isset($_POST['btn-update'])) {
    include('../setting/dbconnection.php');
    $id = $_GET['id'];
    // Decrypt the encrypted_id
    $cipher = "AES-128-CTR";
    $secret = '63267472837482';
    $options = 0;
    $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

    $decrypted_id = openssl_decrypt($id, $cipher, $secret, $options, $iv);
    $password = hash("sha512", trim($_POST['password']));
    // echo ;
    $update = "UPDATE register SET `password` = '$password' WHERE `id` = '$decrypted_id'";
    if ($conn->query($update) === TRUE) {
        $_SESSION['pass_reseted'] = 'Password Success Fully Reset';
        echo "<script> window.location.href = '../index.php'; </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// if (isset($_POST['btn-login'])) {
//     include('../setting/dbconnection.php');
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $verify = hash('sha512', $password);

//     $sql1 = "SELECT * FROM register WHERE email = '$email'";
//     $result1 = $conn->query($sql1);

//     if ($result1->num_rows > 0) {

//         $sql = "SELECT * FROM register WHERE email = '$email' and password = '$verify'";
//         $result = $conn->query($sql);
//         if ($result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             $_SESSION['success_login'] = 'log in successfull';
//             $_SESSION['user_id'] = $row['id'];
//             header("Location: ../dashboard.php");
//         } else {
//             $_SESSION['error_notvalid_mail'] = 'not validate password';
//             header("Location: ../index.php");
//         }
//     } else {
//         $_SESSION['error_notvalid_mail'] = 'not validate email';
//         header("Location: ../index.php");
//     }
// }


if (isset($_POST['btn-login'])) {
    include('../setting/dbconnection.php');
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $verify = hash('sha512', $password);

    $sql1 = "SELECT * FROM register WHERE email = '$email'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $sql = "SELECT * FROM register WHERE email = '$email' and password = '$verify'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $id = $row['id'];
            $cipher = "AES-128-CTR";
            $secret = 'cookie-ssip-2022-secret-key';
            $options = 0;
            $iv = str_repeat("0", openssl_cipher_iv_length($cipher));
            $userid = openssl_encrypt($id, $cipher, $secret, $options, $iv);

            if (isset($_POST['rememberme'])) {
                $days = 30;
                setcookie("rememberme", $userid, time() + ($days *  24 * 60 * 60 * 1000), '/');
            }

            // if(isset($_COOKIE['rememberme'])){
            $id1 = $userid;
            $cipher1 = "AES-128-CTR";
            $secret1 = 'cookie-ssip-2022-secret-key';
            $options1 = 0;
            $iv1 = str_repeat("0", openssl_cipher_iv_length($cipher1));
            $_SESSION['user_id'] = openssl_decrypt($id1, $cipher1, $secret1, $options1, $iv1);
            $_SESSION['success_login'] = 'log in successfull';
            header('Location: ../dashboard.php');
            // }

        } else {
            $_SESSION['error_notvalid_mail'] = 'not validate password';
            header("Location: ../index.php");
        }
    } else {
        $_SESSION['error_notvalid_mail'] = 'not validate email';
        header("Location: ../index.php");
    }
}

if (isset($_POST['post_btn'])) {
    include('../setting/dbconnection.php');
    $post = trim($_POST['post_name']);

    $id = $_SESSION['user_id'];
    $update = "UPDATE register SET `post` = '$post' WHERE `id` = '$id'";
    if ($conn->query($update) === TRUE) {
        // $_SESSION['pass_reseted'] = 'Password Success Fully Reset';
        // echo "<script> window.location.href = '../index.php'; </script>";
        header('Location: ../users-profile.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_POST['edit_profile_btn'])) {
    include('../setting/dbconnection.php');
    $id = $_SESSION['user_id'];

    if(isset($_SESSION['imageName'])){
        $imageName = $_SESSION['imageName'];
        $update = "UPDATE register SET `profile_img` = '$imageName' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }

    if ($_POST['firstname'] != '') {
        $f_name = trim($_POST['firstname']);
        $update = "UPDATE register SET `first_name` = '$f_name' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if ($_POST['lastname'] != '') {
        $l_name = trim($_POST['lastname']);
        $update = "UPDATE register SET `last_name` = '$l_name' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }

    if ($_POST['about'] != '') {
        $about = trim($_POST['about']);
        $update = "UPDATE register SET `about` = '$about' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }

    if ($_POST['twitter'] != '') {
        $twitter = trim($_POST['twitter']);
        $update = "UPDATE register SET `twitter_link` = '$twitter' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if ($_POST['facebook'] != '') {
        $facebook = trim($_POST['facebook']);
        $update = "UPDATE register SET `facebook_link` = '$facebook' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if ($_POST['instagram'] != '') {
        $instagram = trim($_POST['instagram']);
        $update = "UPDATE register SET `instagram_link` = '$instagram' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if ($_POST['linkedin'] != '') {
        $linkedin = trim($_POST['linkedin']);
        $update = "UPDATE register SET `linkedin_link` = '$linkedin' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if (isset($_POST['skills_array'])) {
        $delete = "DELETE FROM skills WHERE user_id = $id";
        $conn->query($delete);
        if ($conn->query($delete) == TRUE && $_POST['skills_array'] != '') {
            $skills_array = $_POST['skills_array'];
            $array = explode(",", $skills_array);
            for ($i = 0; $i < count($array); $i++) {
                $update = "INSERT into skills(user_id, skill) VALUES ($id, '" . $array[$i] . "')";
                $result = $conn->query($update);
            }
            if ($result === TRUE) {
                $_SESSION['profile_updated'] = 'Profile has been Updated';
                header('Location: ../users-profile.php');
            }
        } else {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
    if ($_POST['university'] != '') {
        $university = trim($_POST['university']);
        $update = "UPDATE register SET `university_id` = '$university' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }

    if ($_POST['phone'] != '') {
        $phone = trim($_POST['phone']);
        $update = "UPDATE register SET `p_no` = '$phone' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }

    if(isset($_POST['line1'])){
        $line1 = trim($_POST['line1']);
        $line2 = trim($_POST['line2']);
        $city = trim($_POST['city']);
        $pin = trim($_POST['pin']);
        $district = trim($_POST['district']);
        $state = trim($_POST['state']);
        $update = "UPDATE register SET `a_line1` = '$line1', `a_line2` = '$line2', `a_city` = '$city', `a_pin` = '$pin', `a_district` = '$district',`a_state` = '$state' WHERE `id` = '$id'";
        if ($conn->query($update) === TRUE) {
            $_SESSION['profile_updated'] = 'Profile has been Updated';
            header('Location: ../users-profile.php');
        }
    }
}


if(isset($_POST['change_pass_u'])){
    include('../setting/dbconnection.php');
    $newpass = trim($_POST['newpassword']);
    $pass = hash('sha512', $newpass);
    $renewpass = trim($_POST['renewpassword']);
    $currentpass = trim($_POST['currentpass']);
    $cpass = hash('sha512', $currentpass);
    $id = $_SESSION['user_id'];
    $sql1 = "SELECT * FROM register WHERE id = $id";
    // echo $sql1;
    // exit(0);
    $res = $conn->query($sql1);
    $row = $res->fetch_assoc();
    if($row['password'] == $cpass){
        if ($newpass == $renewpass) {
            $update = "UPDATE register SET `password` = '$pass' WHERE `id` = $id";
            if ($conn->query($update) === TRUE) {
                $_SESSION['profile_updated'] = 'Password Success Fully Reset';
                header('Location: ../users-profile.php');
            } else {
                $_SESSION['profile_updated_error'] = 'Try Again...';
            }
        } else {
            $_SESSION['profile_updated_error'] = 'Try Again...';
            header('Location: ../users-profile.php');
        }
    } else{
        $_SESSION['profile_updated_error'] = 'Invalid Current Password';
        header('Location: ../users-profile.php');
    }
    
}

if(isset($_GET['pi']) && isset($_GET['mi'])){
    include('../setting/dbconnection.php');
    $p_id = $_GET['pi'];
    $m_id = $_GET['mi'];

    $sql = "INSERT INTO groups (project_id, user_id) VALUES ($p_id,$m_id)";
    if($conn->query($sql)){
        header('Location: ../view_project.php');
    }
}