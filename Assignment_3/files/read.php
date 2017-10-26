<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 8:58 PM
 */

$id=filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? "";

require_once ("dbconn.php");
$db = dbConn();

function getCorps ($db, $id){
    try{
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id"); // Select all from corps table
        $sql->bindParam(':id', $id);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0){
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corpo){ // Loops through corps table to display table
                $table .= "<tr><td>" . " Companies: " . " " . $corpo['corp'] . "</td>";
                $table .= "<td>" .  " Date: " . $corpo['incorp_dt'] = date("m/d/Y", strtotime($corpo['incorp_dt'])). "</td>";
                $table .= "<td>" .  " Email: " . $corpo['email'] . "</td>";
                $table .= "<td>" . " Zip Code: " . $corpo['zipcode'] . "</td>";
                $table .= "<td>" . " Owner: " . $corpo['owner'] . "</td>";
                $table .= "<td>" . " Phone Number: " . $corpo['phone'] . "</td>";
                $table .= "<td><form method='get' action='#'><a href='delete.php?id=" . $corpo['id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='update.php?id=" . $corpo['id']." '> Update </a></form></td>";
                $table .= "</tr>";

            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><a href='corpsform.php'> Create </a></form></td>";

        }// End of If Statement
        else {
            $table = "There is no Data at the Moment." . PHP_EOL;
        }// End of End Statement
        return $table;
    }// End of Try Statement
    catch (PDOException $e){
        die("There was a problem retrieving Data from the DataBase ");
    }// End of Catch Statement
}// End of the getCorps Function

echo getCorps($db,$id);
?>
<br/><br/>
<a href="../index.php"> Return </a>