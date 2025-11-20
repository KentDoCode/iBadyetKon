<?php 
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die('Unauthorized Access');
}

$user_id = $_SESSION['user_id'];
$expense_id = $_GET['expense_id'];
$amount = $_GET['amount'];
$category= $_GET['category'];



// Updating the value of spent and remaining. If an expense is delete the spend decrease and remaining budget increases
$updateBudget = mysqli_query($conn, "UPDATE budgets SET spent = spent - $amount, remaining = remaining + $amount WHERE user_id = '$user_id' AND category = '$category'");

$deleteQuery = "DELETE FROM expenses WHERE expense_id = '$expense_id' ";

// Deleting the expense
$delete = mysqli_query($conn, $deleteQuery);


if (!$delete && !$updateBudget) {
    echo "<script>
        alert('Mysql error: " . addslashes(mysqli_error($conn)) . "');
        window.history.back();
    </script>";

} else {
    echo "<script>
        alert('Expense deleted successfully!');
        window.location.href='../home.php';
        </script>
    ";
}






?>