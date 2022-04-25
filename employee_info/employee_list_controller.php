<?php
require('../model/EmployeeDB.php'); 
// get all employees from the database
$employees = EmployeeDB::getAllEmployees();
