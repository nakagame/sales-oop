<?php
    require "../classes/Product.php";
    session_start();
    $id  = $_GET['id'];
    $product_obj = new Product;
    $product = $product_obj->getProduct($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
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
                <h1 class="h2 mt-3 text-center"><i class="fa-solid fa-cash-register"></i> Buy Product</h1>
                <div class="card w-50 mx-auto">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <h4 class="fs-6">Product Name</h4>
                                        <p class="fs-2 fw-bold"><?= $product['product_name'] ?></p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" name="qty" id="qty" class="form-control" min="1" max="<?= $product['quantity'] ?>" required>
                                        <small class="text-muted">The maximum stock is <?= $product['quantity'] ?>.</small>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Add to Cart" name="add_cart" class="btn btn-success w-100">
                        </form>
                    </div>
                    <?php if(isset($_POST['add_cart'])) { ?>
                    <div class="card-footer text-center">
                        <div class="mb-2">
                            <p class="fs-5 fw-bold mb-1">Total Price: $ <?= floor($_POST['qty'] * $product['price']) ?></p>
                        </div>

                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <p class="text-muted mb-1 text-end">Buy Qty: <?= $_POST['qty'] ?></p>
                                </div>
                                <div class="col">
                                    <p class="text-muted mb-1 text-start">Price: $<?= $product['price'] ?></p>
                                </div>
                            </div>
                        </div>
                    
                        <form action="../actions/payment.php?id=<?= $product['id'] ?>&qty=<?= $_POST['qty'] ?>" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" id="payment" name="payment" placeholder="Payment" min="0" required>
                                    <label for="payment">Payment</label>
                                </div>
                            </div>

                            <input type="submit" value="Pay" name="btn_pay" class="btn btn-primary w-100">
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- CDN JavaScript Bootsrtap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>