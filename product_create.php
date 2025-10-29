<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
    $media = 'uploads/';
    if (!is_dir($media)) mkdir($media);

    $categories = $conn->query("SELECT * FROM categories");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category_id = $_POST['category'];

        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $image = time() . "_" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $media . $image);
        }
        $description = $_POST['description'];

        $conn->query("INSERT INTO products (name, price, category_id, image, description) VALUES ('$name', '$price', '$category_id', '$image', '$description')");
        header('location:index.php');
        exit();
    }
    ?>

    <div class="container mt-5 rounded p-2" style="width: 500px; border: solid black 2px;">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label class="form-label" for="name">Product Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="mb-2">
                <label class="form-label" for="price">Product Price</label>
                <input class="form-control" type="text" name="price">
            </div>
            <div class="mb-2">
                <label class="form-label" for="category">Product Category</label>
                <select class="form-control" name="category" id="category">
                    <?php while ($category = $categories->fetch_assoc()): ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label" for="image">Product Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="mb-2">
                <label class="form-label" for="description">Product Description</label>
                <textarea class="form-control" type="text" name="description"></textarea>
            </div>
            <button class="btn btn-success" type="submit" name="submit">Create</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>