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
<?php

$servername = "localhost";
$username = "actors";
$password = "se266";
$dbname = "phpclassfall2017";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//Checks Connection
if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
$data = "SELECT id, firstname, lastname, dob, height FROM actors";
$result = mysqli_query($conn, $data);

if(mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Height</th></tr>";
    //Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"]. "<td>" . $row["dob"] . " </td><td> " . $row["height"] . "</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 Results";
}

?>
</body>
</html>