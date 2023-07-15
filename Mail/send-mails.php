<?php
session_start();
include('../setting/dbconnection.php');
$_SESSION['email-id'] = 'ementispot8@gmail.com';
$_SESSION['email-password'] = 'qzzlfodlrbqjtkbk';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['send-forget-mail'])) {
    $email = trim($_POST['email-forgot']);

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Encrypted Id
        $id = $row['id'];
        $cipher = "AES-128-CTR";
        $secret = '63267472837482';
        $options = 0;
        $iv = str_repeat("0", openssl_cipher_iv_length($cipher));
        $encrypted_id = openssl_encrypt($id, $cipher, $secret, $options, $iv);

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_SESSION['email-id'];
        $mail->Password = $_SESSION['email-password'];
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($_SESSION['email-id']);

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Hack Auth';
        $mail->Body =
            "
            <a href=http://localhost/HACKATHON/Mentor/php/forgot_password.php?id='$encrypted_id'>
                reset password or change password
            </a>
            ";
        $mail->send();

        $_SESSION['send-mail-s'] = "check your mail";
        header('Location: ../index.php');
    } else {
        $_SESSION['send-mail'] = "Your Email Address is Not Valid";
        header('Location: ../index.php');
    }
}


if (isset($_POST['btn-send'])) {
    $email = trim($_POST['email']);

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    $_SESSION['firstname'] = trim($_POST['firstname']);
    $_SESSION['lastname'] = trim($_POST['lastname']);
    $_SESSION['email'] = trim($_POST['email']);

    $password = trim($_POST['password']);
    $_SESSION['password'] = hash("sha512", $password);

    $randomNumber = rand(100000, 999999);
    $_SESSION['randomNumber'] = $randomNumber;

    if ($result->num_rows <= 0) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_SESSION['email-id'];
        $mail->Password = $_SESSION['email-password'];
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($_SESSION['email-id']);

        $mail->addAddress(trim($_POST['email']));

        $mail->isHTML(true);

        $mail->Subject = 'Hack Auth';
        $mail->Body = $randomNumber;

        $mail->send();

        echo
        "
                <script>
                    document.location.href = '../php/otp-form.php';
                </script>
            ";
    } else {
        $_SESSION['error_same_mail'] = "you have already registered";
        header("Location: ../register.php");
    }
}


if (isset($_POST['btn-otp'])) {
    $otp = trim($_POST['otp']);
    if ($otp == $_SESSION['randomNumber']) {

        $first_name = $_SESSION['firstname'];
        $last_name = $_SESSION['lastname'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $sql = "INSERT INTO register (first_name, last_name, `email`, `password`) 
                    VALUES ('$first_name', '$last_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../index.php');
            // unset($_SESSION['randomNumber']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['error_same_mail'] = "Invalid OTP Re-enter";
            header('Location: ../php/otp-form.php');
        }

        $conn->close();
    } else {
        $_SESSION['invalid_otp'] = "Invalid OTP Re-enter";
        header('Location: ../php/otp-form.php');
    }
}
