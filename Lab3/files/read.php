<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/23/2017
 * Time: 11:06 AM
 */
function corpsTable($db){
    try{
        $sql = "SELECT * FROM corps";
        $sql = $db->prepare($sql);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0){
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corpo){
                $table .= "<tr><td>" . " Corporation: " . $corpo['corp'] . "</td><td>" . $corpo['incorp_dt'] . "</td><td>" . $corpo['email'] . "</td><td>" . $corpo['zipcode'] . "</td><td>" . $corpo['owner'] . "</td><td>" . $corpo['phone'] . "</td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><input type='submit' name='submit' value='Read' /></form></td>";
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