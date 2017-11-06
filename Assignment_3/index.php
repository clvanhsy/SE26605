<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 10:00 AM
 */
require_once ("files/dbconn.php");
require_once ("files/view.php");
include_once("files/header.php");

$db = dbConn();

echo corpsTable($db);
include_once ("files/footer.php");
