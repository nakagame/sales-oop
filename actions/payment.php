<?php
    include "../classes/Product.php";

    $product = new Product;
    $product->payment($_POST);
?>