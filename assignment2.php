<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/12/2017
 * Time: 11:43 PM
 */

$dsn ="mysql:host=localhost;dbname=phpclassfall2017";
$username= "actors";
$password = "se266";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $submit = $_GET['submit'] ?? ""; // Null Coalesce Operator
    if ($submit == " Add "){
        $firstname = $_GET['firstname'] ?? "";
        $lastname = $_GET['lastname'] ?? "";
        $dob = $_GET['dob'] ?? "";
        $height = $_GET ['height'] ?? "";
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam('firstname', $firstname);
        $sql->bindParam('lastname', $lastname);
        $sql->bindParam('dob', $dob);
        $sql->bindParam('height', $height);
        $sql->execute();
        echo $sql->rowCount() . " Rows Inserted ";

    }
} catch (PDOException $e){
    die(" There was a problem connecting to the DataBase.");
}
?>
<form methond="get" action="#">
    <h1> Add Actors or Actress! </h1>
   <p> First Name </p> <input type="text" name="firstname" value="" />
    <br /><br />
   <p> Last Name </p> <input type="text" name="lastname" value="" />
    <br /><br />
   <p> Date of Birth </p> <input type="text" name="dob" value="" />
    <br /><br />
   <p> Height </p> <input type="text" name="height" value="" />
    <br /><br />
    <input type="submit" id="foo" name="submit" value=" Add " />
</form>
