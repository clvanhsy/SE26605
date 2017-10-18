<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/18/2017
 * Time: 10:43 AM
 */
function actorsTable($db){
    try{
        $sql = "SELECT * FROM actors";
        $sql = $db->prepare($sql);
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0){
            $table = "<table style='text-align:center; '><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Height</th></tr>" . PHP_EOL;
            foreach($actors as $actor){
                $table .=  "<tr><td> " . $actor["id"] . "</td><td>" . $actor["firstname"] . " " . $actor["lastname"]. "<td>" . $actor["dob"] . " </td><td> " . $actor["height"] . "</td></tr>";
            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
        }// End of If Statement
        else {
            $table = "There is no Data." . PHP_EOL;
        }// End of Else Statement
        return $table;
    }// End of Try Statement
    catch (PDOException $e){
        die("There was a problem gathering the Data. ");
    }// End of Catch Statement
}// End of actorsTable Function