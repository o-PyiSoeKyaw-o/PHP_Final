<?php include('db.php'); ?>
<?php session_start(); ?>

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

                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="./logout.php?logout=1">Logout</a></li>
                    <li class="nav-item">
                        <h5 class="text-white mt-2 me-2">Welcome, <?php echo $_SESSION['username']; ?>!</h5>
                    </li>

                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle='dropdown' href="#">User</a>
                        <ul class="dropdown-menu bg-primary">
                            <li class="nav-link"><a class="nav-link text-white" href="./register.php">Register</a></li>
                            <li class="nav-link"><a class="nav-link text-white" href="./login.php">Login</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        <div class="row g-2">
            <?php
            $products = $conn->query("SELECT products.*,categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id");
            while ($product = $products->fetch_assoc()):
            ?>
                <div class="col-3">
                    <div class="card" style="width: 100%;">
                        <img src="uploads/<?php echo $product['image'] ?>" alt="" class="card-img-top">
                        <div class="card-body">
                            <p class="card-subtitle muted"><?php echo $product['category_name'] ?></p>
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-description"><?php echo $product['price'] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="product_update.php?id=<?= $product['id'] ?>" class="btn btn-warning">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>