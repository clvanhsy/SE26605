<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
session_start();
$_SESSION['pageload'] = 0;
$_SESSION['totalNow'] = 0;
$_SESSION['none'] = 0;

unset($_SESSION['cartItems']);
include_once ("login.php");
include_once ("files/dbconn.php");

$submit = filter_input(INPUT_POST,'submit', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$prePass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$db = dbConn();

switch ($submit)
{
    case 'submit':
        $hash = password_hash($prePass, PASSWORD_DEFAULT);
        $valid = ckUser($db, $email, $prePass, $hash);

        if($valid > 0) {
            $_SESSION['username'] = $valid;
            $_SESSION['access'] = true;
            header('Location: AdminPage.php');
        }
        if($valid == -1) {
            $_SESSION['access'] = false;
            $form = regUser("Register");
            $form .= loginForm($email, $prePass);
            echo $form;
            echo "Incorrect Password";
        }
        if($valid == 0) {
            $_SESSION['access'] = false;
            $form = regUser("Register");
            $form .= loginForm($email, $prePass);
            echo $form;
            echo "User doesn't exist";
        }
        if($valid == -2) {
            $_SESSION['access'] = false;
            $form = regUser("Register");
            $form .= loginForm($email, $prePass);
            echo $form;
            echo "We had a problem getting into the database";
        }
        break;
    case 'Register':
        header("Location: regUser.php");
        break;
    default:
        $_SESSION['access'] = false;
        $newpage = "Register";
        $form = regUser($newpage);
        $form .= loginForm();
        echo $form;
        break;

}

?>
</body>
</html>