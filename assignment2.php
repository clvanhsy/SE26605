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
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // If There is an issue throw it down to the catch
    $submit = $_GET['submit'] ?? ""; // Null Coalesce Operator, Also $_Get is a Global Variable
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
        echo $sql->rowCount() . " Row Inserted "; // Shows that the data has been entered into the DataBase

    }
} catch (PDOException $e){
    die(" There was a problem connecting to the DataBase.");
}



 /*$sql = $db->prepare("SELECT * FROM actors");
$sql->execute();
$results = $sql->fetchAll();
if (count($results)) {
    foreach ($results as $actor){
        print_r($actor);
    }
}

 */
?>
<header style="font-size:30px; color:black;"><i>Form To Add Actors/Actress</i></header>
<br />
<a href="assignment2.php"><strong>Add Form</strong></a>
<br /><br />
<a href="view.php"><strong>View Actors/Actress</strong></a>

<form methond="get" action="#">
    <h2> Add Actors or Actress! </h2>
   <p> First Name </p> <input type="text" name="firstname" value="" />
    <br /><br />
   <p> Last Name </p> <input type="text" name="lastname" value="" />
    <br /><br />
   <p> Date of Birth </p> <input type="text" name="dob" value="" />
    <br /><br />
   <p> Height </p> <input type="text" name="height" value="" />
    <br /><br />
    <input type="submit" id="foo" name="submit" value=" Add " />
</form> <!-- Form is created to add data into database -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

