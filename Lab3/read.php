<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/24/2017
 * Time: 6:43 PM
 */
require_once ("files/dbconn.php");
require_once ("files/corps.php");
include_once ("files/header.php");

$db = dbConn();

echo getCorps($db, $id);
include_once ("files/footer.php");
