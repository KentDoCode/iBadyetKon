<?php
include '/xampp/htdocs/iBadyetKon/includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];


    if ($password !== $confirmPassword) {
        echo "<script>
        alert('Passwords do not match!');
        window.history.back();
        </script>";
        exit(); 
    }


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>
        alert('Email already registered!');
        window.history.back();
        </script>";
        exit();
    } else {
        // Insert into database
        $query = "INSERT INTO users (fname, lname, email, password) 
                  VALUES ('$fname', '$lname', '$email', '$hashedPassword')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo "<script>
            alert('Account created successfully! You can now log in.'); 
            window.location.href = '../login.html';
            </script>";
            exit();
        } else {
            echo "<script>z
            alert('Something went wrong. Please try again later.'); 
            window.history.back();
            </script>";
            exit();
        }
    }
}
?>
