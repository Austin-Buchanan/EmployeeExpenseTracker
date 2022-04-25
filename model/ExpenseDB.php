<?php
require('Expense.php');

class ExpenseDB {
    public function getAllDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail ORDER BY ExpDate DESC";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;
    }
    
    public function addExpense($expense) {
        $db = Database::getDB();
        $empID = $expense->getEmpID();
        $expDate = $expense->getDate();
        $expDescription = $expense->getDescription();
        $categoryID = $expense->getCategoryID();
        $paymentMethod = $expense->getPaymentMethod();
        $reimbursable = $expense->getReimbursable();
        $amount = $expense->getAmount();
        
        $query = "INSERT INTO  ExpDetail (EmpID, ExpDate, ExpDescription, CategoryID, "
                . "PaymentMethod, Reimbursable, Amount) "
                . "VALUES ('$empID','$expDate','$expDescription','$categoryID', "
                . "'$paymentMethod','$reimbursable', $amount)";
        $db->exec($query);
    }
    
    public function getTodayDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail WHERE ExpDate = CURRENT_DATE "
                . "ORDER BY EmpID";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;
    }
    
    public function getYesterdayDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail WHERE ExpDate = "
                . "DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) ORDER BY EmpID";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;        
    }
    
    public function getLast7DayDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail WHERE ExpDate >= "
                . "DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) ORDER BY ExpDate";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;          
    }
    
    public function getLast30DayDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail WHERE ExpDate >= "
                . "DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY) ORDER BY ExpDate";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;         
    }
    
    public function getThisYearDetail() {
        $db = Database::getDB();
        $query = "SELECT * FROM ExpDetail WHERE YEAR(ExpDate) = YEAR(CURRENT_DATE) "
                . "ORDER BY ExpDate";
        $result = $db->query($query);
        $expenses = array();
        foreach ($result as $row) {
            $expense = new Expense($row['EmpID'], $row['ExpDate'], $row['ExpDescription'], 
                    $row['CategoryID'], $row['PaymentMethod'], $row['Reimbursable'],
                    $row['Amount']);
            $expenses[] = $expense;
        }
        return $expenses;         
    }
}
