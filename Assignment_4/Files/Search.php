<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 8:37 PM
 */
require_once ("dbconn.php");
require_once ("corps.php");

$db = dbConn();
$cols = getColumnNames($db, 'corps');
$drop = dropDown($cols);
?>

<form method="get" action="#">
    <p> Search Column: </p>
    <select name="colSearch">
        <?php echo $drop ?>
    </select>
    <p> Term: <input type="text" name="search" value="" /> </p>
    <input type="submit" value="search" />
    <input type="hidden" name="submit" value="search" />
    <input type="submit" name="submit" value="reset" />
</form>
