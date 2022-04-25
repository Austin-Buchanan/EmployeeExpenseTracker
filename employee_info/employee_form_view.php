<?php
    include '../view/header.php';
    require('employee_form_controller.php');
?>
<main>
    <h1>Add Employee</h1>
    <form action ="employee_form_controller.php" method="post" 
        id="add_employee_form">
        <input type="hidden" name="action" value="add_employee" />
        <label>Employee ID: </label>
        <input type="text" name="empID"><br>
        <label>First Name: </label>
        <input type="text" name="fname"><br>
        <label>Last Name: </label>
        <input type="text" name="lname"><br>
        <input type="submit" value="Submit"><br>
    </form>
</main>
<?php include '../view/footer.php';