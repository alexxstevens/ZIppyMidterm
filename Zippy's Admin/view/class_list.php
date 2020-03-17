<?php include 'header.php'; ?>

<div id="class_list">
    <h2>Vehicle Classes</h2>
        <table>
            <tr>
                <th colspan="2">Class Name</th>
            </tr>        
            <?php foreach ($classes as $class) : ?>
            <tr>
                <td><?php echo $class['class_name']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_code"
                            value="<?php echo $class['class_code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
</div>
<div id="add_class">
        <h2>Add Vehicle Class</h2>
        <form action="." method="post" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label>Class Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <label>&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Vehicle Class"><br>
        </form>
</div>
<div id="links">
        <p><a href="index.php">View Inventory</a></p>
</div>

<?php include 'footer.php'; ?>
