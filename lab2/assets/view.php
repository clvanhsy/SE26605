<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Page</title>
    <style>
        table, th, td {
            border: 1px solid navy;
        }
    </style>
</head>
<body>
<header style="font-size:30px; color:black;"> <i>Viewing Page</i> </header>
<br />
<!-- Navigation links -->
<a href="../assignment2.php"><strong>Add Form </strong></a>
<br /><br />
<a href="view.php"><strong>View Actors/Actress</strong></a>
<br /><br />

<?php

$servername = "localhost";
$username = "actors";
$password = "se266";
$dbname = "phpclassfall2017";

// Creates a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Checks Connection
if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
$data = "SELECT id, firstname, lastname, dob, height FROM actors"; // Selects data from the table
$result = mysqli_query($conn, $data);

if(mysqli_num_rows($result) > 0) {
    echo "<table style='text-align:center; '><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Height</th></tr>";
    //Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"]. "<td>" . $row["dob"] . " </td><td> " . $row["height"] . "</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 Results";
}
$conn->close(); // Closes connection'


/*$servername = "localhost";
$username = "actors";
$password = "se266";
$dbname = "phpclassfall2017";

// Creates a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Checks Connection
if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
$data = "SELECT id, firstname, lastname, dob, height FROM actors"; // Selects data from the table
$result = mysqli_query($conn, $data);

if(mysqli_num_rows($result) > 0) {
    echo "<table style='text-align:center; '><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Height</th></tr>";
    //Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"]. "<td>" . $row["dob"] . " </td><td> " . $row["height"] . "</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 Results";
}
$conn->close(); // Closes connection
*/
/*$dsn ="mysql:host=localhost;dbname=phpclassfall2017";
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



$sql = $db->prepare("SELECT * FROM actors");
$sql->execute();
$results = $sql->fetchAll();
if (count($results)) {
    foreach ($results as $actor){
        print_r($actor);
    }
}
*/ // Prints data
?>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

</body>
</html>