<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 1:15 AM
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

Function getColumnNames($db, $tbl)
{
    $sql = "select column_name from information_schema.columns where lower(table_name)=lower('". $tbl . "')";
    $stmt = $db->prepare($sql);
    try {
        if($stmt->execute()):
            $raw_column_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($raw_column_data as $outer_key => $array):
                foreach($array as $inner_key => $value):
                    if (!(int)$inner_key):
                        $column_names[] = $value;
                    endif;
                endforeach;
            endforeach;
        endif;
    } catch (Exception $e){
        die("There was a problem retrieving the column names");
    }// End of Catch Statement
    return $column_names;
}
