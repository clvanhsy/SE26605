<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 1:12 AM
 */

require_once ("dbconn.php");
require_once ("corps.php");
include_once ("Header.php");
require_once ("corpsForm.php");

$button = "Add";

$db = dbConn();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? null;
$submit = filter_input(INPUT_GET, 'submit', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";

switch ($submit){
    case "Add":
        addCorps($db, $corp, $email, $zipcode, $owner, $phone);
        break;
}
?>

<a href="../index.php"> Return </a>

<?php include_once ("Footer.php"); ?>
