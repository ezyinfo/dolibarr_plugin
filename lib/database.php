<?php


require "lib/config.php";
require "lib/Products.php";

function db_connect()
{
    global $db_host, $db_name, $db_user, $db_pwd;

    try {
        $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pwd);
    } catch (PDOException $e) {
        die("Failed to connect");
    }
    return $db;
}


function getCategories($db)
{
    $stm = $db->prepare("SELECT * FROM category;");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}


function getProductsByCat($db, $catID)
{
    $stm = $db->prepare("SELECT * FROM products WHERE cat_id LIKE :id;");
    $stm->bindValue(':id', '%' . $catID . '%');
    $stm->execute();
    $prods = $stm->fetchAll(PDO::FETCH_ASSOC);

    $product_array = [];

    foreach ($prods as $prod) {
        $product = new Products($prod["id_prod"], $prod["name"], $prod["desc"]);
        $product_array[] = $product;
    }

    return $product_array;
}
