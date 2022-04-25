<?php
include '../view/header.php';
?>
<br>
<?php
echo $misc_error;

if ($return != null) {
    $returnTitle = "Return";
} else {
    $return = "";
    $returnTitle = "";
}


if ($suggestion != null) {
    $suggestedTitle = "";
    switch ($suggestion) {
        case "../employee_info/employee_form_view.php":
            $suggestedTitle = "Add Employee";
            break;
    }
}
?>

<p><a href="<?php echo $return; ?>"><?php echo $returnTitle; ?></a></p>
<p><a href="<?php echo $suggestion; ?>"><?php echo $suggestedTitle; ?></a></p>

<?php
include "footer.php";