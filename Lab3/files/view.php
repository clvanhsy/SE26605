<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/23/2017
 * Time: 9:00 AM
 */
function corpsTable($db){

    try{
        $sql = "SELECT corp FROM corps";
        $sql = $db->prepare($sql);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0){
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corpo){
                $table .= "<tr><td>" . " Corporation: " . " " . $corpo['corp'] . "</td><td>";
                $table .= "</tr>";
            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
        }// End of If Statement
        else {
            $table = "There is no Data at the Moment." . PHP_EOL;
        }// End of End Statement
        return $table;
    }// End of Try Statement
    catch (PDOException $e){
        die("There was a problem retrieving Data from the DataBase ");
    }// End of Catch Statement
}// End of the corpsTable Function