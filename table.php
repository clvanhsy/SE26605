<?php
$table = "<table>"; //empty table var

for($rows = 1; $rows <= 5; $rows++){
    $table .= "<tr>";

    for($col = 1; $col <= 5; $col++)
    {
        $table .= "<td>" .$rows * $col . "</td>";
    }
    $table .="</tr>\n";
}
$table .="</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $table; ?>
</body>
</html>