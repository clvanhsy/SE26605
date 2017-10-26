<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 9:52 PM
 */

$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT) ?? null;

require_once ("dbconn.php");

$db = dbConn();

function deleteCorps($db, $id){
    try{
        $sql = $db->prepare("DELETE FROM corps WHERE id= :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        echo $sql->rowCount() . " row deleted";
    } // End of Try statement
    catch(PDOException $e)
    {
        die(" There was a problem in deleting the Data. ");
    }// End of Catch Statement
}

echo(deleteCorps($db,$id));
?>
<br/><br/>
<a href="../index.php"> Return </a>