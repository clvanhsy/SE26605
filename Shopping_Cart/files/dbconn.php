<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/6/2017
 * Time: 9:30 PM
 */
Function dbConn()
{
    $dsn ="mysql:host=localhost;dbname=phpclassfall2017";
    $username = "corps";
    $password = "se266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }// End of Try Statement
    catch (PDOException $e){
        die("There was a problem connecting to the DataBase. ");
    }// End of Catch Statement
}// End of dbConn Function
