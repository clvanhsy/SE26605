<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 9:08 PM
 */
$id=filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";
require_once ("dbconn.php");
require_once ("corps.php");
include_once ("Header.php");

$db = dbConn();


$corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";


switch ($submit){
    case "Update":
        $corpo = updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id);
        break;

}


function updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id)
{
    try {
        $sql = $db->prepare("UPDATE corps SET corp=:corp, email=:email, zipcode=:zipcode, owner=:owner, phone=:phone WHERE id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);

        $sql->execute();
        echo $sql->rowCount() . " row was updated. ";
    }// End of Try Sata
    catch (PDOException $e)
    {
        die("There was a problem in Updating the data. ");
    }// End of Catch Statement
}// End of Update Function

$sql = $db->prepare("SELECT * FROM corps WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute();
$corps = $sql->fetchAll(PDO::FETCH_ASSOC);

try {
    foreach ($corps as $corp) {
        $form = "<form method='post' action=''>";
        $form .= "<label for='corp'>Corporation: </label><input type='text' name='corp' value='" . $corp['corp'] . "' /><br />";
        $form .= "<label for='email'>Email: </label><input type='text' name='email' value='" . $corp['email'] . "' /><br />";
        $form .= "<label for='zipcode'>Zipcode: </label><input type='text' name='zipcode' value='" . $corp['zipcode'] . "' /><br />";
        $form .= "<label for='owner'>Owner: </label><input type='text' name='owner' value='" . $corp['owner'] . "' /><br />";
        $form .= "<label for='phone'>Phone: </label><input type='text' name='phone' value='" . $corp['phone'] . "'/> <br />";
        $form .= "<input type='submit' name='submit' value='Update'/> <br />";
    }
    $form .= "</form>";
    echo ($form);
}catch(PDOException $e)
{
    die("There was a problem in the update");
}
?>


<a href="../index.php"> Return </a>
<?php include_once ("Footer.php"); ?>
