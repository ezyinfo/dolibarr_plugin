<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Product versions</title>
</head>

<body>
    <div id="left_box">
        <div id="cat_box">
            <h2>Categories</h2>
            <ul>

                <?php

                require "lib/database.php";

                $db = db_connect();

                if ($db != null) {
                    $cats = getCategories($db);
                    foreach ($cats as $cat) {
                ?>
                        <li><a href="?cat=<?php echo $cat['id_cat']; ?>"> <?php echo $cat["name"]; ?></a></li>

                <?php
                    }
                } else {
                    echo "Database Error";
                }
                ?>
            </ul>
        </div>
    </div>
    <div id="center_box" class="flex">
        <div id="search_box">
            <form action="search.php" method="get">
                <label class="hidden" for="search"></label>
                <input id="search" type="text" placeholder="Search Ref">
            </form>
        </div>
        <div id="product_box">
            <h2>Products</h2>
            <ul>

                <?php
                if (isset($_GET["cat"])) {
                    // L'index "cat" existe et n'est pas null
                    $cat_id = $_GET["cat"];
                    if ($db != null) {
                        $prods = getProductsByCat($db, $cat_id);
                        if ($prods == []) {
                            echo "Pas de produits dans la catégorie";
                        }
                        foreach ($prods as $prod) {
                ?>

                            <li>
                                <span class="product_title"><?php echo $prod->getName(); ?></span>
                                <span class="product_desc"><?php echo $prod->getDesc(); ?></span>
                            </li>

                <?php


                        }
                    }
                } else {
                    echo "Veuillez sélectionner une catégorie dans la liste de gauche.";
                }




                ?>
            </ul>
        </div>
    </div>
    <div id="right_box">
        <div id="total_box" class="flex">
            <h2>Total</h2>
            <ul>
                <li>
                    <span class="ref">#226465</span>
                    <span class="price">45€00</span>
                </li>
                <li>
                    <span class="ref">#5658125544</span>
                    <span class="price">12€50</span>
                </li>
                <li>
                    <span class="ref">#655628</span>
                    <span class="price">780€00</span>
                </li>
            </ul>
        </div>
        <div id="num_box">NumPad</div>
    </div>

</body>

</html>