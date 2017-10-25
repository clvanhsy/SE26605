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


echo corpsTable($db);

include_once ("files/footer.php");


