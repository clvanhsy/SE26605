<!DOCTYPE html>

<?php
session_start();
include_once ("dbconn.php");
$db = dbConn();
$username = "corps";
$password = "se266";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
    header("Location: index.php");
}// End of First If Statement
if(isset($_POST['username']) && isset($_POST['password']))
{
    if ($_POST['username'] == $username && $_POST['password'] == $password)
        $_SESSION['logged_in'] = true;
    header("Location: index.php");
}// End of If Statment


?>
<html lang="en">
<body>

<form method="post" action="login.php">

    <label>Username:<br/></label>
    <input type="text" name="username"><br/>

    <label>Email:<br/></label>
    <input type="text" name="email"><br/>

    <label>Password:<br/></label>
    <input type="password" name="password_1"><br/>

    <label>Confirm Password:<br/></label>
    <input type="password" name="password_2">
    <br/><br/>
    <input type="submit" value="Login">

</form>
</body>
</html>