<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User not logged in!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_SESSION['user_id'];
    $category = $_POST['category'];
    $description = $_POST['description-name'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO budgets (user_id, category, amount, spent, remaining, status) 
    VALUES ('$user_id', '$category', '$amount', 0, '$amount', 'active')";

     if (mysqli_query($conn, $query)) {
        echo "<script>alert('Budget added successfully!'); window.location.href='../budget.php';</script>";
    } else {
        echo "<script>alert('Error adding expense: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}




?>