// Main Dashboard Page and Expenses Page

// Opening Add expenses modal
function addExpenses() {
  const addExpensesModal = document.getElementById("overlay-modal");

  if (!addExpensesModal) return;
  addExpensesModal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Closing Add expenses modal with close button
function closeAddExpenses() {
  const addExpensesModal = document.getElementById("overlay-modal");

  if (!addExpensesModal) return;
  addExpensesModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Cancel Add expenses and close the modal
function cancelAddExpenses() {
  const addExpensesModal = document.getElementById("overlay-modal");

  if (!addExpensesModal) return;
  addExpensesModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Editing Expenses Modal

// Opening Edit Expenses Modal
function editExpenses() {
  const editExpenseModal = document.getElementById("overlay-modal-edit");

  if (!editExpenseModal) return;
  editExpenseModal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

function openEditModal(id, category, description, date, amount) {
  document.getElementById("edit-expense-id").value = id;
  document.getElementById("edit-category").value = category;
  document.getElementById("edit-description-name").value = description;
  document.getElementById("edit-date").value = date;
  document.getElementById("edit-amount").value = amount;

  editExpenses();
}

// Closing Edit expenses with close icon
function closeEditExpenses() {
  const editExpensesModal = document.getElementById("overlay-modal-edit");

  if (!editExpensesModal) return;

  editExpensesModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Cancelling and closing the edit expenses modal
function cancelEditExpenses() {
  const editExpensesModal = document.getElementById("overlay-modal-edit");

  if (!editExpensesModal) return;

  editExpensesModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Budget Page

// Opening Add budget modal
function addBudget() {
  const addBudgetModal = document.getElementById("overlay-modal");

  if (!addBudgetModal) return;

  addBudgetModal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// CLosing add budget Modal
function closeAddBudget() {
  const addBudgetModal = document.getElementById("overlay-modal");

  if (!addBudgetModal) return;

  addBudgetModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Cancel add budget and close the modal
function cancelAddBudget() {
  const addBudgetModal = document.getElementById("overlay-modal");

  if (!addBudgetModal) return;

  addBudgetModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Edit Budget

function editBudget() {
  const editBudgetModal = document.getElementById("overlay-modal-edit");

  if (!editBudgetModal) return;

  editBudgetModal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

function openEditModalBudget(id, category, description, amount) {
  
  document.getElementById('budget_id').value = id;
  document.getElementById('edit-category-budget').value = category;
  document.getElementById('edit-budget-description-name').value = description;
  document.getElementById('edit-budget-amount').value = amount;
  


  editBudget();
}


function closeEditBudget() {
  const editBudgetModal = document.getElementById("overlay-modal-edit");

  if (!editBudgetModal) return;

  editBudgetModal.style.display = "none";
  document.body.style.overflow = "auto";
}

function cancelEditBudget() {
  const editBudgetModal = document.getElementById("overlay-modal-edit");

  if (!editBudgetModal) return;

  editBudgetModal.style.display = "none";
  document.body.style.overflow = "auto";
}

// To delete expenses
function deleteExpense(id, amount, category) {
  if (!confirm("Are you sure you want to delete this expense?")) {
    return;
  }

  window.location.href = `includes/delete_expenses.php?expense_id=${id}&amount=${amount}&category=${category}`;
}


function deleteBudget(id, amount) {
  if (!confirm("Are you sure you want to delete this budget?")) {
    return;
  }

  window.location.href = `includes/delete_budget.php?budget_id=${id}&amount=${amount}`;
}