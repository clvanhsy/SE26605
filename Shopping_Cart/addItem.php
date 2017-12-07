<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/6/2017
 * Time: 9:52 PM
 */
include_once ("MGRControls.php");
include_once ("files/dbconn.php");
$db = dbConn();

$max = 2097152;
$location = 'pictures/';

if(isset($_POST['submit']))
{
    $name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $tempName = $_FILES['file']['tempName'];
    $size = $_FILES['file']['size'];
    if(ckType($name, $type) && ckSize($size, $max))
    {
        if(isset($name))
        {
            fileSaved($tempName, $name, $location);
        }// End of If Statement
    }//End of If Statement
    else
    {
        echo " Select a File: ";
    }// End of Else Statement
}// End of If Statement

Function fileSaved($tempName, $name, $location)
{
    $realName = $name;

    while(file_exists('pictures/' . $name))
    {
        echo "File exists. Making New Name:";
        $rand = rand(10000, 99999);
        $name = $rand . "." . pathinfo($name, PATHINFO_EXTENSION);

    }// End of While Loop
    if(move_uploaded_file($tempName, $location . $name))
    {
        $category_id = filter_input(INPUT_POST, 'category_id');
        $product = filter_input(INPUT_POST,'product');
        $price = filter_input(INPUT_POST, 'price');
        $db = dbConn();
        if(is_numeric($price))
        {
            if($product == "" || $price < 0)
            {
                echo "Please enter a valid product and price. ";
            }// End of If Statement
            else
            {
                echo "Success" . $realName . "was added";
                echo addItem($db, $category_id, $product, $price, $realName);
            }// End of Else Statement
        }// End of If Statement
        else
        {
            echo "Please enter in a number for price. ";
        }// End of Else Statement
        if(!($realName == $name))
        {
            echo "New name is" . $name;
        }// End of If Statement
        else
        {
            echo ".";
        }// End of Else Statement
    }// End of if Statement
    else
    {
        echo " You've met a bad fate.";
    }//End of Else Statement

}// End of fileSaved Function

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

Function fileExists($name)
{
    $fileName =  rand(1000,9999).md5($name).rand(1000, 9999);
    echo $fileName;
    return false;
}// End of fileExists Function

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Items</title>
</head>
<body>
<h1>Add new Items!</h1>
<?php

    $categories = GetCategories($db);
    $form = "<form action='' method='post' enctype='multipart/form-data'>";
    $form .= "Category:";
    $form .= "<select name='category_id' id='category_id'>";
    foreach ($categories as $category) {
        $form .= "<option value =" . $category['category_id'] . ">" . $category['category_id'] . ".  " . $category['category'] . "</option >";
    }
    $form .= "</select><br><br>
         <p>Product name:</p>  <input type='text' name='product'><br>
        <p> Price: $ </p><input type='text' name='price' size='8'><br><br>
        <input type='file' name='file'/> file must be jpg
        <input type='submit' name='submit' value='Submit' />";
    echo $form;
?>

</body>
</html>
