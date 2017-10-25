<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 9:55 AM
 */
// $table .= "<tr><td>" . " Companies: " . " " . $corpo['corp'] . "</td><td>" . $corpo['incorp_dt'] . "</td><td>" . $corpo['email']
//. "</td><td>" . $corpo['zipcode'] . "</td><td>" . $corpo['owner'] . "</td><td>" . $corpo['phone'] . "</td>";
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
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><a href='index.php'> Read </a></form></td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><input type='submit' name='submit' value='Update'/></form></td>";
                $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><input type='submit' name='submit' value='Delete'/></form></td>";
                $table .= "</tr>";

            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corpo['id']." '/><a href='index.php'> Create </a></form></td>";

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

function addCorps($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone){
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, :incorp_dt, :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        return $sql->rowCount();
    }// End of Try Statement
    catch(PDOException $e){
        die(" Sorry there was a problem adding Data to the Database. ");
    }// End of Catch Statement
}// End of addCorps Function

function getCorps($db, $id){
    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;
}// End of getCorps Function

function updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id)
{
    try {
        $sql = $db->prepare("UPDATE corps SET corp= :corp, email= :email, zipcode= :zipcode, owner= :owner, phone= :phone WHERE id= :id");
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount();
    }catch (PDOException $e){
        die("There was a problem in Updating the data. ");
    }
}
function deleteCorps($db, $id){
    try{
        $sql = $db->prepare("DELETE FROM corps WHERE id= :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->rowCount();
    }
    catch(PDOException $e)
    {
        die(" There was a problem in deleting the Data. ");
    }
}