<?php
    require "../classes/Product.php";
    session_start();

    $product_obj = new Product;
    $products = $product_obj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CDN CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CDN FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container-fluid p-0" style="height: 100vh;">
        <div class="row" style="height: 100%;">
            <div class="col-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 200px; height: 100%;">
                    <a href="" class="d-flex align-items-center text-white text-decoration-none fs-3">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        Sales
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link text-white">
                                <i class="fa-solid fa-house"></i>
                                Dashboard
                            </a>
                            <!-- Button trigger modal -->
                            <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#ProductModal">
                                <i class="fa-solid fa-cart-plus"></i>
                                Add Product
                            </a>
                            <a href="" class="nav-link text-white">
                                <i class="fa-solid fa-user"></i>
                                <?= $_SESSION['full_name'] ?>
                            </a>
                            <hr>
                            <a href="../actions/logout.php" class="nav-link text-white">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col ms-3">
                <h1 class="h3 mt-3">Product List</h1>
                <table class="table table-hover w-75">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($product = $products->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td>
                                <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="../actions/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <a href="buy-product.php?id=<?= $product['id'] ?>" class="btn btn-primary">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal ADD -->
    <div class="modal fade" id="ProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 text-success">
                    <i class="fa-solid fa-cart-plus"></i>    
                    Add Product
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/add-product.php?id=<?= $_SESSION['id'] ?>" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:40px;"><i class="fa-brands fa-product-hunt"></i></span>
                        <input type="text" class="form-control" placeholder="Product Name" name="product_name" required autofocus>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:40px;"><i class="fa-solid fa-money-check-dollar"></i></span>
                        <input type="number" step="0.01" class="form-control" placeholder="Price" name="price" min="0" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:40px;"><i class="fa-solid fa-q"></i></span>
                        <input type="number" class="form-control" placeholder="Quantity" name="qty" min="0" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100" name="btn_add">Add</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- CDN JavaScript Bootsrtap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>