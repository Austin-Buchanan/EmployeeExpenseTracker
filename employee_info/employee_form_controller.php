<?php
require('../model/EmployeeDB.php');

$employeeDB = new EmployeeDB();

$action = filter_input(INPUT_POST, 'action');

if ($action == 'add_employee') {
    // get employee info from form
    $empID = filter_input(INPUT_POST, 'empID', FILTER_VALIDATE_INT);
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    
    // validate employee attributes
    if ($empID == NULL || $fname == NULL || $lname == NULL) {
        $misc_error = "Invalid employee data. Check all fields and try again.";
        $return = "../employee_info/employee_form_view.php";
        include '../view/misc_error.php';
    } elseif ($employeeDB->checkID($empID)) { // make sure employee exists
        $misc_error = "There is already an employee with ID $empID. Please use another ID.";
        $return = "../employee_info/employee_form_view.php";
        include '../view/misc_error.php';
    } else {
        // Create employee object and add to database
        $new_employee = new Employee($empID, $fname, $lname);
        $employeeDB->addEmployee($new_employee);
        include '../view/header.php';
        echo "<br>Employee added.";
        include '../view/footer.php';
    }
}
