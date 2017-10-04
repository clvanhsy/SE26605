<?php
function randColor() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return randColor() . randColor() . randColor();
}

echo random_color();


?>
<?php
$table = "<table>"; //empty table var

for($rows =0; $rows <= 9; $rows++){
    $value = random_color();
$table .= "<tr><td style='background-color:#".$value.";'>$value<br /><span style ='color:#ffffff;'>$value</span></td>";

    for($col = 0; $col <= 8; $col++)
    {
        $value = random_color();
        $table .= "<td style='background-color:".$value.";'>$value<br /><span style ='color:#ffffff;'>$value</span></td>";
    }
    $table .="</tr>";
}
$table .="</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Rand Grid</title>
</head>
<body>
<?php echo $table ?>
</body>
</html>