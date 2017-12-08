<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/7/2017
 * Time: 2:36 AM
 */
include_once ("login.php");
include_once ("files/dbconn.php");
$db = dbConn();

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? NULL;
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? "";
$confirm = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_STRING) ?? "";

switch ($submit)
{
    default:
        $new = regUser("Login");
        $new .= AddUser2();
        echo $new;
        break;
    case "Login":
        header("Location: index.php");
        break;
    case "submit":
        if($password == $confirm) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "<h2>Invalid email format</h2>";
                echo AddUser2($email, $password, $confirm);
                echo $emailErr;
                $new = regUser("Login");
                echo $new;
            }
            else
            {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $users = NewStored($db, $email, $hash);
                $new = regUser("Login");
                echo $new;
                echo AddUser2();
                echo $users;
            }
        }
        else
        {
            echo AddUser2($email, $password, $confirm);
            echo "Password does not match each other.";
        }


}