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
                <li class="nav-item"><a class="nav-link text-white" href="#">User</a></li>
            </ul>
        </div>
    </nav>

    <?php 
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $conn->query("DELETE FROM products WHERE id=$id");
            header("location:index.php");
            exit();
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>