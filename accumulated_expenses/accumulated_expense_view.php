<?php
    include '../view/header.php';
    require('accumulated_expense_controller.php');
?>
<main>
    <aside>
        <h1>Accumulated Expenses</h1>        
    </aside>
    <section>
        <table>
            <tr>
                <th>Today</th>
                <th>Yesterday</th>
                <th>Last 7 Days</th>
                <th>Last 30 Days</th>
                <th>Current Year</th>
            </tr>
            <tr>
                <td><?php echo "$" . sumExpenses($todayDetail); ?></td>
                <td><?php echo "$" . sumExpenses($yesterdayDetail); ?></td>
                <td><?php echo "$" . sumExpenses($last7DayDetail); ?></td>
                <td><?php echo "$" . sumExpenses($last30DayDetail); ?></td>
                <td><?php echo "$" . sumExpenses($thisYearDetail); ?></td>
            </tr>
        </table>
    </section>
</main>
<?php include '../view/footer.php';