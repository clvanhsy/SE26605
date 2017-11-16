<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 9:36 PM
 */
require_once ("dbconn.php");
require_once ("corps.php");
include_once ("Search.php");
include_once ("Sort.php");

$db = dbConn();

$submit = filter_input(INPUT_GET,'submit', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST,'submit', FILTER_SANITIZE_STRING) ?? NULL;
$dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? NULL;
$col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? NULL;
$colSearch = filter_input(INPUT_GET, 'colSearch', FILTER_SANITIZE_STRING) ?? NULL;
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) ?? NULL;
?>

<a href="Adding.php"> Add </a>
<br/>
<a href="../index.php" > Return </a>

<?php

switch ($submit)
{
    case 'reset':
        include_once ("Header.php");
        $corps = retrieveCorps($db);
        echo viewAllTable($db, $cols);
        break;
    case 'sort':
        include_once ("Header.php");
        $corps = getCorpsAsSortedTable($db, $col, $dir);
        $cols = getColumnNames($db, 'corps');
        echo viewAllTable($db, $cols);
        break;
    case 'search':
        include_once ("Header.php");
        $cols = getColumnNames($db, 'corps');
        echo viewAllSearchCorp($db, $cols, $colSearch, $search);
        break;
    default:
        include_once ("Header.php");
        $corps = retrieveCorps($db);
        $cols = getColumnNames($db, 'corps');
        echo viewAllTable($db, $cols = null);
        break;
}

include_once ("Footer.php");
?>
