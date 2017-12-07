<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/7/2017
 * Time: 2:56 AM
 */
include_once ("files/dbconn.php");
include_once ("MGRControls.php");

$db = dbConn();
$email = $_SESSION['username'];
$email = email($db, $email);

$submit = filter_input(INPUT_GET, 'submit', FILTER_SANITIZE_STRING) ?? "";
$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING) ?? false;

if(isset($_SESSION['cartitems']))
{
    echo "<a href='cartAdd.php?action=in'><button>View Cart</button></a></td>";
}

switch ($submit)
{
    default:
        $show = getCat($db);
        break;
    case "Search":
        $show = getCat($db);
        break;
    case "Reset":
        $show = getCat($db);
        break;
}