<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/30/2017
 * Time: 12:39 AM
 */
require_once ("dbconn.php");
$db = dbConn();
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? NULL;
?>

<form method="get" action="#">
    <p> Websites: </p>
    <p> <input type="text" name="url" value="<?php echo $url ?>" /> </p>
    <p> <input type="Submit" name="Submit" value="Submit" /> </p>
</form>
