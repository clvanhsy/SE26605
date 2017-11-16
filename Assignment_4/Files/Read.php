<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 3:36 AM
 */
require_once ("dbconn.php");
require_once ("corps.php");
include_once ("Header.php");

$db = dbConn();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? null;

echo getCorps($db, $id);
?>

<a href="../index.php"> Return </a>

<?php include_once ("Footer.php"); ?>