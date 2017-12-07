<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Items</title>
</head>
<body>
<?php

include_once ("../files/dbconn.php");
include_once ("../files/components.php");
include_once ("../MGRControls.php");
$db = dbConn();

$max = 2097152;
$location = '../pictures/';

if(isset($_POST['submit'])) {
    if (isset($_POST['new'])) {
        $name = $_FILES['file']['name'];
        $type = $_FILES['file']['type'];
        $tempName = $_FILES['file']['tempName'];
        $size = $_FILES['file']['size'];
        if (ckType($name, $type) && ckSize($size, $max)) {
            if (isset($name)) {
                fileSaved($tempName, $name, $location);
            }// End of If Statement
        }//End of If Statement
    }// End of If Statement
    else {
        $category_id = filter_input(INPUT_POST, 'category_id');
        $product_id = filter_input(INPUT_POST, 'product_id');
        $product = filter_input(INPUT_POST, 'product');
        $price = filter_input(INPUT_POST, 'price');

        if ($price < 0 || is_numeric($price) == false) {
            $message = " Please enter valid price";
        }// End of If Statement
        else {
            $stmt = $db->prepare("UPDATE products SET category_id = :category_id, price = :price, product = :product WHERE product_id = :product_id");
            $bind = array(
                ":product_id" => $product_id,
                ":category_id" => $category_id,
                ":price" => $price,
                ":product" => $product
            );
            $message = "Uploaded Failed. ";
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                $message = " Upload Complete";
            }
        }
    }// End of Else Statement
}// End of if Statement
else
{
    $product_id = filter_input(INPUT_GET, 'product_id');
}// End of Else Statement

Function ckType($name, $type)
{
    $exe = pathinfo($name, PATHINFO_EXTENSION);
    if(!empty($name))
    {
        if (($exe == 'jpg' || $exe == 'png') && ($type == 'pictures/jpeg' || $type == 'pictures/png'))
        {
            return true;
        }// End of If Statement
        else
        {
            echo " Not the correct format. ex: PNG or JPEG.";
            return false;
        }// End of Else Statement
    }// End of If Statement
}// End of ckType Function

Function ckSize($size, $max)
{
    if($size <= $max)
    {
        return true;
    }// End of if Statement
    else
    {
        echo " File is too large. ";
        return false;
    }// End of Else Statement
}// End of ckSize Function

Function fileExists($name)
{
    $fileName =  rand(1000,9999).md5($name).rand(1000, 9999);
    echo $fileName;
    return false;
}// End of fileExists Function

Function fileSaved($tempName, $name, $location)
{
$realName = $name;

while(file_exists('../pictures/' . $name))
{
    echo "File exists. Making New Name:";
    $rand = rand(10000, 99999);
    $name = $rand . "." . pathinfo($name, PATHINFO_EXTENSION);

}// End of While Loop
if(move_uploaded_file($tempName, $location . $name))
{
    $db = dbConn();
    $product_id = filter_input(INPUT_POST, 'product_id');
    $product = filter_input(INPUT_POST, 'product');
    $category_id = filter_input(INPUT_POST, 'category_id');
    $price = filter_input(INPUT_POST,'price');
    $old_pic = filter_input(INPUT_POST, 'old_pic');
    if($price < 0 || is_numeric($price) == false)
    {
        $message = " Please enter a valid product and price. ";
    }
    else
    {
        $stmt = $db->prepare("UPDATE products SET category_id = :category_id, product = :product, price = :price, image = :image WHERE product_id = :product_id");

        $bind = array(
            ":category_id" => $category_id,
            ":product" => $product,
            ":price" => $price,
            ":image" => $name,
            ":product_id" => $product_id
        );

        $message = "Failed Update";
        if ($stmt->execute($bind) && $stmt->rowCount() > 0)
        {
            unlink($old_pic);
            $message = "Update Compeleted";
        }
        if(!($realName == $name))
        {
            echo "New name is" . $name;
        }
        else
        {
            echo ".";
        }
    }
}
else
{
    echo "Error.";
}
}// End of Function

$product_id = filter_input(INPUT_GET, 'product_id');
$stmt = $db->prepare("SELECT products.product_id as product_id, categories.category as category, categories.category_id as category_id, products.product as product, products.price as price, products.image as image
  FROM products 
  INNER JOIN categories 
  ON categories.category_id = products.category_id 
  WHERE product_id = :product_id");
$bind = array(":product_id" => $product_id);

$Res = array();
if($stmt->execute($bind) && $stmt->rowCount() > 0)
{
    $Res = $stmt->fetch(PDO::FETCH_ASSOC);
}
else
{
    echo " Id is not Found";
}

$categories = GetCategories($db);
?>

<p>
    <?php if (isset($message)) {echo $message;} ?>
</p>

$form = "<h1>Update: " . $result['product'] . "</h1>
<form method='POST' action='#' enctype='multipart/form-data'>
    Category:";
    $form .= "<select name='category_id' id='category_id'>";
        $form .= "<option value =" . $Res['category_id'] . ">" . $Res['category_id'] . ".  " . $Res['category'] . "</option >";
        foreach ($categories as $category) {
        $form .= "<option value =" . $category['category_id'] . ">" . $category['category_id'] . ".  " . $category['category'] . "</option >";
        }
        $form .= "</select><br><br>";
    $form .= "Product name: <input type='text' name='product' value='" . $Res['product'] . "' /><br>";
    $form .= "Price: $<input type='text' name='price' value='" . $Res['price'] . "' /><br>";
    $form .= "New Image?: <input type='checkbox' name='new' value='new'>Yes<br>";
    $form .= "New Image: <input type='file' name='file'/>

    <br>Old image:<br>";
    $form .= "<img src="../pictures/" . $Res['image'] />
    <br />
    <br />
    <input type='hidden' name='old_pic' value = '../pictures/" . $Res['image'] . "'/>
    <input type='hidden' name='product_id' value=" . $product_id . "/>
    <input type='submit' name='submit' value='Submit' />
</form>";
echo $form; ?>
</body>
</html>