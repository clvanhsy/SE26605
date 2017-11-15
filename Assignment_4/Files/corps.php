<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/15/2017
 * Time: 1:53 AM
 */

function corpsTable($db){
    try{
        $sql = "SELECT * FROM corps";
        $sql = $db->prepare($sql);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){
                $table .= "<tr><td>" . " Companies: " . " " . $corp['corp'] . "</td><td>";
                $table .= "<td><form method='get' action='#'><a href='files/read.php?id=" . $corp['id']." '> Read </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='files/delete.php?id=" . $corp['id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='files/update.php?id=" . $corp['id']." '> Update </a></form></td>";
                $table .= "</tr>";

            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corp['id']." '/><a href='files/corpsform.php'> Create </a></form></td>";

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

function viewAllTable($db, $cols = null)
{
    try {
        $sql = "SELECT * FROM corps";
        $sql = $db->prepare($sql);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            if ($cols)
            {
                $table .= "<tr>";
                foreach ($cols as $col)
                {
                    $table .= "<th>$col</th>";
                }// End of Foreach
                $table .= "</tr>" . PHP_EOL;
            } // End of If ($col)
            foreach ($corps as $corp) {
                $table .= "<tr><td>" . $corp['id'] . "</td>";
                $table .= "<td>" . $corp['corp'] . "</td>";
                $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt'])) . "</td>";
                $table .= "<td>" . $corp['email'] . "</td>";
                $table .= "<td>" . $corp['zipcode'] . "</td>";
                $table .= "<td>" . $corp['owner'] . "</td>";
                $table .= "<td>" . $corp['phone'] . "</td>";
                $table .= "</tr>" . PHP_EOL;
            }// End of Foreach
            $table .= "</table>" . PHP_EOL;
        } // End of If ($sql->count)
        else
        {
            $table = "There is no Data" . PHP_EOL;
        }
        return $table;

    } // End of Try Statement
    catch (PDOException $e)
    {
        die("There was a problem viewing the table ");
    } // End of Catch Statement
} // End of viewAllTable Function


function addCorps($db, $corp, $email, $zipcode, $owner, $phone){
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, now(), :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        echo $sql->rowCount() . " rows added. ";
    }// End of Try Statement
    catch(PDOException $e){
        die(" Sorry there was a problem adding Data to the Database. ");
    }// End of Catch Statement
}// End of addCorps Function

function updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id)
{
    try {
        $sql = $db->prepare("UPDATE corps SET corp=:corp, email=:email, zipcode=:zipcode, owner=:owner, phone=:phone WHERE id=:id");
        $sql->blindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':corp', $corp, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
        $sql->bindParam(':owner', $owner, PDO::PARAM_STR);
        $sql->bindParam(':phone', $phone, PDO::PARAM_STR);
        $sql->execute();
        echo $sql->rowCount() . " row was updated. ";
    }// End of Try Statement
    catch (PDOException $e)
    {
        die("There was a problem in Updating the data. ");
    }// End of Catch Statement
}// End of Update Function


