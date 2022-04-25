<?php 
    include '../view/header.php';
    require('expense_form_controller.php');
?>
<main>
    <h1>Add Expense</h1>
    <form action="expense_form_controller.php" method="post" id="add_expense_form">
        <input type="hidden" name="action" value="add_expense" />
        <label>Employee ID: </label>
        <input type="text" name="empID">
        <br>
        <label>Date: </label>
        <input type="date" name="expDate">
        <br>
        <label>Description: </label>
        <input type="text" name="expDescription">
        <br>
        <label>Category: </label> 
        <select name="categoryID">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['CategoryID']; ?>">
                <?php echo $category['CategoryName']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br> 
        <label>Payment Method: </label> 
        <select name="paymentMethod">
            <option value="Cash">Cash</option>
            <option value="Credit">Credit</option>
            <option value="Debit">Debit</option>
        </select>       
        <br>
        <label>Reimbursable: </label> 
        Yes<input type="radio" id="yes" name="reimbursable" value="Y"> 
        No<input type="radio" id="no" name="reimbursable" value="N"><br>
        <label>Amount: </label>
        <input type="text" name="amount"><br>
        <input type="submit" value="Submit">
        <br>
    </form>
</main>
<?php include '../view/footer.php';