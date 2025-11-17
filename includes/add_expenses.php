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
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    
    if (empty($category) || empty($amount)) {
        echo "<script>
            alert('Please fill in all required fields.'); 
            window.history.back();
        </script>";
        exit;
    }

    
    $checkBudget = mysqli_query($conn,
        "SELECT * FROM budgets WHERE user_id='$user_id' AND category='$category'"
    );

    if (mysqli_num_rows($checkBudget) === 0) {
        echo "<script>
            alert('No budget set for this category yet. Please create a budget first.');
            window.location.href='../budget.html';
        </script>";
        exit;
    }

    $budget = mysqli_fetch_assoc($checkBudget);

    $budget_id = $budget['budget_id'];
    $old_spent = $budget['spent'];
    $budget_amount = $budget['amount'];

    
    $new_spent = $old_spent + $amount;
    $new_remaining = $budget_amount - $new_spent;

    
    if ($new_remaining > 0) {
        $status = 'active';
    } elseif ($new_remaining == 0) {
        $status = 'zero';
    } else {
        $status = 'over';
    }

    
    $insertExpense = mysqli_query($conn,
        "INSERT INTO expenses (user_id, category, description, amount, date)
         VALUES ('$user_id', '$category', '$description', '$amount', '$date')"
    );

    if (!$insertExpense) {
        echo "<script>
            alert('MySQL Error: " . addslashes(mysqli_error($conn)) . "');
        </script>";
        exit;
    }


    $updateBudget = mysqli_query($conn,
        "UPDATE budgets 
         SET spent='$new_spent', remaining='$new_remaining', status='$status'
         WHERE budget_id='$budget_id'"
    );

    if (!$updateBudget) {
        echo "<script>
            alert('Error updating budget: " . addslashes(mysqli_error($conn)) . "');
        </script>";
        exit;
    }

    echo "<script>
        alert('Expense added successfully!');
        window.location.href='../home.html';
    </script>";
}
?>
