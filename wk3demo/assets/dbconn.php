<?php
/** Created by PhpStorm **/
function dbConn()
{
    $dsn = "mysql:host=localhost;dbname=dogs";
    $username = "dogs";
    $password = "se266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // If There is an issue throw it down to the catch
        return $db;
    } catch (PDOException $e){
        die("There was a problem connecting to the DataBase.");
    }
}

?>