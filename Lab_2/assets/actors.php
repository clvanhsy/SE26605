<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/17/2017
 * Time: 9:14 PM
 */
function addActor($db, $firstname, $lastname, $dob, $height){
    try{
            $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
            $sql->bindParam(':firstname', $firstname);
            $sql->bindParam(':lastname', $lastname);
            $sql->bindParam(':dob', $dob);
            $sql->bindParam(':height', $height);
            $sql->execute();
            echo $sql->rowCount() . " Row Inserted "; // Shows that the data has been entered into the DataBase

        }// End of Try statement
    catch (PDOException $e){
        die("There was a problem adding Actor/Actress.");
    }// End of Catch statement
}// End of addActor function