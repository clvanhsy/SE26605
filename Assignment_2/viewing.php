<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/18/2017
 * Time: 10:42 AM
 */
require_once("assets/dbconn.php");
require_once ("assets/view.php");
include_once("assets/header.php");

$db = dbConn();

echo actorsTable($db);
include_once("assets/footer.php");
