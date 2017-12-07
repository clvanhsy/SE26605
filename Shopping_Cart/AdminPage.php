<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Control Center</title>
</head>
<body>
<?php
include_once ("files/dbconn.php");
include_once ("MGRControls.php");
include_once ("files/header.php");

$submit = filter_input(INPUT_GET,'submit', FILTER_SANITIZE_STRING);

session_start();
$db = dbConn();
$email = $_SESSION['username'];
$email = email($db, $email);

echo "User:" . $email . "Welcome to the control center";

$tool = Nav2("New Category") . " " . Nav2("Update Category") . " " . Nav2(" New Merch") . " " . Nav2("Update Merch");

switch ($submit)
{
    default:
        echo $tool;
        break;
    case "New Category":
        echo $tool;
        echo AddCatFrom();
        break;
    case "Update Category":
        echo $tool;
        echo viewCat($db);
        break;
    case "New Merch":
        echo $tool;
        include_once 'addItem.php';
        break;
    case "Update Merch":
        echo $tool;
        echo viewItems($db);
        break;
    case "Add Category":
        echo $tool;
        echo AddCatFrom();
        echo AddCatagory($db);
        break;
}
?>
</body>
</html>