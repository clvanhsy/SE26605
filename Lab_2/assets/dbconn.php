<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/17/2017
 * Time: 9:44 PM
 */
function dbConn()
{
    $dsn ="mysql:host=localhost;dbname=phpclassfall2017";
    $username= "actors";
    $password = "se266";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // If There is an issue throw it down to the catch
        return $db;
    }// End of Try Statement
     catch (PDOException $e){
        die(" There was a problem connecting to the DataBase.");
    }// End of Catch Statement
}// End of dbConn Function