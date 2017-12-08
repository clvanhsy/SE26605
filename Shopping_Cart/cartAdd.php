<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/7/2017
 * Time: 1:31 PM
 */
include_once ("files/dbconn.php");
include_once ("files/header.php");
include_once ("files/clientControls.php");

$db = dbConn();
$id = filter_input(INPUT_GET,'id');
$submit = filter_input(INPUT_GET, 'submit');
$numItems = 0;

session_start();
if($submit != "in")
{
    if(!isset($_SESSION['cartitems']))
    {
        $_SESSION['cartitems'][] = $id;
    }
    else
    {
        $_SESSION['cartitems'][] .= $id;
    }
    $numItems = 0;

    echo "<h1> Cart </h1>";
    if($_SESSION['cartitems'] > 0)
    {
        foreach ($_SESSION['cartitems'] as $cartitem)
        {
            if(isset($cartitem))
            {
                echo viewCart($db, $cartitem);
                $numItems++;
            }
            else
            {
                echo "0 items in your cart.";
            }
        }

    }
    else
    {
        echo "0 items in your cart.";
    }
}

switch ($submit)
{
    default:
        $_SESSION['totalNow'] = Total($db, $id, $_SESSION['totalNow']);
        $_SESSION['totalBefore'] = $_SESSION['totalNow'];
        break;
    case "erase":
        unset($_SESSION['cartitems']);
        $_SESSION['cartitems'];
        $_SESSION['none'] = 0;
        header("Location: clientSide.php");
        break;
    case "view":
    $_SESSION['none']++;
    $_SESSION['totalBefore'] = $_SESSION['totalNow'];
    echo  "<h1> Cart </h1> ";
    if ($_SESSION['cartitems'] > 0)
    {
        foreach ($_SESSION['cartitems'] as $cartitem)
        {
            if(isset($cartitem) )
            {
                echo viewCart($db, $cartitem);
                $numItems++;
            }
            else
            {
                echo " 0 items in your cart.";
            }
        }
    }
    else
    {
        echo " 0 items in your cart.";
    }
    break;
}

echo " Total: $" . $_SESSION['totalNow'] . "<br> Items: " . $numItems;
echo EmptyCart();
echo "<a href= clientSide.php> Continue Shopping </a>";
