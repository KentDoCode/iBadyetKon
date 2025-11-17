<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}


$fname = $_SESSION['fname'];
?>