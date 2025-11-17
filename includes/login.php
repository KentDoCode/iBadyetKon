<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fname'] = $user['fname']; // 🔹 store first name
            $_SESSION['lname'] = $user['lname']; // optional

            echo "<script>
                    alert('Login successful!');
                    window.location.href='../home.html';
                  </script>";
        } else {
            echo "<script>alert('Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.history.back();</script>";
    }
}
?>
