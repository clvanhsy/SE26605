<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/17/2017
 * Time: 10:51 PM
 */

function actorsTable($db){
    try {
        $sql = "SELECT * FROM actors";
        $sql = $db->prepare($sql);
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table style='text-align:center; '><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Height</th></tr>" . PHP_EOL; // End of line, just like \n
            foreach ($actors as $actor){
                $table .= "<tr><td> " . $actor["id"] . "</td><td>" . $actor["firstname"] . " " . $actor["lastname"]. "<td>" . $actor["dob"] . " </td><td> " . $actor["height"] . "</td></tr>";
            } // End of Foreach loop
            $table .= "</table>" . PHP_EOL;
        }// End of If statement
        else{
            $table = "Sorry, there aren't any Actors or Actress." . PHP_EOL;
        }// End of Else statement
        return $table;
    }// End of Try statement
    catch(PDOException $e){
        die("There was a problem connecting to the DataBase.");
    }// End of Catch
}// End of actorsTable function
