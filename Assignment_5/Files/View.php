<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/30/2017
 * Time: 12:43 AM
 */
include_once ("Header.php");
require_once ("Components.php");
require_once ("dbconn.php");

$db = dbConn();

$Submit = filter_input(INPUT_GET, 'Submit', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'Submit', FILTER_SANITIZE_STRING) ?? NULL;
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? NULL;

include_once ("ViewForm.php");

switch ($Submit)
{
    case 'Links':
        include_once ("Header.php");
        $Key = getKey($db, $url);
        $rowCount = rowCountforLinks($db, $Key);
        echo StoreData($db, $url, $rowCount);
        echo DDLinks($db, $Key);
        include_once ("Footer.php");

}
?>