<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Items</title>
</head>
<body>
<?php
include_once ("../files/dbconn.php");

$product_id = filter_input(INPUT_GET,'product_id');

$db = dbConn();
$sql = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");
$sql->bindParam('product_id', $product_id);
$sql->execute();
$Res = $sql->fetch(PDO::FETCH_ASSOC);

unlink("../pictures/" . $Res['picture'] . "");

$sql = $db->prepare("DELETE FROM products WHERE product_id = :product_id");
$sql->bindParam(':product_id', $product_id);

if($sql->execute() && $sql->rowCount() > 0)
{
    echo " Record Deleted! ";
}// End of If Statement
else
{
    echo " Record Failed to Delete!";
}// End of Else Statement

?>

</body>
</html>