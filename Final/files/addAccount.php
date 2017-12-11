<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/11/2017
 * Time: 7:51 AM
 */
function addAccount($db, $email, $phone, $heard, $contact, $comments )
{
    try
    {
        $sql = $db->prepare("INSERT INTO account VALUES (:email, :phone, :heard, :contact, :comments)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':heard', $heard);
        $sql->bindParam(':contact', $contact);
        $sql->bindParam(':comments', $comments);
        $sql->execute();
        echo $sql->rowCount() . "Rows Added.";
    }
    catch(PDOException $e)
    {
        die("Sorry there was an issue adding Data to the DataBase. ");
    }
}