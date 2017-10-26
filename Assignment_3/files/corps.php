<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 9:55 AM
 */

function addCorps($db, $corp, $email, $zipcode, $owner, $phone){
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, now(), :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        echo $sql->rowCount() . " rows added. ";
    }// End of Try Statement
    catch(PDOException $e){
        die(" Sorry there was a problem adding Data to the Database. ");
    }// End of Catch Statement
}// End of addCorps Function
