<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/17/2017
 * Time: 9:56 PM
 */
require_once("assets/dbconn.php");
require_once("assets/actors.php");
include_once("assets/header.php");


$db = dbConn();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstname = filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST,'height', FILTER_SANITIZE_STRING) ?? "";

include_once("assets/actorsform.php");
include_once ("assets/footer.php");