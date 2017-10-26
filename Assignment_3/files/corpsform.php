<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 9:59 AM
 */

require_once ("dbconn.php");
require_once ("corps.php");
include_once ("header.php");

$db = dbConn();


$corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";

switch ($submit){
    case "Add":
        addCorps($db, $corp, $email, $zipcode, $owner, $phone);
        break;
}

?>


<form method="post" action="#">
    <h2> Create A Corporation </h2>
    <p> Corporation: </p> <input type="text" name="corp" value=" "/>
    <br />
    <p> Email: </p> <input type="text" name="email" value="" />
    <br />
    <p> Zipcode: </p> <input type="text" name="zipcode" value="" />
    <br />
    <p> Owner: </p> <input type="text" name="owner" value="" />
    <br />
    <p> Phone Number: </p> <input type="text" name="phone" value="" />
    <br /><br />
    <input type="submit" id="corporation" name="submit" value="Add" />
</form>
<br/><br/>
<a href="../index.php"> Return </a>
<?php include_once ("footer.php"); ?>