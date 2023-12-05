<?php
    include "../classes/Product.php";

    $product = new Product;
    $product->editProduct($_POST);
?>