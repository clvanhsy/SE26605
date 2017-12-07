<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PICTURE TIME!</title>
</head>
<body>
<?php
if(isset($_FILES['image']))
{
    $err = array();
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTemp = $_FILES['image']['nameTemp'];
    $fileType = $_FILES['image']['type'];
    $fileExt = strtolower(end(explode('.', $_FILES['image']['name'])));

    $exp = array("png", "jpeg", "jpg");

    if(in_array($fileExt, $exp) === false)
    {
        $err[] = "Please choose PNG or JPEG Files. ";
    }
    if($fileSize > 2097152)
    {
        $err[] = "File must be 2 MB";
    }
    if(empty($err) == true)
    {
        move_uploaded_file($fileTemp, "pictures/" .$fileName);
        echo " Mission Success";
    }
    else
    {
        print_r($err);
    }
}

?>


<form action="" method="POST">
    <input type="file" name="image" />
    <input type="submit"/>
</form>

</body>
</html>
