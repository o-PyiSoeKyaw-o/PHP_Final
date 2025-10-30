<?php
session_start();
include('db.php');

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
