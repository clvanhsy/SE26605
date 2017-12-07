<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/6/2017
 * Time: 11:50 PM
 */
Function email($db, $user_id)
{
    $sql = $db->prepare("SELECT email FROM users WHERE user_id = :user_id");
    $bind = array(":user_id => $user_id");
    $sql->execute($bind);
    $Res = $sql->fetch(PDO::FETCH_ASSOC);
    $rows = $sql->rowCount();
    if($rows == 1)
    {
        $error = $Res['email'];
    }
    else
    {
        $error = "Something bad has happen";
    }
    return $error;
}

Function Nav($add)
{
    $form = "<form method='post' action='#'>
    <input type='hidden' name='action' value='$add' /><input type='submit' value='$add' style='height: 50px; width: 100px; font-size : 20px;'>
    </form>";
    return $form;
}

Function Nav2($add)
{
    $form = "<form method='get' action='AdminPage.php'>
    <input type='hidden' name='action' value='$add' /><input type='submit' value='$add' style='height: 80px; width: 180px; font-size : 20px; background: navy; color:white;'>
    </form>";
    return $form;
}

Function AddCatFrom()
{
    $form = "<h1>New Category!</h1><div><section>
        <form method='get' action='AdminPage.php'>
        Catagory name: <input type='text' name='category' />  <br><br>
        <input type='hidden' name='action' value='Category Add' /><input type='submit' value='Add Category'>
        </form>
    </section></div>";
    return $form;
}

Function AddCategory($db)
{
    $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
    if($category == "")
    {
        $error = "Please enter a Category";
    }
    else
    {
        $sql = $db->prepare("INSERT INTO categories VALUES (null, :category)");
        $sql->bindParam(':category', $category);
        $sql->execute();
        $error = "Inserted a category";
    }

    return $error;
}

Function viewCat($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM categories ORDER BY category_id");
        $categories = array();
        if ($sql->execute() && $sql->rowCount() > 0) {
            $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        $table = "<h1>List of Categories<br></h1>";
        foreach ($categories as $category) {
            $table .= "\t<tr>";
            $table .= "<td>" . $category['category_id'] . "</td>";
            $table .= "<td>" . $category['category'] . "</td>";
            $table .= "<td>" . "<a href='cat/deleteCat.php?category_id=" . $category['category_id'] . "'>Delete</a></td>";
            $table .= "<td>" . "<a href='cat/updateCat.php?category_id=" . $category['category_id'] . "'>Update</a></td>";
            $table .= "</tr>";
        }
        $table .= "</table></div>";
        return $table;
    } catch (PDOException $e) {
        die("There was a problem seeing the categories");
    }
}

Function getCat($db)
{
    $sql = $db->prepare("SELECT * FROM categories ORDER BY category_id");
    $categories = array();
    if($sql->execute() && $sql->rowCount() > 0)
    {
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    return $categories;
}

Function AddItem($db, $category_id, $product, $price, $image)
{
    $sql = $db->prepare("INSERT INTO products VALUES (null, :category_id, :product, :price, :image)");
    $sql->bindParam(':category_id', $category_id);
    $sql->bindParam(':product', $product);
    $sql->bindParam(':price', $price);
    $sql->bindParam(':image', $image);
    $sql->execute();
    $error = " 1 Product was inserted";
}

Function viewItems($db)
{
    try {
        $sql = $db->prepare("SELECT products.product_id as product_id, categories.category as category, products.product as product, products.price as price, products.image as image 
        FROM products 
        INNER JOIN categories 
        ON categories.category_id = products.category_id 
        ORDER BY products.product_id");
        $products = array();
        if ($sql->execute() && $sql->rowCount() > 0) {
            $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        $table = "<h1>List of Products<br></h1>";
        $table .= "<table border='4px;'>";
        $table .= "<tr>" . "<th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Image</th></tr>";
        foreach ($products as $product) {
            $table .= "<tr><td>" . $product['product_id'] . "</td>";
            $table .= "<td>" . $product['category'] . "</td>";
            $table .= "<td>" . $product['product'] . "</td>";
            $table .= "<td>" . "$" .  $product['price'] . ".00</td>";
            $table .= "<td>" . $product['image'] . "</td>";
            $table .= "<td>" . "<a href='items/deleteItem.php?product_id=" . $product['product_id'] . "'>Delete</a></td>";
            $table .= "<td>" . "<a href='items/updateItem.php?product_id=" . $product['product_id'] . "'>Update</a></td></tr>";
        }
        $table .= "</table>";
        return $table;
    }catch (PDOException $e) {
        die ("We expierenced a problem seeing the products");
    }
}