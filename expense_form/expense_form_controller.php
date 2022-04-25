<?php
require('../model/ExpenseDB.php');
require('../model/EmployeeDB.php');

$categories = Database::getCategories();
$paymethods = Database::getPaymentMethods();
$employeeDB = new EmployeeDB();
$expenseDB = new ExpenseDB();

$action = filter_input(INPUT_POST, 'action');

if ($action == 'add_expense') {
    // get expense data from form
    $empID = filter_input(INPUT_POST, 'empID', FILTER_VALIDATE_INT);
    $expDate = filter_input(INPUT_POST, 'expDate');
    $expDescription = filter_input(INPUT_POST, 'expDescription');
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    $paymentMethod = filter_input(INPUT_POST, 'paymentMethod');
    $reimbursable = filter_input(INPUT_POST, 'reimbursable');
    $amount = filter_input(INPUT_POST, 'amount');
    
    // validate employee attributes
    if ($empID == NULL || $expDate == NULL || $expDescription == NULL || 
            $categoryID == NULL || $paymentMethod == NULL ||
            $reimbursable == NULL || $amount == NULL) {
        $misc_error = "Invalid new expense data. Please check all fields and try again.";
        $return = "../expense_form/expense_form_view.php";
        include '../view/misc_error.php';
    } elseif (!$employeeDB->checkID($empID)) { // verify employee exists
        $misc_error = "There is no employee with ID $empID. "
                . "Please use another ID or use the Add Employee page.";
        $return = "../expense_form/expense_form_view.php";
        $suggestion = "../employee_info/employee_form_view.php";
        include '../view/misc_error.php';
    } else {
        // create expense object and add to database
        $new_expense = new Expense($empID, $expDate, $expDescription, $categoryID, 
                $paymentMethod, $reimbursable, $amount);
        $expenseDB->addExpense($new_expense);
        include ('../view/header.php');
        echo "<br>Expense added.";
        include ('../view/footer.php');
    }
}