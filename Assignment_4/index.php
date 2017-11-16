<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 1:11 AM
 */
require_once ("Files/dbconn.php");
require_once ("Files/corps.php");
include_once ("Files/Search.php");
include_once ("Files/Sort.php");

$db = dbConn();

$submit = filter_input(INPUT_GET,'submit', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST,'submit', FILTER_SANITIZE_STRING) ?? NULL;
$dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? NULL;
$col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? NULL;
$colSearch = filter_input(INPUT_GET, 'colSearch', FILTER_SANITIZE_STRING) ?? NULL;
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) ?? NULL;
?>

<a href="Files/Adding.php"> Add </a>
<br/>
<a href="Files/View.php" > View </a>

<?php

switch ($submit)
{
    case 'reset':
        include_once ("Files/Header.php");
        $corps = retrieveCorps($db);
        echo corpsTable($db);
        break;
    case 'sort':
        include_once ("Files/Header.php");
        $corps = getCorpsAsSortedTable($db, $col, $dir);
        $cols = getColumnNames($db, 'corps');
        echo corpsTable($db);
        break;
    case 'search':
        include_once ("Files/Header.php");
        $cols = getColumnNames($db, 'corps');
        echo viewAllSearchCorp($db, $cols, $colSearch, $search);
        break;
    default:
        include_once ("Files/Header.php");
        $corps =retrieveCorps($db);
        $cols = getColumnNames($db, 'corps');
        echo corpsTable($db);
        break;
}

include_once ("Files/Footer.php");
?>
