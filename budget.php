<?php
session_start();

// If user is not logged in, redirect them
if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Budget | iBadyetKon</title>
    <link rel="icon" href="assets/images/logos/logo-only.svg" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/sidebar.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/css/budget.css" />
    <link rel="stylesheet" href="assets/css/modal.css" />
  </head>
  <body>
    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="logo">
        <img
          src="assets/images/logos/logo-only.svg"
          alt="The logo of iBadyetKon"
          class="logo-icon"
        />
        <img
          src="assets/images/logos/name-only.svg"
          alt="iBadyetKon"
          class="logo-name"
        />
      </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="links">
        <ul class="link-items">
          <li class="link-item">
            <a href="home.php" id="dashboard-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
                id="dashboard"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                />
              </svg>
              <label for="dashboard" class="dashboard-name"> Dashboard </label>
            </a>
          </li>
          <li class="link-item">
            <a href="expenses.php" id="expenses-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
                id="money-icon"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"
                />
              </svg>
              <label for="money-icon" class="expenses-name"> Expenses </label>
            </a>
          </li>
          <li class="link-item">
            <a href="budget.php" id="budget-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
                id="budget-icon"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"
                />
              </svg>
              <label for="budget-icon" class="budget-name"> Budget </label>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar-logout">
        <a class="logout-container" href="includes/logout.php">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"  
            stroke="currentColor"
            class="size-6"
            id="logout-icon"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"
            />
          </svg>
          <label for="logout-icon"> Log out </label>
        </a>
      </div>
    </aside>

    <!-- Main -->

    <main class="main">
      <section class="page-name">
        <div class="header-container">
          <h1>Budget Overview</h1>
          <p>Set and Track your spending limits per category.</p>
        </div>
        <button id="add-expenses-botton" onclick="addBudget()">+ Add Budget</button>
      </section>
      <div class="recent-transactions">
        <p>Budget Table</p>
        <table class="transaction-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Description</th>
              <th>Budget (₱)</th>
              <th>Spent (₱)</th>
              <th>Remaining (₱)</th>
              <th>Status/ Progress</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include '../iBadyetKon/includes/db_connect.php';

            $user_id = $_SESSION['user_id'];

            $sql = "SELECT * FROM budgets WHERE user_id = '$user_id'";
            $result = $conn->query($sql);

            if (!$result) {
              die ("Query Failed" . $conn->error);
            }

            while ($row = $result->fetch_assoc()){
              
              echo "<tr>
              <td>$row[budget_id]</td>
              <td>$row[category]</td>
              <td>$row[description]</td>
              <td>$row[amount]</td>
              <td>$row[spent]</td>
              <td>$row[remaining]</td>
              <td>$row[status]</td>
              <td>
                    <button class='edit' id='edit-button-budget' onclick=\"openEditModalBudget('{$row['budget_id']}', '{$row['category']}', '{$row['description']}', '{$row['amount']}')\">Edit</button>
              
                  </td>         
            </tr>";
            }


            ?>
            
          </tbody>
        </table>
      </div>
      <section class="overlay-modal" id="overlay-modal">
        <div class="add-expenses-modal">
          <div class="name-close">
            <p>Add Budget</p>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-6"
              id="close-btn"
              onclick="closeAddBudget()"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
          </div>
          <hr />
          <form action="includes/add_budget.php" class="expenses-inputs" method="POST">
            <div class="inputs">
              <div class="category-input">
                <label for="category">Category</label>
                <input
                  type="text"
                  id="category"
                  placeholder="Write your expense category here"
                  name="category"
                  required
                />
              </div>

              <div class="description-input">
                <label for="description-name">Description/ Name</label>
                <input
                  type="text"
                  id="description-name"
                  name="description-name"
                  placeholder="Enter your description/ name here"
                  required
                />
              </div>
              <div class="amount-input">
                <label for="amount">Amount</label>
                <input
                  type="number"
                  name="amount"
                  id="amount"
                  placeholder="Enter amount here"
                  required
                />
                <p>Budget will be added to Budget Table</p>
              </div>
            </div>
            <div class="buttons">
              <button id="cancel" type="reset" onclick="cancelAddBudget()">Cancel</button>
              <button id="save" type="submit">Save</button>
            </div>
          </form>
        </div>
      </section>

      
      <!-- Edit -->
       <section class="overlay-modal-edit-budget" id="overlay-modal-edit">
        <div class="add-expenses-modal">
          <div class="name-close">
            <p>Edit Budget</p>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-6"
              id="close-btn-edit-budget"
              onclick="closeEditBudget()"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
          </div>
          <hr />
          <form action="includes/edit_budget.php" class="expenses-inputs" method="POST">
            <div class="inputs">
              <input type="text" id="budget_id" name="budget-id" readonly>
              <div class="category-input">
                <label for="category">Category</label>
                <input
                  type="text"
                  id="edit-category-budget"
                  placeholder="Write your expense category here"
                  name="category"
                  readonly
                />
              </div>

              <div class="description-input">
                <label for="description-name">Description/ Name</label>
                <input
                  type="text"
                  id="edit-budget-description-name"
                  name="description-name"
                  placeholder="Enter your description/ name here"
                />
              </div>
              <div class="amount-input">
                <label for="amount">Amount</label>
                <input
                  type="number"
                  name="amount"
                  id="edit-budget-amount"
                  placeholder="Enter amount here"
                />
                <p>Budget will be updated to Budget Table</p>
              </div>
            </div>
            <div class="buttons">
              <button id="cancel-edit-budget" type="reset" onclick="cancelEditBudget()">Cancel</button>
              <button id="save" type="submit">Save</button>
            </div>
          </form>
        </div>
      </section>

    </main>
    <footer class="footer">
      <p>
        Villalun Tabangin Mohammed Angeline R. &copy; 2025 Web Systems Final
        Project
      </p>
    </footer>
    <script src="assets/js/main.js"></script>
  </body>
</html>
