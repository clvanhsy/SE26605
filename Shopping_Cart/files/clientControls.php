<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/7/2017
 * Time: 7:10 PM
 */
Function itemTable($db, $category = false)
{
    if($category == false)
    {
        $sql=$db->prepare("SELECT products.product_id as product_id, categories.category as category, products.product as product, products.price as price, products.image as image
          FROM products 
          INNER JOIN categories 
          ON categories.category_id = products.category_id 
          ORDER BY products.product_id");
        $products = array();
        if($sql->execute() && $sql->rowCount() > 0)
        {
            $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    if ($category != "")
    {
        $sql=$db->prepare("SELECT products.product_id as product_id, categories.category as category, products.product as product, products.price as price, products.image as image 
            FROM products 
            INNER JOIN categories 
            ON categories.category_id = products.category_id 
            WHERE categories.category = :category
            ORDER BY products.product_id");
        $bind = array(":category => $category");
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->execute($bind) && $sql->rowCount() > 0)
        {
            $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    $table = "<h1> Games List </h1>";
    foreach ($products as $product)
    {
        $table .= "<tr>";
        $table .= "<td>" . $product['category'] . "</td>";
        $table .= "<td>" . $product['product'] . "</td>";
        $table .= "<td>$" . $product['price'] . "</td>";
        $table .= "<td><img src='../pictures/" . $product['image'] . "'</td>";
        $table .= "<td><a href='../cartAdd.php?id=" . $product['product_id'] . "'><button>Add To Cart</button></a></td>";
        $table .= "</tr>";
    }
    $table .= "</table>";
    return $table;

}

Function EmptyCart()
{
    $form = "<form method=get action='../cartAdd.php'>";
    $form .= "<input type='hidden' name='action' value='erase' /><input type=submit value='Erase Cart Items'>";
    return $form;
}

Function viewCart($db, $product_id)
{
    $sql = $db->prepare("SELECT products.product_id as product_id, categories.category as category, products.product as product, products.price as price, products.image as image 
            FROM products 
            INNER JOIN categories 
            ON categories.category_id = products.category_id 
            WHERE products.product_id = :product_id");
    $bind = array(":product_id" => $product_id);
    $product = array();
    if($sql->execute($bind) && $sql->rowCount() > 0)
    {
        $products = $sql->fetch(PDO::FETCH_ASSOC);

        $table = "<tr>";
        $table .= "<td>" . $products['category'] . "</td>";
        $table .= "<td>" . $products['product'] . "</td>";
        $table .= "<td>$" . $products['price'] . "</td>";
        $table .= "<td><img src='../pictures/" . $products['image'] . "'  width='300' height='200'/></td>";
    }
    else
    {
        $table = "";
    }

    return $table;
}

Function Total($db, $product_id, $totalBefore)
{
    $sql = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");
    $bind = array(":product_id" => $product_id);
    $product = array();
    if($sql->execute($bind) && $sql->rowCount() > 0)
    {
        $products = $sql->fetch(PDO::FETCH_ASSOC);
        $totalNow = $products['price'] + $totalBefore;
    }
    else
    {
        $totalNow = "";
    }
    return $totalNow;
}

Function filter($categories)
{
    $form = "<section><form method='get' action='../clientSide.php'>
    <label for='col'> Search Genere </label>
    <select name='category' id='category'> ";
    foreach ($categories as $category)
    {
        $form .= "<option value =" .$category['category'] . ">" . $category['category'] . "</option>";
    }
    $form .= "</select>
    <input type='hidden' name='submit' value='Search'/>
    <input type='submit'/>
    <input type='submit' name='submit' value='Reset'/>
    </form></selection>";
    return $form;
}