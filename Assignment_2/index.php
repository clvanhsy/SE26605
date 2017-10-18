<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/18/2017
 * Time: 9:27 AM
 */
require_once ("assets/dbconn.php");
require_once ("assets/actors.php");
include_once ("assets/header.php");

$db = dbConn();

$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";
$submit = filter_input(INPUT_POST,'submit', FILTER_SANITIZE_STRING) ?? "";

switch($submit){
    case "Add":
        addActors($db, $firstname, $lastname, $dob, $height);
}

echo actorsTable($db);
include_once ("assets/actorsform.php");
include_once ("assets/footer.php");
?>

