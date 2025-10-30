<?php include('db.php') ?>
<?php session_start(); ?>
<?php if (!isset($_SESSION['username'])): ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle='dropdown' href="#">Product</a>
                        <ul class="dropdown-menu bg-primary">
                            <li class="nav-link"><a class="nav-link text-white" href="./product_create.php">Product Create</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle='dropdown' href="#">Category</a>
                        <ul class="dropdown-menu bg-primary">
                            <li class="nav-link"><a class="nav-link text-white" href="./category_list.php">Category List</a></li>
                            <li class="nav-link"><a class="nav-link text-white" href="./category_create.php">Category Create</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle='dropdown' href="#">User</a>
                        <ul class="dropdown-menu bg-primary">
                            <li class="nav-link"><a class="nav-link text-white" href="./register.php">Register</a></li>
                            <li class="nav-link"><a class="nav-link text-white" href="./login.php">Login</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
                    <a href="?logout=1">Logout</a>
                <?php endif; ?>
                </ul>
            </div>
        </nav>


        <?php
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                echo "Register Successfully";
            } else {
                echo "Username Already Exist";
            }
            header("location: login.php");
            exit();
        }
        ?>

        <div class="container mt-5 p-3 rounded" style="width: 500px; border: solid black 2px;">
            <form method="post">
                <div class="mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required><br>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required><br>
                </div>
                <button class="btn btn-success" name="register">Register</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>