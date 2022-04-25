<?php
require('../model/ExpenseDB.php');
require('../model/Database.php');

// pull expenses from database
$expenseDB = new ExpenseDB();
$todayDetail = $expenseDB->getTodayDetail();
$yesterdayDetail = $expenseDB->getYesterdayDetail();
$last7DayDetail = $expenseDB->getLast7DayDetail();
$last30DayDetail = $expenseDB->getLast30DayDetail();
$thisYearDetail = $expenseDB->getThisYearDetail();

// sum expense amounts
function sumExpenses($expenses) {
    $sum = 0;
    foreach ($expenses as $expense) {
        $sum += $expense->getAmount();
    }
    return $sum;
}