function getCorps ($db, $id){
    try{
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id"); // Select all from corps table
        $sql->bindParam(':id', $id);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0){
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){ // Loops through corps table to display table
                $table .= "<tr><td>" . " Companies: " . " " . $corp['corp'] . "</td>";
                $table .= "<td>" .  " Date: " . date("m/d/Y", strtotime($corp['incorp_dt'])). "</td>";
                $table .= "<td>" .  " Email: " . $corp['email'] . "</td>";
                $table .= "<td>" . " Zip Code: " . $corp['zipcode'] . "</td>";
                $table .= "<td>" . " Owner: " . $corp['owner'] . "</td>";
                $table .= "<td>" . " Phone Number: " . $corp['phone'] . "</td>";
                $table .= "<td><form method='get' action='#'><a href='delete.php?id=" . $corp['id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='update.php?id=" . $corp['id']." '> Update </a></form></td>";
                $table .= "</tr>";

            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            $table .= "<td><form method='post' action='#'><input type='hidden' name='id' value='". $corp['id']." '/><a href='corpsform.php'> Create </a></form></td>";

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


function deleteCorps($db, $id){
    try{
        $sql = $db->prepare("DELETE FROM corps WHERE id= :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->rowCount() . " row deleted";
    } // End of Try statement
    catch(PDOException $e)
    {
        die(" There was a problem in deleting the Data. ");
    }// End of Catch Statement
} // End of deleteCrops Function


function getUpdate($db, $id){

    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $corp = $sql->fetch(PDO::FETCH_ASSOC);
    return $corp;
}// End of getUpdate Function


function retrieveCorps($db) {
    try {
        $sql = "SELECT * FROM corps";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } // End of Try Statement
    catch (PDOException $e)
    {
        die ("There was a problem getting the Data. ");
    }// End of Catch Statement
    return $corps;
}// End of retrieveCorps Function

function getCorpsAsSortedTable($db, $col, $dir){
    try
    {
        if($col == NULL)
        {
            $col = "id";
        } // End if If of Col
        if($dir == NULL)
        {
            $dir = "ASC";
        }// End of If of Dir
        $sql = "SELECT * FROM corps ORDER BY $col $dir";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } // End of Try Statement
    catch (PDOException $e)
    {
        die ("There was a problem getting the table as sorted");
    }// End of Catch Statement
    return $corps;
}// End of Sorted Function


function searchCorp($db, $colSearch, $search){
    try {
        if($colSearch == NULL)
        {
            $colSearch = 'id';
        }
        $sql = "SELECT * FROM corps WHERE $colSearch LIKE '%$search%'"; //search statement
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = "<table>" . PHP_EOL;
        $table .= "<tr><td>" . $stmt->rowCount() . " records found.</td></tr>". PHP_EOL;
        foreach($corps as $corp)
        {
            $table .= "<tr><td>" . " Companies: " . " " . $corp['corp'] . "</td><td>";
            $table .= "<td><form method='get' action='#'><a href='files/read.php?id=" . $corp['id']." '> Read </a></form></td>";
            $table .= "<td><form method='get' action='#'><a href='files/delete.php?id=" . $corp['id']." '> Delete </a></form></td>";
            $table .= "<td><form method='get' action='#'><a href='files/update.php?id=" . $corp['id']." '> Update </a></form></td>";
            $table .= "</tr>";
        }// End of Foreach Loop
        $table .= "</table>" . PHP_EOL;
        return $table;
    } // End of Try Statement
    catch (PDOException $e)
    {
        die ("No Records were located. ");
    }// End of Catch Statement
}// End of Search Function


function viewAllSearchCorp($db, $cols, $colSearch, $search){

    try
    {
        $sql = "SELECT * FROM corps WHERE $colSearch LIKE '%$search%'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = "<table>" . PHP_EOL;
        $table .= "<tr><td>" . $stmt->rowCount() . " records found.</td></tr>". PHP_EOL;
        if ($cols) {
            $table .= "<tr>";
            foreach ($cols as $col)
            {
                $table .= "<th>$col</th>";
            }// End of Foreach
            $table .= "</tr>" . PHP_EOL;
        }// End of if
        foreach ($corps as $corp)
        {
            $table .= "<tr><td>" . $corp['id'] . "</td>";
            $table .= "<td>" . $corp['corp'] . "</td>";
            $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt'])) . "</td>";
            $table .= "<td>" . $corp['email'] . "</td>";
            $table .= "<td>" . $corp['zipcode'] . "</td>";
            $table .= "<td>" . $corp['owner'] . "</td>";
            $table .= "<td>" . $corp['phone'] . "</td>";
            $table .= "</tr>" . PHP_EOL;
        }// End of Foreach
        $table .= "</table>" . PHP_EOL;
        return $table;
    } // End of Try Statement
    catch (PDOException $e)
    {
        die ("No Records were located. ");
    }// End of Catch Statement
}// End of Sortable Search Function


function dropDown($cols){
    $form =  "<option value=''> --Select--</option>" . PHP_EOL;
    foreach($cols as $col)
    {
        $form .= "<option value='" . $col . "'>" . $col . "</option>";
    }// End of Foreach
    return $form;
}// End of Drop Down Function
