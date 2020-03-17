<?php include 'header.php'; ?>

<div id="type_list">
    <h2>Vehicle Types</h2>
        <table>
            <tr>
                <th colspan="2">Type Name</th>
            </tr>        
            <?php foreach ($types as $type) : ?>
            <tr>
                <td><?php echo $type['type_name']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="type_code"
                            value="<?php echo $type['type_code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
</div>
<div id="add_type">
        <h2>Add Vehicle Type</h2>
        <form action="." method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label>Type Name:</label>
            <input type="text" name="type_name" max="20" required><br>

            <label>&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Vehicle Type"><br>
        </form>
</div>
<div id="links">
        <p><a href="index.php">View Inventory</a></p>
</div>

<?php include 'footer.php'; ?>

