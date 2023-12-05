<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <!-- CDN CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CDN FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light" style="height: 100vh;">
<div class="container-fluid p-0" style="height: 100%;">
        <div class="row" style="height: 100%;">
            <div class="col-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 200px; height: 100%;">
                    <a href="" class="d-flex align-items-center ms-2 text-white text-decoration-none fs-3">
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

            <div class="col text-center">
                <h1 class="my-4 text-warning"><i class="fa-solid fa-triangle-exclamation"></i> Error</h1>
                <p class="font-monospace">Something wrong your action. Please Try again.</p>
            </div>
    </div>
    <!-- CDN JavaScript Bootsrtap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>