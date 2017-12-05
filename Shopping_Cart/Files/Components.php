<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/4/2017
 * Time: 11:26 AM
 */
function ProTable($db){
    try{
        $sql = "SELECT * FROM products";
        $sql = $db->prepare($sql);
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach ($products as $product){
                $table .= "<tr><td>" . " Product: " . " " . $product['products'] . "</td><td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Read.php?id=" . $product['product_id']." '> Read </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Delete.php?id=" . $product['product_id']." '> Delete </a></form></td>";
                $table .= "<td><form method='get' action='#'><a href='Files/Update.php?id=" . $product['product_id']." '> Update </a></form></td>";
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

function getProducts ($db, $id){
    try{
        $sql = $db->prepare("SELECT * FROM products WHERE id=:id"); // Select all from corps table
        $sql->bindParam(':id', $id);
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0){
            $table = "<table>" . PHP_EOL;
            foreach ($products as $product){ // Loops through corps table to display table
                $table .= "<tr><td>" . " Products: " . " " . $product['product'] . "</td>";
                $table .= "<td>" .  " Price: " . $product['price']. "</td>";
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
}// End of the getCorps Function
