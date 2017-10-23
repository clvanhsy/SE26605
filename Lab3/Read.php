<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/23/2017
 * Time: 8:39 AM
 */
require_once ("files/dbconn.php");
require_once("files/read.php");
include_once ("files/header.php");

$db = dbConn();


echo corpsTable($db);
include_once ("files/footer.php");
