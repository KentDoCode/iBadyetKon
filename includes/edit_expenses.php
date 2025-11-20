<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $expense_id = $_POST['expense_id'];
    $category = $_POST['category'];
    $description = $_POST['description-name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    // Validate required fields
    if (empty($expense_id) || empty($category) || empty($amount) || empty($date)) {
        echo "<script>
                alert('Please fill all required fields.');
                window.history.back();
              </script>";
        exit;
    }

    // Get the old expense amount
    $oldExpenseQuery = mysqli_query($conn, 
        "SELECT amount, category FROM expenses WHERE expense_id='$expense_id'"
    );

    if (mysqli_num_rows($oldExpenseQuery) === 0) {
        echo "<script>alert('Expense not found.'); window.history.back();</script>";
        exit;
    }

    $oldExpense = mysqli_fetch_assoc($oldExpenseQuery);
    $old_amount = $oldExpense['amount'];
    $old_category = $oldExpense['category'];

    // If category changed, need to update old category budget first
    if ($old_category !== $category) {
        // Deduct OLD amount from OLD category
        mysqli_query($conn,
            "UPDATE budgets 
             SET spent = spent - $old_amount,
                 remaining = amount - (spent - $old_amount)
             WHERE user_id='$user_id' AND category='$old_category'"
        );

        // Increase NEW category spent by the NEW amount
        mysqli_query($conn,
            "UPDATE budgets 
             SET spent = spent + $amount,
                 remaining = amount - (spent + $amount)
             WHERE user_id='$user_id' AND category='$category'"
        );
    } else {
        // Category unchanged → Update same budget
        $difference = $amount - $old_amount; // positive or negative

        mysqli_query($conn,
            "UPDATE budgets 
             SET spent = spent + $difference,
                 remaining = remaining - $difference
             WHERE user_id='$user_id' AND category='$category'"
        );
    }

    // Update expense record
    $update = mysqli_query($conn,
        "UPDATE expenses SET 
            category='$category',
            description='$description',
            amount='$amount',
            date='$date'
         WHERE expense_id='$expense_id'"
    );

    if ($update) {
        echo "<script>
                alert('Expense updated successfully!');
                window.location.href='../home.php';
              </script>";
    } else {
        echo "<script>
                alert('MySQL Error: " . addslashes(mysqli_error($conn)) . "');
                window.history.back();
              </script>";
    }
}
?>
