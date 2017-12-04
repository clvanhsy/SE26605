<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/4/2017
 * Time: 11:26 AM
 */
function ProTable($db){
    try{
        $sql = "SELECT * FROM ";
        $sql = $db->prepare($sql);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){
                $table .= "<tr><td>" . " Companies: " . " " . $corp['corp'] . "</td><td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Read.php?id=" . $corp['id']." '> Read </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Delete.php?id=" . $corp['id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Update.php?id=" . $corp['id']." '> Update </a></form></td>";
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
}// End of the ProTable Function