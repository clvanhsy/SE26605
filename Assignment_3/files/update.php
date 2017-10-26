<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 10:18 PM
 */
$id=filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
require_once ("dbconn.php");
require_once ("corps.php");
include_once ("header.php");

$db = dbConn();


$corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT) ?? null;
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";

$Btn = "Add";
switch ($submit){
    case "Add":
        addCorps($db, $corp, $email, $zipcode, $owner, $phone);
        break;
    case "Update":
        updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id);
        $Btn = "Add";
        break;

}


function updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id)
{
    try {
        $sql = $db->prepare("UPDATE corps SET corp= :corp, email= :email, zipcode= :zipcode, owner= :owner, phone= :phone WHERE id= :id");
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
        $sql->bindParam(':id', $id);
        $sql->execute();
        echo $sql->rowCount() . " row was updated. ";
    }catch (PDOException $e){
        die("There was a problem in Updating the data. ");
    }
}

?>

<form method="post" action="#">
    <h2> Create A Corporation </h2>
    <p> Corporation: </p> <input type="text" name="corp" value="<?php echo $corpo['corp']; ?> "/>
    <br />
    <p> Email: </p> <input type="text" name="email" value="<?php echo $corpo['email']; ?>" />
    <br />
    <p> Zipcode: </p> <input type="text" name="zipcode" value="<?php echo $corpo['zipcode']; ?>" />
    <br />
    <p> Owner: </p> <input type="text" name="owner" value="<?php echo $corpo['owner']; ?>" />
    <br />
    <p> Phone Number: </p> <input type="text" name="phone" value="<?php echo $corpo['phone']; ?>" />
    <br /><br />
    <input type="submit" id="corporation" name="submit" value="<?php echo $Btn ?>" />
</form>

<br/><br/>
<a href="../index.php"> Return </a>