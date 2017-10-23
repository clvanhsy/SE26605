<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/22/2017
 * Time: 12:27 AM
 */
require_once ("files/dbconn.php");
require_once ("files/corps.php");
include_once ("files/header.php");

$db = dbConn();

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT) ?? null;

$Btn = "Add";
switch ($submit){
    case "Add":
        addCorps($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        break;
    case "Edit":
        $corpo = getCorps($db, $id);
        $Btn = "Update";
        echo $Btn;
        break;
    case "Update":
        break;
    case "Delete":
        break;

}// End of Switch Statement

echo corpsTable($db);
include_once ("files/corpsform.php");
include_once ("files/footer.php");


