<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/18/2017
 * Time: 9:44 AM
 */


function addActors($db, $firstname, $lastname, $dob, $height){
    try{
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        return $sql->rowCount();
    }// End of Try Statement
    catch(PDOException $e){
        die("There was a problem adding Data. ");
    }// End of Catch Statement
}// End of addActors Function