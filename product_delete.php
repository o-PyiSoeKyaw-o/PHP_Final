<?php include('db.php') ?>
<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn->query("DELETE FROM products WHERE id=$id");
        header("location:index.php");
    }
?>