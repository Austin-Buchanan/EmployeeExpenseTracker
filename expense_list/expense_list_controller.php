<?php
require('../model/ExpenseDB.php');
require('../model/EmployeeDB.php');



// handle different detail views
switch($action) {
    case "Today's Details":
        $expenses = ExpenseDB::getTodayDetail();
        $h1 = "Today's Expense Details";
        break;
    case "Yesterday's Details":
        $expenses = ExpenseDB::getYesterdayDetail();
        $h1 = "Yesterday's Expense Details";
        break;
    case "Last 7 Days' Details":
        $expenses = ExpenseDB::getLast7DayDetail();
        $h1 = "Last 7 Days' Expense Details";
        break;
    case "Last 30 Days' Details":
        $expenses = ExpenseDB::getLast30DayDetail();
        $h1 = "Last 30 Days' Expense Details";
        break;
    case "This Year's Details":
        $expenses = ExpenseDB::getThisYearDetail();
        $h1 = "This Year's Expense Details";
        break;
    default:
        $expenses = ExpenseDB::getAllDetail();
        $h1 = "All Expense Details";
        break;
}

function getFirstName($id) {
    $employee = EmployeeDB::findEmployee($id);
    return $employee->getFname();
}

function getLastName($id) {
    $employee = EmployeeDB::findEmployee($id);
    return $employee->getLname();
}

function findCategoryName($categoryID) {
    $categories = Database::getCategories();
    foreach ($categories as $category) {
        if ($category['CategoryID'] == $categoryID) {
            return $category['CategoryName'];
        }
    }
    return "";
}

function translateReimbursable($reimbursable) {
    switch ($reimbursable) {
        case 'N':
            return "No";
        case 'Y':
            return "Yes";
        default:
            return "";
    }
}