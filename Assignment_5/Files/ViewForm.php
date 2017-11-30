<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/30/2017
 * Time: 12:49 AM
 */
require_once("Components.php");
require_once ("dbconn.php");

$db = dbConn();

$Submit = filter_input(INPUT_GET, 'Submit', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'Submit', FILTER_SANITIZE_STRING) ?? NULL;
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? NULL;

$DD = sitesDropDown($db);
?>

<form method="get" action="#">
    <h1>Websites: </h1>
    <select name="url" value="">
        <?php echo $dropDown ?> <!-- call function to make dropdown menu -->
    </select>
    <input type="Submit" name="Submit" value="view links">
</form>