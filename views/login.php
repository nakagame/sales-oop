<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CDN CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CDN FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto p-0">
                <div class="card-header bg-success border-0 py-3">
                    <h1 class="text-center text-white">
                        Login
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="50" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" aria-describedby="password-info" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center bg-white">
                    <!-- Button trigger modal -->
                    <a class="text-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Create an Account
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 text-primary fw-bold" id="exampleModalLabel">
                        <i class="fa-solid fa-user-plus"></i>
                        REGISTER
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../actions/register.php" method="post">
                    <div class="modal-body">       
                        <div class="row mb-3">
                            <div class="col">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
                            </div>
                            <div class="col">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="col-form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="50" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" aria-describedby="password-info" required>
                            <div class="form-text" id="password-info">
                                Password must be at least 8 characteres long.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CDN JavaScript Bootsrtap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>