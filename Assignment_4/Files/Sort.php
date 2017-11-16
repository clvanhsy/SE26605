<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 8:51 PM
 */
require_once ("dbconn.php");
require_once ("corps.php");

$db = dbConn();
$cols = getColumnNames($db, 'corps');
$drop = dropDown($cols);
?>

<form method="get" action="#">
    <p> Sort Column: </p>
    <select name="col" value="">
        <?php echo $drop ?>
    </select>
    <p> Ascending: <input type="radio" name="dir" value="ASC" /> </p>
    <p> Descending: <input type="radio" name="dir" value="DESC" /> </p>
    <input type="submit" value="sort" />
    <input type="hidden" name="submit" value="sort" />
    <input type="submit" name="submit" value="reset" />
</form>
