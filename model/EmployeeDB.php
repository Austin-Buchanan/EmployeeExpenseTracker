<?php
require('Employee.php');
require('Database.php');

class EmployeeDB {
    public function getAllEmployees() {
        $db = Database::getDB();
        $query = "SELECT * FROM EmpInfo";
        $result = $db->query($query);
        $employees = array();
        foreach ($result as $row) {
            $employee = new Employee($row['EmpID'], $row['Fname'], 
                    $row['Lname']);
            $employees[] = $employee;
        }
        return $employees;
    }
    
    public function addEmployee($employee) {
        $db = Database::getDB();
        
        $empID = $employee->getID();
        $fname = $employee->getFname();
        $lname = $employee->getLname();
        
        $query = "INSERT INTO EmpInfo (EmpID, Fname, Lname) "
                . "VALUES ('$empID', '$fname', '$lname')";
        $db->exec($query);
    }
    
    public function checkID($id) {
        $employees = $this->getAllEmployees();
        foreach ($employees as &$employee) {
            if ($employee->getID() == $id) {
                return true;
            }
        }
        return false;
    }
    
    public function findEmployee($id) {
        $db = Database::getDB();
        $query = "SELECT Fname, Lname FROM EmpInfo WHERE EmpID = '$id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
        return new Employee($id, $row['Fname'], $row['Lname']);
    }
}
