<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Category</title>
</head>
<body>
<?php
include_once ("../files/dbconn.php");
include_once ("../files/components.php");
$db = dbConn();

if(isPostRequest())
{
    $category_id = filter_input(INPUT_POST, 'category_id');
    $category = filter_input(INPUT_POST, 'category');
    if($category == "")
    {
        $message ="Invalid category name. ";
    }// End of If statement
    else
    {
        $stmt = $db->prepare("UPDATE categories SET category = :category WHERE category_id = :category_id");
        $bind = array(
            ":category_id" => $category_id,
            ":category" => $category
        );

        $message = " Update Failed";
        if($stmt->execute($bind) && $stmt->rowCount() > 0)
        {
            $message = "Update Success. ";
        }// End of If Statement
    }// End of Else Statement
}// End of If Statement
else
{
    $category_id = filter_input(INPUT_GET,'category_id');
}// End of Else Statement

$stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
$bind = array(
        ":category_id" => $category_id
);
$Res = array();

if($stmt->execute($bind) && $stmt->rowCount() > 0)
{
    $Res = $stmt->fetch(PDO::FETCH_ASSOC);
    $category = $Res['category'];
}// End of If Statement
else
{
    echo "Id is not found.";
}// End of Else Statement
?>

<p>
    <?php  if ( isset($message) ) { echo $message; }?>
</p>

<form method="POST" action="#">
    Category: <input type="text" name="category" value="<?php echo $category ?>" />
    <br /><br />
    <input type="hidden" name="category_id" value="<?php echo $category_id ?>" />
    <input type="submit" value="Submit" />
</form>
</body>
</html>