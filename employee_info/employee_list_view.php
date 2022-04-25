<?php 
    include '../view/header.php'; 
    require('./employee_list_controller.php')
?>
<main>
    <aside>
        <h1>Employee List</h1>
    </aside>
    <section>
        <table>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?php echo $employee->getID(); ?></td>
                <td><?php echo $employee->getFname(); ?></td>
                <td><?php echo $employee->getLname(); ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; 