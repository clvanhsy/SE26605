<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 10:10 PM
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
                $table .= "<tr><td>" . " Companies: " . " " . $corpo['corp'] . "</td><td>";
                $table .= "<td><form method='get' action='#'><a href='files/read.php?id=" . $corpo['id']." '> Read </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='files/delete.php?id=" . $corpo['id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='files/update.php?id=" . $corpo['id']." '> Update </a></form></td>";
                $table .= "</tr>";

            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><a href='files/corpsform.php'> Create </a></form></td>";

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