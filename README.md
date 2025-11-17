📘 iBadyetKon – Simple Budget & Expense Tracker

iBadyetKon is a lightweight budgeting web application that helps users track their expenses, monitor their budget per category, and view remaining balances. Built using HTML, CSS, JavaScript, PHP, and MySQL, this project is designed as a beginner-friendly full-stack system.


⭐ Features

User Authentication – Sign up and log in securely (hashed passwords).

Budget Management – Add category budgets with automatic tracking.

Expense Tracking – Add expenses tied to a category.

Auto Calculation – Automatically updates spent and remaining budget values.

Real-Time Status – Budget status changes based on remaining value.

Simple UI – Clean and easy-to-navigate interface.


🗂️ Tech Stack

Frontend: HTML, CSS, JavaScript
Backend: PHP (procedural)
Database: MySQL (via phpMyAdmin / XAMPP)
Server: Apache (XAMPP)


📥 Installation & Setup

Clone this repository:

git clone https://github.com/KentDoCode/iBadyetKon.git



Move the folder into:

C:/xampp/htdocs/



Start Apache and MySQL in XAMPP.

Import the database:

Open phpMyAdmin

Create a new database (e.g., ibadyetkon)

Import the SQL file (if included in your repo)

Update your database connection inside:

includes/db_connect.php



Run the project in browser:


http://localhost/iBadyetKon/


📌 Directory Structure
iBadyetKon/
│── assets/
│   ├── css/
│   ├── js/
│   └── images/
│── includes/
│   ├── db_connect.php
│   ├── signup.php
│   ├── login.php
│   ├── add_expenses.php
│   └── add_budget.php
│── home.html
│── signup.html
│── login.html
│── budget.html
│── README.md


⚠️ Notes

This project is for learning and academic purposes.

Security is basic (no prepared statements yet).

Works best on local XAMPP setup.
