<?php 
    include '../view/header.php';
    require('expense_list_controller.php');
?>
<main>
    <aside>
        <h1><?php echo $h1; ?></h1>        
    </aside>
    <section>
        <form action="expense_list_view.php" method="post">
            <input type="submit" name="action" value="All Expenses" />
            <input type="submit" name="action" value="Today's Details" />
            <input type="submit" name="action" value="Yesterday's Details" />
            <input type="submit" name="action" value="Last 7 Days' Details" />
            <input type="submit" name="action" value="Last 30 Days' Details" />
            <input type="submit" name="action" value="This Year's Details" />
        </form>
        <table>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date</th>
                <th>Category</th>
                <th>Description</th>
                <th>Payment Method</th>
                <th>Reimbursable Status</th>
                <th>Amount</th>
            </tr>
            <?php foreach ($expenses as &$expense) : ?>
            <tr> 
                <td><?php echo $expense->getEmpID(); ?></td>
                <td><?php echo getFirstName($expense->getEmpID()); ?></td>
                <td><?php echo getLastName($expense->getEmpID()); ?></td>
                <td><?php echo $expense->getDate(); ?></td>
                <td><?php echo findCategoryName($expense->getCategoryID()); ?></td>
                <td><?php echo $expense->getDescription(); ?></td>
                <td><?php echo $expense->getPaymentMethod(); ?></td>
                <td><?php echo translateReimbursable($expense->getReimbursable()); ?></td>
                <td><?php echo "$" . $expense->getAmount(); ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php';