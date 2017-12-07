<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Category</title>
</head>
<body>
<?php
include_once ("../files/dbconn.php");

$category_id = filter_input(INPUT_GET,'category_id');
$db = dbConn();
$sql = $db->prepare("DELETE FROM categories WHERE category_id = :category_id");
$sql->bindParam(':category_id', $category_id);
if($sql->execute() && $sql->rowCount() > 0)
{
    echo "Record Deleted.";
}// End of If Statement
else
{
    echo "Record failed to be deleted.";
}

?>
?>
</body>
</html>