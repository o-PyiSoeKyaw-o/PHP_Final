<?php include('db.php') ?>
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
                    <li class="nav-link"><a class="nav-link text-white" href="product_create.php">Product Create</a></li>
                    <li class="nav-link"><a class="nav-link text-white" href="product_update.php">Product Update</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" role="button" data-bs-toggle='dropdown' href="#">Category</a>
                <ul class="dropdown-menu bg-primary">
                    <li class="nav-link"><a class="nav-link text-white" href="category_list.php">Category List</a></li>
                    <li class="nav-link"><a class="nav-link text-white" href="category_create.php">Category Create</a></li>
                    <li class="nav-link"><a class="nav-link text-white" href="category_update.php">Category Update</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <?php
        $products = $conn->query("SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id");
        while ($product = $products->fetch_assoc()):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php if($product['image']): ?>
                <img src="uploads/<?php echo $product['image'] ?>" class="card-img-top" alt="<?php echo $product['name'] ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name'] ?></h5>
                    <p class="card-text">Price: <?php echo $product['price'] ?></p>
                    <p class="card-text">Category: <?php echo $product['category_name'] ?></p>
                    <p class="card-text"><?php echo $product['description'] ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
