
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Shopping Cart </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<header>
    <h1 style="font-family: 'Lucida Handwriting'; color: #2a5d84; text-align: center; border-bottom: solid 2px; border-bottom-color: black " > Shopping Cart </h1>
    <nav>

    </nav>
</header>
<?php
include_once ("../MGRControls.php");
$tool = Nav("Shop") . " " . Nav("Manage");
if(isset($_SESSION['cartitems']))
{
    $tool .= Nav('Cart') . "<br/>";
}
$tool .= Nav('Log Out');
if($_SESSION['access'] == 1)
{
    $submit = filter_input(INPUT_POST,'submit');
    echo $tool;
    switch ($submit)
    {
        case "Shop":
            header("Location: ./MGRControls.php");
            break;
        case "Manage":
            header("Location: ./AdminPage.php");
            break;
        case 'Cart':
            header("Location: ./cartAdd.php?action=in");
            break;
        case 'Log Out':
            $_SESSION['access'] = false;
            header('Location: ./index.php');
            break;
        default:
            break;
    }
}
else
{
    header("Location: /index.php");
}
session_abort();

?>
<section>