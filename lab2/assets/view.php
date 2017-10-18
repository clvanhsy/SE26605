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

?>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

</body>
</html>