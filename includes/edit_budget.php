<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access!");
}

$user_id = $_SESSION['user_id'];
$budget_id = $_POST['budget-id'];
$category = $_POST['category'];
$description = $_POST['description-name'];
$amount = $_POST['amount'];

// 1. Get current spent
$oldBudgetQuery = mysqli_query($conn, 
    "SELECT spent FROM budgets 
     WHERE budget_id='$budget_id' AND user_id='$user_id'"
);

if (!$oldBudgetQuery || mysqli_num_rows($oldBudgetQuery) === 0) {
    echo "<script>alert('Budget record not found.'); window.history.back();</script>";
    exit;
}

$row = mysqli_fetch_assoc($oldBudgetQuery);
$currentSpent = $row['spent'];

// 2. Compute new remaining
$newRemaining = $amount - $currentSpent;

if ($newRemaining < 0) {
    echo "<script>
        alert('Error: New budget cannot be less than the already spent amount.');
        window.history.back();
    </script>";
    exit;
}

// 3. Update
$update = mysqli_query($conn, "
    UPDATE budgets 
    SET amount='$amount',
        remaining='$newRemaining',
        description='$description'
    WHERE budget_id='$budget_id' AND user_id='$user_id'
");

if ($update) {
    echo "<script>
        alert('Budget updated successfully!');
        window.location.href='../budget.php';
    </script>";
} else {
    echo "<script>
        alert('MySQL Error: " . addslashes(mysqli_error($conn)) . "');
        window.history.back();
    </script>";
}

?>
